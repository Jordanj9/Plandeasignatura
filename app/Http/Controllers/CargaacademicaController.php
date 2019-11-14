<?php

namespace App\Http\Controllers;

use App\Auditoriaacademico;
use App\Cargaacademica;
use App\Facultad;
use App\Grupo;
use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargaacademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargaAcademica =  Cargaacademica::all();
        $facultades =  Facultad::all();
        return view('academico.carga_academica.list')
            ->with('location', 'academico')
            ->with('cargaAcademica', $cargaAcademica)
            ->with('facultades',$facultades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades =  Facultad::all();
        $periodos =  Periodo::all()->sortByDesc('anio');
        $grupos = Grupo::all()->pluck('nombre','id');
        $periodosf = Collect();

        if($periodos->count() > 0){
            foreach ($periodos as $value) {
                $periodosf[$value->id] = $value->anio . " - " . $value->periodo;
            }
        }

        return view('academico.carga_academica.create')
            ->with('location', 'academico')
            ->with('facultades',$facultades)
            ->with('periodos',$periodosf)
            ->with('grupos',$grupos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $carga_academica = new Cargaacademica($request->all());
        foreach ($carga_academica->attributesToArray() as $key => $value) {
            $carga_academica->$key = strtoupper($value);
        }
        $result = $carga_academica->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE FACULTAD. DATOS: ";
            foreach ($carga_academica->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("La Carga Acadmica para la asignatura <strong>" . $carga_academica->asignatura->nombre . "</strong> fue almacenada de forma exitosa!")->success();
            return redirect()->route('facultad.index');
        } else {
            flash("La Carga Acadmica para la asignatura <strong>" . $carga_academica->asignatura->nombre . "</strong> no pudo ser almacenada. Error: " . $result)->error();
            return redirect()->route('facultad.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargaacademica  $cargaacademica
     * @return \Illuminate\Http\Response
     */
    public function show(Cargaacademica $cargaacademica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargaacademica  $cargaacademica
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargaacademica $cargaacademica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargaacademica  $cargaacademica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargaacademica $cargaacademica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargaacademica  $cargaacademica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargaacademica $cargaacademica)
    {
        //
    }
}
