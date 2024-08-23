<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FuncionarioController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//funcionario
Route::get('/funcionario', [FuncionarioController::class, 'index']);
