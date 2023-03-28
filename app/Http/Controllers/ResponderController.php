<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HelperTablas;



class ResponderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            // return auth()->user()->equipos;
            $combobox=auth()->user()->combobox;
            $tabla_responder=HelperTablas::tabla_responder();
            $fechaActual = date('Y-m-d');
            $mod_date = strtotime($fechaActual . "-" . 0 . "days");
        return view('Responder.index',compact('tabla_responder','mod_date','combobox'));



    }


}
