<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/',[WelcomeController::class, 'index'])->name('welcome');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/home',[HomeController::class,'index'])->name('home');
