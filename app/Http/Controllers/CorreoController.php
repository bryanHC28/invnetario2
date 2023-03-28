<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Respuestas,User,Reporte};
use PDF;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{

    public function update(Request $request, $id)
    {





        $validar = Reporte::where('id_respuesta', $id)->get();


        if($validar[0]->id_usuario_receptor==0){


        $info=Respuestas::where('id',$id)->get();
        $data = Respuestas::select(DB::raw("JSON_EXTRACT(respuestas, '$.answers.*') as resp"),DB::raw("JSON_EXTRACT(columnas, '$.columns.*') as col"),DB::raw("JSON_EXTRACT(comentarios, '$.coment.*') as com"),DB::raw("JSON_EXTRACT(fotos, '$.photo.*') as fot"),DB::raw("JSON_EXTRACT(columnas_fotos, '$.col_photo.*') as com_fot"))
        ->where('id', $id)
        ->get();
        $JSON = json_decode($data[0]->resp);
        $LABEL = json_decode($data[0]->col);
        $PICTURE= json_decode($data[0]->fot);
        $COMENTARIO =  json_decode($data[0]->com);
        $preguntas_foto= json_decode($data[0]->com_fot);
        $limite=count($JSON);
        if (empty($PICTURE))
        $limite_foto = 0;
        else
        $limite_foto=count($PICTURE);
        $pdf= \PDF::loadView('PDF.answer',compact('info','JSON','LABEL','limite','PICTURE','COMENTARIO','preguntas_foto','limite_foto'));



        $clave = $request->clave;
        $data["email"] = "evirtual2022@outlook.com";
        $data["title"] = "Reporte de: ". $request->clave;
        $datas = array(
            'info' => $info, 'JSON' => $JSON, 'LABEL' => $LABEL, 'limite' => $limite,'clave' => $clave,'id' => $id
        );



        $correo = $request->correo;

        $get_id = User::select('id')->where('email', $correo)->get();






        Mail::send('correo.plantilla_correo_usuario', $datas, function ($message) use ($data, $pdf,$correo) {
            $message->from('evirtual2022@outlook.com')->to($correo)
                ->subject($data["title"])
                ->attachData($pdf->output(), "reporte.pdf");
        });



        Reporte::where(['id_respuesta' => $id])
        ->update(['id_usuario_receptor' => $get_id[0]->id,'id_usuario_emisor'=>auth()->user()->id]);



        return redirect('/respuestas')->with('enviado', 'ok');
    }else{


        return redirect('/respuestas')->with('validar', 'ok');
    }

}




}
