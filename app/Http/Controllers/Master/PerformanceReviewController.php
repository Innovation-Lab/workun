<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class PerformanceReviewController extends Controller
{
    private ?Authenticatable $auth_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    public function index(): View
    {
        return view('master.performance-review.index');
    }

    public function check(): View
    {
        return view('master.performance-review.check');
    }

    public function add(): View
    {
        return view('master.performance-review.add');
    }

    public function edit(): View
    {
        return view('master.performance-review.edit');
    }

    public function copy(): View
    {
        return view('master.performance-review.add');
    }
}
