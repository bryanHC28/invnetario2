<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programamntto extends Model
{
    use HasFactory;

    protected $table = 'programamntto';

    protected $fillable = ['id_checklist','id_subchecklist','status','periodicidad','ultima_fecha','proxima_fecha'];

    public function checklist(){
    return $this->belongsTo('App\Models\Checklist','id_checklist','id');
    }

    public function subchecklist(){
    return $this->belongsTo('App\Models\Subchecklist','id_subchecklist','id');
    }

}
