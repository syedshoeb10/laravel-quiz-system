<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;


Route::get('/', function () {
    return view('welcome');
});

Route::view('admin-login','admin-login');

Route::post('/admin-login', [AdminController::class, 'login']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);

