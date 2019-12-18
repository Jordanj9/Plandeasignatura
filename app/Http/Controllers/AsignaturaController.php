<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Programa;
use App\Auditoriaacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('academico.asignatura.list')
            ->with('location', 'academico')
            ->with('asignaturas', $asignaturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programas = Programa::all()->pluck('nombre', 'id');
        return view('academico.asignatura.create')
            ->with('location', 'academico')
            ->with('programas', $programas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asignatura = new Asignatura($request->all());
        foreach ($asignatura->attributesToArray() as $key => $value) {
            $asignatura->$key = strtoupper($value);
        }
        $result = $asignatura->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE ASIGNATURA. DATOS: ";
            foreach ($asignatura->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> fue almacenada de forma exitosa!")->success();
            return redirect()->route('asignatura.index');
        } else {
            flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> no pudo ser almacenada. Error: " . $result)->error();
            return redirect()->route('asignatura.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignatura = Asignatura::find($id);
        $programas = Programa::all()->pluck('nombre', 'id');
        return view('academico.asignatura.edit')
            ->with('location', 'academico')
            ->with('asignatura', $asignatura)
            ->with('programas', $programas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asignatura = Asignatura::find($id);
        $m = new Asignatura($asignatura->attributesToArray());
        foreach ($asignatura->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $asignatura->$key = strtoupper($request->$key);
            }
        }
        $result = $asignatura->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE ASIGNATURA. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($asignatura->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> fue modificada de forma exitosa!")->success();
            return redirect()->route('asignatura.index');
        } else {
            flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> no pudo ser modificada. Error: " . $result)->error();
            return redirect()->route('asignatura.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura = Asignatura::find($id);
//        if (count($asignatura->asignaturas) > 0) {
//            flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> no pudo ser eliminada porque tiene carga académica asociada.")->warning();
//            return redirect()->route('asignatura.index');
//        } else {
            $result = $asignatura->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE ASIGNATURA. DATOS ELIMINADOS: ";
                foreach ($asignatura->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("La Asignatura<strong>" . $asignatura->nombre . "</strong> fue eliminada de forma exitosa!")->success();
                return redirect()->route('asignatura.index');
            } else {
                flash("La Asignatura <strong>" . $asignatura->nombre . "</strong> no pudo ser eliminada. Error: " . $result)->error();
                return redirect()->route('asignatura.index');
            }
        //}
    }

    public function getAsignatura($id) {
        $asignatura = Asignatura::find($id);
        if ($asignatura != null) {
            $obj["value"] = $asignatura->total_hora;
            return json_encode($obj);
        } else {
            return "null";
        }
    }
}
