<?php

namespace App\Repositories;

use App\Models\SelfCheckSheet;
use App\Models\SelfCheckRating;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SelfCheckSheetRepository implements SelfCheckSheetRepositoryInterface
{
    /**
     * @param Request $request
     * @return Builder $query
     */
    public function search(Request $request): Builder
    {
        return SelfCheckSheet::query()
            ->keyword($request->get('keyword'))
            ->orderBy('self_check_sheets.id', 'desc');
    }

    /**
     * @param Request $request
     * @return SelfCheckSheet
     * @throws Exception
     */
    public function create(Request $request): SelfCheckSheet
    {
        $self_check_sheet = new SelfCheckSheet();
        $self_check_sheet->fill($request->all());
        if (!$self_check_sheet->save()) {
            throw new Exception("セルフチェックシートの作成に失敗しました。");
        }
        return $self_check_sheet;
    }

    /**
     * @param SelfCheckSheet $self_check_sheet
     * @param Request $request
     * @return SelfCheckSheet
     * @throws Exception
     */
    public function update(SelfCheckSheet $self_check_sheet, Request $request): SelfCheckSheet
    {
        $self_check_sheet = $self_check_sheet->fill($request->all());
        if (!$self_check_sheet->update()) {
            throw new Exception("セルフチェックシートの更新に失敗しました。");
        }
        return $self_check_sheet;
    }

    /**
     * @param SelfCheckSheet $self_check_sheet
     * @return void
     * @throws Exception
     */
    public function delete(SelfCheckSheet $self_check_sheet): void
    {
        if (!$self_check_sheet->delete()) {
            throw new Exception("セルフチェックシートの更新に失敗しました。");
        }
    }

    /**
     * @param User $user
     * @param string $term
     * @return Collection
     */
    public function answerSelfCheckSheets($user, string $term): Collection
    {
        return $user
            ->answer_self_check_sheets
            ->onTerm($term)
            ->get()
            ->map(function ($self_check_sheet) use($user, $term) {
                // 期間表示
                $start = date('Y-m-d', strtotime("{$term}-01"));
                $check_days = $self_check_sheet->check_days - 1;
                $self_check_sheet->display_term = date('Y.m.d', strtotime($start)) . " - " . date('Y.m.d', strtotime("{$start} + {$check_days} days"));

                // ステータス
                $self_check_rating = $self_check_sheet
                    ->self_check_ratings()
                    ->where('self_check_ratings.user_id', $user->id)
                    ->onTerm($term)
                    ->first();
                $self_check_sheet->rating_status = $self_check_rating ? $self_check_rating->status : SelfCheckRating::STATUS_NOT_ANSWERED;

                return $this->setTaskAttributes($self_check_sheet, $user, $term);
            })
            ->filter(function ($self_check_sheet) {
                return in_array($self_check_sheet->rating_status, [
                    SelfCheckRating::STATUS_NOT_ANSWERED,
                    SelfCheckRating::STATUS_ANSWERING
                ]);
            });
    }

    /**
     * @param User $user
     * @param string $term
     * @return Collection
     */
    public function ratingSelfCheckSheets($user, string $term): Collection
    {
        return $user
            ->rating_self_check_sheets
            ->onTerm($term)
            ->get()
            ->map(function ($self_check_sheet) use($user, $term) {
                // 期間表示
                $check_days = $self_check_sheet->check_days - 1;
                $start = date('Y-m-d', strtotime("{$term}-01 + " .($check_days + 1). " days"));
                $rating_days = $self_check_sheet->rating_days - 1;
                $self_check_sheet->display_term = date('Y.m.d', strtotime($start)) . " - " . date('Y.m.d', strtotime("{$start} + {$rating_days} days"));

                // ステータス（評価対象の回答状況で算出）todo:評価者の条件
                {
                    // 対象数
                    $all_target_count = $self_check_sheet
                        ->self_check_sheet_targets()
                        ->count();

                    // 回答済み数
                    $answered_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm('self_check_ratings', $term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_RATING,
                            SelfCheckRating::STATUS_APPROVING,
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    // 評価済み数
                    $rated_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm($term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_APPROVING,
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    // 承認済み数
                    $approved_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm($term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    if (date('Y-m-d') < $start) {
                        // 評価期間開始前までは回答中
                        $rating_status = SelfCheckRating::STATUS_ANSWERING;
                    } else {
                        // 評価期間開始後は評価中
                        $rating_status = SelfCheckRating::STATUS_RATING;
                        if ($all_target_count <= $rated_target_count) {
                            // 対象者数全員が評価済み数になった場合
                            $rating_status = SelfCheckRating::STATUS_APPROVING;
                        }
                        if ($all_target_count <= $approved_target_count) {
                            // 対象者数全員が承認済み数になった場合
                            $rating_status = SelfCheckRating::STATUS_APPROVED;
                        }
                    }
                    $self_check_sheet->rating_status = $rating_status;
                }

                return $this->setTaskAttributes($self_check_sheet, $user, $term);
            })
            ->filter(function ($self_check_sheet) {
                return in_array($self_check_sheet->rating_status, [
                    SelfCheckRating::STATUS_RATING
                ]);
            });
    }

    /**
     * @param User $user
     * @param string $term
     * @return Collection
     */
    public function approvingSelfCheckSheets($user, string $term): Collection
    {
        return $user
            ->rating_self_check_sheets
            ->onTerm($term)
            ->get()
            ->map(function ($self_check_sheet) use($user, $term) {
                // 期間表示
                $check_days = $self_check_sheet->check_days - 1;
                $rating_days = $self_check_sheet->rating_days - 1;
                $start = date('Y-m-d', strtotime("{$term}-01 + " .($check_days + $rating_days + 2). " days"));
                $approval_days = $self_check_sheet->approval_days - 1;
                $self_check_sheet->display_term = date('Y.m.d', strtotime($start)) . " - " . date('Y.m.d', strtotime("{$start} + {$approval_days} days"));

                // ステータス（評価対象の回答状況で算出）todo:承認者の条件
                {
                    // 対象数
                    $all_target_count = $self_check_sheet
                        ->self_check_sheet_targets()
                        ->count();

                    // 回答済み数
                    $answered_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm('self_check_ratings', $term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_RATING,
                            SelfCheckRating::STATUS_APPROVING,
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    // 評価済み数
                    $rated_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm($term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_APPROVING,
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    // 承認済み数
                    $approved_target_count = $self_check_sheet
                        ->self_check_ratings()
                        ->onTerm($term)
                        ->whereIn('self_check_ratings.status', [
                            SelfCheckRating::STATUS_APPROVED,
                        ])
                        ->count();

                    if (date('Y-m-d') < date('Y-m-d', strtotime("{$term}-01 + " .($check_days + 1). " days"))) {
                        // 評価期間より前は回答中
                        $rating_status = SelfCheckRating::STATUS_ANSWERING;
                    } else if (date('Y-m-d') < $start) {
                        // 承認期間開始前までは評価中
                        $rating_status = SelfCheckRating::STATUS_RATING;
                    } else {
                        // 承認期間開始後は評価中
                        $rating_status = SelfCheckRating::STATUS_APPROVING;
                        if ($all_target_count <= $approved_target_count) {
                            // 対象者数全員が承認済み数になった場合
                            $rating_status = SelfCheckRating::STATUS_APPROVED;
                        }
                    }
                    $self_check_sheet->rating_status = $rating_status;
                }

                return $this->setTaskAttributes($self_check_sheet, $user, $term);
            })
            ->filter(function ($self_check_sheet) {
                return in_array($self_check_sheet->rating_status, [
                    SelfCheckRating::STATUS_APPROVING
                ]);
            });
    }

    private function setTaskAttributes(SelfCheckSheet $self_check_sheet, $user, string $term): SelfCheckSheet
    {
        $self_check_sheet->display_title = "セルフチェック - " . date('Y年m月', strtotime("{$term}-01"));
        $self_check_sheet->display_sub_title = data_get($self_check_sheet, 'period.name') . " | " . $self_check_sheet->title;
        $self_check_sheet->display_status = data_get(SelfCheckRating::STATUS_LIST, $self_check_sheet->rating_status);
        // クラス
        $list_class = null;
        $status_class = null;
        switch ($self_check_sheet->rating_status) {
            case SelfCheckRating::STATUS_NOT_ANSWERED:
            case SelfCheckRating::STATUS_ANSWERING:
                $list_class = "alert";
                $status_class = "waiting";
                break;
            case SelfCheckRating::STATUS_RATING:
                $list_class = "assessment";
                $status_class = "assessment";
                break;
        }
        $self_check_sheet->list_class = $list_class;
        $self_check_sheet->status_class = $status_class;

        return $self_check_sheet;
    }
}
