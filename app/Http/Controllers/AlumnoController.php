<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Alumno;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumno = DB::table('alumno as a')->join('ubigeo as u', 'a.ubi_id', '=', 'u.ubi_id')
        ->select('a.alu_dni', 'a.alu_codigomod', 'a.alu_apellidop', 'a.alu_apellidom', 'a.alu_nombres', 'a.alu_sexo', 
            'a.alu_fechanac', 'a.alu_escala', 'a.alu_pais', 'a.ubi_id', 'a.alu_anioingreso', 'a.alu_lenguamat', 'a.alu_estadocivil', 
            'a.alu_religion', 'a.alu_fechabautizo', 'a.alu_parroquiab', 'a.alu_colprocedencia')->get();
        return response()->json($alumno);
    }

    public function store(Request $request)
    {
        try{
            $alumno = new Alumno();
            $alumno->alu_dni = $request->alu_dni;
            $alumno->alu_codigomod = $request->alu_codigomod;
            $alumno->alu_apellidop = $request->alu_apellidop;
            $alumno->alu_apellidom = $request->alu_apellidom;
            $alumno->alu_nombres = $request->alu_nombres;
            $alumno->alu_sexo = $request->alu_sexo;
            $alumno->alu_fechanac = $request->alu_fechanac;
            $alumno->alu_escala = $request->alu_escala;
            $alumno->alu_pais = $request->alu_pais;
            $alumno->ubi_id = $request->ubi_id;
            $alumno->alu_anioingreso = $request->alu_anioingreso;
            $alumno->alu_lenguamat = $request->alu_lenguamat;
            $alumno->alu_estadocivil = $request->alu_estadocivil;
            $alumno->alu_religion = $request->alu_religion;
            $alumno->alu_fechabautizo = $request->alu_fechabautizo;
            $alumno->alu_parroquiab = $request->alu_parroquiab;
            $alumno->alu_colprocedencia = $request->alu_colprocedencia;
            $alumno->save();
            $result = ['alu_dni' => $alumno->alu_dni,
                    'created' => true];
        }catch(Exception $e){
            return "Error - " . $e->getMessage();
        }
    }

    
    public function show($id)
    {
        return Alumno::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->Update($request->all());
        return $alumno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno=Alumno::findOrFail($id);
        $alumno->delete();
        return 204;
    }
}
