<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Cargaacademica;
use App\Auditoriaacademico;
use App\Grupousuario;
use App\Periodo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        if ($doc != null) {
            $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
            if ($per == null) {
                flash("No hay periodo académico activo.")->error();
                return redirect()->route('admin.academico');
            } else {
                $cargaAcademica = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();
                $aux = collect();
                $estudiantes = collect();
                if ($cargaAcademica != null) {
                    foreach ($cargaAcademica as $carga) {
                        $carest = $carga->estudiantes;
                        if (count($carest) > 0) {
                            $aux[] = $carest;
                        }
                    }
                }
                if (count($aux) > 0) {
                    foreach ($aux as $a) {
                        foreach ($a as $e) {
                            $estudiantes[] = $e;
                        }
                    }
                }
            }
        } else {
            $estudiantes = Estudiante::all();
        }
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
        if ($result) {
            $user = new User();
            $user->identificacion = $est->identificacion;
            $user->estado = "ACTIVO";
            $user->email = $est->email;
            $user->password = bcrypt($est->identificacion);
            $user->nombres = $est->primer_nombre . " " . $est->segundo_nombre;
            $user->apellidos = $est->primer_apellido . " " . $est->segundo_apellido;
            $user->save();
            $g = Grupousuario::where('nombre', 'ESTUDIANTE')->first();
            if ($g != null) {
                $user->grupousuarios()->sync($g->id);
            }
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
