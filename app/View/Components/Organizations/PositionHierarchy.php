<?php

namespace App\View\Components\Organizations;

use App\Models\Employment;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Salary;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PositionHierarchy extends Component
{
    public $employments;
    public $grades;
    public $positions;
    public $salaries;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->employments = Employment::all();
        $this->grades = Grade::all();
        $this->positions = Position::all();
        $this->salaries = Salary::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organizations.position-hierarchy', [
            'employments' => $this->employments,
            'employment_counts' => $this->getEmploymentCounts(),
            'grades' => $this->grades,
            'grade_counts' => $this->getGradeCounts(),
            'positions' => $this->positions,
            'position_counts' => $this->getPositionCounts(),
            'salaries' => $this->salaries,
        ]);
    }

    // 雇用形態の人数
    private function getEmploymentCounts()
    {
        return User::select('employment_id', \DB::raw('count(*) as total'))
            ->groupBy('employment_id')
            ->pluck('total', 'employment_id');
    }

    // 等級の人数
    private function getGradeCounts()
    {
        return User::select('grade_id', \DB::raw('count(*) as total'))
            ->groupBy('grade_id')
            ->pluck('total', 'grade_id');
    }

    // 役職の人数
    private function getPositionCounts()
    {
        return User::select('position_id', \DB::raw('count(*) as total'))
            ->groupBy('position_id')
            ->pluck('total', 'position_id');
    }
}
