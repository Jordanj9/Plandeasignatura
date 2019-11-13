<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//cambiar contraseña
Route::get('usuarios/contrasenia/cambiar', 'UsuarioController@vistacontrasenia')->name('usuario.vistacontrasenia');
Route::post('usuarios/contrasenia/cambiar/finalizar', 'UsuarioController@cambiarcontrasenia')->name('usuario.cambiarcontrasenia');
Route::post('usuarios/contrasenia/cambiar/admin/finalizar', 'UsuarioController@cambiarPass')->name('usuario.cambiarPass');

//TODOS LOS MENUS
//GRUPO DE RUTAS PARA LA ADMINISTRACIÓN
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('usuarios', 'MenuController@usuarios')->name('admin.usuarios');
    Route::get('academico', 'MenuController@academico')->name('admin.academico');
    Route::get('plan', 'MenuController@plan')->name('admin.plan');
    Route::get('reporte', 'MenuController@reporte')->name('admin.reporte');
    Route::post('acceso', 'HomeController@confirmaRol')->name('rol');
    Route::get('inicio', 'HomeController@inicio')->name('inicio');
});

//GRUPO DE RUTAS PARA LA ADMINISTRACIÓN DE USUARIOS
Route::group(['middleware' => 'auth', 'prefix' => 'usuarios'], function () {
    //MODULOS
    Route::resource('modulo', 'ModuloController');
    //PAGINAS O ITEMS DE LOS MODULOS
    Route::resource('pagina', 'PaginaController');
    //GRUPOS DE USUARIOS
    Route::resource('grupousuario', 'GrupousuarioController');
    Route::get('grupousuario/{id}/delete', 'GrupousuarioController@destroy')->name('grupousuario.delete');
    Route::get('privilegios', 'GrupousuarioController@privilegios')->name('grupousuario.privilegios');
    Route::get('grupousuario/{id}/privilegios', 'GrupousuarioController@getPrivilegios');
    Route::post('grupousuario/privilegios', 'GrupousuarioController@setPrivilegios')->name('grupousuario.guardar');
    //USUARIOS
    Route::resource('usuario', 'UsuarioController');
    Route::get('usuario/{id}/delete', 'UsuarioController@destroy')->name('usuario.delete');
    Route::post('operaciones', 'UsuarioController@operaciones')->name('usuario.operaciones');
    Route::post('usuario/contrasenia/cambiar/admin/finalizar', 'UsuarioController@cambiarPass')->name('usuario.cambiarPass');
});

//GRUPO DE RUTAS PARA EL MODULO ACADEMICO
Route::group(['middleware' => 'auth', 'prefix' => 'academico'], function () {
    //PERIODO
    Route::resource('periodo', 'PeriodoController');
    Route::get('periodo/{id}/delete', 'PeriodoController@destroy')->name('periodo.delete');
    //FACULTAD
    Route::resource('facultad', 'FacultadController');
    Route::get('facultad/{id}/delete', 'FacultadController@destroy')->name('facultad.delete');
    //DEPARTAMENTO
    Route::resource('departamento', 'DepartamentoController');
    Route::get('departamento/{id}/delete', 'DepartamentoController@destroy')->name('departamento.delete');
    //PROGRAMA
    Route::resource('programa', 'ProgramaController');
    Route::get('programa/{id}/delete', 'ProgramaController@destroy')->name('programa.delete');
    //ASIGNATURA
    Route::resource('asignatura', 'AsignaturaController');
    Route::get('asignatura/{id}/delete', 'AsignaturaController@destroy')->name('asignatura.delete');
    //DOCENTE
    Route::resource('docente', 'DocenteController');
    Route::get('docente/{id}/delete', 'DocenteController@destroy')->name('docente.delete');
    //GRUPO
    Route::resource('grupo', 'GrupoController');
    Route::get('grupo/{id}/delete', 'GrupoController@destroy')->name('grupo.delete');
});

//GRUPO DE RUTAS PARA EL MODULO PLAN
Route::group(['middleware' => 'auth', 'prefix' => 'plan'], function () {
    //PLAN DE ASIGNATURA
    Route::resource('plandeasignatura', 'PlandeasignaturaController');
    Route::get('plandeasignatura/{id}/delete', 'PlandeasignaturaController@destroy')->name('plandeasignatura.delete');
});
