<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Matricula;

class MatriculaController extends Controller
{
    
    public function index()
    {
        $matricula = DB::table('matricula as m')->join('nivel as n', 'n.niv_cod', '=', 'm.niv_cod')
        ->join('grado as g', 'g.gra_cod', '=', 'm.gra_cod')->join('seccion as s', 's.sec_cod', '=', 'm.sec_cod')
        ->select('m.mat_num', 'm.alu_dni','m.mat_anio', 'm.mat_fechar', 'n.niv_descripcion', 'g.gra_descripcion', 's.sec_letra')->get();
    }

       
    public function store(Request $request)
    {
        try{
            $matricula = new Matricula();
            $matricula->mat_num = $request->mat_num;
            $matricula->alu_dni = $request->alu_dni;
            $matricula->mat_anio = $request->mat_anio;
            $matricula->mat_fechar = $request->mat_fechar;
            $matricula->niv_cod = $request->niv_cod;
            $matricula->gra_cod = $request->gra_cod;
            $matricula->sec_cod = $request->sec_cod;
            $matricula->save();
            $result = ['mat_num' => $matricula->mat_num,
                    'created' => true];
        }catch(Exception $e){
            return "Error - " . $e->getMessage();
        }
    }

    public function show($id)
    {
        return Matricula::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->Update($request->all());
        return $matricula;
    }

    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);
        $matricula->delete();
        return 204;
    }
}
