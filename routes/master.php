<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\Organization\OrganizationController;
use App\Http\Controllers\Master\SelfCheckController;
use App\Http\Controllers\Master\TermController;
use App\Http\Controllers\Master\UserController;

// セルフチェック
Route::group([
    'prefix' => 'self-check',
    'as' => 'self-check.',
], function () {
    Route::get('/', [SelfCheckController::class, 'index'])->name('index');
    Route::get('/create', [SelfCheckController::class, 'create'])->name('create');
    Route::post('/create', [SelfCheckController::class, 'store']);
    Route::get('/edit', [SelfCheckController::class, 'edit'])->name('edit');
    Route::post('/edit', [SelfCheckController::class, 'update']);
});

// 組織
Route::group([
    'prefix' => 'organization',
    'as' => 'organization.',
], function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::get('/edit/{organization}', [OrganizationController::class, 'edit'])->name('edit');
    Route::post('/edit/{organization}', [OrganizationController::class, 'update']);

    require base_path('routes/organization.php');
});

// 対象期間
Route::group([
    'prefix' => 'term',
    'as' => 'term.',
], function () {
    Route::get('/', [TermController::class, 'index'])->name('index');
    Route::get('/edit', [TermController::class, 'edit'])->name('edit');
    Route::post('/edit', [TermController::class, 'update']);
});

// 顧客
Route::group([
    'prefix' => 'user',
    'as' => 'user.',
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/edit', [UserController::class, 'update']);
});


Route::group([
    'prefix' => 'member',
    'as' => 'member.',
], function () {
    Route::view('/','master.member.index')->name('index');
    Route::view('/edit', 'master.member.edit')->name('edit');
});