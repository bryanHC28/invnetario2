<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{controlmnto, ganttpilot,Programamntto};
use Illuminate\Support\Facades\DB;
use App\Helpers\HelperTablas;

class FechasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tabla_fecha=HelperTablas::tabla_fecha();
        $fechaActual = date('Y-m-d');
        $mod_date = strtotime($fechaActual . "-" . 0 . "days");
   return view('fecha.index',compact('tabla_fecha','mod_date'));

    }


    public function edit($id)
    {


        $controlprogramantos = controlmnto::find($id);


        return view('fecha.edit', compact('controlprogramantos'));

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

        $mantto =  new Programamntto;
        $gantt = new ganttpilot();

        DB::beginTransaction();
        try {



        $mantto->where(['id' => $id])
        ->update(['proxima_fecha' => $request->nueva_fecha]);


        $gantt->where(['id' => $id])
        ->update(['start_date' =>$request->nueva_fecha]);
        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash')->with('error', 'ok');
    }








    $cron = new Programamntto;
    $cron->cron();



    // }
     return redirect('/fecha')->with('actualizar', 'ok');

    }



}
