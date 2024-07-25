<?php

namespace App\View\Components\Organizations;

use App\Models\Employment;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Salary;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $this->employments = Employment::query()
            ->organization($user->organization_id)
            ->orderBy('seq', 'asc')
            ->get();

        $this->grades = Grade::query()
            ->organization($user->organization_id)
            ->orderBy('seq', 'asc')
            ->get();

        $this->positions = Position::query()
            ->organization($user->organization_id)
            ->orderBy('seq', 'asc')
            ->get();

        $this->salaries = Salary::query()
            ->organization($user->organization_id)
            ->orderBy('seq', 'asc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.organizations.position-hierarchy');
    }
}
