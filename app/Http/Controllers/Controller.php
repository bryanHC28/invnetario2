<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Models\{control_longevidad};
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\HelperPDF;
use Illuminate\Http\Request;




class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function imprimir(Request $request){
    $pdf=HelperPDF::imprimir($request->id);
    return $pdf;

}

function pdf_areas_monalisa(Request $request){


    $pdf=HelperPDF::imprimir_area($request->id_area);
    return $pdf;


}


}
