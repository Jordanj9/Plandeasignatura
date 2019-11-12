<?php

namespace App\Http\Controllers;
use App\Auditoriaacademico;
use App\Facultad;
use App\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();
        return view('academico.grupo.list')
            ->with('location', 'academico')
            ->with('grupos', $grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academico.grupo.create')
            ->with('location', 'academico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo($request->all());
        foreach ($grupo->attributesToArray() as $key => $value) {
            $grupo->$key = strtoupper($value);
        }
        $result = $grupo->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE FACULTAD. DATOS: ";
            foreach ($grupo->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Grupo <strong>" . $grupo->nombre . "</strong> fue almacenado de forma exitosa!")->success();
            return redirect()->route('grupo.index');
        } else {
            flash("El Grupo <strong>" . $grupo->nombre . "</strong> no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('grupo.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        return view('academico.grupo.edit')
            ->with('location', 'academico')
            ->with('grupo', $grupo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupo= Grupo::find($id);
        $m = new Grupo($grupo->attributesToArray());
        foreach ($grupo->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $grupo->$key = strtoupper($request->$key);
            }
        }
        $result = $grupo->save();
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
            foreach ($grupo->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Grupo  <strong>" . $grupo->nombre . "</strong> fue modificado de forma exitosa!")->success();
            return redirect()->route('grupo.index');
        } else {
            flash("El Grupo  <strong>" . $grupo->nombre . "</strong> no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('grupo.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);

       /** if (count($grupo->departamentos) > 0) {
            flash("La Facultad <strong>" . $facultad->nombre . "</strong> no pudo ser eliminada porque tiene departamentos asociados.")->warning();
            return redirect()->route('facultad.index');
        } else {
        * */
            $result = $grupo->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE FACULTAD. DATOS ELIMINADOS: ";
                foreach ($grupo->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Grupo <strong>" . $grupo->nombre . "</strong> fue eliminado de forma exitosa!")->success();
                return redirect()->route('grupo.index');
            } else {
                flash("El Grupo <strong>" . $grupo->nombre . "</strong> no pudo ser eliminado. Error: " . $result)->error();
                return redirect()->route('grupo.index');
            }
       //}
    }
}
