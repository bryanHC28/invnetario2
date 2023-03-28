<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Reporte,control_longevidad,Areas, categoriaequipos};
use App\Helpers\HelperReportes;
use Illuminate\Support\Facades\DB;
class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        $tabla_reportes=HelperReportes::tabla_reportes();
        return view('reportes.index',compact('tabla_reportes'));
    }


    public function aceptado(){

            $tabla_aceptados=HelperReportes::tabla_aceptados();
            return view('reportes.aceptado',compact('tabla_aceptados'));


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Reporte::find($id);
        $post->delete();
        return redirect('aceptados');
    }


    public function actualizar_status_usuario(Request $request){

        Reporte::where(['id' => $request->id])
        ->update(['estatus_cliente' => 'ACEPTADO']);
        return redirect('reportes');
    }
    public function actualizar_status_back_usuario(Request $request){


        Reporte::where(['id' => $request->id])
        ->update(['estatus_cliente' => 'EN REVISION']);
        return redirect('reportes');
    }



    public function actualizar_status(Request $request){

        Reporte::where(['id_respuesta' => $request->id])
         ->update(['estatus_supervisor' => 'ACEPTADO']);
        return redirect('respuestas');

    }
    public function actualizar_status_back(Request $request){

        Reporte::where(['id_respuesta' => $request->id])
         ->update(['estatus_supervisor' => 'EN REVISION']);
        return redirect('respuestas');
    }


public function inicio_reporte_monalisa(){
    $totalCost = control_longevidad::join('longevidad', 'longevidad.id', '=', 'control_longevidad.id_longevidad')
                ->where('control_longevidad.id_sucursal', '=', 2)
                ->sum('longevidad.costo_unitario');

   $areas= Areas::where('id_sucursal', auth()->user()->id_sucursal)->where('Estado_eliminado', 1)->count();
   $categorias= categoriaequipos::where('id_sucursal', auth()->user()->id_sucursal)->where('Estado_eliminado', 1)->count();
   $total_areas=HelperReportes::reporte_areas_monalisa();


    return view('reportes.monalisa',compact('areas','categorias','totalCost','total_areas'));
}




    public function reporte_monalisa(){
        $total_areas=HelperReportes::reporte_areas_monalisa();
        return view('reportes.areas',compact('total_areas'));


    }

    public function categoria_monalisa(){
        $total_categorias= HelperReportes::reporte_categorias_monalisa();
        return view('reportes.categorias',compact('total_categorias'));

    }

}
