<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ganttpilot extends Model
{

    protected $appends = ["open"];

    public function getOpenAttribute()
    {
        return true;

    }


    protected $table = 'ganttpilots';


    protected $fillable = ['id','text','duration','progress','start_date','parent'];

}
