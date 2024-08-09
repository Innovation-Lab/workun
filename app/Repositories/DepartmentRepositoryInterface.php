<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface DepartmentRepositoryInterface
{
    public function update(Request $request);
}
