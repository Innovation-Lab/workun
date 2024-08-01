<?php

namespace App\Repositories;

use App\Models\Department;
use Illuminate\Http\Request;

interface UserDepartmentRepositoryInterface
{
    public function create(Department $department, Request $request);
    public function update(Request $request);
    public function delete(Department $department, Request $request);
}
