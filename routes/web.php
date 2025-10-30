<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\SolicitacaoController;
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
    Route::get('grupos/coordenados', [GrupoController::class, 'gruposCoordenados'])->name('coordenados.grupos');
    Route::post('grupos/store', [GrupoController::class, 'store'])->name('store.grupos');
    Route::get('grupos/{grupo}', [GrupoController::class, 'edit'])->name('edit.grupos');
    Route::put('grupos/{grupo}', [GrupoController::class, 'update'])->name('update.grupos');
    Route::delete('grupos/{grupo}', [GrupoController::class, 'destroy'])->name('destroy.grupos');


    Route::get('eventos', [EventoController::class, 'index'])->name('index.eventos');
    Route::get('eventos/create', [EventoController::class, 'create'])->name('create.eventos');
    Route::post('eventos/store', [EventoController::class, 'store'])->name('store.eventos');
    Route::get('eventos/{evento}', [EventoController::class, 'edit'])->name('edit.eventos');
    Route::put('eventos/{evento}', [EventoController::class, 'update'])->name('update.eventos');
    Route::delete('eventos/{evento}', [EventoController::class, 'destroy'])->name('destroy.eventos');

    Route::get('solicitacoes/create/{evento}', [SolicitacaoController::class, 'create'])->name('create.silicitacoes');
    Route::post('solicitacoes/store', [SolicitacaoController::class, 'store'])->name('store.silicitacoes');
    Route::get('solicitacoes', [SolicitacaoController::class, 'index'])->name('index.solicitacoes');
    Route::get('solicitacoes/informacoes/{solicitacao}', [SolicitacaoController::class, 'informacoesSolicitacao'])->name('informacoes.solicitacoes');

});

