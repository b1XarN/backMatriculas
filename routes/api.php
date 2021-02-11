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
Route::get('grados/{niv_cod}', 'GradoController@ListarGrado');
Route::get('secciones/{gra_cod}', 'SeccionController@ListarSeccion');
Route::get('ubi_deps', 'UbigeoController@ListarUbidep');
Route::get('ubi_provs/{id}', 'UbigeoController@ListarUbiprov');
Route::get('ubi_dists/{id}', 'UbigeoController@ListarUbidist');
Route::resource('cursos', 'CursoController');
Route::resource('alumnos', 'AlumnoController');
Route::resource('matriculas', 'MatriculaController');
Route::resource('parientes', 'ParienteController');
