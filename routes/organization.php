<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Master\Organization\DepartmentController;
use App\Http\Controllers\Master\Organization\EmploymentController;
use App\Http\Controllers\Master\Organization\GradeController;
use App\Http\Controllers\Master\Organization\PositionController;
use App\Http\Controllers\Master\Organization\SalaryController;
use App\Http\Controllers\Master\Organization\UserDepartmentController;

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

// 部署と従業員情報
Route::group([
    'prefix' => 'user_department',
    'as' => 'user_department.',
], function () {
    Route::get('/add/{department}', [UserDepartmentController::class, 'add'])->name('add');
    Route::post('/add/{department}', [UserDepartmentController::class, 'store']);
    Route::get('/edit/{department}', [UserDepartmentController::class, 'edit'])->name('edit');
    Route::post('/edit/{department}', [UserDepartmentController::class, 'update']);
    Route::delete('/edit/{department}', [UserDepartmentController::class, 'destroy']);
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
    Route::get('/add', [EmploymentController::class, 'add'])->name('add');
    Route::post('/add', [EmploymentController::class, 'store']);
    Route::get('/edit/{employment}', [EmploymentController::class, 'edit'])->name('edit');
    Route::post('/edit/{employment}', [EmploymentController::class, 'update']);
    Route::delete('/edit/{employment}', [EmploymentController::class, 'destroy']);
});

// 等級
Route::group([
    'prefix' => 'grade',
    'as' => 'grade.',
], function () {
    Route::get('/add', [GradeController::class, 'add'])->name('add');
    Route::post('/add', [GradeController::class, 'store']);
    Route::get('/edit/{grade}', [GradeController::class, 'edit'])->name('edit');
    Route::post('/edit/{grade}', [GradeController::class, 'update']);
    Route::delete('/edit/{grade}', [GradeController::class, 'destroy']);
});

// 号俸
Route::group([
    'prefix' => 'salary',
    'as' => 'salary.',
], function () {
    Route::get('/add', [SalaryController::class, 'add'])->name('add');
    Route::post('/add', [SalaryController::class, 'store']);
    Route::get('/edit/{salary}', [SalaryController::class, 'edit'])->name('edit');
    Route::post('/edit/{salary}', [SalaryController::class, 'update']);
    Route::delete('/edit/{salary}', [SalaryController::class, 'destroy']);
});
