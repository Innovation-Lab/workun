<?php

namespace App\View\Components\Users;

use App\Models\Department;
use App\Models\Employment;
use App\Models\Grade;
use App\Models\Position;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormEdit extends Component
{
    public $departments;
    public $positions;
    public $grades;
    public $employments;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $user
    ) {
        $this->departments = Department::all();
        $this->employments = Employment::all();
        $this->grades = Grade::all();
        $this->positions = Position::all();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.form-edit', [
            'departments' => $this->departments,
            'employments' => $this->employments,
            'grades' => $this->grades,
            'positions' => $this->positions,
            'roles' => User::ROLE_LIST,
        ]);
    }
}
