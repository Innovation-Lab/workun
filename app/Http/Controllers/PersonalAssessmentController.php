<?php

namespace App\Http\Controllers;

use App\Repositories\SelfCheckSheetRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PersonalAssessmentController extends Controller
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
     * 個人評価一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $type = $request->get('type', 'answer');
        return view("personal-assessment.index", [
            'type' => $type,
        ]);
    }

    /**
     * 定期評価｜個人評価
     */
    public function answer(): View
    {
        return view("personal-assessment.answer");
    }

    /**
     * 評価者対象一覧
     */
    public function answers(): View
    {
        return view("personal-assessment.answers");
    }

    /**
     * 承認者対象一覧
     */
    public function approvals(): View
    {
        return view("personal-assessment.approvals");
    }

    /**
     * 個人チェック評価一覧
     * @param Request $request
     * @return View
     */
    public function check(Request $request): View
    {
        $type = $request->get('type', 'answer');
        $term = $request->get('term', date('Y-m'));
        switch ($type) {
            case "answer":
                $self_check_sheets = $this
                    ->selfCheckSheetRepository
                    ->answerSelfCheckSheets($this->auth_user, $term, true);
                break;
            case "rating":
                $self_check_sheets = $this
                    ->selfCheckSheetRepository
                    ->ratingSelfCheckSheets($this->auth_user, $term, true);
                break;
            case "confirm":
                $self_check_sheets = $this
                    ->selfCheckSheetRepository
                    ->approvingSelfCheckSheets($this->auth_user, $term, true);
                break;
        }

        return view("personal-assessment.check", [
            'auth_user' => $this->auth_user,
            'type' => $type,
            'term' => $term,
            'self_check_sheets' => $self_check_sheets,
        ]);
    }
}
