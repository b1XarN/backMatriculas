<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;


class SeccionController extends Controller
{
    public function ListarSeccion(){
        $seccion = Seccion::get();
        return response()->json($seccion);
    }
}
