<?php

namespace App\View\Components\SelfCheckSheet;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSelectedUser extends Component
{
    public $user;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $id
    )
    {
        $user = Auth::user();
        $this->user = User::query()
            ->organization($user->organization_id)
            ->where('id', $id)
            ->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.self-check-sheet.form-selected-user');
    }
}
