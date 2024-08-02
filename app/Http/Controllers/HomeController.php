<?php

namespace App\Http\Controllers;

use App\Models\SelfCheckRating;
use App\Repositories\SelfCheckSheetRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private ?Authenticatable $auth_user;

    public function __construct(
        public SelfCheckSheetRepositoryInterface $selfCheckSheetRepository
    )
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    /**
     * Display index page view.
     */
    public function index()
    {
        $term = date('Y-m');
        $answer_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->answerSelfCheckSheets($this->auth_user, $term, true);
        $rating_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->ratingSelfCheckSheets($this->auth_user, $term, true);
        $approving_self_check_sheets = $this
            ->selfCheckSheetRepository
            ->approvingSelfCheckSheets($this->auth_user, $term, true);

        // 評価者または承認者のどちらも当てはまらない場合
        $show_only_answer = false;
        if (
            $rating_self_check_sheets->isEmpty() &&
            $approving_self_check_sheets->isEmpty()
        ) {
            $show_only_answer = true;
        }

        return view('home.index', [
            'term' => $term,
            'answer_self_check_sheets' => $answer_self_check_sheets,
            'rating_self_check_sheets' => $rating_self_check_sheets,
            'approving_self_check_sheets' => $approving_self_check_sheets,
            'show_only_answer' => $show_only_answer,
        ]);
    }
}
