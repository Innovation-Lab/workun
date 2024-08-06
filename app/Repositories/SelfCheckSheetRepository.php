<?php

namespace App\Repositories;

use App\Models\SelfCheckRatingDetail;
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
        $query = SelfCheckSheet::query()
            ->keyword($request->get('keyword'))
            ->orderBy('self_check_sheets.id', 'desc');

        if ($request->get('period_id')) {
            $query->where('self_check_sheets.period_id', $request->get('period_id'));
        };

        return $query;
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
     * @param bool $pagenate
     * @return mixed
     */
    public function answerSelfCheckSheets($user, string $term, bool $pagenate = false): mixed
    {
        $query = $user
            ->answer_self_check_sheets
            ->onTerm($term);

        if ($pagenate) {
            $self_check_sheets = $query->paginate();
            $self_check_sheets
                ->getCollection()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    $self_check_sheet->rating = $self_check_sheet->self_check_rating($user, $term);
                    return $this->setAnswerAttributes($self_check_sheet, $user, $term);
                });
        } else {
            $self_check_sheets = $query
                ->get()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    $self_check_sheet->rating = $self_check_sheet->self_check_rating($user, $term);
                    return $this->setAnswerAttributes($self_check_sheet, $user, $term);
                });
        }

        return $self_check_sheets;
    }

    /**
     * @param User $user
     * @param string $term
     * @param bool $pagenate
     * @return mixed
     */
    public function ratingSelfCheckSheets($user, string $term, bool $pagenate = false): mixed
    {
        $query = $user
            ->rating_self_check_sheets
            ->onTerm($term);

        if ($pagenate) {
            $self_check_sheets = $query->paginate();
            $self_check_sheets
                ->getCollection()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    return $this->setRatingAttributes($self_check_sheet, $user, $term);
                });
        } else {
            $self_check_sheets = $query
                ->get()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    return $this->setRatingAttributes($self_check_sheet, $user, $term);
                });
        }

        return $self_check_sheets;
    }

    /**
     * @param User $user
     * @param string $term
     * @param bool $pagenate
     * @return mixed
     */
    public function approvingSelfCheckSheets($user, string $term, bool $pagenate = false): mixed
    {
        $query = $user
            ->approving_self_check_sheets
            ->onTerm($term);

        if ($pagenate) {
            $self_check_sheets = $query->paginate();
            $self_check_sheets
                ->getCollection()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    return $this->setApprovingAttributes($self_check_sheet, $user, $term);
                });
        } else {
            $self_check_sheets = $query
                ->get()
                ->transform(function ($self_check_sheet) use($user, $term) {
                    return $this->setApprovingAttributes($self_check_sheet, $user, $term);
                });
        }

        return $self_check_sheets;
    }

    public function setAnswerAttributes(
        SelfCheckSheet $self_check_sheet,
        $user,
        string $term
    ): SelfCheckSheet
    {
        $self_check_sheet->rating = $self_check_sheet->self_check_rating($user, $term);
        // 期間表示
        $start = date('Y-m-d', strtotime("{$term}-01"));
        $check_days = $self_check_sheet->check_days - 1;
        $self_check_sheet->display_term = date('Y/m/d', strtotime("{$start} + {$check_days} days"));
        $self_check_sheet->action_type = 'answer';
        $this->setTaskAttributes($self_check_sheet, $term);
        return $self_check_sheet;
    }

    public function setRatingAttributes(
        SelfCheckSheet $self_check_sheet,
        $user,
        string $term,
        bool $with_histories = false
    ): SelfCheckSheet
    {
        // 期間表示
        $check_days = $self_check_sheet->check_days - 1;
        $start = date('Y-m-d', strtotime("{$term}-01 + " .($check_days + 1). " days"));
        $rating_days = $self_check_sheet->rating_days - 1;
        $self_check_sheet->display_term = date('Y/m/d', strtotime("{$start} + {$rating_days} days"));
        $self_check_sheet->action_type = 'answers';
        $this->setTaskAttributes($self_check_sheet, $term);

        // 対象数
        $self_check_sheet->all_target_count = $self_check_sheet
            ->self_check_ratings()
            ->onTerm($term)
            ->where('self_check_ratings.reviewer_id', $user->id)
            ->count();

        // 評価済み数
        $self_check_sheet->rated_target_count = $self_check_sheet
            ->self_check_ratings()
            ->onTerm($term)
            ->where('self_check_ratings.reviewer_id', $user->id)
            ->whereIn('self_check_ratings.status', [
                SelfCheckRating::STATUS_APPROVING,
                SelfCheckRating::STATUS_APPROVED,
            ])
            ->count();

        return $self_check_sheet;
    }

    public function setApprovingAttributes(
        SelfCheckSheet $self_check_sheet,
        $user,
        string $term,
        bool $with_histories = false
    ): SelfCheckSheet
    {
        // 期間表示
        $check_days = $self_check_sheet->check_days - 1;
        $rating_days = $self_check_sheet->rating_days - 1;
        $start = date('Y-m-d', strtotime("{$term}-01 + " .($check_days + $rating_days + 2). " days"));
        $approval_days = $self_check_sheet->approval_days - 1;
        $self_check_sheet->display_term = date('Y/m/d', strtotime("{$start} + {$approval_days} days"));
        $self_check_sheet->action_type = 'approvals';
        $this->setTaskAttributes($self_check_sheet, $term);

        // 対象数
        $self_check_sheet->all_target_count = $self_check_sheet
            ->self_check_ratings()
            ->onTerm($term)
            ->where('self_check_ratings.approver_id', $user->id)
            ->count();

        // 承認済み数
        $self_check_sheet->approved_target_count = $self_check_sheet
            ->self_check_ratings()
            ->onTerm($term)
            ->where('self_check_ratings.approver_id', $user->id)
            ->whereIn('self_check_ratings.status', [
                SelfCheckRating::STATUS_APPROVED,
            ])
            ->count();

        return $self_check_sheet;
    }

    private function setTaskAttributes(
        SelfCheckSheet $self_check_sheet,
        string $term
    ): SelfCheckSheet
    {
        $start = data_get($this, 'period.start');
        $end = data_get($this, 'period.end');
        $self_check_sheet->display_task_title = data_get($self_check_sheet, 'period.name') . " | " . $self_check_sheet->title;
        $self_check_sheet->display_period_for_task = date('Y.m.d', strtotime("{$start}-01")) . " - " . date('Y.m.d', strtotime("{$end}-01"));
        $self_check_sheet->display_status = data_get(
            SelfCheckRating::STATUS_LIST,
            $self_check_sheet->rating->status ?? SelfCheckRating::STATUS_NOT_ANSWERED
        );

        $self_check_sheet->sub_title = date('Y年m月', strtotime($term));
        // クラスの初期値
        $list_class = "alert";
        $status_class = "waiting";
        // クラスの設定
        if ($self_check_sheet->rating) {
            $status = $self_check_sheet->rating->status;
            $status_class_map = [
                SelfCheckRating::STATUS_NOT_ANSWERED => ["alert", "waiting"],
                SelfCheckRating::STATUS_ANSWERING => ["alert", "waiting"],
                SelfCheckRating::STATUS_RATING => ["assessment", "assessment"],
                SelfCheckRating::STATUS_APPROVING => ["assessment", "assessment"],
                SelfCheckRating::STATUS_APPROVED => ["", "paused"],
            ];

            if (isset($status_class_map[$status])) {
                [$list_class, $status_class] = $status_class_map[$status];
            }
        }
        $self_check_sheet->list_class = $list_class;
        $self_check_sheet->status_class = $status_class;

        return $self_check_sheet;
    }

    /**
     * @throws Exception
     */
    public function answer(
        SelfCheckSheet $self_check_sheet,
        $user,
        string $term,
        Request $request
    ): void
    {
        # self_check_rating の更新
        $self_check_rating = $self_check_sheet
            ->self_check_ratings()
            ->where('self_check_ratings.user_id', $user->id)
            ->onTerm($term)
            ->first();
        if (!$self_check_rating) {
            $self_check_rating = new SelfCheckRating();
            $self_check_rating->status = SelfCheckRating::STATUS_ANSWERING;
            $self_check_rating->self_check_sheet_id = $self_check_sheet->id;
            $self_check_rating->target = $term;
            $self_check_rating->user_id = $user->id;
        }
        if ($request->get('draft')) {
            $self_check_rating->status = SelfCheckRating::STATUS_ANSWERING;
        } else {
            $self_check_rating->status = SelfCheckRating::STATUS_RATING;
            $self_check_rating->answered_at = date('Y-m-d H:i:s');
            if ($request->get('reviewer_id')) {
                // 評価者の設定
                $reviewer = $user->organization
                    ->users()
                    ->find($request->get('reviewer_id'));
                $self_check_rating->reviewer_id = $reviewer ? $reviewer->id : null;
            }
        }
        if (!$self_check_rating->save()) {
            throw new Exception();
        }

        # self_check_rating_details の更新
        foreach ($request->get('self_check_sheet_item', []) as $self_check_sheet_item_id => $self_check_sheet_item_answer) {
            // $self_check_sheet_item のバリデーション
            $self_check_sheet_item = $self_check_sheet
                ->self_check_sheet_items
                ->find($self_check_sheet_item_id);
            if (!$self_check_sheet_item) {
                throw new Exception();
            }
            $self_check_rating_detail = $self_check_rating
                ->self_check_rating_details()
                ->where('self_check_rating_details.self_check_sheet_item_id', $self_check_sheet_item_id)
                ->first();
            if (!$self_check_rating_detail) {
                $self_check_rating_detail = new SelfCheckRatingDetail();
                $self_check_rating_detail->self_check_rating_id = $self_check_rating->id;
                $self_check_rating_detail->self_check_sheet_item_id = $self_check_sheet_item->id;
            }
            $self_check_rating_detail->answer = $self_check_sheet_item_answer;
            if (!$self_check_rating_detail->save()) {
                throw new Exception();
            }
        }
    }

    /**
     * @throws Exception
     */
    public function rating(
        SelfCheckRating $self_check_rating,
        $user,
        Request $request
    ): void
    {
        $self_check_sheet = $self_check_rating->self_check_sheet;

        # self_check_rating の更新
        if ($request->get('draft')) {
            $self_check_rating->status = SelfCheckRating::STATUS_RATING;
        } elseif ($request->get('remand')) {
            $self_check_rating->status = SelfCheckRating::STATUS_ANSWERING;
            $self_check_rating->remand_flag = 1;
            $self_check_rating->remand_reason = $request->get('remand_reason');
        } else {
            $self_check_rating->status = SelfCheckRating::STATUS_APPROVING;
            $self_check_rating->remand_flag = null;
            $self_check_rating->reviewed_at = date('Y-m-d H:i:s');
            if ($request->get('approver_id')) {
                // 評価者の設定
                $approver = $user->organization
                    ->users()
                    ->find($request->get('approver_id'));
                $self_check_rating->approver_id = $approver ? $approver->id : null;
            }
        }
        if (!$self_check_rating->save()) {
            throw new Exception();
        }

        # self_check_rating_details の更新
        foreach ($request->get('self_check_sheet_item', []) as $self_check_sheet_item_id => $self_check_sheet_item_inputs) {
            // $self_check_sheet_item のバリデーション
            $self_check_sheet_item = $self_check_sheet
                ->self_check_sheet_items
                ->find($self_check_sheet_item_id);
            if (!$self_check_sheet_item) {
                throw new Exception();
            }
            $self_check_rating_detail = $self_check_rating
                ->self_check_rating_details()
                ->where('self_check_rating_details.self_check_sheet_item_id', $self_check_sheet_item_id)
                ->first();
            if (!$self_check_rating_detail) {
                $self_check_rating_detail = new SelfCheckRatingDetail();
                $self_check_rating_detail->self_check_rating_id = $self_check_rating->id;
                $self_check_rating_detail->self_check_sheet_item_id = $self_check_sheet_item->id;
            }
            $self_check_rating_detail->rating = data_get($self_check_sheet_item_inputs, 'rating');
            $self_check_rating_detail->comment = data_get($self_check_sheet_item_inputs, 'comment');
            if (!$self_check_rating_detail->save()) {
                throw new Exception();
            }
        }
    }

    /**
     * @throws Exception
     */
    public function approval(
        SelfCheckRating $self_check_rating,
        $user,
        Request $request
    ): void
    {
        # self_check_rating の更新
        if ($request->get('remand')) {
            $self_check_rating->status = SelfCheckRating::STATUS_RATING;
            $self_check_rating->rating_remand_flag = 1;
            $self_check_rating->rating_remand_reason = $request->get('remand_reason');
        } else {
            $self_check_rating->status = SelfCheckRating::STATUS_APPROVED;
            $self_check_rating->rating_remand_flag = null;
            $self_check_rating->approved_at = date('Y-m-d H:i:s');
        }
        if (!$self_check_rating->save()) {
            throw new Exception();
        }
    }
}
