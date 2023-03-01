<?php

use App\Http\Controllers\RecycleBin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    return redirect('user/home');
});

Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

Route::view('/login', 'app.login');
Route::view('/register', 'app.register');

Route::post('/auth/login',[AuthController::class,'login'])->name('login.user');
Route::post('/auth/register',[AuthController::class,'register'])->name('register.user');
Route::post('/auth/logout',[AuthController::class,'logout'])->name('logout.user')->middleware('auth');

Route::prefix('user')->group(function () {
    Route::get('/home',[UserController::class,'home'])->name('user.home');
    Route::post('/online-booking',[UserController::class,'booking'])->name('user.booking');

    Route::get('/about',[UserController::class,'about'])->name('user.about');

    Route::get('/service',[UserController::class,'service'])->name('user.service');

    Route::get('/pages/rooms',[UserController::class,'rooms'])->name('user.rooms');
    Route::get('/rooms/detail/{id}',[UserController::class,'detail'])->name('detail.rooms');
    Route::post('/booking-room',[UserController::class,'detailBooking'])->name('booking.detail.rooms');

    Route::get('/contact',[UserController::class,'contact'])->name('user.contact');
});

Route::prefix('admin')->middleware('admin_middleware')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

    // reservation
    Route::prefix('reservation')->group(function () {
        Route::get('/',[ReservationController::class,'show'])->name('admin.reservation');
        Route::post('/create',[ReservationController::class,'create'])->name('reservation.create');
        Route::get('/list',[ReservationController::class,'index'])->name('reservation.index');
        Route::get('/delete/{id}',[ReservationController::class,'delete'])->name('reservation.delete');
        Route::get('/edit/{id}',[ReservationController::class,'edit'])->name('reservation.edit');
        Route::post('/update/{id}',[ReservationController::class,'update'])->name('reservation.update');
    });

    // axios
    Route::get('/room_number/get',[ReservationController::class,'getNumber'])->name('room_no');

    //rooms
    Route::prefix('rooms-manage')->group(function () {
        Route::get('/',[RoomController::class,'show'])->name('admin.rooms');
        Route::post('/add',[RoomController::class,'add'])->name('add.rooms');
        Route::post('/update/{id}',[RoomController::class,'update'])->name('update.room');
        Route::post('/delete/{id}',[RoomController::class,'delete'])->name('delete.room');
        Route::post('/check-in',[RoomController::class,'checkIn'])->name('checkIn.room');
        Route::post('/check-out',[RoomController::class,'checkout'])->name('checkout.room');
    });

    //employee manage
    Route::prefix('staff-manage')->group(function () {
        Route::get('/',[StaffController::class,'show'])->name('admin.staff');
        Route::post('/change/work-time/{id}',[StaffController::class,'change'])->name('change.workTime');
        Route::post('/delete/{id}',[StaffController::class,'delete'])->name('delete.staff');
        Route::post('/add/employee',[StaffController::class,'add'])->name('add.staff');
        Route::post('/update/employee/{id}',[StaffController::class,'update'])->name('update.staff');
    });

    Route::prefix('recycle')->group(function () {
        Route::get('/lists',[RecycleBin::class,'list'])->name('admin.recycle');
        Route::get('/delete/{id}',[RecycleBin::class,'delete'])->name('delete.recycle');
        Route::get('/restore/{id}',[RecycleBin::class,'restore'])->name('restore.recycle');
    });

    Route::prefix('online-booking')->group(function () {
        Route::get('/',[BookingController::class,'list'])->name('online.booking');
        Route::get('/delete/{id}',[BookingController::class,'delete'])->name('delete.booking');
    });


    Route::prefix('room-type')->group(function () {
        Route::get('/',[RoomTypeController::class,'index'])->name("index.roomType");
        Route::post('/create',[RoomTypeController::class,'store'])->name("store.roomType");
        Route::get('/delete/{id}',[RoomTypeController::class,'delete'])->name("delete.roomType");
        Route::post('/update/{id}',[RoomTypeController::class,'update'])->name("update.roomType");
    });

});
