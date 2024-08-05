<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

// TODO: AssessmentPointControllerをBaseControllerにする
class AssessmentPointController extends Controller
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
        return view('master.assessment-point.index');
    }
}
