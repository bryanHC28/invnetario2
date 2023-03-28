<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controlmnto extends Model
{
    use HasFactory;
    protected $table = 'controlmnto';

    protected $fillable = ['id_equipo','id_programanto','id_checklist','id_sucursal','Estado_eliminado'];


    public function equipos(){
        return $this->belongsTo('App\Models\Equipos','id_equipo','id');
        }

    public function programanto(){
            return $this->belongsTo('App\Models\Programamntto','id_programanto','id');
            }

    public function checklist(){
    return $this->belongsTo('App\Models\Checklist','id_checklist','id');
    }

    public function sucursal(){
        return $this->belongsTo('App\Models\Sucursal','id_sucursal','id');
        }





}
