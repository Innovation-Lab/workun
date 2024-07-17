<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelfCheckController extends Controller
{
    /**
     * Display index page view.
     */
    public function index()
    {
        return view('self-check.index');
    }
    /**
     * Display all sheets page view.
     */
    public function all()
    {
        return view('self-check.all');
    }

    /**
     * Display answer page view.
     */
    public function answer()
    {
        return view('self-check.answer');
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Display rating page view.
     */
    public function rating()
    {
        return view('self-check.rating');
    }

    /**
     * Display approval page view.
     */
    public function approval()
    {
        return view('self-check.approval');
    }

    /**
     * Display result page view.
     */
    public function result()
    {
        return view('self-check.result');
    }
}
