<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class work extends Model
{
    use HasFactory;
    protected $table = 'works';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
