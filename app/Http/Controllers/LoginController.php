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
        $user = User::find(1);
        Auth::login($user);
        return redirect()->back();
        //return redirect(config('url.retech_portal'));
    }
}
