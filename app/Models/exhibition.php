<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class exhibition extends Model
{
    use HasFactory;

    protected $table ='exhibitions';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['fecha_inicio','fecha_fin','ubicacion','nombre_evento'];

}
