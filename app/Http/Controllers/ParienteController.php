<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pariente;


class ParienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pariente = DB::table('pariente as p')->join('alumno as a', 'p.alu_dni', '=', 'a.alu_dni')
        ->select('p.par_dni', 'p.par_apellidop', 'p.par_apellidom', 'p.par_nombres','p.alu_dni')->get();
        return response()->json($pariente);
    }

   
    public function store(Request $request)
    {
        try{
            $pariente = new Pariente();
            $pariente->par_dni = $request->par_dni;
            $pariente->par_apellidop = $request->par_apellidop;
            $pariente->par_apellidom = $request->par_apellidom;
            $pariente->par_nombres = $request->par_nombres;
            $pariente->alu_dni = $request->alu_dni;
            $pariente->save();
            $result = ['par_dni' => $pariente->par_dni,
                    'created' => true];
        }catch(Exception $e){
            return "Error - ". $e->getMessage();
        }
    }
   
    public function show($id)
    {
        return Pariente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pariente = Pariente::findOrFail($id);
        $pariente->Update($request->all());
        return $pariente;
    }

    public function destroy($id)
    {
        $pariente=Pariente::findOrFail($id);
        $pariente->delete();
        return 204;
    }
}
