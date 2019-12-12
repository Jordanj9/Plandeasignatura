<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Cargaacademica;
use App\Auditoriaacademico;
use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        if (count($estudiantes) > 0) {
            foreach ($estudiantes as $d) {
                $d->nombre = $d->primer_nombre . " " . $d->segundo_nombre . " " . $d->primer_apellido . " " . $d->segundo_apellido;
            }
        }
        return view('academico.estudiante.list')
            ->with('location', 'academico')
            ->with('estudiantes', $estudiantes);
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
        return view('academico.estudiante.create')
            ->with('location', 'academico')
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
        $est = new Estudiante($request->all());
        foreach ($est->attributesToArray() as $key => $value) {
            $est->$key = strtoupper($value);
        }
        $result = $est->save();
        $est->cargaacademicas()->sync($request->cargaacademica_id);
       // $semana->ejetematicos()->sync($request->ejetematico_id);
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE ESTUDIANTE. DATOS: ";
            foreach ($est->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Estudiante <strong>" . $est->nombre . "</strong> fue almacenado de forma exitosa!")->success();
            return redirect()->route('estudiante.index');
        } else {
            flash("El Estudiante <strong>" . $est->nombre . "</strong> no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('estudiante.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
