<?php

namespace App\Http\Controllers;

use App\Cargaacademica;
use App\Docente;
use App\Facultad;
use App\Periodo;
use App\Plandeasignatura;
use App\Plandedesarrolloasignatura;
use App\Unidad;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlandedesarrolloasignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        $planes = Plandeasignatura::all();
        if (session('ROL') == 'DOCENTE') {
            $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
            if ($per == null) {
                $carga = collect();
            } else {
                $carga = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();
                if ($carga != null && $planes != null) {
                    $pla = [];
                    foreach ($carga as $c) {
                        foreach ($planes as $p) {
                            if ($c->asignatura_id == $p->asignatura_id) {
                                if (!in_array($p, $pla)) {
                                    $pla[] = $p;
                                }
                            }
                        }
                    }
                }
            }
            return view('plan.plan_de_desarrollo_asignatura.list')
                ->with('location', 'plan')
                ->with('planes', $pla);
        } else {
            return view('plan.plan_de_desarrollo_asignatura.list')
                ->with('location', 'plan')
                ->with('planes', $planes);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @param Plandeasignatura $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $planAsignatura = Plandeasignatura::find($id);
        $undidades = Unidad::where('plandeasignatura_id', $planAsignatura->id)->orderBy('nombre')->get()->pluck('nombre', 'id');
        $fechainicio = strtotime($planAsignatura->periodo->fechainicio);
        $fechafin = strtotime($planAsignatura->periodo->fechafin);
        $semanas = [];
        $con = 1;
        for ($i = $fechainicio; $i <= $fechafin; $i += (86400 * 7)) {
            $FirstDay = date("Y-m-d", strtotime('monday last week', $i));
            $LastDay = date("Y-m-d", strtotime('saturday last week', $i));
            $semanas[$con] = "semana " . $con . " DEL " . $FirstDay . " AL " . $LastDay;
            $con++;
        }
        $u = Auth::user();
        $docente = Docente::where('identificacion', $u->identificacion)->first();
        return view('plan.plan_de_desarrollo_asignatura.create')
            ->with('location', 'plan')
            ->with('planasignatura', $planAsignatura)
            ->with('unidades', $undidades)
            ->with('docentes', $docente)
            ->with('semanas', $semanas);
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
     * @param \App\Plandedesarrolloasignatura $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Plandedesarrolloasignatura $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Plandedesarrolloasignatura $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plandedesarrolloasignatura $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plandedesarrolloasignatura $plandedesarrolloasignatura)
    {
        //
    }

    public function getEjetematicos($id) {
        $unidad = Unidad::find($id);
        $eje = $unidad->ejetematicos;
        if (count($eje) > 0) {
            $ejestematicos = null;
            foreach ($eje as $value) {
                $obj["id"] = $value->id;
                $obj["value"] = $value->nombre;
                $ejestematicos[] = $obj;
            }
            return json_encode($ejestematicos);
        } else {
            return "null";
        }
    }

}
