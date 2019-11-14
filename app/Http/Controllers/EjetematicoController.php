<?php

namespace App\Http\Controllers;

use App\Ejetematico;
use Illuminate\Http\Request;

class EjetematicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $eje =  new Ejetematico();
            $eje->nombre =  $request->nombre;
            $eje->unidad_id =  $request->unidad_id;
            $result = $eje->save();
            if($result){
                flash("El Eje Tematico  <strong>" .$request->nombre. "</strong> fue creado de forma exitosa!")->success();
            }else{
                flash("El Eje Tematico  <strong>" .$request->nombre. "</strong> no pudo ser creado de forma exitosa!")->error();
            }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ejetematico  $ejetematico
     * @return \Illuminate\Http\Response
     */
    public function show(Ejetematico $ejetematico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ejetematico  $ejetematico
     * @return \Illuminate\Http\Response
     */
    public function edit(Ejetematico $ejetematico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ejetematico  $ejetematico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ejetematico $ejetematico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ejetematico  $ejetematico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ejetematico $ejetematico)
    {
        //
    }
}
