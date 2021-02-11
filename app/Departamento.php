<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = "departamento";
    protected $primaryKey = "dep_cod";
    public $timestamps = false;
    protected $filliable = ['dep_descripcion'];
}
