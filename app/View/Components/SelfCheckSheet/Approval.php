<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Approval extends Component
{
    public $user;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheet $selfCheckSheet,
        public $selfCheckRating
    )
    {
        $this->user = $selfCheckRating->user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.approval');
    }
}
