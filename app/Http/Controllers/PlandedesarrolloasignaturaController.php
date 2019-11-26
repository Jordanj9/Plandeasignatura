<?php

namespace App\Http\Controllers;

use App\Plandedesarrolloasignatura;
use Illuminate\Http\Request;

class PlandedesarrolloasignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plan.plan_de_desarrollo_asignatura.create')->with('location','plan');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plandedesarrolloasignatura  $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plandedesarrolloasignatura  $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plandedesarrolloasignatura  $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plandedesarrolloasignatura  $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }
}
