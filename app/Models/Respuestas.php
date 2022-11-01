<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    use HasFactory;


    protected $table = 'respuestas';

    protected $fillable = ['id_checklist','id_subchecklist','respuestas','status'];

    public function checklist(){
    return $this->belongsTo('App\Models\Checklist','id_checklist','id');
    }

    public function subchecklist(){
    return $this->belongsTo('App\Models\Subchecklist','id_subchecklist','id');
    }


}
