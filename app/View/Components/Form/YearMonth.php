<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class YearMonth extends Component
{
    public array $month_list;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $key,
        public $value,
        public string $id = "",
        public string $class = ""
    )
    {
        foreach (range(date('Y', strtotime('+10 years')), 2000) as $year) {
            foreach (range(12, 1) as $month) {
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
        return view('components.form.year-month');
    }
}
