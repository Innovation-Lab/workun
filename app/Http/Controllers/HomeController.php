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
        $this->auth_user = Auth::user();
    }

    /**
     * Display index page view.
     */
    public function index()
    {
        $term = date('Y-m');
        return view('home.index', [
            // 実施対象
            'answer_self_check_sheets' => $this
                ->selfCheckSheetRepository
                ->answerSelfCheckSheets($this->auth_user, $term),
            // 評価入力
            'rating_self_check_sheets' => $this
                ->selfCheckSheetRepository
                ->ratingSelfCheckSheets($this->auth_user, $term),
            // 評価承認
            'approving_self_check_sheets' => $this
                ->selfCheckSheetRepository
                ->approvingSelfCheckSheets($this->auth_user, $term),
        ]);
    }
}
