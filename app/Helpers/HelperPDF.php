<?php
namespace App\Helpers;
use App\Models\{Respuestas,Reporte,control_longevidad};
use Illuminate\Support\Facades\DB;
class HelperPDF{



public static function imprimir($id){





        $info=Respuestas::where('id',$id)->get();
        $data = Respuestas::select(DB::raw("JSON_EXTRACT(respuestas, '$.answers.*') as resp"),DB::raw("JSON_EXTRACT(columnas, '$.columns.*') as col"),DB::raw("JSON_EXTRACT(comentarios, '$.coment.*') as com"),DB::raw("JSON_EXTRACT(fotos, '$.photo.*') as fot"),DB::raw("JSON_EXTRACT(columnas_fotos, '$.col_photo.*') as com_fot"))
        ->where('id', $id)
        ->get();
        $JSON = json_decode($data[0]->resp);
        $LABEL = json_decode($data[0]->col);
        $limite=count($JSON);
        $PICTURE= json_decode($data[0]->fot);
        $COMENTARIO =  json_decode($data[0]->com);
        $preguntas_foto= json_decode($data[0]->com_fot);
        if (empty($PICTURE))
        $limite_foto = 0;
        else
        $limite_foto=count($PICTURE);
        $pdf= \PDF::loadView('PDF.answer',compact('info','JSON','LABEL','limite','PICTURE','COMENTARIO','preguntas_foto','limite_foto'));




        return $pdf->download('reporte.pdf');




    }




public static function imprimir_area($id)
{

    $fechaActual = date('Y-m-d');

    $control_areas=control_longevidad::join('equipos', 'equipos.id', '=', 'control_longevidad.id_equipo')
    ->join('areas', 'areas.id', '=', 'equipos.id_area')
    ->join('longevidad', 'control_longevidad.id_longevidad', '=', 'longevidad.id')
    ->select('equipos.nombre_equipo', 'areas.nombre as area', 'equipos.id_area as id_area', 'longevidad.costo_unitario')
    ->where('areas.id', '=', $id)
    ->get();





     control_longevidad::join('equipos', 'equipos.id', '=', 'control_longevidad.id_equipo')
    ->join('longevidad', 'longevidad.id', '=', 'control_longevidad.id_longevidad')
    ->join('areas', 'areas.id', '=', 'equipos.id_area')
    ->select('areas.id as id_area', DB::raw('SUM(longevidad.costo_unitario) as Total'))
    ->where('areas.id', $id)
    ->groupBy('areas.id')
    ->get();

    $pdf= \PDF::loadView('PDF.monalisa_areas',compact('control_areas','fechaActual'));
    return $pdf->download('reporte.pdf');



}


}

