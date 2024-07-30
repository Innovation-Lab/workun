<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheet;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Answer extends Component
{
    public $selfCheckRating;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheet $selfCheckSheet,
        public string $term,
        public $user
    )
    {
        $this->selfCheckRating = $selfCheckSheet->self_check_rating($user, $term);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.answer');
    }
}
