<?php

namespace App\Http\Controllers;

use App\Departamento;
use App\Programa;
use App\Auditoriaacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::all();
        return view('academico.programa.list')
            ->with('location', 'academico')
            ->with('programas', $programas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deptos = Departamento::all()->pluck('nombre', 'id');
        return view('academico.programa.create')
            ->with('location', 'academico')
            ->with('deptos', $deptos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programa = new Programa($request->all());
        foreach ($programa->attributesToArray() as $key => $value) {
            $programa->$key = strtoupper($value);
        }
        $result = $programa->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE PROGRAMA. DATOS: ";
            foreach ($programa->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Programa <strong>" . $programa->nombre . "</strong> fue almacenado de forma exitosa!")->success();
            return redirect()->route('programa.index');
        } else {
            flash("El Programa <strong>" . $programa->nombre . "</strong> no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('programa.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Programa $programa
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Programa $programa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programa = Programa::find($id);
        $deptos = Departamento::all()->pluck('nombre', 'id');
        return view('academico.programa.edit')
            ->with('location', 'academico')
            ->with('programa', $programa)
            ->with('deptos', $deptos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Programa $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $programa = Programa::find($id);
        $m = new Programa($programa->attributesToArray());
        foreach ($programa->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $programa->$key = strtoupper($request->$key);
            }
        }
        $result = $programa->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE PROGRAMA. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($programa->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Programa <strong>" . $programa->nombre . "</strong> fue modificado de forma exitosa!")->success();
            return redirect()->route('programa.index');
        } else {
            flash("El Programa <strong>" . $programa->nombre . "</strong> no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('programa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Programa $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programa = Programa::find($id);
        if (count($programa->asignaturas) > 0) {
            flash("El programa <strong>" . $programa->nombre . "</strong> no pudo ser eliminado porque tiene asignaturas asociados.")->warning();
            return redirect()->route('programa.index');
        } else {
            $result = $programa->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE PROGRAMA. DATOS ELIMINADOS: ";
                foreach ($programa->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Programa<strong>" . $programa->nombre . "</strong> fue eliminado de forma exitosa!")->success();
                return redirect()->route('programa.index');
            } else {
                flash("El Programa <strong>" . $programa->nombre . "</strong> no pudo ser eliminado. Error: " . $result)->error();
                return redirect()->route('programa.index');
            }
        }
    }
}
