<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Matricula;

class MatriculaController extends Controller
{
    
    public function index()
    {
        $matricula = DB::table('matricula as m')->join('seccion as s', 's.sec_cod', '=', 'm.sec_cod')
        ->select('m.mat_num', 'm.alu_dni','m.mat_anio', 'm.mat_fechar', 'm.sec_cod', 'm.gra_cod', 'm.niv_cod')->get();
    }

       
    public function store(Request $request)
    {
        try{
            $matricula = new Matricula();
            $matricula->mat_num = $request->mat_num;
            $matricula->alu_dni = $request->alu_dni;
            $matricula->mat_anio = $request->alu_apellidop;
            $matricula->alu_apellidom = $request->alu_apellidom;
            $matricula->alu_nombres = $request->alu_nombres;
            $matricula->alu_sexo = $request->alu_sexo;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
