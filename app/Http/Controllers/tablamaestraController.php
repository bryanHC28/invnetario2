<?php

namespace App\Http\Controllers;

use App\Models\tablamaestra;
use App\Models\Areas;
use App\Models\Categorias;
use App\Models\Equipos;
use App\Imports\EquiposImport;
use App\Imports\tablaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class tablamaestraController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $JSON = "SELECT id, JSON_EXTRACT(descripcion, '$.caracteristicas.clave') AS clave,JSON_EXTRACT(descripcion, '$.caracteristicas.area') AS area,JSON_EXTRACT(descripcion, '$.caracteristicas.categoria') AS categoria,JSON_EXTRACT(descripcion, '$.caracteristicas.nombre') AS nombre,JSON_EXTRACT(descripcion, '$.caracteristicas.SigMnto') AS SigMMTO FROM equipos where status = 1";
        $JSON = DB::select($JSON);


   return view('products.import-excel')->with('JSON',$JSON);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $JSON = "SELECT JSON_EXTRACT(descripcion, '$.caracteristicas.clave') AS clave,JSON_EXTRACT(descripcion, '$.caracteristicas.area') AS area,JSON_EXTRACT(descripcion, '$.caracteristicas.categoria') AS categoria,JSON_EXTRACT(descripcion, '$.caracteristicas.nombre') AS nombre,JSON_EXTRACT(descripcion, '$.caracteristicas.SigMnto') AS SigMMTO FROM equipos";
        $JSON = DB::select($JSON);
        $file = $request->file('import_file');

        Excel::import(new tablaImport, $file);

       $this->areas();
       return $this->index();
    }


    public function areas(){

        $area = "SELECT (Area) AS area FROM tablamaestra
        GROUP BY area
        ORDER BY area ASC;
        ";
          $area = DB::select($area);
          foreach ($area as $item) {
            $datos = Areas::where('nombre', $item->area)->first();
            if (empty($datos)) {
                Areas::create([
                    'id_sucursal' => 1,
                    'nombre' => $item->area,
                    'status' => 1
                                ]);
            } else {

                $datos->save();
            }
        }



        $categoria =  "SELECT a.id AS id_area, t.Categoria AS categoria from tablamaestra t JOIN areas a on (t.Area=a.nombre) GROUP BY categoria,id ORDER BY id";
        $categoria = DB::select($categoria);
        foreach ($categoria as $item) {
            $datos2 = Categorias::where('id_area', $item->id_area)->where('nombre', $item->categoria)->first();
            if (empty($datos2)) {
                Categorias::create([
                    'id_area' => $item->id_area ,
                    'nombre' => $item->categoria,
                    'status' => 1
                                ]);
            } else {

                $datos2->save();
            }
        }


        $equipos =  "SELECT tm.Equipo AS Clave, tm.SigMnto AS fecha, (SELECT id FROM categorias WHERE tm.Categoria = nombre AND id_area = ar.id) AS id_categoria,(SELECT nombre FROM categorias WHERE tm.Categoria = nombre AND id_area = ar.id) AS categoria, tm.Nombre AS Nombre,tm.Area As area FROM tablamaestra tm JOIN areas ar ON ar.nombre = tm.Area";
        $equipos = DB::select($equipos);


        foreach ($equipos as $item) {
            $datos3 = Equipos::where('id_categoria', $item->id_categoria)->where('clave', $item->Clave)->first();

            if (empty($datos3)) {
                $data=['caracteristicas'=>['area'=>$item->area,'categoria'=>$item->categoria,'clave'=> $item->Clave,'nombre'=>$item->Nombre,'SigMnto'=>$item->fecha,'id_checklist'=>null]];
                $prb=response()->json($data,200)->getContent();
                Equipos::create([
                    'id_categoria' => $item->id_categoria,
                    'clave' => $item->Clave,
                    'descripcion' => $prb,
                    'SigMMTO' => $item->fecha,
                    'status' => 1
                                ]);
            } else {

                $datos3->save();
            }
            tablamaestra::query()->delete();

        }




return $equipos;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
