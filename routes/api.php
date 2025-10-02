<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UserUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/sign-in', [AuthController::class, 'login']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [ResetPasswordController::class, 'reset']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register'])->middleware('role:super_admin,admin');
    Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('role:super_admin,admin,employees');
    Route::post('/auth/update/{id}', [UserUpdateController::class, 'userUpdate'])->middleware('role:super_admin,admin,employees');
    Route::get('/auth/user/{id}', [UserUpdateController::class, 'index'])->middleware('role:super_admin,admin,employees');
});
