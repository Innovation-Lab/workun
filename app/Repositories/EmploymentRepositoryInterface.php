<?php

namespace App\Repositories;

use App\Models\Employment;
use Illuminate\Http\Request;

interface EmploymentRepositoryInterface
{
    public function create(Request $request);
    public function update(Employment $employment, Request $request);
    public function delete(Employment $employment);
}
