<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Respuestas,Programamntto,controlmnto};
use App\Helpers\HelperTablas;
use Illuminate\Support\Facades\Http;



class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $controlmanto = Programamntto::get()->where('id_sucursal',auth()->user()->id_sucursal);


        $Estado_fecha = (object) [
            'esta_semana'    => $controlmanto->where('Estado_fecha', 'esta semana')->where('Estado_eliminado', 1)->count(),
            'este_mes'  => $controlmanto->where('Estado_fecha', 'este mes')->where('Estado_eliminado', 1)->count(),
            'medio_año'    => $controlmanto->where('Estado_fecha', 'medio año')->where('Estado_eliminado', 1)->count(),
            'este_año'    => $controlmanto->where('Estado_fecha', 'este año')->where('Estado_eliminado', 1)->count(),
            'mas_del_año' => $controlmanto->where('Estado_fecha','mas del año')->where('Estado_eliminado', 1)->count(),
            'vencido' => $controlmanto->where('Estado_fecha', 'vencido')->where('Estado_eliminado', 1)->count()
        ];

        $responzables = Respuestas::SelectRaw('users.name as responsable,COUNT(id_contesto) as totalresponsable')->join('users', 'users.id', '=', 'respuestas.id_contesto')->groupBy('responsable')->where('respuestas.id_sucursal',auth()->user()->id_sucursal)->get();
        $equipos = controlmnto::SelectRaw('equipos.clave as clave,COUNT(controlmnto.id_equipo) as totalchecklist')->join('equipos', 'equipos.id', '=', 'controlmnto.id_equipo')->groupBy('clave')->where('controlmnto.id_sucursal',auth()->user()->id_sucursal)->get();




        return view('dash.index',compact('Estado_fecha','responzables','equipos'));

    }


    public function gant(){
        return view('Ajax.gantt');
    }


public function cron(){

    $equipo = new Programamntto;
    $equipo->cron();
    return "cron ejecutado exitosamente";

}

public function filtro(Request $request){



    $fechaActual = date('Y-m-d');
    $mod_date = strtotime($fechaActual . "-" . 0 . "days");
    $combobox=auth()->user()->combobox;
    $datos_tabla= HelperTablas::tabla_filtro($request->Estado);
    return view('Filtros.home',compact('combobox','datos_tabla','mod_date'));


}


// public function sucursales($id_empresa)
// {

//     $existencia = Sucursal::where('id_empresa', $id_empresa)->where('Estado_eliminado', 1)->count();
//     if ($existencia >= 1) {
//         $sucu = Sucursal::where('id_empresa', $id_empresa)->where('Estado_eliminado', 1)->get();
//         return view('Ajax.sucursales',compact('sucu'));
//     } else {
//         return  " <script>
//                                     Swal.fire(
//                                         'Ups!',
//                                         'Sin registros!',
//                                         'error'
//                                     )
//                                 </script>";
//     }
// }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function tickets()
     {

         $tickets= HTTP::get('https://tickets.sumapp.cloud/api/resources/tickets_pilot');
         $tcs= $tickets->json();
    return view('api.tickets',compact('tcs'));


     }
}
