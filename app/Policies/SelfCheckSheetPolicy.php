<?php

namespace App\Policies;

use App\Models\SelfCheckSheet;
use App\Models\User;

class SelfCheckSheetPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SelfCheckSheet $self_check_sheet): bool
    {
        return $user->organization_id === $self_check_sheet->organization_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $this->viewAny();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SelfCheckSheet $self_check_sheet): bool
    {
        return $this->view($user, $self_check_sheet) &&
            $self_check_sheet->self_check_ratings()->count() === 0 &&
            $self_check_sheet->self_check_sheet_targets()->count() === 0;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SelfCheckSheet $self_check_sheet): bool
    {
        return $this->update($user, $self_check_sheet);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SelfCheckSheet $self_check_sheet): bool
    {
        return $this->update($user, $self_check_sheet);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SelfCheckSheet $self_check_sheet): bool
    {
        return $this->update($user, $self_check_sheet);
    }
}
