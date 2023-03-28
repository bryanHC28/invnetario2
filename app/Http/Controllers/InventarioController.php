<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HelperTablas;
use App\Models\{inventario,entradas,salidas,control_longevidad, longevidad};
use Illuminate\Support\Facades\DB;
class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

   $entradas=HelperTablas::entradas();
   $salidas=HelperTablas::salidas();
   $combo_areas= auth()->user()->comboareas;
   $combo_categorias= auth()->user()->combocategorias;
   $inventarios= HelperTablas::tabla_inventario();
   return view('Inventario.index',compact('combo_areas','inventarios','combo_categorias','entradas','salidas'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
        inventario::where('id',$id)
        ->increment('stock',$request->cantidad);

        entradas::create([
            'id_inventario'=> $id,
            'cantidad'=>$request->cantidad,
            'id_usuario'=>auth()->user()->id,
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado'=>1
        ]);
      $longevidad=  longevidad::create([
            'fecha_ingreso'=> $request->fecha_ingreso,
            'fecha_vencimiento'=>$request->fecha_vencimiento,
            'costo_unitario'=> $request->costo_unitario,
            'Estado_eliminado'=>1
        ]);


        for($i=0; $i<$request->cantidad; $i++){

        control_longevidad::create([

            'id_equipo'=>$request->id_equipo,
            'id_longevidad'=> $longevidad->id,
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado'=>1
        ]);

    }

        DB::commit();
        return redirect('/inventario')->with('incrementar', 'ok');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect('/dash')->with('error', 'ok');
    }



    }




    public function delete_longevidad(Request $request)
    {

        DB::beginTransaction();
        try {

        control_longevidad::where(['id' => $request->id])
        ->update(['Estado_eliminado' => 0]);


        inventario::where('id',$request->id_equipo)
        ->decrement('stock',1);


            salidas::create([
            'id_inventario'=> $request->id_equipo,
            'cantidad'=>1,
            'id_usuario'=>auth()->user()->id,
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado'=>1
        ]);


        DB::commit();
        return redirect('/inventario')->with('decrementar', 'ok');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect('/dash')->with('error', 'ok');
    }

        return redirect('/inventario')->with('decrementar', 'ok');


    }



    public function longevidad($ch)
    {


        $fechaActual = date('Y-m-d');
        $mod_date = strtotime($fechaActual . "-" . 0 . "days");
        $control_longevidad = control_longevidad::where('id_equipo', $ch)
        ->where('Estado_eliminado', 1)
        ->get();
        return view('Ajax.longevidad',compact('control_longevidad','mod_date'));

    }
}
