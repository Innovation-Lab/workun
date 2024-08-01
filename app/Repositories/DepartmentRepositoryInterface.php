<?php

namespace App\Repositories;

use App\Models\Department;
use App\Models\Grade;
use Illuminate\Http\Request;

interface DepartmentRepositoryInterface
{
    public function update(Request $request);
}
