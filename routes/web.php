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

    // マスター画面
    Route::group([
        'prefix' => 'master',
        'as' => 'master.',
    ], function () {
        require base_path('routes/master.php');
    });
});

// セルフチェック
Route::group([
    'prefix' => 'self-check',
    'as' => 'self-check.',
], function () {
    Route::get('/', [SelfCheckController::class, 'index'])->name('index');
    Route::get('/all', [SelfCheckController::class, 'all'])->name('all');
    Route::get('/answer', [SelfCheckController::class, 'answer'])->name('answer');
    Route::post('/answer', [SelfCheckController::class, 'update']);
    Route::get('/answer/confirm', [SelfCheckController::class, 'answerConfirm'])->name('answerConfirm');
    Route::get('/rating', [SelfCheckController::class, 'rating'])->name('rating');
    Route::get('/confirm', [SelfCheckController::class, 'confirm'])->name('confirm');
    Route::get('/confirm/list', [SelfCheckController::class, 'confirmList'])->name('confirmList');
    Route::get('/approval', [SelfCheckController::class, 'approval'])->name('approval');
    Route::get('/result', [SelfCheckController::class, 'result'])->name('result');
    Route::get('/result/all', [SelfCheckController::class, 'resultall'])->name('resultall');
});
