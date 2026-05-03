<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'v1', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'bookings', 'as' => 'bookings.'], function () {
        //
    });
});
