<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Preguntas;
use App\Models\Checklist;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{


    public function combo_categoria($id_area){

        $categoria=Categorias::
        select('id','nombre')
        ->where('id_area',$id_area)
        ->where('status',1)
        ->get();



        return $categoria;

        }

        public function llenar_tabla_contestar($categoria){


            $pregunta= Preguntas::where('id_checklist',$categoria)->where('status',1) ->get();



            return view ('TablaPreguntas')->with('pregunta',$pregunta);


                      }

                      public function index(){

                        $checklist= Checklist::orderBy('id')->get();


                        $JSON = "SELECT JSON_EXTRACT(descripcion, '$.caracteristicas.clave') AS clave,JSON_EXTRACT(descripcion, '$.caracteristicas.area') AS area,JSON_EXTRACT(descripcion, '$.caracteristicas.categoria') AS categoria,JSON_EXTRACT(descripcion, '$.caracteristicas.nombre') AS nombre,JSON_EXTRACT(descripcion, '$.caracteristicas.SigMnto') AS SigMMTO FROM equipos where JSON_EXTRACT(descripcion, '$.caracteristicas.categoria')= ''";
                        $JSON = DB::select($JSON);

                        return view('FiltroCheck.index')->with('JSON',$JSON)->with('checklist',$checklist);
                      }

                      public function llenar_tabla_filtro($id_checklist){
                        $checklist= Checklist::orderBy('id')->get();

                        $JSON = "SELECT id, JSON_EXTRACT(descripcion, '$.caracteristicas.id_checklist') AS id_checklist ,JSON_EXTRACT(descripcion, '$.caracteristicas.clave') AS clave,JSON_EXTRACT(descripcion, '$.caracteristicas.area') AS area,JSON_EXTRACT(descripcion, '$.caracteristicas.categoria') AS categoria,JSON_EXTRACT(descripcion, '$.caracteristicas.nombre') AS nombre,JSON_EXTRACT(descripcion, '$.caracteristicas.SigMnto') AS SigMMTO FROM equipos where JSON_EXTRACT(descripcion, '$.caracteristicas.id_checklist')= $id_checklist";
                        $JSON = DB::select($JSON);



                        return view('FiltroCheck.index')->with('JSON',$JSON)->with('checklist',$checklist);


                                  }

                                  public function llenar_formulario(){
return "prb";

                                  }




                      public function llenar_tabla_preguntas($id_checklist){
                        $checklist= Checklist::orderBy('id')->get();

                        $pregunta= Preguntas::where('id_checklist',$id_checklist)->where('status',1)->get();



                        return view('Cuestionario.index')->with('pregunta',$pregunta)->with('checklist',$checklist)->with('id_checklist',$id_checklist);


                                  }
}
