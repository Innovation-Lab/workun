<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'master-organization';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return 'master-organization-edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }
}
