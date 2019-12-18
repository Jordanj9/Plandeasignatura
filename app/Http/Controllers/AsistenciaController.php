<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Cargaacademica;
use App\Departamento;
use App\Docente;
use App\Estudiante;
use App\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $asistencias = Asistencia::all()->groupBy('fecha');
//       // dd($asistencias);
//        //dd($asistencias);
//        foreach($asistencias as $as){
//            foreach ($as as $a){
//                dd($a);
//            }
//    }
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        if ($doc != null) {
            $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
            if ($per == null) {
                $cargaAcademica = collect();
            } else {
                $cargaAcademica = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();
            }
        } else {
            $cargaAcademica = Cargaacademica::all();
        }
        $asis = null;
        if($cargaAcademica != null){
            foreach ($cargaAcademica as $item){
               $obj = Asistencia::where('cargaacademica_id',$item->id)->get()->groupBy('fecha');
              if(count($obj)>0){
                  $asis[]=$obj;
              }
            }
        }
        $asistencias = collect();
        if($asis != null){
            foreach ($asis as $i){
                foreach ($i as $item) {
                    foreach ($item as $e){
                        $asistencias[]=$e;
                    }
                }
            }
        }
        return view('evaluacion.asistencia.list')
            ->with('location', 'evaluacion')
            ->with('asistencias', $asistencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $u = Auth::user();
        $doc = Docente::where('identificacion', $u->identificacion)->first();
        $hoy = getdate();
        $a = $hoy["year"] . "-" . $hoy["mon"] . "-" . $hoy["mday"];
        $per = Periodo::where([['fechainicio', '<=', $a], ['fechafin', '>=', $a]])->first();
        $grupos = Cargaacademica::where([['docente_id', $doc->id], ['periodo_id', $per->id]])->get();
        if ($grupos != null) {
            foreach ($grupos as $c) {
                $cargas[$c->id] = $c->asignatura->codigo . "-" . $c->asignatura->nombre . " - " . $c->grupo->nombre;
            }
        }
        return view('evaluacion.asistencia.create')
            ->with('location', 'evalcuacion')
            ->with('cargas', $cargas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Asistencia::where([['fecha',$request->fechaasistencia],['cargaacademica_id',$request->cargaacademica_id]])->first();
        if ($existe != null){
            flash("La asistencia para el <strong>" . $request->fechaasistencia . "</strong> ya fue almacenada. Atención!")->warning();
            return redirect()->route('asistencia.index');
        }
        $carga = Cargaacademica::find($request->cargaacademica_id);
        $estudiantes = $carga->estudiantes;
        if (isset($request->asistencia)) {
            foreach ($request->asistencia as $item) {
                foreach ($estudiantes as $est) {
                    $asistencia = new Asistencia();
                    $asistencia->fecha = $request->fechaasistencia;
                    $asistencia->estudiante_id = $item;
                    $asistencia->cargaacademica_id = $request->cargaacademica_id;
                    if ($est->id == $item) {
                        $asistencia->asistencia = "SI";
                    } else {
                        $asistencia->asistencia = "NO";
                    }
                    $asistencia->save();
                }
            }
            flash("La asistencia para el <strong>" . $request->fechaasistencia . "</strong> fue almacenada de forma exitosa")->success();
            return redirect()->route('asistencia.index');
        } else {
            foreach ($estudiantes as $est) {
                $asistencia = new Asistencia();
                $asistencia->fecha = $request->fechaasistencia;
                $asistencia->asistencia = "NO";
                $asistencia->estudiante_id = $est->id;
                $asistencia->cargaacademica_id = $request->cargaacademica_id;
                $asistencia->save();
            }
        }
        flash("La asistencia para el <strong>" . $request->fechaasistencia . "</strong> fue almacenada de forma exitosa")->success();
        return redirect()->route('asistencia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carga= Cargaacademica::find($id);
        $asis = Asistencia::find($id);
        $asistencia = Asistencia::where([['fecha',$asis->fecha],['cargaacademica_id',$asis->cargaacademica_id]])->get();
        //dd($carga);
        return view('evaluacion.asistencia.show')
            ->with('location','evaluacion')
            ->with('asistencia',$asistencia)
            ->with('asis',$asis)
            ->with('carga',$carga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function getEstudiantes($id)
    {
        $carga = Cargaacademica::find($id);
        $estud = $carga->estudiantes;
        if ($estud != null) {
            $estudiantes = null;
            foreach ($estud as $item) {
                $obj['id'] = $item->id;
                $obj['identificacion'] = $item->identificacion;
                $obj['nombre'] = $item->primer_apellido . " " . $item->segundo_apellido . " " . $item->primer_nombre . " " . $item->segundo_nombre;
                $estudiantes[] = $obj;
            }
            return json_encode($estudiantes);
        } else {
            return "null";
        }
    }
}
