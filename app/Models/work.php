<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class work extends Model
{
    use HasFactory;
    protected $table = 'works';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
