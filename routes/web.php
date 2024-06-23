<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

Route::get('/',[WelcomeController::class, 'index'])->name('welcome');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/home',[HomeController::class,'index'])->name('home');

//Usuários
Route::get('/usuarios',[UserController::class,'index'])->name('users');
Route::get('/criar-usuario',[UserController::class, 'create'])->name('create-users');
Route::get('/editar-usuario',[UserController::class, 'edit'])->name('edit-users');

//Funcionários
Route::get('/funcionarios',[EmployeeController::class, 'index'])->name('employees');
Route::get('/criar-funcionario',[EmployeeController::class, 'create'])->name('create-employee');
Route::get('/editar-funcionario',[EmployeeController::class, 'edit'])->name('edit-employee');
