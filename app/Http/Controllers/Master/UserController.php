<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected string $directory = "master/member";
    protected string $model_name = "user";

    public function _lodeUsers(Request $request)
    {
        return view('master.member._users', [
            'users' => $this->repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->get(),
        ]);
    }
}
