<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Seccion;


class SeccionController extends Controller
{
    public function ListarSeccion($gra_cod){
        $seccion = DB::table('seccion as s')->join('grado as g', 'g.gra_cod', '=', 's.gra_cod')
                ->select('s.sec_cod', 's.gra_cod', 's.sec_letra')->where('s.gra_cod', '=', $gra_cod)->get();
        return response()->json($seccion);
    }
}
