<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AreasController,CategoriasController,EquiposController,
    tablamaestraController,ChecklistController,PreguntasController,RespuestasController,
    SubchecklistController,FechasController,ResponderController,CorreoController,
    ReportesController,InventarioController};




Route::resource('areas', AreasController::class)->names('areas');
Route::resource('categoria', CategoriasController::class)->names('categoria');
Route::resource('equipo', EquiposController::class)->names('equipo');
Route::resource('tabla', tablamaestraController::class)->names('tabla');
Route::resource('checklist', ChecklistController::class)->names('checklist');
Route::resource('subchecklist', SubchecklistController::class)->names('subchecklist');
Route::resource('preguntas', PreguntasController::class)->names('preguntas');
Route::resource('respuestas', RespuestasController::class)->names('respuestas');
Route::resource('fecha', FechasController::class)->names('fecha');
Route::resource('responder', ResponderController::class)->names('responder');
Route::resource('correo', CorreoController::class)->names('correo');
Route::resource('reportes', ReportesController::class)->names('reportes');
Route::resource('inventario', InventarioController::class)->names('inventario');
Route::match(['GET', 'POST','PUT'],'excel_monalisa', [tablamaestraController::class, 'excel_monalisa'])->name('excel_monalisa');

