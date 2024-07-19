<?php

namespace App\Repositories;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function search(Request $request);
    public function update(User $user, Request $request);
    public function sync(Organization $organization, $user, Request $request);
}
