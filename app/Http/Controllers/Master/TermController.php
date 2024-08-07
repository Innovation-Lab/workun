<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;

class TermController extends BaseController
{
    protected string $directory = "master/term";
    protected string $model_name = "period";
    protected string $entity_name = "評価期間";
}
