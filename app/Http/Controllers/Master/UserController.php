<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected string $directory = "master/member";
    protected string $model_name = "user";
}
