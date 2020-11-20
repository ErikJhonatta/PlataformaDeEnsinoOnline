<?php

use App\Http\Controllers\AlunoController;
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
Route::put('/aluno/edit/{id}',[AlunoController::class, 'update']);
Route::delete('/aluno/delete/{id}',[AlunoController::class, 'destroy']);