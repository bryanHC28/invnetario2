<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\tablamaestraController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SubchecklistController;



Route::resource('sucursal', SucursalController::class)->names('sucursal');
Route::resource('areas', AreasController::class)->names('areas');
Route::resource('categoria', CategoriasController::class)->names('categoria');
Route::resource('equipo', EquiposController::class)->names('equipo');
Route::resource('tabla', tablamaestraController::class)->names('tabla');
Route::resource('checklist', ChecklistController::class)->names('checklist');
Route::resource('subchecklist', SubchecklistController::class)->names('subchecklist');
Route::resource('preguntas', PreguntasController::class)->names('preguntas');
Route::resource('vista_checklist', AjaxController::class)->names('vista_checklist');


