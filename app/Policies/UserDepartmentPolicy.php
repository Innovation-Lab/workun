<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserDepartment;

class UserDepartmentPolicy
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
    public function view(User $user, UserDepartment $user_department): bool
    {
        
        return $user->organization_id === $user_department->department->organization_id;
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
    public function update(User $user, UserDepartment $user_department): bool
    {
        return $this->view($user, $user_department);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserDepartment $user_department): bool
    {
        return $this->view($user, $user_department) &&
            $user_department->users()->count() === 0;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserDepartment $user_department): bool
    {
        return $this->delete($user, $user_department);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserDepartment $user_department): bool
    {
        return $this->delete($user, $user_department);
    }
}
