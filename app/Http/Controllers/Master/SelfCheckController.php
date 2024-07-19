<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelfCheckController extends Controller
{
    /**
     * Display index page view.
     */
    public function index()
    {
        return view('master.self-check.index');

    }

    /**
     * Display create page view.
     */
    public function create()
    {
        return view('master.self-check.add');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display edit page view.
     */
    public function edit()
    {
        return view('master.self-check.edit');
    }

    /**
     * @param Request $request
     */
    public function Update(Request $request)
    {
        //
    }
}
