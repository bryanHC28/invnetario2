<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preguntas;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;


class PreguntasController extends Controller
{





    public function store(Request $request)
    {
        $pregunta= new Preguntas;


        if($request->tipo_pregunta==='separador'||$request->tipo_pregunta==='nota'||$request->tipo_pregunta==='subtitulo'){


        DB::beginTransaction();
        try {


            $pregunta->id_checklist=$request->id_subchecklist;
            $pregunta->tipo_pregunta=$request->tipo_pregunta;
            $pregunta->nombre_pregunta=$request->nombre_pregunta;
            $pregunta->Estado_eliminado=1;
            $pregunta->orden_pregunta= $request->orden_pregunta ;
            $pregunta->save();
            DB::commit();
           return redirect()->back()->with('crear', 'ok');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dash')->with('error', 'ok');
        }
        }else{
            $query = Preguntas::where('nombre_pregunta', '=',$request->nombre_pregunta)//validar preguntas no repetidas
            ->where('id_checklist',$request->id_subchecklist)
            ->first();

            if($query===null){
                DB::beginTransaction();
                try {



                $pregunta->id_checklist=$request->id_subchecklist;
                $pregunta->tipo_pregunta=$request->tipo_pregunta;
                $pregunta->nombre_pregunta=$request->nombre_pregunta;
                $pregunta->Estado_eliminado=1;
                $pregunta->orden_pregunta= $request->orden_pregunta ;
                $pregunta->save();
                DB::commit();
               return redirect()->back()->with('crear', 'ok');
            } catch (\Exception $e) {
                DB::rollback();

                return redirect('/dash')->with('error', 'ok');
            }

            }else{

                return redirect()->back()->with('no_creado', 'no');

            }



        }





    }







        // $pregunta->save();

        // $id_subck=$request->id_subchecklist;
        // $id_ck=$request->id_checklist;
        // $datos= $request->all();
        // Preguntas::create($datos);


        // return redirect()->back();
       // return redirect('/preguntassck/'.$id_subck.'/'.$id_ck);

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {


        $pregunta = Preguntas::find($id);
        $pregunta->nombre_pregunta=$request->nombre_pregunta;
        $pregunta->tipo_pregunta=$request->tipo_pregunta;
        $pregunta->Estado_eliminado= 1 ;
        $pregunta->orden_pregunta= $request->orden_pregunta ;



        $id_check=$request->check;
        $id_subcheck=$request->subcheck;


         $pregunta->save();
         DB::commit();
         return redirect("/preguntassck?subck=$id_subcheck&cateck=$id_check")->with('actualizar','ok');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dash')->with('error', 'ok');
        }
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
        $pregunta->Estado_eliminado = 0;
        $pregunta->save();
        return redirect('/subchecklist')->with('eliminar','ok');
        //
    }



    public function preguntassck(Request $request)
    {

        $id_subchecklist=$request->subck;
        $id_checklist=$request->cateck;
        $pregunta = Preguntas::where('id_checklist', $request->subck)
        ->where('Estado_eliminado', 1)->orderBy('orden_pregunta')->get();

        return view('Ajax.index',compact('pregunta','id_subchecklist','id_checklist'));
    }

}
