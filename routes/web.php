<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// auth

Route::get('/',[AuthController::class, 'login']);
Route::post('/login',[AuthController::class, 'authenticate']);
Route::post('/logout',[AuthController::class, 'logout']);
Route::get('/register',[AuthController::class, 'registerView']);
Route::post('/register',[AuthController::class, 'register']);


// endauth
Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware('role:Admin,User');

Route::get('/resident',[ResidentController::class, 'index'])->middleware('role:Admin');
Route::get('/resident/create',[ResidentController::class, 'create'])->middleware('role:Admin');
Route::get('/resident/{id}',[ResidentController::class, 'edit'])->middleware('role:Admin');
Route::post('/resident',[ResidentController::class, 'store'])->middleware('role:Admin');
Route::put('/resident/{id}',[ResidentController::class, 'update'])->middleware('role:Admin');
Route::delete('/resident/{id}',[ResidentController::class, 'destroy'])->middleware('role:Admin');

// Account-request
Route::get('/account-request',[UserController::class, 'account_request_view'])->middleware('role:Admin');
Route::post('/account-request/approval/{id}',[UserController::class, 'account_approval'])->middleware('role:Admin');

//List data penduduk_ list view
Route::get('/account-list',[UserController::class, 'account_list_view'])->middleware('role:Admin');

// navbar
Route::get('/profile', [UserController::class, 'profile_view'])->middleware('role:Admin,User');
Route::post('/profile/{id}', [UserController::class, 'update_profile'])->middleware('role:Admin,User');
Route::get('/change-password', [UserController::class, 'change_password_view'])->middleware('role:Admin,User');
Route::post('/change-password/{id}', [UserController::class, 'change_password'])->middleware('role:Admin,User');






