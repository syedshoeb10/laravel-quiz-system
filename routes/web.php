<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminController as ControllersAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('admin-login','admin-login');

Route::post('admin-login', [AdminController::class, 'login']);
Route::get('dashboard', [AdminController::class, 'dashboard']);
Route::get('admin-categories', [AdminController::class, 'categories']);
Route::get('admin-logout', [AdminController::class, 'logout']);
Route::post('add-category', [AdminController::class, 'addCategory']);
Route::delete('/delete-category/{id}', [AdminController::class, 'destroy']);
Route::get('add-quiz', [AdminController::class, 'addquiz']);






