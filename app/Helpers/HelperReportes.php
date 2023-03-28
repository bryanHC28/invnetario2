<?php

namespace App\Helpers;

use App\Models\{Respuestas, Reporte,control_longevidad};
use Illuminate\Support\Facades\DB;
class HelperReportes
{



    public static function tabla_reportes()
    {

        return Reporte::where('Estado_eliminado', 1)
            ->where('id_sucursal', auth()->user()->id_sucursal)
            ->where('id_usuario_receptor', auth()->user()->id)
            ->get();
    }


    public static function tabla_aceptados()
    {


        if (auth()->user()->tipo_cuenta === 'Administrador') {


            $reportes = Reporte::where('id_sucursal', auth()->user()->id_sucursal)
                ->where('Estado_eliminado', 1)
                ->get();
        } else {

            $reportes = Reporte::where('id_sucursal', auth()->user()->id_sucursal)
            ->where('id_usuario_emisor', auth()->user()->id)
            ->where('Estado_eliminado', 1)
            ->get();


        }

        return $reportes;
    }



    public static function reporte_areas_monalisa(){

        return control_longevidad::join('equipos', 'equipos.id', '=', 'control_longevidad.id_equipo')
        ->join('longevidad', 'longevidad.id', '=', 'control_longevidad.id_longevidad')
        ->join('areas', 'areas.id', '=', 'equipos.id_area')
        ->join('sucursal', 'sucursal.id', '=', 'areas.id_sucursal')
        ->select('sucursal.nombre_sucursal','areas.id as id_area', 'areas.nombre', DB::raw('SUM(longevidad.costo_unitario) as Total'))
        ->where('control_longevidad.Estado_eliminado','=',1)
        ->groupBy('areas.nombre','sucursal.nombre_sucursal','areas.id')
        ->get();

    }


    public static function reporte_categorias_monalisa(){

        return control_longevidad::join('equipos', 'equipos.id', '=', 'control_longevidad.id_equipo')
        ->join('longevidad', 'longevidad.id', '=', 'control_longevidad.id_longevidad')
        ->join('categoriaequipos', 'categoriaequipos.id', '=', 'equipos.id_categoriaequipos')
        ->join('sucursal', 'sucursal.id', '=', 'categoriaequipos.id_sucursal')
        ->select('sucursal.nombre_sucursal','categoriaequipos.id as id_categoriaequipos', 'categoriaequipos.nombre',DB::raw('SUM(longevidad.costo_unitario) as Total'))
        ->groupBy('categoriaequipos.id','categoriaequipos.nombre','sucursal.nombre_sucursal')
        ->get();


    }

}
