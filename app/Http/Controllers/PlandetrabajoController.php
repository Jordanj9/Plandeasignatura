<?php

namespace App\Http\Controllers;

use App\Actividaddocente;
use App\Cargaacademica;
use App\Docente;
use App\Item;
use App\Periodo;
use App\Plandetrabajo;
use App\Trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlandetrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('plan.plan_de_trabajo.list')->with('location', 'plan');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('ROL')=='DOCENTE'){

            $u = Auth::user();
            $doc = Docente::where('identificacion', $u->identificacion)->first();
            $hoy = getdate();
            $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
            $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();

            if ($per == null) {
                flash("no hay período académico")->warning();
                return redirect()->back();
            } else {
                $carga = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();

                if($carga==null){
                    flash("no tiene carga académica registrada para el periodo actual")->warning();
                    return redirect()->back();
                }

                $actividades = Actividaddocente::all();
                $items = Item::all();

                return view('plan.plan_de_trabajo.create')
                    ->with('location', 'plan')
                    ->with('carga',$carga)
                    ->with('docente',$doc)
                    ->with('actividades',$actividades)
                    ->with('items',$items)
                    ->with('periodo',$per);

            }

        }else{
            flash("Acción invalida para el usuario logeado")->warning();
            return redirect()->back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $plan = new Plandetrabajo();
        $plan->docente_id = $request->actividadesDocente[1]['docente_id'];
        $plan->periodo_id = $request->actividadesDocente[2]['periodo_id'];
        $plan->save();

        foreach ($request->actividadesDocente as $actividad){
            if($actividad['name'] != 'docente_id' && $actividad['name'] != 'periodo_id'){
                $plan->actividaddocentes()->attach($actividad['name'],['valor',$actividad['value']]);
            }
        }

        if(isset($request->orientacion)){
            foreach ($request->orientacion as $item){
                $ori = new Trabajo($item);
                $ori->item_id = 1;
                $ori->plandetrabajo_id = $plan->id;
                $ori->save();
            }
        }

        if(isset($request->orientacion)){
            foreach ($request->investigacion as $item){
                $ori = new Trabajo($item);
                $ori->item_id = 1;
                $ori->plandetrabajo_id = $plan->id;
                $ori->save();
            }
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plandetrabajo  $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plandetrabajo  $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plandetrabajo  $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plandetrabajo  $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plandetrabajo $plandetrabajo)
    {
        //
    }
}
