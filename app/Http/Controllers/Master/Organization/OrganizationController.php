<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\BaseController;
use App\Models\Department;
use App\Models\Organization;
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
        $organization_id = $request->get('organization_id');
        $department_id = $request->get('department_id');

        if ($organization_id) {
            $title = Organization::where('id', $organization_id)->pluck('name')->first();
        } else {
            $title = Department::where('id', $department_id)->pluck('name')->first();
        }

        return view('master.organization._member', [
            'members' => $this
                ->user_repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->get(),
            'title' => $title,
        ]);
    }
}
