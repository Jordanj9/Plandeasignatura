<?php

namespace App\Http\Controllers;

use App\Auditoriaacademico;
use App\Cargaacademica;
use App\Departamento;
use App\Docente;
use App\Plandeasignatura;
use App\Periodo;
use App\Asignatura;
use App\Facultad;
use App\Auditoriaplan;
use Faker\Provider\lv_LV\Color;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\CollectsResources;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Comment\Doc;
use Symfony\Component\Console\Input\Input;

class PlandeasignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $u = Auth::user();
        $doc = Docente::where('identificacion',$u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        $planes = Plandeasignatura::all();
        if($doc != null){
            $per = Periodo::where([['fechainicio','<=',$a],['fechafin','>=',$a]])->first();
            if($per == null){
                $carga = collect();
            }else{
                $carga = Cargaacademica::where([['docente_id',$doc->id],['periodo_id',$per->id]])->get();
                if ($carga != null && $planes != null){
                    $pla= [];
                    foreach ($carga as $c){
                        foreach ($planes as $p){
                            if($c->asignatura_id == $p->asignatura_id){
                                if(!in_array($p,$pla)){
                                    $pla[] = $p;
                                }
                            }
                        }
                    }
                }
            }
            return view('plan.plan_de_asignatura.list')
                ->with('location', 'plan')
                ->with('planes', $pla);
        }else{
            return view('plan.plan_de_asignatura.list')
                ->with('location', 'plan')
                ->with('planes', $planes);
        }
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
        $validator = Validator::make($request->all(), [
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
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $existe = Plandeasignatura::where([['asignatura_id', $request->asignatura_id], ['periodo_id', $request->periodo_id]])->first();
        if ($existe != null) {
            flash("El Plan de Asignatura para los parametros seleccionados ya existe.Atención! ")->warning();
            return redirect()->route('plandeasignatura.index');
        } else {
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
    public function edit($id)
    {
        $plan = Plandeasignatura::find($id);
        $facultades = Facultad::all()->pluck('nombre', 'id');
        $per = Periodo::all();
        $periodos = collect();
        if ($per !== null) {
            $per = $per->sortByDesc('anio');
            foreach ($per as $value) {
                $periodos[$value->id] = $value->anio . " - " . $value->periodo;
            }
        }
        return view('plan.plan_de_asignatura.edit')
            ->with('location', 'plan')
            ->with('periodos', $periodos)
            ->with('plan', $plan)
            ->with('facultades', $facultades);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plan = Plandeasignatura::find($id);
        $m = new Plandeasignatura($plan->attributesToArray());
        foreach ($plan->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $plan->$key = $request->$key;
            }
        }
        $result = $plan->save();
        if ($result) {
            $u = Auth::user();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE PLAN DE ASIGNATURA. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                $str2 = $str2 . ", " . $key . ": " . $value;
            }
            foreach ($plan->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Plan de Asignatura <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> fue modificada de forma exitosa!")->success();
            return redirect()->route('plandeasignatura.index');
        } else {
            flash("El Plan de Asignatura <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> no pudo ser modificada. Error: " . $result)->error();
            return redirect()->route('plandeasignatura.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Plandeasignatura $plandeasignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plandeasignatura::find($id);
//        if (count($plan->unidads) > 0) {
//            flash("El Plan de Asignatura <strong>" . $plan->asignatura->codigo."-".$plan->asignatura->nombre . "</strong> no pudo ser eliminado porque tiene unidades asociados.")->warning();
//            return redirect()->route('facultad.index');
//        } else {
        $result = $plan->delete();
        if ($result) {
            $aud = new Auditoriaacademico();
            $u = Auth::user();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ELIMINAR";
            $str = "ELIMINACIÓN DE PLAN DE ASIGNATURA. DATOS ELIMINADOS: ";
            foreach ($plan->attributesToArray() as $key => $value) {
                $str = $str . ", " . $key . ": " . $value;
            }
            $aud->detalles = $str;
            $aud->save();
            flash("El Plan de asignatura <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> fue eliminado de forma exitosa!")->success();
            return redirect()->route('plandeasignatura.index');
        } else {
            flash("El Plan de asignatura <strong>" . $plan->asignatura->codigo . "-" . $plan->asignatura->nombre . "</strong> no pudo ser eliminado. Error: " . $result)->error();
            return redirect()->route('plandeasignatura.index');
        }
        //}
    }
}
