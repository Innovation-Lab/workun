<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param Request $request
     * @return Builder $query
     */
    public function search(Request $request): Builder
    {
        $query = User::query();

        if ($request->get('login_code')) {
            $query->where('users.login_code', $request->get('login_code'));
        }

        return $query;
    }

    /**
     * @param Organization $organization
     * @param $user
     * @param Request $request
     * @return Builder $query
     * @throws Exception
     */
    public function sync(
        Organization $organization,
        $user,
        Request $request
    )
    {
        if (!$user) {
            $user = new User($request->only([
                'login_code',
                'keycode',
            ]));
            $user->organization_id = $organization->id;
        }
        $user->fill($request->get('data'));
        $user->status = $request->get('active') == 1 ? User::STATUS_ACTIVATED : User::STATUS_FREEZED;
        if (!$user->save()) {
            throw new Exception();
        }
        return $user;
    }
}
