<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\AssessmentPointController;
use App\Http\Controllers\Master\Organization\OrganizationController;
use App\Http\Controllers\Master\OrganizationAssessmentController;
use App\Http\Controllers\Master\PerformanceReviewController;
use App\Http\Controllers\Master\PersonalAssessmentController;
use App\Http\Controllers\Master\SelfCheckController;
use App\Http\Controllers\Master\TermController;
use App\Http\Controllers\Master\UserController;

// セルフチェック
Route::group([
    'prefix' => 'self-check',
    'as' => 'self-check.',
], function () {
    Route::get('/', [SelfCheckController::class, 'index'])->name('index');
    Route::get('/add', [SelfCheckController::class, 'add'])->name('add');
    Route::post('/add', [SelfCheckController::class, 'store']);
    Route::get('/edit/{self_check_sheet}', [SelfCheckController::class, 'edit'])->name('edit');
    Route::post('/edit/{self_check_sheet}', [SelfCheckController::class, 'update']);
    Route::delete('/edit/{self_check_sheet}', [SelfCheckController::class, 'destroy']);
    Route::get('/copy/{self_check_sheet}', [SelfCheckController::class, 'copy'])->name('copy');


    Route::get('/_loadFirst', [SelfCheckController::class, '_loadFirst'])->name('_loadFirst');
    Route::get('/_loadSecond', [SelfCheckController::class, '_loadSecond'])->name('_loadSecond');
    Route::get('/_loadThird', [SelfCheckController::class, '_loadThird'])->name('_loadThird');
    Route::get('/_loadUsers', [SelfCheckController::class, '_loadUsers'])->name('_loadUsers');
});

// 定期評価(個人)
Route::group([
    'prefix' => 'personal-assessment',
    'as' => 'personal-assessment.',
], function () {
    Route::get('/', [PersonalAssessmentController::class, 'index'])->name('index');
    Route::get('/check', [PersonalAssessmentController::class, 'check'])->name('check');
    Route::get('/add', [PersonalAssessmentController::class, 'add'])->name('add');
    Route::post('/add', [PersonalAssessmentController::class, 'store']);
    Route::get('/edit', [PersonalAssessmentController::class, 'edit'])->name('edit');
    Route::post('/edit', [PersonalAssessmentController::class, 'update']);
    Route::delete('/edit', [PersonalAssessmentController::class, 'destroy']);
    Route::get('/copy', [PersonalAssessmentController::class, 'copy'])->name('copy');
});
// 定期評価(組織)
Route::group([
    'prefix' => 'organization-assessment',
    'as' => 'organization-assessment.',
], function () {
    Route::get('/', [OrganizationAssessmentController::class, 'index'])->name('index');
    Route::get('/add', [OrganizationAssessmentController::class, 'add'])->name('add');
    Route::post('/add', [OrganizationAssessmentController::class, 'store']);
    Route::get('/edit', [OrganizationAssessmentController::class, 'edit'])->name('edit');
    Route::post('/edit', [OrganizationAssessmentController::class, 'update']);
    Route::delete('/edit', [OrganizationAssessmentController::class, 'destroy']);
    Route::get('/copy', [OrganizationAssessmentController::class, 'copy'])->name('copy');
});

// 1 on 1
Route::group([
    'prefix' => 'performance-review',
    'as' => 'performance-review.',
], function () {
    Route::get('/', [PerformanceReviewController::class, 'index'])->name('index');
    Route::get('/add', [PerformanceReviewController::class, 'add'])->name('add');
    Route::post('/add', [PerformanceReviewController::class, 'store']);
    Route::get('/edit', [PerformanceReviewController::class, 'edit'])->name('edit');
    Route::post('/edit', [PerformanceReviewController::class, 'update']);
    Route::delete('/edit', [PerformanceReviewController::class, 'destroy']);
    Route::get('/copy', [PerformanceReviewController::class, 'copy'])->name('copy');
});

// 組織
Route::group([
    'prefix' => 'organization',
    'as' => 'organization.',
], function () {
    Route::get('/', [OrganizationController::class, 'index'])->name('index');
    Route::get('/edit', [OrganizationController::class, 'edit'])->name('edit');
    Route::post('/edit', [OrganizationController::class, 'update']);
    Route::post('/_preview', [OrganizationController::class, '_preview'])->name('_preview');
    Route::get('/_lodeMembers', [OrganizationController::class, '_lodeMembers'])->name('_lodeMembers');

    // 組織項目
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

// 評価点
Route::group([
    'prefix' => 'assessment-point',
    'as' => 'assessment-point.',
], function () {
    Route::get('/', [AssessmentPointController::class, 'index'])->name('index');
    Route::get('/add', [AssessmentPointController::class, 'add'])->name('add');
    Route::post('/add', [AssessmentPointController::class, 'store']);
    Route::get('/edit', [AssessmentPointController::class, 'edit'])->name('edit');
    Route::post('/edit', [AssessmentPointController::class, 'update']);
    Route::delete('/edit', [AssessmentPointController::class, 'destroy']);
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
    Route::get('/_lodeUsers', [UserController::class, '_lodeUsers'])->name('_lodeUsers');
});
