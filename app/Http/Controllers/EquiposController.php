<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use Illuminate\Support\Facades\DB;
use App\Models\Equipos;
use App\Models\Checklist;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist= Checklist::orderBy('id')->get();
        $area=Areas::orderBy('id')->get();
        return view('Equipos.create')->with('area',$area)->with('checklist',$checklist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checklist= Checklist::orderBy('id')->get();
        $area=Areas::orderBy('id')->get();
        return view('Equipos.create')->with('area',$area)->with('checklist',$checklist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $equipo= new Equipos;
        $id_check= (int) $request->input('id_checklist');

        $json=['area'=>$request->input('id_area'),'categoria'=>$request->input('id_categoria'),'clave'=>$request->input('clave'),'nombre'=>$request->input('nombre'),'SigMnto'=>$request->input('fecha'),'id_checklist'=>$id_check ];
        //$data=['detalle'=>$json];
        //$prb=response()->json($data,200,[1]);
        $data=['caracteristicas'=>$json];
        $prb=response()->json($data,200)->getContent();
        $equipo->status=$request->input('status');
        $equipo->clave=$request->input('clave');
        $equipo->descripcion=$prb;
        $equipo->SigMMTO=$request->input('fecha');
        $equipo->id_categoria=$request->input('id_categoria');
        $equipo->save();

        //$tipo_pregunta=$request->input('tipo_pregunta');
        //$nombre_pregunta=$request->input('nombre_pregunta');

        return redirect('/equipo')->with('crear','ok');;



        $datos= $request->all();
        Equipos::create($datos);
        return redirect('/dash');
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

        $Nchecklist= Checklist::orderBy('id')->get();
        $equipo = Equipos::find($id);
        $area=Areas::orderBy('id')->get();
        $JSON = json_decode($equipo->descripcion);

        $CLAVE=$JSON->caracteristicas->clave;
        $NOMBRE=$JSON->caracteristicas->nombre;
        $AREA=$JSON->caracteristicas->area;
        $CATEGORIA=$JSON->caracteristicas->categoria;
        $FECHA=$JSON->caracteristicas->SigMnto;
        $check=$JSON->caracteristicas->id_checklist;


        return view('Equipos.edit', compact('CLAVE','NOMBRE','AREA','CATEGORIA','FECHA','area','equipo','check','Nchecklist'));


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





        // $equipo= new Equipos;


        // $json=['area'=>$request->input('id_area'),'categoria'=>$request->input('id_categoria'),'clave'=>$request->input('clave'),'nombre'=>$request->input('nombre'),'SigMnto'=>$request->input('fecha')];
        // //$data=['detalle'=>$json];
        // //$prb=response()->json($data,200,[1]);
        // $data=['caracteristicas'=>$json];
        // $prb=response()->json($data,200)->getContent();
        // $equipo->status= 1;
        // $equipo->clave=$request->input('clave');
        // $equipo->descripcion=$prb;
        // $equipo->SigMMTO=$request->input('fecha');
        // $equipo->id_categoria=$request->input('id_categoria');
        $nombre=$request->input('nombre');
        $clave=$request->input('clave');
        $fecha=$request->input('SigMMTO');
        $checklist=$request->input('id_checklist');

        $datos = $request->all();
        $equipo = Equipos::find($id);
        $equipo->update($datos);
        $pdte="UPDATE equipos SET descripcion = JSON_REPLACE(descripcion, '$.caracteristicas.nombre', '$nombre')
        WHERE id = $id";
        $cla="UPDATE equipos SET descripcion = JSON_REPLACE(descripcion, '$.caracteristicas.clave', '$clave')
        WHERE id = $id";
        $fecha="UPDATE equipos SET descripcion = JSON_REPLACE(descripcion, '$.caracteristicas.SigMnto', $fecha)
        WHERE id = $id";

        $check="UPDATE equipos SET descripcion = JSON_REPLACE(descripcion, '$.caracteristicas.id_checklist', $checklist)
        WHERE id = $id";

       DB::update($pdte);
       DB::update($cla);
       DB::update($fecha);
       DB::update($check);
        return redirect('/tabla')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipos::find($id);
        $equipo->status = 0;
        $equipo->save();
        return redirect('/tabla')->with('eliminar','ok');
    }
}
