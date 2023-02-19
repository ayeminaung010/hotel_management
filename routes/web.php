<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('user/home');
});


Route::view('/login', 'app.login');
Route::view('/register', 'app.register');
Route::view('/user/home', 'user.home.home');

Route::prefix('admin')->middleware('admin_middleweare')->group(function () {
    Route::view('/dashboard', 'admin.home.dashboard');
    Route::view('/reservation', 'admin.reservation.reservation');
});
