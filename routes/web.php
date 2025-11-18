<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminAuth;

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware([AdminAuth::class])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
