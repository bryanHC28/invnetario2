<?php
namespace App\Helpers;
use App\Models\{Equipos,Respuestas,controlmnto, entradas,salidas, Programamntto,inventario};
use Illuminate\Support\Facades\DB;
class HelperTablas{






public static function tabla_responder(){

    return  controlmnto::where('Estado_eliminado', '=', 1)
    ->where('id_sucursal', '=',  auth()->user()->id_sucursal)
    ->get();



}


public static function tabla_resumen(){


    return Respuestas::where('Estado_eliminado', '=', 1)
    ->where('id_sucursal', '=', auth()->user()->id_sucursal)
    ->get();



}


public static function tabla_filtro($estado){
    return  Programamntto::where('Estado_fecha', '=', $estado)
    ->where('Estado_eliminado', '=', 1)
    ->where('id_sucursal', '=',  auth()->user()->id_sucursal)
    ->get();

}


public static function tabla_asignar_cuestionario(){



    return Equipos::where('Estado_eliminado',1)
    ->where('id_sucursal', '=',  auth()->user()->id_sucursal)
    ->get();




}


public static function tabla_fecha(){


    return controlmnto::where('Estado_eliminado',1)
    ->where('id_sucursal', '=',  auth()->user()->id_sucursal)
    ->get();




}

public static function tabla_inventario(){


    return inventario::where('Estado_eliminado',1)
    ->where('id_sucursal', '=',  auth()->user()->id_sucursal)
    ->get();




}

public static function entradas(){


    return entradas::where('Estado_eliminado',1)

    ->get();




}
public static function salidas(){


    return salidas::where('Estado_eliminado',1)

    ->get();




}




}

