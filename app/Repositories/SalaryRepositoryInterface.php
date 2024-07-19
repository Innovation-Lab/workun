<?php

namespace App\Repositories;

use App\Models\Salary;
use Illuminate\Http\Request;

interface SalaryRepositoryInterface
{
    public function create(Request $request);
    public function update(Salary $salary, Request $request);
    public function delete(Salary $salary);
}
