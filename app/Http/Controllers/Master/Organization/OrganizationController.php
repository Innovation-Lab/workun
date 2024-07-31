<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\BaseController;
use App\Models\Department;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class OrganizationController extends BaseController
{
    protected string $directory = "master/organization";
    protected string $model_name = "organization";

    public function __construct(
        public UserRepositoryInterface $user_repository
    )
    {
        parent::__construct();
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
}
