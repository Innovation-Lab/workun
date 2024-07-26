<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
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
    public function view(User $auth_user, User $user): bool
    {
        return $user->organization_id === $auth_user->organization_id;
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
    public function update(User $auth_user, User $user): bool
    {
        return $this->view($auth_user, $user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $auth_user, User $user): bool
    {
        return $this->update($auth_user, $user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $auth_user, User $user): bool
    {
        return $this->update($auth_user, $user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $auth_user, User $user): bool
    {
        return $this->update($auth_user, $user);
    }
}
