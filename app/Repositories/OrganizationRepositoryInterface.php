<?php

namespace App\Repositories;

use App\Models\Organization;
use Illuminate\Http\Request;

interface OrganizationRepositoryInterface
{
    public function find(Request $request);
    public function search(Request $request);
    public function create(Request $request);
    public function update(Organization $organization, Request $request);
}
