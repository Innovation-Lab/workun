<?php

namespace App\View\Components\Users;

use App\Models\Department;
use App\Models\Position;
use App\Models\Grade;
use App\Models\Employment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $this->departments = Department::query()
            ->organization($user->organization_id)
            ->orderBy('department_id', 'asc')
            ->orderBy('seq', 'asc')
            ->get();

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
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.form-index', [
        ]);
    }
}
