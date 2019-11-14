<?php

namespace App\Http\Controllers;

use App\Auditoriausuario;
use App\Facultad;
use App\Auditoriaacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::all();
        return view('academico.facultad.list')
            ->with('location', 'academico')
            ->with('facultades', $facultades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academico.facultad.create')
            ->with('location', 'academico');
    }

    public function getDepartamentos($id) {
        $facultad = Facultad::find($id);
        $deptos = $facultad->departamentos;
        if (count($deptos) > 0) {
            $departamentos = null;
            foreach ($deptos as $value) {
                $obj["id"] = $value->id;
                $obj["value"] = $value->nombre;
                $departamentos[] = $obj;
            }
            return json_encode($departamentos);
        } else {
            return "null";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facultad = new Facultad($request->all());
        foreach ($facultad->attributesToArray() as $key => $value) {
            $facultad->$key = strtoupper($value);
        }
        $result = $facultad->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE FACULTAD. DATOS: ";
            foreach ($facultad->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> fue almacenada de forma exitosa!")->success();
            return redirect()->route('facultad.index');
        } else {
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> no pudo ser almacenada. Error: " . $result)->error();
            return redirect()->route('facultad.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Facultad $facultad
     * @return \Illuminate\Http\Response
     */
    public function show(Facultad $facultad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Facultad $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facultad = Facultad::find($id);
        return view('academico.facultad.edit')
            ->with('location', 'academico')
            ->with('facultad', $facultad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Facultad $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facultad = Facultad::find($id);
        $m = new Facultad($facultad->attributesToArray());
        foreach ($facultad->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $facultad->$key = strtoupper($request->$key);
            }
        }
        $result = $facultad->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE FACULTAD. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($facultad->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> fue modificada de forma exitosa!")->success();
            return redirect()->route('facultad.index');
        } else {
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> no pudo ser modificada. Error: " . $result)->error();
            return redirect()->route('facultad.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Facultad $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facultad = Facultad::find($id);
        if (count($facultad->departamentos) > 0) {
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> no pudo ser eliminada porque tiene departamentos asociados.")->warning();
            return redirect()->route('facultad.index');
        } else {
            $result = $facultad->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE FACULTAD. DATOS ELIMINADOS: ";
                foreach ($facultad->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("La Facultad <strong>" . $facultad->nombre . "</strong> fue eliminada de forma exitosa!")->success();
                return redirect()->route('facultad.index');
            } else {
                flash("La Facultad <strong>" . $facultad->nombre . "</strong> no pudo ser eliminada. Error: " . $result)->error();
                return redirect()->route('facultad.index');
            }
        }
    }
}
