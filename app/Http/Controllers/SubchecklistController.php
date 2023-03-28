<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{categoriachecklist,Checklist,User,Equipos,Preguntas};
use Illuminate\Support\Facades\DB;


class SubchecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checklist = categoriaChecklist::orderBy('id')->where('Estado_eliminado', 1)
            ->where('id_sucursal', auth()->user()->id_sucursal)
            ->get();

        return view('CategoriaCheck.index')->with('checklist', $checklist);
    }


    public function store(Request $request)
    {

        DB::beginTransaction();
        try {

            $subchecklist = new checklist;
            $subchecklist->id_categoriachecklist = $request->id_checklist;
            $subchecklist->nombre = $request->nombre;
            $subchecklist->Estado_eliminado = 1;
            $subchecklist->save();
            DB::commit();
            return redirect('/subchecklist')->with('crear', 'ok');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dash')->with('error', 'ok');
        }
    }

    public function destroy($id)
    {

        $subchecklist = checklist::find($id);
        $subchecklist->Estado_eliminado = 0;
        $subchecklist->save();
        return redirect('/subchecklist')->with('eliminar', 'ok');
    }



    public function checkbox($id)
    {
        $subchecklist = checklist::where('id_categoriachecklist', $id)
        ->where('Estado_eliminado', 1)
        ->get();
        return view('Ajax.checkbox',compact('subchecklist'));
    }

    public function llenar_formularioS(Request $request)
    {

        $checklist = $request->Checklist;
        $id_controlmto= $request->id;


    $combobox= User::where('tipo_cuenta','Administrador')
    ->where('id_empresa',1)
    ->where('id_sucursal',1)
    ->get();


     $informacion_principal = Equipos::where('Estado_eliminado', 1)
    ->where('id_sucursal',auth()->user()->id_sucursal)
    ->where('id', $request->id_equipo)
    ->get();


    $preguntas=Preguntas::where('id_checklist',$request->id_subchecklist)
    ->where('Estado_eliminado',1)
    ->orderBy('orden_pregunta')
    ->get();

        return view('Forms.Subchecklist', compact('combobox','checklist','id_controlmto','preguntas','informacion_principal'));
    }



    public function query($ch)
    {

        $existencia = checklist::where('id_categoriachecklist', $ch)
        ->where('Estado_eliminado', 1)
        ->count();



        if ($existencia >= 1) {


            $subchecklist = checklist::where('id_categoriachecklist', $ch)
            ->where('Estado_eliminado', 1)
            ->get();
            return view('Ajax.ck',compact('subchecklist'));

        } else {

            return  " <script>
                                        Swal.fire(
                                            'Ups!',
                                            'Sin registros!',
                                            'error'
                                        )
                                    </script>";
        }


    }

}
