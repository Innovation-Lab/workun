<?php

namespace App\Http\Controllers;

use App\Models\SelfCheckSheet;
use App\Repositories\SelfCheckSheetRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SelfCheckController extends Controller
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
     * セルフチェック一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
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
        return view('self-check.index', [
            'auth_user' => $this->auth_user,
            'type' => $type,
            'term' => $term,
            'self_check_sheets' => $self_check_sheets,
        ]);
    }

    /**
     * Display all sheets page view.
     */
    public function all()
    {
        return view('self-check.all');
    }

    /**
     * 回答画面
     * @param SelfCheckSheet $selfCheckSheet
     * @param string $term
     * @return View
     */
    public function answer(
        SelfCheckSheet $selfCheckSheet,
        string $term
    ): View
    {
        return view('self-check.answer.index', [
            'selfCheckSheet' => $this
                ->selfCheckSheetRepository
                ->setAnswerAttributes($selfCheckSheet, $this->auth_user, $term, true),
            'term' => $term,
        ]);
    }

    /**
     * @param SelfCheckSheet $selfCheckSheet
     * @param string $term
     * @param Request $request
     * @return RedirectResponse
     */
    public function answerUpdate(
        SelfCheckSheet $selfCheckSheet,
        string $term,
        Request $request
    ): RedirectResponse
    {
        # 更新処理
        DB::beginTransaction();
        try {
            $this
                ->selfCheckSheetRepository
                ->answer($selfCheckSheet, $this->auth_user, $term, $request);
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()
                ->back()
                ->withInput()
                ->with(['alert' => $exception->getMessage()]);
        }
        DB::commit();

        if ($request->get('draft')) {
            return redirect()
                ->back()
                ->with('success', '下書き保存しました。');
        }

        return redirect()
            ->to(route('self-check.index'))
            ->with('success', 'セルフチェックの記入を完了しました。');
    }

    /**
     * 回答一覧
     * @param SelfCheckSheet $selfCheckSheet
     * @param string $term
     * @return View
     */
    public function answers(
        SelfCheckSheet $selfCheckSheet,
        string $term
    ): View
    {
        return view('self-check.answers', [
            'term' => $term,
            'selfCheckSheet' => $selfCheckSheet,
            'self_check_ratings' => $selfCheckSheet
                ->self_check_ratings()
                ->onTerm($term)
                ->where('self_check_ratings.reviewer_id', $this->auth_user->id)
                ->paginate()
        ]);
    }

    public function answerConfirm()
    {
        return view('self-check.answer.confirm');
    }

    /**
     * Display rating page view.
     */
    public function rating()
    {
        return view('self-check.rating');
    }

    /**
     * Display confirm page view.
     */
    public function confirm()
    {
        return view('self-check.confirm.index');
    }

    /**
     * Display approval page view.
     */
    public function approval()
    {
        return view('self-check.approval');
    }

    /**
     * Display result page view.
     */
    public function result()
    {
        return view('self-check.result.index');
    }
    /**
     * Display resultall page view.
     */
    public function resultall()
    {
        return view('self-check.result.all');
    }
}
