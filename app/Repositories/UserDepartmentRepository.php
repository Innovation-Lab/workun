<?php

namespace App\Repositories;

use Exception;
use App\Models\Department;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDepartmentRepository implements UserDepartmentRepositoryInterface
{
    /**
     * @param Department $department
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function create(Department $department, Request $request): array
    {
        dd($request->get('user_id'));
        $user_ids = $request->get('user_id');
        $user_departments = [];
        foreach ($user_ids as $user_id) {
            $attributes = $this->makeAttributes($request);
            $attributes['department_id'] = $department->id;
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
     * @param Department $department
     * @param Request $request
     * @return void
     * @throws Exception
     */
    public function delete(Department $department, Request $request): void
    {
        $user_ids = $request->get('user_id');
        foreach ($user_ids as $user_id) {
            $user_department = UserDepartment::where([
                'user_id' => $user_id,
                'department_id' => $department->id
            ])
            ->first();

            if ($user_department) {
                if (!$user_department->delete()) {
                    throw new Exception();
                }
            }
        }
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
