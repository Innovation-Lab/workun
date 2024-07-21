<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;
use App\Models\SelfCheckSheetItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SelfCheckController extends BaseController
{
    protected string $directory = "master/self-check";
    protected string $model_name = "selfCheckSheet";

    public function _loadSecond(Request $request)
    {
        return view('master.self-check._second', [
            'first_index' => $request->get('first_index'),
            'second_index' => $request->get('second_index'),
            'second_self_check_sheet_item' => [
                'title' => "",
                'third_self_check_sheet_items' => [
                    'title' => "",
                ]
            ]
        ]);
    }

    public function _loadThird(Request $request)
    {
        return view('master.self-check._third', [
            'first_index' => $request->get('first_index'),
            'second_index' => $request->get('second_index'),
            'third_index' => $request->get('third_index'),
            'third_self_check_sheet_item' => [
                'title' => "",
            ]
        ]);
    }
}
