<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class longevidad extends Model
{
    use HasFactory;

    protected $table = 'longevidad';

    protected $fillable = ['fecha_ingreso','fecha_vencimiento','costo_unitario','descripcion','garantia','Estado_eliminado'];
}
