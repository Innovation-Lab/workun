<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Repositories\DepartmentRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    protected Authenticatable $auth_user;

    public function __construct(
        public UserRepositoryInterface $user_repository,
        public DepartmentRepositoryInterface $department_repository,
    )
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    public function _lodeMembers(Request $request)
    {
        return view('master.organization._member', [
            'members' => $this
                ->user_repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->get(),
            'department' => Department::where('id', $request->get('department_id'))->first(),
        ]);
    }

    public function index()
    {
        return view('master.organization.index', [
            'organization' => $this->auth_user->organization
        ]);
    }

    public function edit()
    {
        return view('master.organization.edit', [
            'organization' => $this->auth_user->organization
        ]);
    }

    public function update(Request $request)
    {
        # 更新処理
        DB::beginTransaction();
        try {
            $request->merge(['organization_id' => $this->auth_user->organization_id]);
            $this->department_repository->update($request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        return redirect()
            ->route('master.organization.index')
            ->with('success', '更新しました。');
    }
}
