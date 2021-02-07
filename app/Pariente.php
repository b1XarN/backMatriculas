<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pariente extends Model
{
    protected $table = "pariente";
    protected $primaryKey = "par_dni";
    public $timestamps = false;
    protected $filliable = ['par_dni', 'par_apellidop', 'par_apellidom', 'par_nombres', 'alu_dni'];
}
