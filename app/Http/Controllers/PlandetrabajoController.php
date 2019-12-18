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
        $planes = Plandetrabajo::all();
        return view('plan.plan_de_trabajo.list')
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
        if (session('ROL') == 'DOCENTE') {

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

                if ($carga == null) {
                    flash("no tiene carga académica registrada para el periodo actual")->warning();
                    return redirect()->back();
                }

                $actividades = Actividaddocente::all();
                $items = Item::all();

                return view('plan.plan_de_trabajo.create')
                    ->with('location', 'plan')
                    ->with('carga', $carga)
                    ->with('docente', $doc)
                    ->with('actividades', $actividades)
                    ->with('items', $items)
                    ->with('periodo', $per);

            }

        } else {
            flash("Acción invalida para el usuario logeado")->warning();
            return redirect()->back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = new Plandetrabajo();
        $plan->docente_id = $request->docente_id;
        $plan->periodo_id = $request->periodo_id;
        $result = $plan->save();

        if ($result) {

            foreach ($request->actividades as $key => $value) {
                $plan->actividaddocentes()->attach($key, ['valor' => $value]);
            }
            flash("El Plan de Trabajo para el docente <strong>" . $plan->docente->primer_nombre . ' ' . $plan->docente->primer_apellido . "</strong>con los datos básicos fue almacenado de forma exitosa, clikea el boton seguir para continuar con el proceso")->success();
            return redirect()->route('plandetrabajo.index');

        } else {

            flash("El Plan de Trabajo para el docente <strong>" . $plan->docente->primer_nombre . ' ' . $plan->docente->primer_apellido . "</strong>no pudo ser almacenado de forma exitosa")->error();
            return redirect()->route('plandetrabajo.index');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Plandetrabajo $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function show(Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Plandetrabajo $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function edit(Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Plandetrabajo $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plandetrabajo $plandetrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plandetrabajo $plandetrabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plandetrabajo $plandetrabajo)
    {
        //
    }

    public function menuActividades($plan)
    {

        $plan = Plandetrabajo::find($plan);
        return view('plan.plan_de_trabajo.menu_actividades')
            ->with('plan', $plan)
            ->with('location', 'plan');

    }

    //ACTIVIDAD ORIENTACION
    public function orientacion($plan)
    {

        $trabajos = Trabajo::where([
            ['plandetrabajo_id', $plan],
            ['item_id',1]
        ])->get();

        $total = 0;
        foreach ($trabajos as $trabajo) {
            $total += $trabajo->hora_semana;
        }

        return view('plan.plan_de_trabajo.actividades.orientacion')
            ->with('location', 'plan')
            ->with('plan', $plan)
            ->with('trabajos', $trabajos)
            ->with('total', $total);
    }

    public function orientacion_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.orientacion_create')
            ->with('location', 'plan')
            ->with('plan', $plan);

    }



//ACTIVIDAD INVESTIGACION
    public function investigacion($plan)
    {
        $trabajos = Trabajo::where([
            ['plandetrabajo_id', $plan],
            ['item_id',2]
        ])->get();
        $total = 0;
        foreach ($trabajos as $trabajo) {
            $total += $trabajo->hora_semana;
        }

        return view('plan.plan_de_trabajo.actividades.investigacion')
            ->with('location', 'plan')
            ->with('plan', $plan)
            ->with('trabajos', $trabajos)
            ->with('total', $total);

    }

    public function investigacion_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.investigacion_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function guardar_trabajo(Request $request)
    {
        $trabajo = new Trabajo($request->all());
        $result = $trabajo->save();
        if ($result) {
            flash("La Actividad fue almacenada de forma exitosa")->success();
            return redirect()->back();
        } else {
            flash("La Actividad  no pudo ser almacenada de forma exitosa")->error();
            return redirect()->back();
        }
    }

    //ACTIVIDAD OTRAS
    public function otras($plan)
    {

        return view('plan.plan_de_trabajo.actividades.otras')
            ->with('location', 'plan')->with('plan', $plan);

    }

    public function otras_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.otras_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function otras_store(Request $request)
    {

    }

    //ACTIVIDAD COOPERACION
    public function cooperacion($plan)
    {

        return view('plan.plan_de_trabajo.actividades.cooperacion')
            ->with('location', 'plan')->with('plan', $plan);

    }

    public function cooperacion_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.cooperacion_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function cooperacion_store(Request $request)
    {

    }

//ACTIVIDAD ACTIVIDADES
    public function actividades($plan)
    {

        return view('plan.plan_de_trabajo.actividades.actividades')
            ->with('location', 'plan')
            ->with('plan', $plan);

    }

    public function actividades_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.actividades_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function actividades_store(Request $request)
    {

    }

    //ACTIVIDAD EXTENSION
    public function extension($plan)
    {

        return view('plan.plan_de_trabajo.actividades.extension')
            ->with('location', 'plan')->with('plan', $plan);

    }

    public function extension_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.extension_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function xtension_store(Request $request)
    {

    }

    //ACTIVIDAD CRECIMIENTO
    public function crecimiento($plan)
    {

        return view('plan.plan_de_trabajo.actividades.crecimiento')
            ->with('location', 'plan')->with('plan', $plan);

    }

    public function crecimiento_create($plan)
    {
        return view('plan.plan_de_trabajo.actividades.crecimiento_create')
            ->with('location', 'plan')
            ->with('plan', $plan);
    }

    public function crecimiento_store(Request $request)
    {

    }

}
