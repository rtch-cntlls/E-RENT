<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HostController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\Guest\LandingPageController;
use App\Http\Controllers\Auth\GuestLoginController;
use App\Http\Controllers\Auth\GuestRegisterController;

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware([AdminAuth::class])->group(function () {
        Route::get('Overview', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('Lister', [DashboardController::class, 'hostAnalytics'])->name('admin.host');
        Route::get('hosts', [HostController::class, 'index'])->name('admin.hosts.index');
        Route::get('hosts/{id}', [HostController::class, 'show'])->name('admin.hosts.show');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});

Route::get('/', [LandingPageController::class, 'index'])->name('guest.landing');

Route::prefix('guest')->group(function () {
    Route::get('login', [GuestLoginController::class, 'index'])->name('guest.login');
    Route::post('login', [GuestLoginController::class, 'login'])->name('guest.login.submit');
    Route::get('register', [GuestRegisterController::class, 'index'])->name('guest.register');
    Route::post('register', [GuestRegisterController::class, 'store'])->name('guest.register.submit');
    Route::post('logout', [GuestLoginController::class, 'logout'])->name('guest.logout');
});
