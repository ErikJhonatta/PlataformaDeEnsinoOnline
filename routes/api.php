<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/aluno/create',[AlunoController::class, 'store']);
Route::get('/aluno/list',[AlunoController::class, 'index']);
Route::get('/aluno/show/{id}',[AlunoController::class, 'show']);
Route::put('/aluno/edit/{id}',[AlunoController::class, 'update']);
Route::delete('/aluno/delete/{id}',[AlunoController::class, 'destroy']);

Route::post('/curso/create',[CursoController::class, 'store']);
Route::get('/curso/list',[CursoController::class, 'index']);
Route::get('/curso/show/{id}',[CursoController::class, 'show']);
Route::put('/curso/edit/{id}',[CursoController::class, 'update']);
Route::delete('/curso/delete/{id}',[CursoController::class, 'destroy']);

Route::post('/matricula/create',[MatriculaController::class, 'store']);
Route::get('/matricula/list',[MatriculaController::class, 'index']);
Route::get('/matricula/show/{id}',[MatriculaController::class, 'show']);
Route::put('/matricula/edit/{id}',[MatriculaController::class, 'update']);
Route::delete('/matricula/delete/{id}',[MatriculaController::class, 'destroy']);