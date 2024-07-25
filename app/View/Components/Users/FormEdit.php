<?php

namespace App\View\Components\Users;

use App\Models\Approver;
use App\Models\Department;
use App\Models\Employment;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Reviewer;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormEdit extends Component
{
    public $approvers;
    public $departments;
    public $positions;
    public $grades;
    public $employments;
    public $reviewers;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $user
    ) {
        $this->approvers = $this->getApprovers($user->id);
        $this->reviewers = $this->getReviewers($user->id);

        $this->departments = Department::query()
            ->organization($user->organization_id)
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
        return view('components.users.form-edit', [
            'roles' => User::ROLE_LIST,
        ]);
    }

    private function getApprovers($user_id)
    {
        return Approver::where('user_id', $user_id)
            ->with('manager')
            ->get();
    }

    private function getReviewers($user_id)
    {
        return Reviewer::where('user_id', $user_id)
            ->with('manager')
            ->get();
    }
}
