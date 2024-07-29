<?php

namespace App\Http\Controllers\Master\Organization;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class SalaryController extends BaseController
{
    protected string $directory = "master/organization/salary";
    protected string $redirect_after_add = "master/organization.index";
    protected string $redirect_after_edit = "master/organization.index";
    protected string $redirect_after_delete = "master/organization.index";
    protected string $model_name = "salary";
}