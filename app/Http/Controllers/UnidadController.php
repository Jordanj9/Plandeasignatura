<?php

namespace App\Http\Controllers;

use App\Plandeasignatura;
use App\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function  inicio($id){

        $plan = Plandeasignatura::find($id);
        $unidades = $plan->unidades;
        return view('plan.plan_de_asignatura.unidad')
            ->with('location','plan')
            ->with('unidades',$unidades)
            ->with('plan',$plan->id);

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

        $str = 'UNIDAD '.$request->unidad;

        $existe = Unidad::where([
            ['nombre',$str]
        ])->first();

        if($existe==null){
            $unidad =  new Unidad();
            $unidad->nombre =  $str;
            $unidad->descripcion =  $request->descripcion;
            $unidad->plandeasignatura_id = $request->plan;
            $result = $unidad->save();
            if($result){
                flash("La  <strong>" .$str." : ".$request->descripcion. "</strong> fue creada de forma exitosa!")->success();
            }else{
                flash("La  <strong>" .$str." : ".$request->descripcion. "</strong> no pudo ser creada de forma exitosa!")->error();
            }

        }else{
            flash("La  <strong>" .$str." : ".$request->descripcion. "</strong> se encuentra registrada previamente.")->error();
        }

        return redirect()->route('unity.inicio',$request->plan);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
