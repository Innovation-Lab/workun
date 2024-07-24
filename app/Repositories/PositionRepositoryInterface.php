<?php

namespace App\Repositories;

use App\Models\Position;
use Illuminate\Http\Request;

interface PositionRepositoryInterface
{
    public function create(Request $request);
    public function update(Position $position, Request $request);
    public function delete(Position $position);
}
