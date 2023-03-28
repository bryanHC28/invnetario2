<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\{Areas,Equipos,control_longevidad,entradas,longevidad,categoriachecklist,Checklist,Programamntto,ganttpilot,Sucursal,controlmnto, inventario};
use Illuminate\Support\Facades\DB;


class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $sucursales=Sucursal::where('id_empresa',auth()->user()->id_empresa)->get();
        return view('Equipos.create',compact('sucursales'));
    }

    public function create_monalisa(){

        $sucursales=Sucursal::where('id_empresa',auth()->user()->id_empresa)->get();
        $categoria_equipos= auth()->user()->combocategorias;
        $combo_areas= auth()->user()->comboareas;
        return view('Equipos.create_monalisa',compact('sucursales','combo_areas','categoria_equipos'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $sucursales=Sucursal::where('id_empresa',auth()->user()->id_empresa)->get();

        $checklist = categoriachecklist::orderBy('id')
        ->where('id_sucursal', auth()->user()->id_sucursal)
        ->get();
        $area = Areas::orderBy('id')
        ->where('id_sucursal',auth()->user()->id_sucursal)
        ->get();
        return view('Equipos.create',compact('area','checklist','sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id_check = (int) $request->input('id_checklist');
        $var = $request->opc;
        DB::beginTransaction();
        try {

            $json = ['idarea' => $request->input('id_area'),'idcategoria' => $request->input('id_categoria'), 'clave' => $request->input('clave'), 'nombre' => $request->input('nombre'), 'id_empresa'=>auth()->user()->id_empresa,'id_sucursal'=>auth()->user()->id_sucursal];
            $data = ['caracteristicas' => $json];
            $prb = response()->json($data, 200)->getContent();

           $equipo= Equipos::create([
                'id_categoriaequipos'=> $request->id_categoria,
                'id_area'=> $request->id_area,
                'id_sucursal'=> auth()->user()->id_sucursal,
                'clave' => $request->clave,
                'descripcion'=>$prb,
                'nombre_equipo'=>$request->nombre,
                'Estado_eliminado' => 1

            ]);

        DB::commit();

    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash')->with('error', 'ok');
    }

    $get_id_equipo=$equipo->id;


        if (is_countable($var) &&  count($var) >= 1) {

            for ($i = 0; $i < count($var); $i++) {



                    $name_sbck = Checklist::select('nombre')->where('id', $request->opc[$i])->where('id_categoriachecklist', $id_check)->get();
                    $name_sbck[0]->nombre;



                     $mantto = Programamntto::create([
                        'periodicidad'=>$request->periodicidad,
                        'ultima_fecha'=>$request->fecha,
                        'proxima_fecha'=>  $this->fecha($request->fecha,$request->periodicidad),
                        'id_sucursal'=>auth()->user()->id_sucursal,
                        'Estado_eliminado' => 1
                     ]);


                     $get_id=$mantto->id;


                     controlmnto::create([

                        'id_equipo'=>$get_id_equipo,
                        'id_programanto'=>$get_id,
                        'id_checklist'=> $request->opc[$i],
                        'id_sucursal'=>auth()->user()->id_sucursal,
                        'Estado_eliminado'=>1
                    ]);

                     ganttpilot::create([

                        'id'=>$get_id,
                        'text'=>$request->input('clave').' '.$name_sbck[0]->nombre,
                        'duration'=> 1,
                        'progress'=>1.0,
                        'start_date'=>$this->fecha($request->fecha,$request->periodicidad),
                        'parent'=>0
                    ]);

                    inventario::create([
                        'id_equipo'=> $equipo->id,
                        'stock'=> $request->cantidad ?? 1,
                        'id_sucursal'=> auth()->user()->id_sucursal,
                        'Estado_eliminado' => 1

                    ]);
                    DB::commit();




            }

    }

        $cron = new Programamntto;
        $cron->cron();


        return redirect('/equipo')->with('crear', 'ok');



        }
        public function monalisa(Request $request)
        {

            DB::beginTransaction();
            try {

                $json = ['idarea' => $request->input('id_area'),'modelo' => $request->input('modelo'),'idcategoria' => $request->input('id_categoria'), 'clave' => $request->input('clave'), 'nombre' => $request->input('nombre'), 'id_empresa'=>auth()->user()->id_empresa,'id_sucursal'=>auth()->user()->id_sucursal];
                $data = ['caracteristicas' => $json];
                $prb = response()->json($data, 200)->getContent();

               $equipo= Equipos::create([
                    'id_categoriaequipos'=> $request->id_categoria,
                    'id_area'=> $request->id_area,
                    'id_sucursal'=> auth()->user()->id_sucursal,
                    'clave' => $request->clave,
                    'descripcion'=>$prb,
                    'nombre_equipo'=>$request->nombre,
                    'modelo'=>$request->modelo,
                    'Estado_eliminado' => 1

                ]);


                   $inventario=  inventario::create([
                    'id_equipo'=> $equipo->id,
                    'stock'=> $request->cantidad,
                    'id_sucursal'=> auth()->user()->id_sucursal,
                    'Estado_eliminado' => 1

                ]);


            entradas::create([
            'id_inventario'=> $inventario->id,
            'cantidad'=>$request->cantidad,
            'id_usuario'=>auth()->user()->id,
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado'=>1
        ]);


        $longevidad=  longevidad::create([

            'fecha_ingreso'=>$request->fecha_ingreso,
            'fecha_vencimiento'=>$request->fecha_vencimiento,
            'costo_unitario'=>$request->costo,
            'Estado_eliminado' => 1
        ]);

        for($i=0; $i<$request->cantidad; $i++){

        control_longevidad::create([

            'id_equipo'=>$equipo->id,
            'id_longevidad'=>$longevidad->id,
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado' => 1
        ]);
    }
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/dash')->with('error', 'ok');
        }

        return redirect('/create_monalisa')->with('crear', 'ok');

        }

        public function fecha($fecha_dada,$prediodicidad){


            $date = date($fecha_dada);
            //Incrementando n dias
               $mod_date = strtotime($date."+". $prediodicidad ."days");
             return  date(" Y-m-d",$mod_date);






        }

        public function edit($id)
        {


            $Nchecklist = categoriachecklist::orderBy('id')
            ->where('categoriachecklist.id_sucursal', auth()->user()->id_sucursal)
            ->get();
            $equipo = Equipos::find($id);
            return view('Equipos.edit', compact('equipo', 'Nchecklist'));
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


        $id_check = (int) $request->input('id_checklist');
        $var = $request->opc;
        if (is_countable($var) &&  count($var) >= 1) {
            for ($i = 0; $i < count($var); $i++) {


                $name_sbck = Checklist::select('nombre')->where('id', $request->opc[$i])->where('id_categoriachecklist', $id_check)->get();
                $name_sbck[0]->nombre;

                DB::beginTransaction();
                try {

                 $mantto = Programamntto::create([
                    'periodicidad'=>$request->periodicidad,
                    'ultima_fecha'=>$request->SigMMTO,
                    'id_sucursal'=>auth()->user()->id_sucursal,
                    'proxima_fecha'=>  $this->fecha($request->SigMMTO,$request->periodicidad),
                    'Estado_eliminado' => 1
                 ]);


                 $get_id=$mantto->id;


                 controlmnto::create([

                    'id_equipo'=>$request->input('id_equipo'),
                    'id_programanto'=>$get_id,
                    'id_checklist'=> $request->opc[$i],
                    'id_sucursal'=>auth()->user()->id_sucursal,
                    'Estado_eliminado'=>1
                ]);

                 ganttpilot::create([

                    'id'=>$get_id,
                    'text'=>$request->input('clave').' '.$name_sbck[0]->nombre,
                    'duration'=> 1,
                    'progress'=>1.0,
                    'start_date'=>$this->fecha($request->SigMMTO,$request->periodicidad),
                    'parent'=>0
                ]);

                DB::commit();

            } catch (\Exception $e) {
                DB::rollback();
                return redirect('/dash')->with('error', 'ok');
            }



            }

    }

        $cron = new Programamntto;
        $cron->cron();

 return redirect('/tabla')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        $task =  ganttpilot::find($id);
        $task->delete();


        $equipo = Equipos::find($id);
        $progra =  new Programamntto;

        $equipo->Estado_eliminado = 0;
        $equipo->Estado_fecha = 'eliminado';
        $equipo->SigMMTO = 'null';
//______________________________________________________________________
        $check = Equipos::selectRaw("JSON_EXTRACT(descripcion, '$.caracteristicas.id_categoriachecklist') AS id_checklist")
        ->where('id', $id)
        ->get();

        $subcheck = Equipos::selectRaw("JSON_EXTRACT(descripcion, '$.caracteristicas.id_checklist') AS id_subchecklist")
        ->where('id', $id)
        ->get();

        $JSON_subcheck = json_decode($subcheck[0]->id_subchecklist);
        $JSON_check = json_decode($check[0]->id_checklist);
//______________________________________________________________________
$progra->where(['id_equipo' => $id,'id_categoriachecklist' => $JSON_check,'id_checklist' => $JSON_subcheck])
->update(['Estado_eliminado' => 0 ]);







        $equipo->save();
        return redirect('/responder')->with('eliminar', 'ok');
    }




}
