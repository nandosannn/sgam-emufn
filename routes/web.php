<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('index.users');

    Route::get('/users/create', [UserController::class, 'create'])->name('create.users');

    Route::post('/users/store', [UserController::class, 'store'])->name('store.users');

    Route::get('/users/{user}', [UserController::class, 'edit'])->name('edit.users');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('update.users');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy.users');
});

