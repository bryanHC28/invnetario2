<?php

namespace App\Http\Controllers;

use App\Models\{tablamaestra,Equipos,Areas,categoriaequipos,inventario,control_longevidad};
use App\Imports\{tablaImport,EquiposImport};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use session;
use App\Helpers\HelperTablas;
class tablamaestraController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   $JSON= HelperTablas::tabla_asignar_cuestionario();
   return view('products.import-excel')->with('JSON',$JSON);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file = $request->file('import_file');
        Excel::import(new tablaImport, $file);
        $this->relacion_pilot();
        return $this->index();

    }


    public function relacion_pilot(){

        $empresa = auth()->user()->id_empresa;
        $sucursal = auth()->user()->id_sucursal;

        $area = "SELECT (Area) AS area FROM tablamaestra
        GROUP BY area
        ORDER BY area ASC;
        ";
          $area = DB::select($area);
          foreach ($area as $item) {
            $datos = Areas::where('nombre', $item->area)->first();
            if (empty($datos)) {
                Areas::create([

                    'nombre' => $item->area,
                    'Estado_eliminado' => 1,
                    'id_sucursal' => $sucursal
                                ]);
            } else {

                $datos->save();
            }
        }



        $categoria =  "SELECT a.id AS id_area, t.Categoria AS categoria from tablamaestra t JOIN areas a on (t.Area=a.nombre) GROUP BY categoria,id ORDER BY id";
        $categoria = DB::select($categoria);
        foreach ($categoria as $item) {
            $datos2 = categoriaequipos::where('id_area', $item->id_area)->where('nombre', $item->categoria)->first();
            if (empty($datos2)) {
                categoriaequipos::create([


                    'id_area' => $item->id_area,
                    'nombre' => $item->categoria,
                    'id_sucursal' => $sucursal,
                    'Estado_eliminado' => 1,


                                ]);
            } else {

                $datos2->save();
            }
        }


        $equipos =  "SELECT tm.Equipo AS Clave, tm.SigMnto AS fecha, (SELECT id FROM categoriaequipos WHERE tm.Categoria = nombre AND id_area = ar.id) AS id_categoria,(SELECT id FROM areas WHERE tm.Area = nombre) AS id_area,(SELECT nombre FROM categoriaequipos WHERE tm.Categoria = nombre AND id_area = ar.id) AS categoria, tm.Nombre AS Nombre,tm.Area As area, tm.Id_checklist AS id_checklist FROM tablamaestra tm JOIN areas ar ON ar.nombre = tm.Area";
        $equipos = DB::select($equipos);


        foreach ($equipos as $item) {
            $datos3 = Equipos::where('id_categoriaequipos', $item->id_categoria)->where('clave', $item->Clave)->first();
            if (empty($datos3)) {



                $data=['caracteristicas'=>['area'=>$item->area,'categoria'=>$item->categoria,'clave'=> $item->Clave,'nombre'=>$item->Nombre,'id_empresa'=>$empresa,'id_sucursal'=>$sucursal]];
                $prb=response()->json($data,200)->getContent();
                $get_id = Equipos::create([
                    'id_categoriaequipos' => $item->id_categoria,
                    'nombre_equipo'=>$item->Nombre,
                    'clave' => $item->Clave,
                    'id_area' => $item->id_area,
                    'descripcion' => $prb,
                    'id_sucursal' => $sucursal,
                    'Estado_eliminado' => 1,

                                ]);



                    inventario::create([
                    'id_equipo'=>$get_id->id,
                    'stock'=> 0,
                    'Estado_eliminado'=> 1,
                    'id_sucursal' => $sucursal,
                    ]);



        }else{

            $datos3->save();

        }
        tablamaestra::query()->delete();

    }



    }

    public function excel_monalisa(Request $request){






    $file = $request->file('import_file');
    Excel::import(new EquiposImport, $file);
    $this->relacion_monalisa();
    return redirect('/inventario');



    }


    public function relacion_monalisa(){


        $area = "SELECT (Area) AS area FROM tablamaestra
        GROUP BY area
        ORDER BY area ASC;
        ";
          $area = DB::select($area);
          foreach ($area as $item) {
            $datos = Areas::where('nombre', $item->area)->first();
            if (empty($datos)) {
                Areas::create([

                    'nombre' => $item->area,
                    'Estado_eliminado' => 1,
                    'id_sucursal' => auth()->user()->id_sucursal
                                ]);
            } else {

                $datos->save();
            }
        }

        $categoria =  "SELECT Categoria AS categoria from tablamaestra GROUP BY categoria  ORDER BY 1";
        $categoria = DB::select($categoria);
        foreach ($categoria as $item) {
            $datos2 = categoriaequipos::where('nombre', $item->categoria)->first();
            if (empty($datos2)) {
                categoriaequipos::create([


                    'nombre' => $item->categoria,
                    'id_sucursal' => auth()->user()->id_sucursal,
                    'Estado_eliminado' => 1,


                                ]);
            } else {

                $datos2->save();
            }
        }


        $equipos =  " SELECT tm.Modelo as modelo, tm.clave AS Clave, (SELECT id FROM categoriaequipos WHERE tm.Categoria = nombre) AS id_categoria,(SELECT id FROM areas WHERE tm.Area = nombre) AS id_area, tm.Equipo AS Equipo FROM tablamaestra tm JOIN areas ar ON ar.nombre = tm.Area;";
        $equipos = DB::select($equipos);


        foreach ($equipos as $item) {
            $datos3 = Equipos::where('id_area',$item-> id_area)->where('modelo', $item->modelo)->where('nombre_equipo', $item->Equipo)->first();
            if (empty($datos3)) {



                $data=['caracteristicas'=>['id_area'=>$item->id_area,'id_categoria'=>$item->id_categoria,'modelo'=>$item->modelo,'clave'=> $item->Clave,'nombre'=>$item->Equipo,'id_empresa'=>auth()->user()->id_empresa,'id_sucursal'=>auth()->user()->id_sucursal]];
                $prb=response()->json($data,200)->getContent();
                $get_id = Equipos::create([
                    'id_categoriaequipos' => $item->id_categoria,
                    'nombre_equipo'=>$item->Equipo,
                    'clave' => $item->Clave,
                    'id_area' => $item->id_area,
                    'descripcion' => $prb,
                    'id_sucursal' => auth()->user()->id_sucursal,
                    'modelo'=>$item->modelo,
                    'Estado_eliminado' => 1,

                                ]);



                    inventario::create([
                    'id_equipo'=>$get_id->id,
                    'stock'=> 0,
                    'Estado_eliminado'=> 1,
                    'id_sucursal' => auth()->user()->id_sucursal,
                    ]);



        }else{

            $datos3->save();

        }


    }




    $query= Equipos::select('equipos.id','nombre_equipo','modelo','areas.nombre as areas')->join('areas', 'areas.id', '=', 'equipos.id_area')->where('equipos.id_sucursal',2)->get();
        foreach( $query as $tbm){
         $tb=tablamaestra::SelectRaw('COUNT(Equipo) as equipo')->where('Equipo',$tbm->nombre_equipo)->where('Modelo',$tbm->modelo)->where('Area',$tbm->areas)->get();
         inventario::where(['id_equipo' => $tbm->id])
         ->update(['stock' => $tb[0]->equipo]);

        }


        $longevidad="select (select id from equipos where equipos.nombre_equipo = tablamaestra.Equipo
        and equipos.modelo = tablamaestra.Modelo
        and (SELECT nombre FROM areas WHERE equipos.id_area=id)=Area) as id
        from tablamaestra;";
        $longevidad = DB::select($longevidad);

        foreach( $longevidad as $items){

            control_longevidad::create([

                'id_equipo'=> $items->id,
                'id_sucursal'=> auth()->user()->id_sucursal,
                'Estado_eliminado'=>1

            ]);

        }



        tablamaestra::query()->delete();
    }

}
