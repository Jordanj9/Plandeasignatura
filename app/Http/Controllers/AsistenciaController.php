<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Cargaacademica;
use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::all();
        return view('evaluacion.asistencia.list')
            ->with('location', 'evaluacion')
            ->with('asistencias', $asistencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
        $grupos = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();
        if ($grupos != null) {
            foreach ($grupos as $c) {
                $cargas[$c->id] = $c->asignatura->codigo . "-" . $c->asignatura->nombre . " - " . $c->grupo->nombre;
            }
        }
        return view('evaluacion.asistencia.create')
            ->with('location', 'evalcuacion')
            ->with('cargas', $cargas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function getEstudiantes($id)
    {
        $carga = Cargaacademica::find($id);
        $estud = $carga->estudiantes;
        if ($estud != null) {
            $estudiantes = null;
            foreach ($estud as $item) {
                $obj['id'] = $item->id;
                $obj['identificacion'] = $item->identificacion;
                $obj['nombre'] = $item->primer_apellido . " " . $item->segundo_apellido . " " . $item->primer_nombre . " " . $item->segundo_nombre;
                $estudiantes[] = $obj;
            }
            return json_encode($estudiantes);
        } else {
            return "null";
        }
    }
}
