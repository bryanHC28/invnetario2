<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Programamntto extends Model
{
    use HasFactory;

    protected $table = 'programamntto';

    protected $fillable = ['Estado_eliminado','periodicidad','id_sucursal','Estado_fecha','periodicidad','ultima_fecha','proxima_fecha'];

    public function programanto(){
        return $this->belongsTo('App\Models\controlmnto','id','id_programanto');
        }
    public function cron()
    {


        $cron = Programamntto::where('Estado_eliminado', '=', 1)->get();
        foreach ($cron as $sku) {


            $fechaActual = date('Y-m-d');
            $fecha_prox = date('Y-m-d', strtotime($sku->proxima_fecha));
            $fecha1 = date_create($fechaActual);
            $fecha2 = date_create($fecha_prox);
            $dias = date_diff($fecha1, $fecha2)->format('%R%a');


            if ($dias >= +0 && $dias <= +7) {

                $pdte = "UPDATE programamntto SET Estado_fecha = 'esta semana' where id=$sku->id ";
                DB::update($pdte);
            } elseif ($dias > +7 && $dias <= +30) {


                $pdte = "UPDATE programamntto SET Estado_fecha = 'este mes' where id=$sku->id ";
                DB::update($pdte);
            } elseif ($dias > +30 && $dias <= +182) {

                $pdte = "UPDATE programamntto SET Estado_fecha = 'medio año' where id=$sku->id ";
                DB::update($pdte);
            } elseif ($dias > +182 && $dias <= +365) {

                $pdte = "UPDATE programamntto SET Estado_fecha = 'este año' where id=$sku->id ";
                DB::update($pdte);
            } elseif ($dias < +0) {

                $pdte = "UPDATE programamntto SET Estado_fecha = 'vencido' where id=$sku->id ";
                DB::update($pdte);
            } elseif($dias > +365 && $dias <= +100000) {

                $pdte = "UPDATE programamntto SET Estado_fecha = 'mas del año'where id=$sku->id ";
                DB::update($pdte);
            }
        }
    }



}
