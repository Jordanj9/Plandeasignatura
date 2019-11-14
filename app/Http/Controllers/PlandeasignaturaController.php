<?php

namespace App\Http\Controllers;

use App\Plandeasignatura;
use App\Periodo;
use App\Asignatura;
use App\Facultad;
use App\Auditoriaplan;
use Illuminate\Http\Request;

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
            foreach ($periodos as $value) {
                $periodos[$value->id] = $value->anio . " - " . $value->periodo;
            }
        }
        return view('plan.plan_de_asignatura.create')
            ->with('location', 'plan')
            ->with('periodos', $periodos)
            ->with('facultades',$facultades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Plandeasignatura $plandeasignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Plandeasignatura $plandeasignatura)
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
    public function update(Request $request, Plandeasignatura $plandeasignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plandeasignatura $plandeasignatura)
    {
        //
    }
}
