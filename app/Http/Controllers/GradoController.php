<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;

class GradoController extends Controller
{
    public function ListarGrado(){
        $grado = Grado::get();
        return response()->json($grado);
    }
}
