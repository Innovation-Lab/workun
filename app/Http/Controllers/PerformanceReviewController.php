<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PerformanceReviewController extends Controller
{
    private ?Authenticatable $auth_user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->auth_user = Auth::user();
            return $next($request);
        });
    }

    /**
     * 1 on 1 対象シート一覧
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $type = $request->get('type', 'answer');
        return view("performance-review.index", [
            'type' => $type,
        ]);
    }

    /**
     * 1 on 1 編集
     * @return View
     */
    public function answer(): View
    {
        return view('performance-review.answer');
    }

    /**
     * 評価対象者一覧
     * @return View
     */
    public function answers(): View
    {
        return view('performance-review.answers');
    }

    /**
     * 1 on 1 全てのシート一覧
     * @param Request $request
     * @return View
     */
    public function all(Request $request): View
    {
        $type = $request->get('type', 'answer');
        return view('performance-review.all', [
            'request' => $request,
            'type' => $type,
        ]);
    }

    /**
     * 1 on 1 全てのシート評価結果
     * @return View
     */
    public function resultAll(): View
    {
        return view('performance-review.result.all');
    }
}
