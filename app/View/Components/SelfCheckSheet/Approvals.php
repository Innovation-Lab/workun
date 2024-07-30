<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\SelfCheckSheet;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Approvals extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheet $selfCheckSheet,
        public Collection $selfCheckRatings,
        public string $term
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.approvals');
    }
}
