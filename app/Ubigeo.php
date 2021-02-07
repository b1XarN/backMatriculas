<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{
    protected $table = "ubigeo";
    protected $primaryKey = "ubi_id";
    public $timestamps = false;
    protected $filliable = ['ubi_id', 'ubi_departamento', 'ubi_provincia', 'ubi_distrito'];
}
