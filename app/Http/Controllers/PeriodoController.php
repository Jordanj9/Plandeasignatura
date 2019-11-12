<?php

namespace App\Http\Controllers;

use App\Auditoriaacademico;
use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return view('academico.periodo.list')->with('location', 'academico')->with('periodos', $periodos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academico.periodo.create')->with('location', 'academico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $periodo = new Periodo($request->all());
        foreach ($periodo->attributesToArray() as $key => $value) {
            $periodo->$key = strtoupper($value);
        }
        $result = $periodo->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE PERÍODOS. DATOS: ";
            foreach ($periodo->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El período <strong>" . $periodo->anio."-".$periodo->periodo. "</strong> fue almacenado de forma exitosa!")->success();
            return redirect()->route('periodo.index');
        } else {
            flash("El período  <strong>" . $periodo->anio."-".$periodo->periodo. "</strong> no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('periodo.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Periodo $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Periodo $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo = Periodo::find($id);
        return view('academico.periodo.edit')
            ->with('location', 'academico')
            ->with('periodo', $periodo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Periodo $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $periodo = Periodo::find($id);
        $m = new Periodo($periodo->attributesToArray());
        foreach ($periodo->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $periodo->$key = strtoupper($request->$key);
            }
        }
        $result = $periodo->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE PERÍODOS. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($periodo->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Período <strong>" . $periodo->anio." - ".$periodo->periodo."</strong> fue modificado de forma exitosa!")->success();
            return redirect()->route('periodo.index');
        } else {
            flash("El Período <strong>" . $periodo->anio." - ".$periodo->periodo. "</strong> no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('periodo.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Periodo $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $periodo = Periodo::find($id);
        /**if (count($periodo->departamentos) > 0) {
            flash("El Período <strong>". $periodo->anio."-".$periodo->periodo.  "</strong> no pudo ser eliminado porque tiene Plan de Trabajos & Carga Academica  asociados.")->warning();
            return redirect()->route('facultad.index');
        } else {**/
            $result = $periodo->delete();
            if ($result) {
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE PERÍODOS. DATOS ELIMINADOS: ";
                foreach ($periodo->attributesToArray() as $key => $value) {
                    $str = $str . ", " . $key . ": " . $value;
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Período <strong>" . $periodo->anio."-".$periodo->periodo. "</strong> fue eliminado de forma exitosa!")->success();
                return redirect()->route('facultad.index');
            } else {
                flash("El Período<strong>" . $periodo->anio."-".$periodo->periodo. "</strong> no pudo ser eliminado. Error: " . $result)->error();
                return redirect()->route('periodo.index');
            }
        }
   // }
}
