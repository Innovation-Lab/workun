<?php

namespace App\View\Components\SelfCheckSheet;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnswerStatus extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $status
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.answer-status');
    }
}
