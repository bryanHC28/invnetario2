<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\{EquiposController,InventarioController,ReportesController,CategoriasController,RespuestasController,DashController,ChecklistController,AreasController, PreguntasController, SubchecklistController};



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

    Route::resource('/dash',  DashController::class)->names('responder');

});




Route::get('preguntassck',[PreguntasController::class,'preguntassck'])->name('preguntassck');
Route::get('tickets',[DashController::class,'tickets'])->name('tickets');
Route::get('gantt',[DashController ::class,'gant'])->name('gantt');
Route::get('actualizar_status',[ReportesController::class,'actualizar_status'])->name('actualizar_status');
Route::get('actualizar_status_back',[ReportesController::class,'actualizar_status_back'])->name('actualizar_status_back');
Route::get('mostrarrespuestas',[RespuestasController::class,'mostrarrespuestas'])->name('mostrarrespuestas');
Route::get('pdf',[Controller::class,'imprimir'])->name('pdf');
Route::get('filtro', [DashController::class, 'filtro'])->name('filtro');
Route::get('actualizar_status_usuario',[ReportesController::class,'actualizar_status_usuario'])->name('actualizar_status_usuario');
Route::get('actualizar_status_back_usuario',[ReportesController::class,'actualizar_status_back_usuario'])->name('actualizar_status_back_usuario');
Route::get('aceptados', [ReportesController::class, 'aceptado'])->name('aceptados');
Route::get('formularios',[SubchecklistController::class,'llenar_formularioS'])->name('formularios');
Route::get('llenar_categoria/{id_area}',[CategoriasController::class,'combo_categoria']);
Route::get('query/{ch}',[SubchecklistController::class,'query']);
Route::get('longevidad/{ch}',[InventarioController::class,'longevidad']);
Route::get('checkbox/{id}',[SubchecklistController::class,'checkbox']);
Route::get('llenar_area/{id_sucursal}',[AreasController::class,'llenar_area']);
Route::get('llenar_combo_checklist/{id_sucursal}',[ChecklistController::class,'llenar_combo_checklist']);
Route::get('cron',[DashController::class,'cron']);
Route::post('decrementar',[InventarioController::class,'decrementar'])->name('decrementar');
Route::get('delete_longevidad',[InventarioController::class,'delete_longevidad'])->name('delete_longevidad');
Route::get('create_monalisa',[EquiposController::class,'create_monalisa'])->name('create_monalisa');
Route::get('reporte_monalisa',[ReportesController::class,'reporte_monalisa'])->name('reporte_monalisa');
Route::get('categoria_monalisa',[ReportesController::class,'categoria_monalisa'])->name('categoria_monalisa');
Route::get('inicio_reporte_monalisa',[ReportesController::class,'inicio_reporte_monalisa'])->name('inicio_reporte_monalisa');
Route::post('monalisa',[EquiposController::class,'monalisa'])->name('monalisa');
Route::get('pdf_areas_monalisa',[Controller::class,'pdf_areas_monalisa'])->name('pdf_areas_monalisa');

Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

