<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Show the view menu usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuarios()
    {
        return view('menu.usuarios')->with('location', 'usuarios');
    }

    /**
     * Show the view menu academico.
     *
     * @return \Illuminate\Http\Response
     */
    public function academico()
    {
        return view('menu.academico')->with('location', 'academico');
    }

    /**
     * Show the view menu plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function plan()
    {
        return view('menu.plan')->with('location', 'plan');
    }
    /**
     * Show the view menu evaluacion.
     *
     * @return \Illuminate\Http\Response
     */
    public function evaluacion()
    {
        return view('menu.evaluacion')->with('location', 'evaluacion');
    }
}
