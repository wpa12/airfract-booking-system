<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

// routes for index
Route::get('/', function () {
    return view('index');
});

// routes for login
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/login', function () {
    return view('layouts.login');
})->name('login');

// route for dashboard
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'dashboard','as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });

    // route for logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
