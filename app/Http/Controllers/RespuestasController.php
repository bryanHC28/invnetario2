<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Respuestas,Programamntto,ganttpilot,Reporte};
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use IlluminateSupportFacadesStorage;
use App\Helpers\HelperTablas;
class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



            $respuestas= HelperTablas::tabla_resumen();
            return view('Respuestas.index',compact('respuestas'));




    }


    public function store(Request $request)
    {



        DB::beginTransaction();
        try {

        $respuesta = new Respuestas();
        $limit = $request->limite; //limite para recorrer el for de preguntas
        $limit_foto = $request->limite_photos; //limite para recorrer el for de fotos
        $respu = $request->respuestas; //aqui obtenemos  el valor de los input para insertarlo en el array y posteriormente pasarlo a json


        $comen = $request->comentarios;// aqui obtenemos el valor de los comentarios
        $pregu = $request->preguntas; //aqui obtenemos  el valor de los label paraasignarle el nodo correspondiente a cada respuesta
        $foto = $request->fotos; //obtenemos el valor del label en el que hayan insertado una foto para posteriormente guardarlo como nodo en el json
        $respuesta->id_controlmanto = $request->id_controlmto;
        $respuesta->id_sucursal = auth()->user()->id_sucursal;
        $respuesta->Estado_eliminado = 1;
        $respuesta->observaciones = $request->textarea;
        $respuesta->id_contesto = auth()->user()->id;





        $resp = []; //array donde vamos a guardar todas las respuestas del form
        $fotoss = []; //array para guardar las url de las fotos insertadas
        $col = [];
        $col_foto = [];
        $com = [];

        for ($i = 1; $i <= $limit; $i++) {

            $cadena = str_replace(' ', '', $pregu[$i]); //quitamos los espacios de los label por que el formato json solo permite texto puro
            $resp = Arr::add($resp, $cadena, $respu[$i]); //vamos insertando las respuestas en el array conforme va recorriendo la posicion de los inputs
            $com = Arr::add($com,$cadena,$comen[$i]);
            $col = Arr::add($col, $cadena, $pregu[$i]);
        }

        $final = ['answers' => $resp];
        $final2 = ['columns' => $col];
        $final3 = ['coment' => $com];
        $prb = response()->json($final, 200)->getContent(); //trasformamos el array en json
        $prb_col = response()->json($final2, 200)->getContent();
        $prb_com = response()->json($final3, 200)->getContent();
        $respuesta->respuestas = $prb; //insertamos todo ya formateado
        $respuesta->columnas = $prb_col;
        $respuesta->comentarios = $prb_com;




        for ($k = 1; $k <= $limit_foto; $k++) {

            if ($request->hasFile('file' . $k)) {

                $imagenes = $request->file('file' . $k)->store('public/imagenes'); //guarda las imagenes en el acceso directo de la ruta



                $url = Storage::url($imagenes); //generamos la ruta

                $cadena = str_replace(' ', '', $foto[$k]); //quitamos espacios para generar los nodos pero ahora de las fotos correspondientes
                $fotoss = Arr::add($fotoss, $cadena, $url); //insertamos los nodos y rutas en el array
                $col_foto = Arr::add($col_foto, $cadena, $foto[$k]);


            }


        }



        $json = ['photo'=>$fotoss];
        $prb2 = response()->json($json, 200)->getContent(); //transformamos el array en json
        $respuesta->fotos = $prb2; //guardamos

        $json_foto = ['col_photo'=>$col_foto];
        $prb4 = response()->json($json_foto, 200)->getContent(); //transformamos el array en json
        $respuesta->columnas_fotos = $prb4;
        $respuesta->save();




        for ($i = 0; $i < count($request->correo); $i++){

        $this->email($request->correo[$i], $request->equipo, $request->categoria, auth()->user()->name, $request->clave, $request->area);
    }


        Reporte::create([
            'id_respuesta'=> $respuesta->id,
            'estatus_supervisor'=>'EN REVISION',
            'estatus_cliente'=>'EN REVISION',
            'id_sucursal'=>auth()->user()->id_sucursal,
            'Estado_eliminado' => 1,
            'id_usuario_emisor'=> 0,
            'id_usuario_receptor'=> 0
        ]);


        $this->actualiza_fecha($request->id_controlmto);
        $cron = new Programamntto;
        $cron->cron();

        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash')->with('error', 'ok');
    }


   return redirect('dash');

    }



    public function email($correo, $equipo, $categoria, $usuario, $clave, $area)
    {



        $destinatario = $correo;
        $asunto = $equipo;


        $data = array(
            'categoria' => $categoria, 'usuario' => $usuario, 'clave' => $clave, 'area' => $area,
            'equipo' => $equipo
        );


        Mail::send('correo.plantilla_correo', $data, function ($message) use ($asunto, $destinatario) {
            $message->from('evirtual2022@outlook.com', 'Empresa Virtual');
            $message->to($destinatario)->subject($asunto);
        });
    }


    public function actualiza_fecha($id_controlmto)
    {


        DB::beginTransaction();
        try {


            $Mnto = new Programamntto();
            $gantt = new ganttpilot();

            $periodicidad_equipo = Programamntto::select('periodicidad')->where('id', $id_controlmto)->get();
            $JSON = json_decode($periodicidad_equipo[0]);
            $fechaActual = date('Y-m-d');
            $mod_date = strtotime($fechaActual . "-" . 1 . "days");



            $Mnto->where(['id' => $id_controlmto])
                ->update(['ultima_fecha' => date(" Y-m-d", $mod_date), 'proxima_fecha' => $this->fecha(date(" Y-m-d", $mod_date), $JSON->periodicidad)]);


            $gantt->where(['id' => $id_controlmto])
            ->update(['start_date' => $this->fecha(date(" Y-m-d", $mod_date), $JSON->periodicidad)]);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/dash')->with('error', 'ok');
        }



    }


    public function fecha($fecha_dada, $prediodicidad)
    {


        $date = date($fecha_dada);
        //Incrementando n dias
        $mod_date = strtotime($date . "+" . $prediodicidad . "days");
        return  date(" Y-m-d", $mod_date);
    }


    public function update(Request $request, $id)
    {

        $limit = (int) $request->limite;



        for ($i=0; $i < $limit;$i++){

            DB::beginTransaction();
            try {

            $cadena = str_replace(' ', '', $request->nodo[$i]);
        $respuesta = $request->respuesta[$i];
        $comentario = $request->comentarios[$i];

            $actualizar = "UPDATE respuestas SET respuestas = JSON_REPLACE(respuestas, '$.answers.$cadena', '$respuesta')
        WHERE id = $id";
        DB::update($actualizar);

        $actualizar_comentario = "UPDATE respuestas SET comentarios = JSON_REPLACE(comentarios, '$.coment.$cadena', '$comentario')
        WHERE id = $id";
        DB::update($actualizar_comentario);

        DB::commit();
    } catch (\Exception $e) {
        DB::rollback();
        return redirect('/dash')->with('error', 'ok');
    }
        }


        $coment_general = new Respuestas();
        $coment_general->where(['id' => $id])
        ->update(['observaciones' => $request->textarea]);





        return redirect('respuestas');




    }
    public function mostrarrespuestas(Request $request){

        $id=$request->id;
        $info=Respuestas::where('id',$request->id)->get();
        $data = Respuestas::select(DB::raw("JSON_EXTRACT(respuestas, '$.answers.*') as resp"),DB::raw("JSON_EXTRACT(columnas, '$.columns.*') as col"),DB::raw("JSON_EXTRACT(comentarios, '$.coment.*') as com"),DB::raw("JSON_EXTRACT(fotos, '$.photo.*') as fot"),DB::raw("JSON_EXTRACT(columnas_fotos, '$.col_photo.*') as com_fot"))
        ->where('id', $request->id)
        ->get();
        $JSON = json_decode($data[0]->resp);
        $LABEL = json_decode($data[0]->col);
        $COMENTARIO =  json_decode($data[0]->com);
        $PICTURE= json_decode($data[0]->fot);
        $preguntas_foto= json_decode($data[0]->com_fot);
        $limite=count($JSON);
        if (empty($PICTURE))
            $limite_foto = 0;
        else
        $limite_foto=count($PICTURE);
        return view('Forms.respuestas',compact('id', 'PICTURE','JSON','preguntas_foto','limite_foto','COMENTARIO','LABEL','limite','info'));
       //return view('Forms.respuestas')->with('picture',$picture)->with('JSON',$JSON)->with('LABEL',$LABEL)->with('limite',$limite)->with('info',$info);


    }



}
