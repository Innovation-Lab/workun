<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerTable extends Component
{
    public $months;
    public $selfCheckRatingHistories;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type,
        public SelfCheckSheet $selfCheckSheet,
        public string $term,
        public $user,
        public $selfCheckRating
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // 回答月
        $this->months = $this
            ->selfCheckSheet
            ->period
            ->monthly_list;

        // 回答結果
        if ($this->selfCheckRating) {
            $this->selfCheckRating->details = $this
                ->selfCheckRating
                ->self_check_rating_details
                ->mapWithKeys(function ($self_check_rating_detail) {
                    return [$self_check_rating_detail->self_check_sheet_item_id => $self_check_rating_detail];
                });
        }
        $this->selfCheckRatingHistories = $this
            ->selfCheckSheet
            ->self_check_ratings()
            ->where('self_check_ratings.user_id', $this->user->id)
            ->get()
            ->mapWithKeys(function ($self_check_rating) {
                $self_check_rating->details = $self_check_rating
                    ->self_check_rating_details
                    ->mapWithKeys(function ($self_check_rating_detail) {
                        return [$self_check_rating_detail->self_check_sheet_item_id => $self_check_rating_detail];
                    });
                return [$self_check_rating->target => $self_check_rating];
            });

        return view('components.self-check-sheet.answer-table');
    }
}
