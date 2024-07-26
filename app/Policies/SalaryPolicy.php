<?php

namespace App\Policies;

use App\Models\Salary;
use App\Models\User;

class SalaryPolicy
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
    public function view(User $user, Salary $salary): bool
    {
        return $user->organization_id === $salary->organization_id;
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
    public function update(User $user, Salary $salary): bool
    {
        return $this->view($user, $salary);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Salary $salary): bool
    {
        return $this->view($user, $salary) &&
            $salary->users()->count() === 0;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Salary $salary): bool
    {
        return $this->delete($user, $salary);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Salary $salary): bool
    {
        return $this->delete($user, $salary);
    }
}
