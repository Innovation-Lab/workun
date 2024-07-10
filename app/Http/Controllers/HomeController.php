<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display index page view.
     */
    public function index()
    {
        return view('home.index');
    }
}
