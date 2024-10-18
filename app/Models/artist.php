<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class artist extends Model
{
    use HasFactory;

protected $table ='artists';
protected $primaryKey='id';
public $timestamps=false;
protected $fillable=['nombre','apellido','nacionalidad','biografia'];
}
