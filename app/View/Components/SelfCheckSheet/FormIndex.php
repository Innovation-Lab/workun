<?php

namespace App\View\Components\SelfCheckSheet;

use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormIndex extends Component
{
    public $period_list;
    public $condition;
    public $back_action;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $actionType
    )
    {
        $user = Auth::user();

        $this->period_list = $user
            ->organization
            ->periods
            ->pluck('name', 'id');

        $conditions = [];
        if (request('period_id')) {
            $conditions[] = data_get($this->period_list, request('period_id'));
        }
        if ($conditions) {
            $this->condition = implode('、', $conditions);
        }

        $this->back_action = route($actionType);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.form-index');
    }
}
