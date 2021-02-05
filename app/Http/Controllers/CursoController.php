<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Grado;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grado = DB::table('curso as c')->join('nivel as n', 'c.niv_cod', '=', 'n.niv_cod')
            ->select('c.cur_cod', 'c.cur_descripcion', 'c.cur_abreviatura', 'n.niv_descripcion')->get();
        return response()->json($grado);
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
            $curso = new Curso();
            $curso->cur_descripcion = $request->cur_descripcion;
            $curso->cur_abreviatura = $request->cur_abreviatura;
            $curso->niv_cod = $request->niv_cod;
            $personal->save();
            $result = ['cur_descripcion' => $curso->cur_descripcion,
                        'created' => true];
            return $result;
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
        return Curso::findOrFail($id);
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
        $curso = Curso::findOrFail($id);
        $curso->Update($request->all());
        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrFail($id);
        $curso->delete();
        return 204;
    }
}
