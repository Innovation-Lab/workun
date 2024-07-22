<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\Department;
use App\Models\Position;
use App\Models\SelfCheckSheet;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormEdit extends Component
{
    public array $hierarchy_list;
    public $period_list;
    public array $method_list;
    public array $day_list;
    public $users;
    public $departments;
    public $positions;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public SelfCheckSheet $selfCheckSheet
    )
    {
        $user = Auth::user();
        $organization = $user->organization;

        // シート階層
        $this->hierarchy_list = SelfCheckSheet::HIERARCHY_LIST;

        // 評価期間
        $this->period_list = $user
            ->organization
            ->periods
            ->pluck('name', 'id');

        //  評価方法
        $this->method_list = SelfCheckSheet::METHOD_LIST;

        // 入力期限
        foreach (range(1, 10) as $day) {
            $this->day_list[$day] = "{$day}日間";
        }

        // 従業員
        $this->users = $organization->valid_users;

        // 部署
        $this->departments = $organization->departments()->pluck('name', 'id');

        // 役職
        $this->positions = $organization->positions()->pluck('name', 'id');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.form-edit');
    }
}
