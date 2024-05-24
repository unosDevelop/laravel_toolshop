<?php

use App\Events\MessageEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemUnitController;
use App\Http\Controllers\DashboardController;



Route::view('/', 'auth.login')->name('showLoginForm');
Route::view('/register', 'auth.register')->name('showRegisterForm');
Route::view('/verify', 'auth.verify_email')->name('showVerifyForm');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email/{verificationCode}', ([AuthController::class, 'verifyEmail']))->name('verifyEmail');

Route::post('/login_confirm', [AuthController::class, 'login'])->name('login_confirm');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile_edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('categories', CategoryController::class);
    Route::resource('items', ItemController::class);
    Route::resource('item-units', ItemUnitController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/add-user-to-room', [ChatController::class, 'addUserToRoom']);
    Route::post('/send-message', [ChatController::class, 'sendMessage']);
    Route::post('/create-room', [ChatController::class, 'createRoom']);
});

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
