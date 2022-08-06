<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     Route::get('/',[\App\Http\Controllers\AdminController::class,'users']);

//     return $request->user();
// });
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

    
    Route::get('/users',[\App\Http\Controllers\AdminController::class,'users']);
    Route::get('user/{id}',[\App\Http\Controllers\AdminController::class,'showuser']);
    Route::delete('user/{id}/delete',[\App\Http\Controllers\AdminController::class,'delete']);
    Route::put('user/{id}/update',[\App\Http\Controllers\AdminController::class,'userupdate']);
    Route::post('user/{id}/restore',[\App\Http\Controllers\AdminController::class,'restore']);

    Route::post('solicitante-externo/{id}/upload-file',[\App\Http\Controllers\SolicitanteExternoController::class,'uploadFile']);
    Route::post('solicitante-externo/{id}/remove-file',[\App\Http\Controllers\SolicitanteExternoController::class,'removeFile']);
    Route::apiResource('solicitante-externo', \App\Http\Controllers\SolicitanteExternoController::class);

    Route::post('servidor-publico/{id}/upload-file',[\App\Http\Controllers\ServidorPublicoController::class,'uploadFile']);
    Route::post('servidor-publico/{id}/remove-file',[\App\Http\Controllers\ServidorPublicoController::class,'removeFile']);
    Route::apiResource('servidor-publico', \App\Http\Controllers\ServidorPublicoController::class);
});
