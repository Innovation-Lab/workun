<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserDepartmentRequest;
use App\Repositories\UserDepartmentRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Models\Department;
use App\Models\Position;
use App\Models\UserDepartment;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserDepartmentController extends Controller
{
    protected Authenticatable $auth_user;

    public function __construct(
        public UserDepartmentRepositoryInterface $user_department_repository,
        public UserRepositoryInterface $user_repository
    )
    {
        $this->user_department_repository = $user_department_repository;
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
        // 既に部署に登録されているユーザーを取得
        $existingUserIds = UserDepartment::where('department_id', $department->id)
            ->pluck('user_id')
            ->toArray();

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
                ->whereNotIn('id', $existingUserIds) // 既に登録されているユーザーを除外
                ->paginate(),
        ]);
    }

    /**
     * 更新処理
     * @param Department $department
     * @param UserDepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(Department $department, UserDepartmentRequest $request): RedirectResponse
    {
        # 更新処理
        DB::beginTransaction();
        try {
            $this->user_department_repository->create($request);
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
            ->with('success', '従業員を登録しました。');
    }

    /**
     * 編集ページ
     * @param Department $department
     * @param Request $request
     * @return View
     */
    public function edit(Department $department, Request $request): View
    {
        // 既に部署に登録されているユーザーを取得
        $existingUserIds = UserDepartment::where('department_id', $department->id)
            ->pluck('user_id')
            ->toArray();

        return view("master.organization.user-department.edit", [
            'department' => $department,
            'request' => $request,
            'users' => $this->user_repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->whereIn('id', $existingUserIds) // 既に登録されているユーザーを表示
                ->paginate(),
        ]);
    }

    /**
     * 削除処理
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Department $department, UserDepartmentRequest $request): RedirectResponse
    {
        # 削除処理
        DB::beginTransaction();
        try {
            $this->user_department_repository->delete($request);
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
            ->with('success', '従業員を削除しました。');
    }
}
