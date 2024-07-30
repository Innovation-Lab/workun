<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SelfCheckController;
use Illuminate\Support\Facades\Route;

// ログイン
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware('auth:web')->group(function ()
{
    // ホーム
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    // セルフチェック
    Route::group([
        'prefix' => 'self-check',
        'as' => 'self-check.',
    ], function () {
        Route::get('/', [SelfCheckController::class, 'index'])->name('index');
        Route::get('/all', [SelfCheckController::class, 'all'])->name('all');
        Route::get('/answer/{selfCheckSheet}/{term}', [SelfCheckController::class, 'answer'])->name('answer');
        Route::post('/answer/{selfCheckSheet}/{term}', [SelfCheckController::class, 'answerUpdate']);
        Route::get('/answer/confirm', [SelfCheckController::class, 'answerConfirm'])->name('answerConfirm');
        Route::get('/answers/{selfCheckSheet}/{term}', [SelfCheckController::class, 'answers'])->name('answers');
        Route::get('/rating/{selfCheckRating}', [SelfCheckController::class, 'rating'])->name('rating');
        Route::post('/rating/{selfCheckRating}', [SelfCheckController::class, 'ratingUpdate']);
        Route::get('/approvals/{selfCheckSheet}/{term}', [SelfCheckController::class, 'approvals'])->name('approvals');
        Route::get('/approval/{selfCheckRating}', [SelfCheckController::class, 'approval'])->name('approval');
        Route::post('/approval/{selfCheckRating}', [SelfCheckController::class, 'approvalUpdate']);
        Route::get('/result', [SelfCheckController::class, 'result'])->name('result');
        Route::get('/result/all', [SelfCheckController::class, 'resultall'])->name('resultall');
    });

    // マスター画面
    Route::group([
        'prefix' => 'master',
        'as' => 'master.',
    ], function () {
        require base_path('routes/master.php');
    });
});
