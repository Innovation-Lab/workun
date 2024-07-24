<?php

namespace App\View\Components\Users;

use Closure;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formSelectedApprover extends Component
{
    public $user;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $id
    )
    {
        $this->user = User::where('id', $id)
            ->with('approvers')
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.users.form-selected-approver');
    }
}
