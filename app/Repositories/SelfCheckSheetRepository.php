<?php

namespace App\Repositories;

use App\Models\SelfCheckSheet;
use App\Models\SelfCheckRating;
use App\Models\SelfCheckSheetItem;
use App\Models\SelfCheckSheetTarget;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        # self_check_sheets の更新
        $self_check_sheet = $self_check_sheet->fill($request->except(['self_check_sheet_items']));
        if (!$self_check_sheet->save()) {
            throw new Exception();
        }

        # self_check_sheet_items の更新
        $this->syncItems($self_check_sheet, $request->get('self_check_sheet_items', []));

        # self_check_sheet_targets の更新
        $this->syncTargets($self_check_sheet, $request->get('self_check_sheet_targets', []));

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
        # self_check_sheets の更新
        $self_check_sheet = $self_check_sheet->fill($request->except(['self_check_sheet_items']));
        if (!$self_check_sheet->update()) {
            throw new Exception();
        }

        # self_check_sheet_items の更新
        $this->syncItems($self_check_sheet, $request->get('self_check_sheet_items', []));

        # self_check_sheet_targets の更新
        $this->syncTargets($self_check_sheet, $request->get('self_check_sheet_targets', []));

        return $self_check_sheet;
    }

    /**
     * @throws Exception
     */
    private function syncItems(
        SelfCheckSheet $self_check_sheet,
        array $first_self_check_sheet_items
    )
    {
        $current_first_self_check_sheet_items = $self_check_sheet->first_self_check_sheet_items;
        foreach ($first_self_check_sheet_items as $first_self_check_sheet_item_index => $first_self_check_sheet_item_array) {
            # 第１階層の更新
            $first_self_check_sheet_item = data_get($current_first_self_check_sheet_items, $first_self_check_sheet_item_index);
            if ($first_self_check_sheet_item) {
                if (data_get($first_self_check_sheet_item_array, 'delete')) {
                    if (!$first_self_check_sheet_item->delete()) {
                        throw new Exception();
                    }
                    continue;
                }
            } else {
                if (data_get($first_self_check_sheet_item_array, 'delete')) {
                    continue;
                }
                $first_self_check_sheet_item = new SelfCheckSheetItem();
                $first_self_check_sheet_item->self_check_sheet_id = $self_check_sheet->id;
                $first_self_check_sheet_item->hierarchy = SelfCheckSheetItem::HIERARCHY_FIRST;
            }
            $first_self_check_sheet_item->title = data_get($first_self_check_sheet_item_array, 'title');
            if (!$first_self_check_sheet_item->save()) {
                throw new Exception();
            }

            $current_second_self_check_sheet_items = $first_self_check_sheet_item->second_self_check_sheet_items;
            foreach (data_get($first_self_check_sheet_item_array, 'self_check_sheet_items', []) as $second_self_check_sheet_item_index => $second_self_check_sheet_item_array) {
                # 第２階層の更新
                $second_self_check_sheet_item = data_get($current_second_self_check_sheet_items, $second_self_check_sheet_item_index);
                if ($second_self_check_sheet_item) {
                    if (data_get($second_self_check_sheet_item_array, 'delete')) {
                        if (!$second_self_check_sheet_item->delete()) {
                            throw new Exception();
                        }
                        continue;
                    }
                } else {
                    if (data_get($second_self_check_sheet_item_array, 'delete')) {
                        continue;
                    }
                    $second_self_check_sheet_item = new SelfCheckSheetItem();
                    $second_self_check_sheet_item->self_check_sheet_id = $self_check_sheet->id;
                    $second_self_check_sheet_item->parent_self_check_sheet_item_id = $first_self_check_sheet_item->id;
                    $second_self_check_sheet_item->hierarchy = SelfCheckSheetItem::HIERARCHY_SECOND;
                }
                $second_self_check_sheet_item->title = data_get($second_self_check_sheet_item_array, 'title');
                if (!$second_self_check_sheet_item->save()) {
                    throw new Exception();
                }

                $current_third_self_check_sheet_items = $second_self_check_sheet_item->third_self_check_sheet_items;
                foreach (data_get($second_self_check_sheet_item_array, 'self_check_sheet_items', []) as $third_self_check_sheet_item_index => $third_self_check_sheet_item_array) {
                    # 第３階層の更新
                    $third_self_check_sheet_item = data_get($current_third_self_check_sheet_items, $third_self_check_sheet_item_index);
                    if ($third_self_check_sheet_item) {
                        if (data_get($third_self_check_sheet_item_array, 'delete')) {
                            if (!$third_self_check_sheet_item->delete()) {
                                throw new Exception();
                            }
                            continue;
                        }
                    } else {
                        if (data_get($third_self_check_sheet_item_array, 'delete')) {
                            continue;
                        }
                        $third_self_check_sheet_item = new SelfCheckSheetItem();
                        $third_self_check_sheet_item->self_check_sheet_id = $self_check_sheet->id;
                        $third_self_check_sheet_item->parent_self_check_sheet_item_id = $second_self_check_sheet_item->id;
                        $third_self_check_sheet_item->hierarchy = SelfCheckSheetItem::HIERARCHY_THIRD;
                    }
                    $third_self_check_sheet_item->title = data_get($third_self_check_sheet_item_array, 'title');
                    $third_self_check_sheet_item->movie_title = data_get($third_self_check_sheet_item_array, 'movie_title');
                    $third_self_check_sheet_item->movie_url = data_get($third_self_check_sheet_item_array, 'movie_url');
                    if (!$third_self_check_sheet_item->save()) {
                        throw new Exception();
                    }
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    private function syncTargets(
        SelfCheckSheet $self_check_sheet,
        array $self_check_sheet_targets
    )
    {
        $current_self_check_sheet_targets = $self_check_sheet->self_check_sheet_targets;
        for (
            $target_index = 0;
            $target_index < max($current_self_check_sheet_targets->count(), count($self_check_sheet_targets));
            $target_index++
        ) {
            $current_self_check_sheet_target = data_get($current_self_check_sheet_targets, $target_index);
            $new_self_check_sheet_target = data_get($self_check_sheet_targets, $target_index);
            if ($current_self_check_sheet_target) {
                // 既存レコードがある場合
                if ($new_self_check_sheet_target) {
                    // レコードの更新
                    $current_self_check_sheet_target->user_id = (int)$new_self_check_sheet_target;
                    if (!$current_self_check_sheet_target->save()) {
                        throw new Exception();
                    }
                } else {
                    // レコードの削除
                    if (!$current_self_check_sheet_target->delete()) {
                        throw new Exception();
                    }
                }
            } else {
                // 既存レコードがない場合
                if ($new_self_check_sheet_target) {
                    // レコードの作成
                    $self_check_sheet_target = new SelfCheckSheetTarget();
                    $self_check_sheet_target->self_check_sheet_id = $self_check_sheet->id;
                    $self_check_sheet_target->user_id = (int)$new_self_check_sheet_target;
                    if (!$self_check_sheet_target->save()) {
                        throw new Exception();
                    }
                }
            }
        }
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
