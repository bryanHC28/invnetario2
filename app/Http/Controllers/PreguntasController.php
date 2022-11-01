<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;


class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cuestionario.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $preguntas= new Preguntas;
        $preguntas->id_checklist=$request->input('checklist');
        $id_check=$request->input('checklist');
        $preguntas->tipo_pregunta=$request->input('tipo_pregunta');
        $preguntas->nombre_pregunta=$request->input('nombre_pregunta');
        $preguntas->status=$request->input('status');
        $preguntas->save();

        return redirect("llenar_preguntas/$id_check");
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

        $pregunta = Preguntas::find($id);
        $pregunta->nombre_pregunta=$request->nombre_pregunta;
        $pregunta->tipo_pregunta=$request->tipo_pregunta;
        $pregunta->id_checklist=$request->check;
        $id_check=$request->check;
        $pregunta->status= 1 ;


         $pregunta->save();
         return redirect("/llenar_preguntas/$id_check")->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pregunta = Preguntas::find($id);
        $pregunta->status = 0;
        $pregunta->save();
        return redirect('/checklist')->with('eliminar','ok');
        //
    }
}
