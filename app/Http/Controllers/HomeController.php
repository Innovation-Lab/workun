<?php

namespace App\Http\Controllers;

use App\Models\SelfCheckRating;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private ?Authenticatable $auth_user;

    public function __construct()
    {
        $this->auth_user = Auth::user();
    }

    /**
     * Display index page view.
     */
    public function index()
    {
        $term = date('Y-m');
        // 評価入力

        // 評価承認
        return view('home.index', [
            // 実施対象
            'answer_self_check_sheets' => $this
                ->auth_user
                ->answer_self_check_sheets
                ->onTerm($term)
                ->get()
                ->map(function ($self_check_sheet) use($term) {
                    $start = date('Y-m-d', strtotime("{$term}-01"));
                    $days = $self_check_sheet->check_days - 1;
                    $self_check_sheet->display_term = date('Y.m.01', strtotime($start)) . " - " . date('Y.m.d', strtotime("{$start} + {$days} days"));
                    $self_check_sheet->display_title = "セルフチェック - " . date('Y年m月', strtotime("{$term}-01"));
                    $self_check_sheet->display_sub_title = data_get($self_check_sheet, 'period.name') . " | " . $self_check_sheet->title;

                    // ステータス
                    $self_check_rating = $self_check_sheet
                        ->self_check_ratings()
                        ->where('self_check_ratings.user_id', $this->auth_user->id)
                        ->onTerm($term)
                        ->first();
                    $self_check_rating_status = $self_check_rating ? $self_check_rating->status : SelfCheckRating::STATUS_NOT_ANSWERED;
                    $self_check_sheet->display_status = data_get(SelfCheckRating::STATUS_LIST, $self_check_rating_status);

                    // クラス
                    $list_class = null;
                    $status_class = null;
                    switch ($self_check_rating_status) {
                        case SelfCheckRating::STATUS_NOT_ANSWERED:
                        case SelfCheckRating::STATUS_ANSWERING:
                            $list_class = "alert";
                            $status_class = "waiting";
                            break;
                        case SelfCheckRating::STATUS_RATING:
                            $list_class = "assessment";
                            $status_class = "assessment";
                            break;
                    }
                    $self_check_sheet->list_class = $list_class;
                    $self_check_sheet->status_class = $status_class;

                    return $self_check_sheet;
                }),
        ]);
    }
}
