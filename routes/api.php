<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('personals', 'PersonalController');
Route::get('departamentos', 'DepartamentoController@ListarDepartamento');
Route::get('niveles', 'NivelController@ListarNiveles');
Route::get('grados', 'GradoController@ListarGrado');
Route::get('secciones', 'SeccionController@ListarSeccion');
Route::get('ubigeos', 'UbigeoController@ListarUbigeo');
Route::resource('cursos', 'CursoController');
Route::resource('alumnos', 'AlumnoController');
Route::resource('parientes', 'ParienteController');
