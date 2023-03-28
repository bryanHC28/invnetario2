<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class control_longevidad extends Model
{
    use HasFactory;

    protected $table = 'control_longevidad';

    protected $fillable = ['id_equipo','id_longevidad','id_sucursal','Estado_eliminado'];


    public function equipo(){
        return $this->belongsTo('App\Models\Equipos','id_equipo','id');
        }


    public function longevidad(){
        return $this->belongsTo('App\Models\longevidad','id_longevidad','id');
        }





}
