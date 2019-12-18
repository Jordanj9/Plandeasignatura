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
    Route::get('evaluacion', 'MenuController@evaluacion')->name('admin.evaluacion');
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
    //Buscar un departamento mediante javascripts
    Route::get('facultad/{id}/get/departamentos', 'FacultadController@getDepartamentos')->name('facultad.getDepartamentos');
    //DEPARTAMENTO
    Route::resource('departamento', 'DepartamentoController');
    Route::get('departamento/{id}/delete', 'DepartamentoController@destroy')->name('departamento.delete');
    //Buscar un programa mediante javascripts
    Route::get('departamento/{id}/get/programas', 'DepartamentoController@getProgramas')->name('departamento.getProgramas');
    //PROGRAMA
    Route::resource('programa', 'ProgramaController');
    Route::get('programa/{id}/delete', 'ProgramaController@destroy')->name('programa.delete');
    //Buscar un asignatura mediante javascripts
    Route::get('programa/{id}/get/asignaturas', 'ProgramaController@getAsignaturas')->name('programa.getAsignaturas');
    //ASIGNATURA
    Route::resource('asignatura', 'AsignaturaController');
    Route::get('asignatura/{id}/delete', 'AsignaturaController@destroy')->name('asignatura.delete');
    Route::get('asignatura/{id}/get/horasemestral', 'AsignaturaController@getAsignatura')->name('asignatura.getHora');
    //DOCENTE
    Route::resource('docente', 'DocenteController');
    Route::get('docente/{id}/delete', 'DocenteController@destroy')->name('docente.delete');
    //Buscar un docente mediante javascripts
    Route::get('docente/{id}/buscar', 'DocenteController@buscar')->name('docente.buscar');
    //Carga Academica
    Route::resource('carga_academica', 'CargaacademicaController');
    Route::get('carga_academica/{id}/delete', 'CargaacademicaController@destroy')->name('carga_academica.delete');
    //GRUPO
    Route::resource('grupo', 'GrupoController');
    Route::get('grupo/{id}/delete', 'GrupoController@destroy')->name('grupo.delete');
    //ESTUDIANTE
    Route::resource('estudiante', 'EstudianteController');
    Route::get('estudiante/{id}/delete', 'EstudianteController@destroy')->name('estudiante.delete');
});

//GRUPO DE RUTAS PARA EL MODULO PLAN
Route::group(['middleware' => 'auth', 'prefix' => 'plan'], function () {
    //PLAN DE ASIGNATURA
    Route::resource('plandeasignatura', 'PlandeasignaturaController');
    Route::get('plandeasignatura/{id}/delete', 'PlandeasignaturaController@destroy')->name('plandeasignatura.delete');
    Route::get('plandeasignatura/{id}/plan/imprimir', 'PlandeasignaturaController@imprimir')->name('plandeasignatura.imprimir');

    //UNIDAD DEL PLAN DE ASIGNATURA
    Route::resource('unity', 'UnidadController');
    Route::get('unity/inicio/{id}', 'UnidadController@inicio')->name('unity.inicio');
    Route::get('unity/{id}/delete', 'UnidadController@destroy')->name('unity.delete');

    Route::resource('ejetematico','EjetematicoController');
    Route::get('ejetematico/{id}/delete', 'EjetematicoController@destroy')->name('ejetematico.delete');

    //PLAN DE DESARROLLO_ASIGNATURA
    Route::resource('plandedesarrolloasignatura', 'PlandedesarrolloasignaturaController');
    Route::get('plandedesarrolloasignatura/{id}/delete', 'PlandedesarrolloasignaturaController@destroy')->name('plandedesarrolloasignatura.delete');
    Route::get('plandedesarrolloasignatura/{id}/create2', 'PlandedesarrolloasignaturaController@create')->name('plandedesarrolloasignatura.crear');
    //Buscar un ejeTematico mediante javascripts
    Route::get('plandedesarrolloasignatura/{id}/get/ejetematicos', 'PlandedesarrolloasignaturaController@getEjetematicos')->name('plandedesarrolloasignatura.getEjetematicos');
    Route::get('plandedesarrolloasignatura/{id}/plan/imprimir', 'PlandedesarrolloasignaturaController@imprimir')->name('plandedesarrolloasignatura.imprimir');
    //PLAN DE TRABAJO
    //Route::resource('plandetrabajo', 'PlandetrabajoController');
    //Route::get('plandetrabajo/{id}/delete', 'PlandetrabajoController@destroy')->name('plandetrabajo.delete');
    //Route::get('plandetrabajo/{id}/create2', 'PlandetrabajoController@create')->name('plandetrabajo.crear');
    //PLAN DE TRABAJO

    Route::resource('plandetrabajo', 'PlandetrabajoController');
    Route::get('plandetrabajo/{id}/delete', 'PlandetrabajoController@destroy')->name('plandetrabajo.delete');
    Route::post('plandetrabajo/guardar', 'PlandetrabajoController@store')->name('plandetrabajostore');
    Route::get('plandetrabajo/menu/actividades/{plan}', 'PlandetrabajoController@menuActividades')->name('menuActividades');
    Route::get('plandetrabajo/{id}/plan/imprimir', 'PlandetrabajoController@imprimir')->name('plandetrabajo.imprimir');


    //actividades
    Route::post('plandetrabajo/actividades/store', 'PlandetrabajoController@guardar_trabajo')->name('guardar_trabajo');

    Route::get('plandetrabajo/actividades/orientacion/{plan}', 'PlandetrabajoController@orientacion')->name('orientacion');
    Route::get('plandetrabajo/actividades/orientacion/create/{plan}', 'PlandetrabajoController@orientacion_create')->name('orientacion_create');

    Route::get('plandetrabajo/actividades/investigacion/{plan}', 'PlandetrabajoController@investigacion')->name('investigacion');
    Route::get('plandetrabajo/actividades/investigacion/create/{plan}', 'PlandetrabajoController@investigacion_create')->name('investigacion_create');

    Route::get('plandetrabajo/actividades/extension/{plan}', 'PlandetrabajoController@extension')->name('extension');
    Route::get('plandetrabajo/actividades/extension/create/{plan}', 'PlandetrabajoController@extension_create')->name('extension_create');

    Route::get('plandetrabajo/actividades/cooperacion/{plan}', 'PlandetrabajoController@cooperacion')->name('cooperacion');
    Route::get('plandetrabajo/actividades/cooperacion/create/{plan}', 'PlandetrabajoController@cooperacion_create')->name('cooperacion_create');

    Route::get('plandetrabajo/actividades/crecimiento/{plan}', 'PlandetrabajoController@crecimiento')->name('crecimiento');
    Route::get('plandetrabajo/actividades/crecimiento/create/{plan}', 'PlandetrabajoController@crecimiento_create')->name('crecimiento_create');

    Route::get('plandetrabajo/actividades/actividades/{plan}', 'PlandetrabajoController@actividades')->name('actividades');
    Route::get('plandetrabajo/actividades/actividades/create/{plan}', 'PlandetrabajoController@actividades_create')->name('actividades_create');

    Route::get('plandetrabajo/actividades/otras/{plan}', 'PlandetrabajoController@otras')->name('otras');
    Route::get('plandetrabajo/actividades/otras/create/{plan}', 'PlandetrabajoController@otras_create')->name('otras_create');



});

//GRUPO DE RUTAS PARA EL MODULO DE EVALUACION
Route::group(['middleware' => 'auth', 'prefix' => 'evaluacion'], function () {
    //ASISTENCIA
    Route::resource('asistencia', 'AsistenciaController');
    Route::get('asistencia/get/estudiante/{id}/estudiantes', 'AsistenciaController@getEstudiantes')->name('asistencia.getEstudiante');
    //EVALUACION
    Route::resource('evaluacion', 'EvaluacionController');

});
