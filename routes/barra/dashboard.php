<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SucursalController;



Route::resource('sucursal', SucursalController::class)->names('sucursales');
