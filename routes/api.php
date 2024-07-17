<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// 組織
Route::group([
    'prefix' => 'organization',
    'as' => 'organization.',
], function () {
    Route::post('/view', [OrganizationController::class, 'index']);
    Route::post('/add', [OrganizationController::class, 'store']);
    Route::post('/edit', [OrganizationController::class, 'update']);
});

// ユーザー
Route::group([
    'prefix' => 'user',
    'as' => 'user.',
], function () {
    Route::post('/view', [UserController::class, 'index']);
    Route::post('/sync', [UserController::class, 'sync']);
});
