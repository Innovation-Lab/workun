<?php

namespace App\Repositories;

use App\Models\Grade;
use Illuminate\Http\Request;

interface GradeRepositoryInterface
{
    public function create(Request $request);
    public function update(Grade $grade, Request $request);
    public function delete(Grade $grade);
}
