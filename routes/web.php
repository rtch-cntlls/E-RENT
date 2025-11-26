<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HostController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\Guest\LandingPageController;
use App\Http\Controllers\Guest\GuestSettingsController;
use App\Http\Controllers\Guest\GuestAccountController;
use App\Http\Controllers\Auth\GuestLoginController;
use App\Http\Controllers\Auth\GuestRegisterController;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\Host\HostDashboardController;
use App\Http\Controllers\Host\HostPropertyController;

Route::prefix('admin')->group(function () {

    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware([AdminAuth::class])->group(function () {
        Route::get('Overview', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('Hosts', [DashboardController::class, 'hostAnalytics'])->name('admin.host');
        Route::get('hosts/pending', [HostController::class, 'pending'])->name('admin.hosts.pending');
        Route::get('hosts/approved', [HostController::class, 'approved'])->name('admin.hosts.approved');
        Route::get('hosts/rejected', [HostController::class, 'rejected'])->name('admin.hosts.rejected');
        Route::post('/hosts/{id}/approve', [HostController::class, 'approve'])->name('admin.hosts.approve');
        Route::get('hosts/{id}', [HostController::class, 'show'])->name('admin.hosts.show');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });

});


Route::get('/', [LandingPageController::class, 'index'])->name('guest.landing');
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::prefix('guest')->group(function () {
    Route::get('login', [GuestLoginController::class, 'index'])->name('guest.login');
    Route::post('login', [GuestLoginController::class, 'login'])->name('guest.login.submit');
    Route::get('register', [GuestRegisterController::class, 'index'])->name('guest.register');
    Route::post('register', [GuestRegisterController::class, 'store'])->name('guest.register.submit');
    Route::post('logout', [GuestLoginController::class, 'logout'])->name('guest.logout');

    
    Route::get('settings', [GuestSettingsController::class, 'index'])->name('guest.settings');
    Route::get('/upgrade-to-host', [GuestAccountController::class, 'showUpgradeForm'])->name('guest.upgrade.form');
    Route::post('/upgrade-to-host', [GuestAccountController::class, 'submitUpgradeRequest'])->name('guest.upgrade.submit');

    Route::get('properties/{property}', [LandingPageController::class, 'show'])->name('guest.property.show');

});

Route::prefix('host')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [HostDashboardController::class, 'index'])->name('host.dashboard');
    Route::get('properties', [HostPropertyController::class, 'index'])->name('host.properties');

    Route::get('properties/create', [HostPropertyController::class, 'create'])->name('host.properties.create');
    Route::post('properties', [HostPropertyController::class, 'store'])->name('host.properties.store');
    Route::get('properties/{id}', [HostPropertyController::class, 'show'])->name('host.properties.show');
    Route::get('bookings', [HostDashboardController::class, 'bookings'])->name('host.bookings');
});
