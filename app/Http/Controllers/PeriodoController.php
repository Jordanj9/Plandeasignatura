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
        $fechainicio= strtotime($periodo->fechainicio);
        $fechafinal=strtotime($periodo->fechafin);
        $fechainicio1=strtotime($periodo->fechainicio1);
        $fechafin1=strtotime($periodo->fechafin1);
        $fechainicio2=strtotime($periodo->fechainicio2);
        $fechafin2=strtotime($periodo->fechafin2);
        $fechainicio3=strtotime($periodo->fechainicio3);
        $fechafin3=strtotime($periodo->fechafin3);

        if ($fechafinal <=$fechainicio){
            flash("La fecha  final  <strong>" . $periodo->fechafinal."-".$periodo->periodo. "</strong> debe ser mayor  a  la fecha  inicial ".$periodo->fechainicial )->error();
            return redirect()->route('periodo.index');
        }
        if ($fechafin1 <=$fechainicio1){
            flash("La fecha final del primer parcial  <strong>" . $periodo->fechafin1."-".$periodo->periodo. "</strong> debe ser mayor  a la fecha  inicial de clases  ".$periodo->fechainicio1 )->error();
            return redirect()->route('periodo.index');
        }
        if ($fechafin2 <=$fechainicio2){
            flash("La fecha final del segundo parcial <strong>" . $periodo->fechafin2."-".$periodo->periodo. "</strong> debe ser mayor  a la fecha  inicial del segundo parcial".$periodo->fechainicio2 )->error();
            return redirect()->route('periodo.index');
        }
        if ($fechafin3 <=$fechainicio3){
            flash("La fecha final del tercer parcial <strong>" . $periodo->fechafin3."-".$periodo->periodo. "</strong> debe ser mayor a la fecha inicial del tercer parcial ".$periodo->fechainicio3 )->error();
            return redirect()->route('periodo.index');
        }
        if($fechainicio2<=$fechafin1 || $fechainicio3<=$fechafin2){
            flash("La fechas  de los parciales deben ser cohorentes.")->warning();
            return redirect()->route('periodo.index');
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
