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

Route::get('/options/estado-civil',[\App\Http\Controllers\OptionsController::class,'optionsEstadoCivil']);
Route::get('/options/formacao-profissional',[\App\Http\Controllers\OptionsController::class,'optionsFormacaoProfissional']);
Route::get('/options/tipo-endereco',[\App\Http\Controllers\OptionsController::class,'optionsTipoEndereco']);
Route::get('/options/cidade',[\App\Http\Controllers\OptionsController::class,'optionsCidade']);
Route::get('/options/uf',[\App\Http\Controllers\OptionsController::class,'optionsUF']);
Route::get('/options/orientacao-sexual',[\App\Http\Controllers\OptionsController::class,'optionsOrientacaoSexual']);
Route::get('/options/sexo',[\App\Http\Controllers\OptionsController::class,'optionsSexo']);
Route::get('/options/cor',[\App\Http\Controllers\OptionsController::class,'optionsCor']);
Route::get('/options/escolaridade',[\App\Http\Controllers\OptionsController::class,'optionsEscolaridade']);
Route::get('/options/local-obito',[\App\Http\Controllers\OptionsController::class,'optionsLocalObito']);
Route::get('/options/padrao',[\App\Http\Controllers\OptionsController::class,'optionsPadrao']);
Route::get('/options/tipo-gravidez',[\App\Http\Controllers\OptionsController::class,'optionsTipoGravidez']);
Route::get('/options/tipo-parto',[\App\Http\Controllers\OptionsController::class,'optionsTipoParto']);
Route::get('/options/morte-parto',[\App\Http\Controllers\OptionsController::class,'optionsMorteParto']);
Route::get('/options/natureza-obito',[\App\Http\Controllers\OptionsController::class,'optionsNaturezaObito']);
Route::get('/options/momento-morte-mulher',[\App\Http\Controllers\OptionsController::class,'optionsMomentoMorteMulher']);
Route::get('/options/tipo-causa-externa-obito',[\App\Http\Controllers\OptionsController::class,'optionsTipoCausaExternaObito']);
Route::get('/options/fonte-informacao-obito',[\App\Http\Controllers\OptionsController::class,'optionsFonteInformacaoObito']);
Route::get('/options/tipo-sanguineo',[\App\Http\Controllers\OptionsController::class,'optionsTipoSanguineo']);
Route::get('/options/biotipo',[\App\Http\Controllers\OptionsController::class,'optionsBiotipo']);
Route::get('/options/cor-olho',[\App\Http\Controllers\OptionsController::class,'optionsCorOlho']);
Route::get('/options/tipo-cabelo',[\App\Http\Controllers\OptionsController::class,'optionsTipoCabelo']);
Route::get('/options/cor-cabelo',[\App\Http\Controllers\OptionsController::class,'optionsCorCabelo']);
Route::get('/options/corte-cabelo',[\App\Http\Controllers\OptionsController::class,'optionsCorteCabelo']);
Route::get('/options/tipo-documento',[\App\Http\Controllers\OptionsController::class,'optionsTipoDocumento']);
Route::get('/options/grau-parentesco',[\App\Http\Controllers\OptionsController::class,'optionsGrauParentesco']);
Route::get('/options/condicao-pessoa',[\App\Http\Controllers\OptionsController::class,'optionsCondicaoPessoa']);

Route::get('/usuario-perfil/options',[\App\Http\Controllers\UsuarioPerfilController::class,'getOptions']);

Route::post('servidor-publico/{id}/upload-file',[\App\Http\Controllers\ServidorPublicoController::class,'uploadFile']);
Route::post('servidor-publico/{id}/remove-file',[\App\Http\Controllers\ServidorPublicoController::class,'removeFile']);
Route::apiResource('servidor-publico', \App\Http\Controllers\ServidorPublicoController::class);

Route::post('periciando-morto/{id}/upload-file',[\App\Http\Controllers\PericiandoMortoController::class,'uploadFile']);
Route::post('periciando-morto/{id}/remove-file',[\App\Http\Controllers\PericiandoMortoController::class,'removeFile']);
Route::apiResource('periciando-morto', \App\Http\Controllers\PericiandoMortoController::class);

Route::post('periciando-vivo/{id}/upload-file',[\App\Http\Controllers\PericiandoVivoController::class,'uploadFile']);
Route::post('periciando-vivo/{id}/remove-file',[\App\Http\Controllers\PericiandoVivoController::class,'removeFile']);
Route::apiResource('periciando-vivo', \App\Http\Controllers\PericiandoVivoController::class);

Route::apiResource('desaparecido', \App\Http\Controllers\DesaparecidoController::class);

Route::get('/users',[\App\Http\Controllers\AdminController::class,'users']);
Route::get('user/{id}',[\App\Http\Controllers\AdminController::class,'showuser']);
Route::delete('user/{id}/delete',[\App\Http\Controllers\AdminController::class,'delete']);
Route::put('user/{id}/update',[\App\Http\Controllers\AdminController::class,'userupdate']);
Route::post('user/{id}/restore',[\App\Http\Controllers\AdminController::class,'restore']);

Route::post('solicitante-externo/{id}/upload-file',[\App\Http\Controllers\SolicitanteExternoController::class,'uploadFile']);
Route::post('solicitante-externo/{id}/remove-file',[\App\Http\Controllers\SolicitanteExternoController::class,'removeFile']);
Route::apiResource('solicitante-externo', \App\Http\Controllers\SolicitanteExternoController::class);

Route::apiResource('usuario-perfil', \App\Http\Controllers\UsuarioPerfilController::class);

Route::apiResource('entidade-externa', \App\Http\Controllers\EntidadeExternaController::class);

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function () {
   
});
