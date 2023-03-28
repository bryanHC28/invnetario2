<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoriachecklist;
use Illuminate\Support\Facades\DB;
class ChecklistController extends Controller
{



    public function store(Request $request)
    {




            DB::beginTransaction();
            try {
            $checklist= new categoriachecklist;
            $checklist->nombre=$request->nombre;
            $checklist->id_sucursal=$request->id_sucursales;
            $checklist->Estado_eliminado=1;
            $checklist->save();
            DB::commit();
            return redirect('/subchecklist')->with('crear', 'ok');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect('/dash')->with('error', 'ok');
        }

    }


    public function destroy($id)
    {
        DB::beginTransaction();
        try {
        $checklist = categoriachecklist::find($id);
        $checklist->Estado_eliminado = 0;
        $checklist->save();
        DB::commit();
        return redirect('/subchecklist')->with('eliminar','ok');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash');
    }

    }


    public function llenar_combo_checklist($id_sucursal)
    {
        return categoriachecklist::where('id_sucursal', $id_sucursal)
        ->where('Estado_eliminado', 1)->get();
    }



}
