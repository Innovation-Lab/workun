<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'master-organization-employment-create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return 'master-organization-employment-edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }
}
