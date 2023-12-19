<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Auth::routes();
/* Clear Cache */
Route::get('/reset', function () {
    $status1 = Artisan::call('route:clear');
    $status2 = Artisan::call('config:clear');
    $status3 = Artisan::call('cache:clear');
    $status4 = Artisan::call('view:clear');
    $status5 = Artisan::call('optimize:clear');
    return redirect()
        ->back()
        ->with('info', 'Data Cache telah dibersihkan.');
})->name('reset');
/* Login & Logout */
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')
        ->name('login')
        ->middleware('guest');
    Route::post('/login', 'login')->name('auth');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/reset-logout', 'password_reset_logout')->name('reset-logout');
});
/* Register */
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')
        ->name('register')
        ->middleware('guest');
    Route::post('/register', 'register')->name('register');
});
/* User Page without Login */
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')
        ->name('landing')
        ->middleware('guest');
});
/* Unused */
Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

/* Middleware */
Route::middleware(['auth'])->group(function () {
    /* Admin Page */
    /* Dashboard */
    // Route::controller(HomeController::class)->group(function () {
    //     Route::get('/dashboard', 'index')->name('dashboard');
    // });

    /* User Page */
    /* Home */
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
    });
});
