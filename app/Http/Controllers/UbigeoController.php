<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubigeo;

class UbigeoController extends Controller
{
    public function ListarUbigeo(){
        $ubigeo = Ubigeo::get();
        return response()->json($ubigeo);
    }
}
