<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheetItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerTableApprovals extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheetItem $selfCheckSheetItem,
        public $selfCheckRatings
    )
    {
        $this->selfCheckRatings = $this->selfCheckRatings
            ->map(function ($self_check_rating) {
                $self_check_rating->details = $self_check_rating
                    ->self_check_rating_details
                    ->mapWithKeys(function ($self_check_rating_detail) {
                        return [$self_check_rating_detail->self_check_sheet_item_id => $self_check_rating_detail];
                    });
                return $self_check_rating;
            });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.answer-table-approvals');
    }
}
