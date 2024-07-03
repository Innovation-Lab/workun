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
        return 'self-check';
    }

    /**
     * Display answer page view.
     */
    public function answer()
    {
        return 'self-check-answer';
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
        return 'self-check-rating';
    }

    /**
     * Display approval page view.
     */
    public function approval()
    {
        return 'self-check-approval';
    }

    /**
     * Display result page view.
     */
    public function result()
    {
        return 'self-check-result';
    }
}
