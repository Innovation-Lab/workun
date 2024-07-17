<?php

namespace App\Repositories;

use App\Models\Organization;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function search(Request $request);
    public function sync(Organization $organization, $user, Request $request);
}
