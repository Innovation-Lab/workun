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
    // Route::get('/edit/{organization}', [OrganizationController::class, 'edit'])->name('edit');
    // Route::post('/edit/{organization}', [OrganizationController::class, 'update']);

    // 役職
    Route::view('/add/position', 'master.organization.position.add')->name('position.add');
    Route::view('/edit/position', 'master.organization.position.edit')->name('position.edit');

    // 等級
    Route::view('/add/grade', 'master.organization.grade.add')->name('grade.add');
    Route::view('/edit/grade', 'master.organization.grade.edit')->name('grade.edit');

    // 号俸
    Route::view('/add/salary', 'master.organization.salary.add')->name('salary.add');
    Route::view('/edit/salary', 'master.organization.salary.edit')->name('salary.edit');

    // 雇用形態
    Route::view('/add/employment', 'master.organization.employment.add')->name('employment.add');
    Route::view('/edit/employment', 'master.organization.employment.edit')->name('employment.edit');

    require base_path('routes/organization.php');
});

// 対象期間
Route::group([
    'prefix' => 'term',
    'as' => 'term.',
], function () {
    Route::get('/', [TermController::class, 'index'])->name('index');
    Route::get('/add', [TermController::class, 'add'])->name('add');
    Route::post('/add', [TermController::class, 'store']);
    Route::get('/edit/{period}', [TermController::class, 'edit'])->name('edit');
    Route::post('/edit/{period}', [TermController::class, 'update']);
    Route::delete('/edit/{period}', [TermController::class, 'destroy']);
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

// 従業員情報
Route::group([
    'prefix' => 'member',
    'as' => 'member.',
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::post('/edit/{user}', [UserController::class, 'update']);
});
