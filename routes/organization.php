<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\Organization\DepartmentController;
use App\Http\Controllers\Master\Organization\EmploymentController;
use App\Http\Controllers\Master\Organization\GradeController;
use App\Http\Controllers\Master\Organization\PositionController;

// 部署・部門
Route::group([
    'prefix' => 'department',
    'as' => 'department.',
], function () {
    Route::get('/create', [DepartmentController::class, 'create'])->name('create');
    Route::post('/create', [DepartmentController::class, 'store']);
    Route::get('/edit', [DepartmentController::class, 'edit'])->name('edit');
    Route::post('/edit', [DepartmentController::class, 'update']);
});

// 役職
Route::group([
    'prefix' => 'position',
    'as' => 'position.',
], function () {
    Route::get('/add', [PositionController::class, 'add'])->name('add');
    Route::post('/add', [PositionController::class, 'store']);
    Route::get('/edit/{position}', [PositionController::class, 'edit'])->name('edit');
    Route::post('/edit/{position}', [PositionController::class, 'update']);
    Route::delete('/edit/{position}', [PositionController::class, 'destroy']);
});

// 雇用形態
Route::group([
    'prefix' => 'employment',
    'as' => 'employment.',
], function () {
    Route::get('/create', [EmploymentController::class, 'create'])->name('create');
    Route::post('/create', [EmploymentController::class, 'store']);
    Route::get('/edit', [EmploymentController::class, 'edit'])->name('edit');
    Route::post('/edit', [EmploymentController::class, 'update']);
});

// 等級
Route::group([
    'prefix' => 'grade',
    'as' => 'grade.',
], function () {
    Route::get('/create', [GradeController::class, 'create'])->name('create');
    Route::post('/create', [GradeController::class, 'store']);
    Route::get('/edit', [GradeController::class, 'edit'])->name('edit');
    Route::post('/edit', [GradeController::class, 'update']);
});
