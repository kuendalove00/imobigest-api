<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\CorrectorController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\InteresseController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\NotificacaoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registo', [AuthController::class,'registar']);
Route::post('auth/login', [AuthController::class,'login']);

Route::group(['middleware'=> 'api', 'prefix'=> 'auth'], function(){
   Route::post('/logout', [AuthController::class,'logout']);
   Route::post('/refresh', [AuthController::class,'refresh']);
});

Route::group(['middleware' => 'api'], function () {
    Route::resource('/avaliacao', AvaliacaoController::class);
    Route::resource('/cliente', ClienteController::class);
    Route::resource('/contrato', ContratoController::class);
    Route::resource('/corrector', CorrectorController::class);
    Route::resource('/historico', HistoricoController::class);
    Route::resource('/imovel', ImovelController::class);
    Route::resource('/interesse', InteresseController::class);
    Route::resource('/manutencao', ManutencaoController::class);
    Route::resource('/tecnico', TecnicoController::class);
    Route::resource('/notificacao', NotificacaoController::class);
    Route::resource('/utilizador', UsuarioController::class);
    Route::resource('/venda', VendaController::class);
});

Route::group(['prefix' => 'site', 'middleware' => 'api'], function (){
   Route::get("/imoveis", [\App\Http\Controllers\site\ImoveisController::class, 'index']);
   Route::post("cliente", [\App\Http\Controllers\site\ClienteController::class, 'store']);
   Route::get("imoveis/by-slug/{slug}", [\App\Http\Controllers\site\ImoveisController::class, 'bySlug']);
});
