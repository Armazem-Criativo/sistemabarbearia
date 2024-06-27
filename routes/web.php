<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\ServiceController;

Route::get('/',[WelcomeController::class, 'index'])->name('welcome');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/home',[HomeController::class,'index'])->name('home');

//Usuários
Route::resource('usuarios', UserController::class);

//Funcionários
Route::resource('funcionarios', EmployeeController::class);

//Clientes
Route::resource('clientes', ClientController::class);

//Formas de Pagamento
Route::resource('formas-de-pagamento', PaymentController::class);

//Serviços
Route::resource('servicos', ServiceController::class);

//Agendamentos
Route::resource('agendamentos',SchedulingController::class);
