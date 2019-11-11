<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Auditoriaacademico;
use App\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptos = Departamento::all();
        return view('academico.departamento.list')
            ->with('location', 'academico')
            ->with('deptos', $deptos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades = Facultad::all()->pluck('nombre', 'id');
        return view('academico.departamento.create')
            ->with('location', 'academico')
            ->with('facultades', $facultades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $depto = new Departamento($request->all());
        foreach ($depto->attributesToArray() as $key => $value) {
            $depto->$key = strtoupper($value);
        }
        $result = $depto->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE DEPARTAMENTO. DATOS: ";
            foreach ($depto->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Departamento <strong>" . $depto->nombre . "</strong> fue almacenada de forma exitosa!")->success();
            return redirect()->route('departamento.index');
        } else {
            flash("El Departamento <strong>" . $depto->nombre . "</strong> no pudo ser almacenada. Error: " . $result)->error();
            return redirect()->route('departamento.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $depto = Departamento::find($id);
        $facultades = Facultad::all()->pluck('nombre', 'id');
        return view('academico.departamento.edit')
            ->with('location', 'academico')
            ->with('depto', $depto)
            ->with('facultades', $facultades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $depto = Departamento::find($id);
        $m = new Departamento($depto->attributesToArray());
        foreach ($depto->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $depto->$key = strtoupper($request->$key);
            }
        }
        $result = $depto->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE DEPARTAMENTO. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($depto->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Departamento <strong>" . $depto->nombre . "</strong> fue modificado de forma exitosa!")->success();
            return redirect()->route('periodo.index');
        } else {
            flash("El Departamento <strong>" . $depto->nombre . "</strong> no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('periodo.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Departamento $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depto = Facultad::find($id);
        if (count($depto->programas) > 0) {
            flash("El departamento <strong>" . $depto->nombre . "</strong> no pudo ser eliminado porque tiene programas asociados.")->warning();
            return redirect()->route('departamento.index');
        } else {
            $result = $depto->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE DEPARTAMENTO. DATOS ELIMINADOS: ";
                foreach ($depto->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Departemento<strong>" . $depto->nombre . "</strong> fue eliminado de forma exitosa!")->success();
                return redirect()->route('departamento.index');
            } else {
                flash("El Departemento <strong>" . $depto->nombre . "</strong> no pudo ser eliminado. Error: " . $result)->error();
                return redirect()->route('departamento.index');
            }
        }
    }
}
