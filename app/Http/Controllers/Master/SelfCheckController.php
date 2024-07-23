<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\BaseController;
use App\Models\SelfCheckSheet;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SelfCheckController extends BaseController
{
    protected string $directory = "master/self-check";
    protected string $model_name = "selfCheckSheet";

    public function __construct(
        public UserRepositoryInterface $user_repository
    )
    {
        parent::__construct();
    }

    /**
     * 編集ページ
     * @return View
     */
    public function add(): View
    {
        $selfCheckSheet = new SelfCheckSheet();
        $selfCheckSheet->hierarchy = request()->get('hierarchy', SelfCheckSheet::HIERARCHY_TRIPLE);
        return view("{$this->directory}.add", [
            'selfCheckSheet' => $selfCheckSheet,
        ]);
    }

    /**
     * 複製
     * @return RedirectResponse
     */
    public function copy(SelfCheckSheet $selfCheckSheet): RedirectResponse
    {
        $attributes = [
            'hierarchy' => $selfCheckSheet->hierarchy,
            'title' => $selfCheckSheet->title,
            'period_id' => $selfCheckSheet->period_id,
            'method' => $selfCheckSheet->method,
            'check_days' => $selfCheckSheet->check_days,
            'rating_days' => $selfCheckSheet->rating_days,
            'approval_days' => $selfCheckSheet->approval_days,
            'self_check_sheet_items' => [],
            'self_check_sheet_targets' => [],
        ];
        foreach ($selfCheckSheet->first_self_check_sheet_items as $first_self_check_sheet_item) {
            $first_self_check_sheet_items = [
                'title' => $first_self_check_sheet_item->title,
                'self_check_sheet_items' => [],
            ];
            foreach ($first_self_check_sheet_item->second_self_check_sheet_items as $second_self_check_sheet_item) {
                $second_self_check_sheet_items = [
                    'title' => $second_self_check_sheet_item->title,
                    'third_check_sheet_items' => [],
                ];
                foreach ($second_self_check_sheet_item->third_self_check_sheet_items as $third_self_check_sheet_item) {
                    $third_self_check_sheet_items = [
                        'title' => $third_self_check_sheet_item->title,
                        'movie_title' => $third_self_check_sheet_item->movie_title,
                        'movie_url' => $third_self_check_sheet_item->movie_url,
                    ];
                    $second_self_check_sheet_items['self_check_sheet_items'][] = $third_self_check_sheet_items;
                }
                $first_self_check_sheet_items['self_check_sheet_items'][] = $second_self_check_sheet_items;
            }
            $attributes['self_check_sheet_items'][] = $first_self_check_sheet_items;
        }
        foreach ($selfCheckSheet->self_check_sheet_targets as $self_check_sheet_target) {
            $attributes['self_check_sheet_targets'][] = [
                'user_id' => $self_check_sheet_target->user_id
            ];
        }
        return redirect()
            ->to(route('master.self-check.add', ['hierarchy' => $selfCheckSheet->hierarchy]))
            ->withInput($attributes);
    }

    public function _loadFirst(Request $request)
    {
        return view('master.self-check._first', [
            'hierarchy' => $request->get('hierarchy'),
            'first_index' => $request->get('first_index'),
            'first_self_check_sheet_item' => [
                'second_self_check_sheet_items' => [
                    [
                        'third_self_check_sheet_items' => [
                            []
                        ]
                    ]
                ]
            ]
        ]);
    }

    public function _loadSecond(Request $request)
    {
        return view('master.self-check._second', [
            'hierarchy' => $request->get('hierarchy'),
            'first_index' => $request->get('first_index'),
            'second_index' => $request->get('second_index'),
            'second_self_check_sheet_item' => [
                'third_self_check_sheet_items' => [
                    []
                ]
            ]
        ]);
    }

    public function _loadThird(Request $request)
    {
        return view('master.self-check._third', [
            'hierarchy' => $request->get('hierarchy'),
            'first_index' => $request->get('first_index'),
            'second_index' => $request->get('second_index'),
            'third_index' => $request->get('third_index'),
            'third_self_check_sheet_item' => []
        ]);
    }

    public function _loadUsers(Request $request)
    {
        return view('master.self-check.modal._users', [
            'users' => $this
                ->user_repository
                ->search($request)
                ->organization($this->auth_user->organization_id)
                ->get(),
        ]);
    }
}
