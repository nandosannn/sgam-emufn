<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('users', [UserController::class, 'index'])->name('index.users');
    Route::get('users/create', [UserController::class, 'create'])->name('create.users');
    Route::post('users/store', [UserController::class, 'store'])->name('store.users');
    Route::get('users/{user}', [UserController::class, 'edit'])->name('edit.users');
    Route::put('users/{user}', [UserController::class, 'update'])->name('update.users');
    Route::put('users/{user}/profile', [UserController::class, 'updateProfile'])->name('updateprofile.users');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('destroy.users');

    Route::get('grupos', [GrupoController::class, 'index'])->name('index.grupos');
    Route::get('grupos/create', [GrupoController::class, 'create'])->name('create.grupos');
    Route::post('grupos/store', [GrupoController::class, 'store'])->name('store.grupos');
    Route::get('grupos/{grupo}', [GrupoController::class, 'edit'])->name('edit.grupos');
    Route::put('grupos/{grupo}', [GrupoController::class, 'update'])->name('update.grupos');
    Route::delete('grupos/{grupo}', [GrupoController::class, 'destroy'])->name('destroy.grupos');
});

