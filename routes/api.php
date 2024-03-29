<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
// ->middleware('consulta-cep');
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    // Route::resource('dashboard', App\Http\Controllers\API\DashboardController::class);
    Route::resource('cidades', App\Http\Controllers\API\CidadeController::class);
    Route::resource('campanhas', App\Http\Controllers\API\CampanhaController::class);
    Route::resource('grupos', App\Http\Controllers\API\GrupoController::class);
    Route::resource('descontos', App\Http\Controllers\API\DescontoController::class);
    Route::resource('produtos', App\Http\Controllers\API\ProdutoController::class);
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});
