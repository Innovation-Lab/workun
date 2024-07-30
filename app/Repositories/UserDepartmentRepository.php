<?php

namespace App\Repositories;

use Exception;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDepartmentRepository implements UserDepartmentRepositoryInterface
{
    /**
     * @param Request $request
     * @return UserDepartment
     * @throws Exception
     */
    public function create(Request $request)
    {
        $user_ids = $request->get('user_id');
        $user_departments = [];
        foreach ($user_ids as $user_id) {
            $attributes = $this->makeAttributes($request);
            $attributes['user_id'] = $user_id;
            $user_department = new UserDepartment($attributes);

            if (!$user_department->save()) {
                throw new Exception();
            }

            $user_departments[] = $user_department;
        }

        return $user_departments;
    }

    /**
     * @param Request $request
     * @return UserDepartment
     * @throws Exception
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * @param UserDepartment $period
     * @return void
     * @throws Exception
     */
    public function delete(): void
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     */
    private function makeAttributes (Request $request): array
    {
        return $request->all();
    }
}
