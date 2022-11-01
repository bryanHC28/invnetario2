<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});



Route::get('llenar_categoria/{id_area}',[AjaxController::class,'combo_categoria']);
Route::get('llenar_tabla/{categoria}',[AjaxController::class,'llenar_tabla_contestar']);
Route::get('llenar_filtro/{categoria}',[AjaxController::class,'llenar_tabla_filtro']);
Route::get('formulario/{id_formulario}',[AjaxController::class,'llenar_formulario']);
Route::get('llenar_preguntas/{categoria}',[AjaxController::class,'llenar_tabla_preguntas']);
