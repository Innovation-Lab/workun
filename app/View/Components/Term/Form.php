<?php

namespace App\View\Components\Term;

use App\Models\Period;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Period $period,
        public array $month_list = []
    )
    {
        foreach (range(2000, date('Y', strtotime('+10 years'))) as $year) {
            foreach (range(1, 12) as $month) {
                $_month = sprintf('%02d', $month);
                $this->month_list["{$year}-{$_month}"] = "{$year}年{$_month}月";
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.term.form');
    }
}
