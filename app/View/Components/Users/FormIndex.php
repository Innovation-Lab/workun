<?php

namespace App\View\Components\Users;

use App\Models\Department;
use App\Models\Position;
use App\Models\Grade;
use App\Models\Employment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormIndex extends Component
{
    public $departments;
    public $positions;
    public $grades;
    public $employments;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->departments = Department::all();
        $this->positions = Position::all();
        $this->grades = Grade::all();
        $this->employments = Employment::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.form-index', [
            'departments' => $this->departments,
            'positions' => $this->positions,
            'grades' => $this->grades,
            'employments' => $this->employments,
        ]);
    }
}
