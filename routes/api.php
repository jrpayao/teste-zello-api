<?php

use App\Http\Controllers\Api\AplicativoController;
use App\Http\Controllers\Api\PerfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PessoaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/pessoa',PessoaController::class);
Route::post('/pessoa/vinculo/', [PessoaController::class, 'inserirVinculoPerfil']);
Route::delete('/pessoa/vinculo/{id}', [PessoaController::class, 'removerVinculoPerfil']);
Route::resource('/perfil', PerfilController::class);
Route::resource('/aplicativo', AplicativoController::class);
Route::post('/pessoa/vinculoAplicativo/', [PessoaController::class, 'inserirVinculoAplicativo']);
Route::delete('/pessoa/vinculoAplicativo/{id}', [PessoaController::class, 'removerVinculoAplicativo']);
