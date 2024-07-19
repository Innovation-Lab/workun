<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display index page view.
     */
    public function index()
    {
        if (Auth::check()) {
            return  redirect()->to(route('home.index'));
        }
        return redirect(config('url.retech_portal') . "/login/workun");
    }
}
