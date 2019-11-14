<?php

namespace App\Http\Controllers;

use App\Auditoriaacademico;
use App\Plandeasignatura;
use App\Periodo;
use App\Asignatura;
use App\Facultad;
use App\Auditoriaplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlandeasignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plandeasignatura::all();
        return view('plan.plan_de_asignatura.list')
            ->with('location', 'plan')
            ->with('planes', $planes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultades = Facultad::all()->pluck('nombre', 'id');
        $per = Periodo::all();
        $periodos = collect();
        if ($per !== null) {
            $per = $per->sortByDesc('anio');
            foreach ($per as $value) {
                $periodos[$value->id] = $value->anio . " - " . $value->periodo;
            }
        }
        return view('plan.plan_de_asignatura.create')
            ->with('location', 'plan')
            ->with('periodos', $periodos)
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
        $request->validate([
            'dodencia_directa' => 'required',
            'trabajo_independiente' => 'required',
            'corequisitos' => 'required',
            'prerequisitos' => 'required',
            'presentacion' => 'required',
            'justificacion' => 'required',
            'objetivogeneral' => 'required',
            'objetivoespecificos' => 'required',
            'competencias' => 'required',
            'metodologias' => 'required',
            'estrategias' => 'required',
            'periodo_id' => 'required',
            'asignatura_id' => 'required'
        ]);
        $plan = new Plandeasignatura($request->all());
        $result = $plan->save();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "INSERTAR";
            $str = "CREACIÓN DE PLAN DE ASIGNATURA. DATOS: ";
            foreach ($plan->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Plan de Asignatura para <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> fue almacenado de forma exitosa!")->success();
            return redirect()->route('plandeasignatura.index');
        } else {
            flash("La Facultad <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('plandeasignatura.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public
    function show(Plandeasignatura $plandeasignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Plandeasignatura $plandeasignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Plandeasignatura $plandeasignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Plandeasignatura $plandeasignatura)
    {
        //
    }
}
