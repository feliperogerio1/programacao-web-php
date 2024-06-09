<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resources([
    'clientes' => ClienteController::class
]);

Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete']);

Route::resources([
    'subjects' => SubjectController::class
]);
Route::get('subjects/delete/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');