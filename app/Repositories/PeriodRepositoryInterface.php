<?php

namespace App\Repositories;

use App\Models\Period;
use Illuminate\Http\Request;

interface PeriodRepositoryInterface
{
    public function search(Request $request);
    public function create(Request $request);
    public function update(Period $period, Request $request);
    public function delete(Period $period);
}
