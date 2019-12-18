<?php

namespace App\Http\Controllers;

use App\Cargaacademica;
use App\Docente;
use App\Facultad;
use App\Periodo;
use App\Plandeasignatura;
use App\Plandedesarrolloasignatura;
use App\Semana;
use App\Unidad;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            $planesdesarrollos = Plandedesarrolloasignatura::all();
            return view('plan.plan_de_desarrollo_asignatura.list')
                ->with('location', 'plan')
                ->with('plandesarrollos', $planesdesarrollos)
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
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $plandesarrollo = Plandedesarrolloasignatura::where([['docente_id', $doc->id], ['plandeasignatura_id', $planAsignatura->id]])->first();
        $undidades = Unidad::where('plandeasignatura_id', $planAsignatura->id)->orderBy('nombre')->get()->pluck('nombre', 'id');
        $fechainicio = strtotime($planAsignatura->periodo->fechainicio);
        $fechafin = strtotime($planAsignatura->periodo->fechafin);
        $semanas = [];
        $con = 1;
        for ($i = $fechainicio; $i <= $fechafin; $i += (86400 * 7)) {
            $FirstDay = date("Y-m-d", strtotime('monday last week', $i));
            $LastDay = date("Y-m-d", strtotime('saturday last week', $i));
            $semanas["semana " . $con . " DEL " . $FirstDay . " AL " . $LastDay] = "semana " . $con . " DEL " . $FirstDay . " AL " . $LastDay;
            $con++;
        }
        $u = Auth::user();
        $docente = Docente::where('identificacion', $u->identificacion)->first();
        return view('plan.plan_de_desarrollo_asignatura.create')
            ->with('location', 'plan')
            ->with('planasignatura', $planAsignatura)
            ->with('unidades', $undidades)
            ->with('docentes', $docente)
            ->with('plandesarrollo', $plandesarrollo)
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
//        $existe = Plandedesarrolloasignatura::whereHas('semana', function ($query) use ($request) {
//            $query->where('semana', $request->semana);
//        })->first();
        $existe = Semana::where([['plandedesarrolloasignatura_id', $request->plandesarrollo], ['semana', $request->semana]])->first();
        if ($existe != null) {
            flash("La semana seleccionada <strong>" . $request->semana . "</strong> ya esta almacenada. Atencion!")->warning();
            return redirect()->route('plandedesarrolloasignatura.crear', $request->plandeasignatura_id);
        }
        if ($request->plandesarrollo == 'null') {
            $plandesarrollo = new Plandedesarrolloasignatura();
            $plandesarrollo->plandeasignatura_id = $request->plandeasignatura_id;
            $plandesarrollo->docente_id = $request->docente_id;
            $result2 = $plandesarrollo->save();
        } else {
            $plandesarrollo = Plandedesarrolloasignatura::find($request->plandesarrollo);
        }
        $semana = new Semana();
        $semana->semana = $request->semana;
        $semana->tema_trabajo = $request->tema_trabajo;
        $semana->estrategias = $request->estrategias;
        $semana->competencias = $request->competencias;
        $semana->unidad_id = $request->unidad_id;
        $semana->plandedesarrolloasignatura_id = $plandesarrollo->id;
        $evaluaciones = $request->evaluacion;
        $bibliografias = $request->bibliografia;
        if ($evaluaciones != null) {
            $string = null;
            foreach ($evaluaciones as $item) {
                $hoy = getdate();
                $name = "Evaluación_" . $hoy["year"] . $hoy["mon"] . $hoy["mday"] . $hoy["hours"] . $hoy["minutes"] . $hoy["seconds"] . "_" . $item->GetClientOriginalName();
                $path = public_path() . "/docs/evaluacion/";
                $item->move($path, $name);
                $string = $string . $name . ";";
            }
            $semana->evaluacion = $string;
        }
        if ($bibliografias != null) {
            $string = null;
            foreach ($bibliografias as $item) {
                $hoy = getdate();
                $name = "Bibliografia_" . $hoy["year"] . $hoy["mon"] . $hoy["mday"] . $hoy["hours"] . $hoy["minutes"] . $hoy["seconds"] . "_" . $item->GetClientOriginalName();
                $path = public_path() . "/docs/bibliografia/";
                $item->move($path, $name);
                $string = $string . $name . ";";
            }
            $semana->bibliografia = $string;
        }
        $result = $semana->save();
        $semana->ejetematicos()->sync($request->ejetematico_id);
        if ($result) {
            flash("La Semana <strong>" . $semana->semana . "</strong> fue almacenada de forma exitosa para el plan de desarrollo de asignatura")->success();
            return redirect()->route('plandedesarrolloasignatura.crear', $plandesarrollo->plandeasignatura_id);
        } else {
            flash("La Semana <strong>" . $semana->semana . "</strong> no pudo ser almacenada. Error: " . $result)->error();
            return redirect()->route('plandedesarrolloasignatura.crear', $request->plandeasignatura_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Plandedesarrolloasignatura $plandedesarrolloasignatura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        if ($doc != null) {
            $docente = $doc;
            $plandeasignatura = Plandeasignatura::find($id);
            $plandesarrollo = Plandedesarrolloasignatura::where([['docente_id', $doc->id], ['plandeasignatura_id', $plandeasignatura->id]])->first();
        } else {
            $plandesarrollo = Plandedesarrolloasignatura::find($id);
            $plandeasignatura = $plandesarrollo->plandeasignatura;
            $docente = $plandesarrollo->docente;
        }
        $undidades = Unidad::where('plandeasignatura_id', $plandeasignatura->id)->orderBy('nombre')->get()->pluck('nombre', 'id');
        if ($plandesarrollo != null) {
            $semanas = $plandesarrollo->semanas;
            if ($semanas != null) {
                foreach ($semanas as $item) {
                    $item->eval = explode(';', $item->evaluacion);
                    $item->bibl = explode(';', $item->bibliografia);
                }
            }
            return view('plan.plan_de_desarrollo_asignatura.show')
                ->with('location', 'plan')
                ->with('plandeasignatura', $plandeasignatura)
                ->with('plandedesarrollos', $plandesarrollo)
                ->with('unidades', $undidades)
                ->with('semanas', $semanas)
                ->with('docentes', $docente);
        } else {
            flash("El plan de asignatura seleccionado no tiene plan de desarrollo creado. Atención!: ")->warning();
            return redirect()->route('plandedesarrolloasignatura.index');
        }
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

    public function getEjetematicos($id)
    {
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

    public function imprimir($id)
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        if ($doc != null) {
            $docente = $doc;
            $plandeasignatura = Plandeasignatura::find($id);
            $plandesarrollo = Plandedesarrolloasignatura::where([['docente_id', $doc->id], ['plandeasignatura_id', $plandeasignatura->id]])->first();

        } else {
            $plandesarrollo = Plandedesarrolloasignatura::find($id);
            $plandeasignatura = $plandesarrollo->plandeasignatura;
            $docente = $plandesarrollo->docente;
        }
        $unidades = Unidad::where('plandeasignatura_id', $plandeasignatura->id)->orderBy('nombre')->get()->pluck('nombre', 'id');
        if ($plandesarrollo != null) {
            $semanas = $plandesarrollo->semanas;
            if ($semanas != null) {
                foreach ($semanas as $item) {
                    $item->eval = explode(';', $item->evaluacion);
                    $item->bibl = explode(';', $item->bibliografia);
                }
            }

            $pdf = PDF::loadView('plan.plan_de_desarrollo_asignatura.print', compact('plandesarrollo', 'unidades', 'semanas', 'docente', 'plandeasignatura'));
            $paper_size = array(0,0,1400,1000);
            $pdf->setPaper($paper_size);
            //$pdf->setPaper("A4","landscape");
            return $pdf->stream('Plan_de_Asignatura.pdf');
        } else {
            flash("El plan de asignatura seleccionado no tiene plan de desarrollo creado. Atención!: ")->warning();
            return redirect()->route('plandedesarrolloasignatura.index');
        }


    }

}
