<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheetItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerTableAnswer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $months,
        public string $term,
        public  SelfCheckSheetItem $selfCheckSheetItem,
        public $selfCheckRating,
        public $selfCheckRatingHistories
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.answer-table-answer');
    }
}
