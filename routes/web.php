<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SelfCheckController;
use Illuminate\Support\Facades\Route;

// ホーム
Route::get('/', [HomeController::class, 'index'])->name('index');

// セルフチェック
Route::group([
    'prefix' => 'self-check',
    'as' => 'self-check.',
], function () {
    Route::get('/', [SelfCheckController::class, 'index'])->name('index');
    Route::get('/answer', [SelfCheckController::class, 'answer'])->name('answer');
    Route::post('/answer', [SelfCheckController::class, 'update']);
    Route::get('/rating', [SelfCheckController::class, 'rating'])->name('rating');
    Route::get('/approval', [SelfCheckController::class, 'approval'])->name('approval');
    Route::get('/result', [SelfCheckController::class, 'result'])->name('result');
});

// マスター画面
Route::group([
    'prefix' => 'master',
    'as' => 'master.',
], function () {
    require base_path('routes/master.php');
});
