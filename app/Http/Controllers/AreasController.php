<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Areas;
use Illuminate\Support\Facades\DB;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Area.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        DB::beginTransaction();
        try {

            $area = new Areas;
            $area->nombre = $request->nombre;
            $area->id_sucursal = auth()->user()->id_sucursal;
            $area->Estado_eliminado = 1;
            $area->save();
            DB::commit();
            return redirect('/areas')->with('crear', 'ok');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/dash')->with('error', 'ok');
        }
    }


    public function llenar_area($id_sucursal)
    {

        $area = Areas::where('id_sucursal', $id_sucursal)
        ->where('Estado_eliminado', 1)->get();
        return $area;
    }

}
