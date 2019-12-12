<?php

namespace App\Http\Controllers;

use App\Cargaacademica;
use App\Docente;
use App\Estudiante;
use App\Evaluacion;
use App\Periodo;
use App\Plandeasignatura;
use App\Plandedesarrolloasignatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Auth::user();
        $estudiante = Estudiante::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
        $grupos = $estudiante->cargaacademicas;
        //$grupos = Cargaacademica::where([['estudiante_id', $estudiante->id], ['periodo_id', $per->id]])->get();
        $cargas = collect();
        if ($grupos != null) {
            foreach ($grupos as $item) {
                if ($item->periodo_id == $per->id) {
                    $cargas[] = $item;
                }
            }
        }
        return view('evaluacion.evaluacion.list')
            ->with('location', 'evaluacion')
            ->with('cargas', $cargas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valores = explode(',', $request->semana_id);
        $u = Auth::user();
        $estudiante = Estudiante::where('identificacion', $u->identificacion)->first();
        $existe = Evaluacion::where([['estudiante_id',$estudiante->id],['semana_id',$valores[0]],['ejetematico',$valores[1]]])->first();
        if($existe != null){
            flash("La Evaluación para el tema seleccionado ya fue almacenada")->warning();
            return redirect()->route('evaluacion.index');
        }
        $evaluacion = new Evaluacion();
        $evaluacion->calificacion = $request->calificacion;
        $evaluacion->descripcion = $request->descripcion;
        $evaluacion->semana_id = $valores[0];
        $evaluacion->ejetematico = $valores[1];
        $evaluacion->estudiante_id = $estudiante->id;
        $result=$evaluacion->save();
        if($result){
            flash("La Evaluación para el tema fue almacenada")->success();
            return redirect()->route('evaluacion.index');
        }else{
            flash("La Evaluación para el tema no fue almacenada")->error();
            return redirect()->route('evaluacion.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carga = Cargaacademica::find($id);
        $planasignatura = Plandeasignatura::where([['asignatura_id', $carga->id], ['periodo_id', $carga->periodo_id]])->first();
        $plandesarrollo = Plandedesarrolloasignatura::where([['docente_id', $carga->docente_id], ['plandeasignatura_id', $planasignatura->id]])->first();
        $sema = $plandesarrollo->semanas;
        if ($sema != null) {
            foreach ($sema as $s) {
                foreach ($s->ejetematicos as $item) {
                    $semanas[$s->id . "," . $item->id] = $s->semana . "-" . $s->unidad->nombre . ": " . $s->unidad->descripcion . " TEMA:" . $item->nombre;
                }
            }
        }
        return view('evaluacion.evaluacion.create')->with('location', 'evaluacion')->with('semanas', $semanas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Evaluacion $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        //
    }
}
