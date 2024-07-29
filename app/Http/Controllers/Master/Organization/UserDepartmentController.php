<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserDepartmentController extends Controller
{
    protected Authenticatable $auth_user;

    public function __construct(
        public UserRepositoryInterface $user_repository

    )
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    /**
     * 追加ページ
     * @param Department $department
     * @param Request $request
     * @return View
     */
    public function add(Department $department, Request $request): View
    {
        return view("master.organization.user-department.add", [
            'department' => $department,
            'request' => $request,
            'positions' => Position::query()
                ->organization($this->auth_user->organization_id)
                ->orderBy('seq', 'asc')
                ->get(),
            'users' => $this->user_repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->paginate(),
        ]);
    }
}
