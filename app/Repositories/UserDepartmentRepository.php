<?php

namespace App\Repositories;

use App\Models\Salary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDepartmentRepository implements UserDepartmentRepositoryInterface
{
    /**
     * @param Request $request
     * @return Salary
     * @throws Exception
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * @param Salary $Salary
     * @param Request $request
     * @return Salary
     * @throws Exception
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * @param Salary $period
     * @return void
     * @throws Exception
     */
    public function delete(): void
    {
        //
    }
}
