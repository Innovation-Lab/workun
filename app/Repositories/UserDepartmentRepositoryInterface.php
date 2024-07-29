<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserDepartmentRepositoryInterface
{
    public function create(Request $request);
    public function update(Request $request);
    public function delete();
}
