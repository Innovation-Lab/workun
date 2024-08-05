<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

// todo: テーブルがある場合は、OrganizationAssessmentControllerRepositoryとBaseControllerを使う
class OrganizationAssessmentController extends Controller
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
        return view('master.organization-assessment.index');
    }

    public function check(): View
    {
        return view('master.organization-assessment.check');
    }

    public function add(): View
    {
        return view('master.organization-assessment.add');
    }

    public function edit(): View
    {
        return view('master.organization-assessment.edit');
    }

    public function copy(): View
    {
        return view('master.organization-assessment.add');
    }
}
