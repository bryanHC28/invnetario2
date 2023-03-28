<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{categoriaequipos,Areas};
use Illuminate\Support\Facades\DB;


class CategoriasController extends Controller
{
    public function index()
    {



        $area=Areas::orderBy('id')
        ->where('id_sucursal',auth()->user()->id_sucursal)
        ->get();
        return view('Categoria.create',compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $area=Areas::orderBy('id')
        ->where('id_sucursal',auth()->user()->id_sucursal)
        ->get();
        return view('Categoria.create',compact('area'));
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
        $categoria =  new categoriaequipos;
        $categoria->nombre = $request->nombre;
        $categoria->Estado_eliminado = 1;
        $categoria->id_sucursal = auth()->user()->id_sucursal;
        $categoria->id_area = $request->id_area;
        $categoria->save();
        DB::commit();
        return redirect('/categoria')->with('crear','ok');
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash')->with('error', 'ok');
    }
    }



    public function combo_categoria($id_area)
    {
        return categoriaequipos::where('id_area', $id_area)
            ->where('Estado_eliminado', 1)
            ->get();

    }

}
