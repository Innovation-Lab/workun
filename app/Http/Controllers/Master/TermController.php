<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('master.term.index');
    }

    public function add()
    {
        return view('master.term.add');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('master.term.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }
}
