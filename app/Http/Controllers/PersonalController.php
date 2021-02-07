<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Personal;


class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $personal = DB::table('personal as p')->join('departamento as d', 'p.dep_cod', '=', 'd.dep_cod')->where('p.per_estado', '=', '1')
       ->select('p.per_dni', 'p.per_apellidos', 'p.per_nombres', 'p.dep_cod', 'p.per_direccion', 
                'p.per_estadocivil', 'p.per_telefono', 'p.per_segurosocial', 'p.per_ingreso')->get(); 
       return response()->json($personal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $personal = new Personal();
            $personal->per_dni=$request->per_dni;
            $personal->per_apellidos=$request->per_apellidos;
            $personal->per_nombres=$request->per_nombres;
            $personal->dep_cod=$request->dep_cod;
            $personal->per_direccion=$request->per_direccion;
            $personal->per_estadocivil=$request->per_estadocivil;
            $personal->per_telefono=$request->per_telefono;
            $personal->per_segurosocial=$request->per_segurosocial;
            $personal->per_ingreso=$request->per_ingreso;
            $personal->per_estado='1';
            $personal->save();
            $result = ['per_dni' => $personal->per_dni,
                    'created' => true];
            return $result;
        }catch(Exception $e){
            return "Error - " . $e->getMessage();
        }
    }

    public function show($id)
    {
        return Personal::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $personal = Personal::findOrFail($id);
        $personal->Update($request->all());
        return $personal;
    }

    public function destroy($id)
    {
        $personal=Personal::findOrFail($id);
        $personal->delete();
        return 204;
    }
}
