<?php

namespace App\Http\Controllers;

use App\Auditoriausuario;
use App\Docente;
use App\Http\Requests\DocenteRequest;
use App\User;
use App\Departamento;
use App\Auditoriaacademico;
use App\Grupousuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::all();
        if (count($docentes) > 0) {
            foreach ($docentes as $d) {
                $d->nombre = $d->primer_nombre . " " . $d->segundo_nombre . " " . $d->primer_apellido . " " . $d->segundo_apellido;
            }
        }
        return view('academico.docente.list')
            ->with('location', 'academico')
            ->with('docentes', $docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deptos = Departamento::all()->pluck('nombre', 'id');
        return view('academico.docente.create')
            ->with('location', 'academico')
            ->with('deptos', $deptos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Docente::where('identificacion', $request->identificacion)->first();
        if ($existe != null) {
            flash("El Docente con la identificación <strong>" . $request->identificacion . "</strong> ya existe. Atención!")->warning();
            return redirect()->route('docente.index');
        } else {
            $docente = new Docente($request->all());
            foreach ($docente->attributesToArray() as $key => $value) {
                if ($key == 'email') {
                    $docente->$key = $value;
                } else {
                    $docente->$key = strtoupper($value);
                }
            }
            $result = $docente->save();
            if ($result) {
                $u = Auth::user();
                $user = new User();
                $user->identificacion = $docente->identificacion;
                $user->estado = "ACTIVO";
                $user->email = $docente->email;
                $user->password = bcrypt($docente->identificacion);
                $user->nombres = $docente->primer_nombre . " " . $docente->segundo_nombre;
                $user->apellidos = $docente->primer_apellido . " " . $docente->segundo_apellido;
                $user->save();
                $g = Grupousuario::where('nombre', 'DOCENTE')->first();
                $user->grupousuarios()->sync($g->id);
                $aud = new Auditoriaacademico();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "INSERTAR";
                $str = "CREACIÓN DE DOCENTE. DATOS: ";
                foreach ($docente->attributesToArray() as $key => $value) {
                    if ($key == 'departamento_id') {
                        $str = $str . ", " . $key . ": " . $value . ", departamento:" . $docente->departamento->nombre;
                    } else {
                        $str = $str . ", " . $key . ": " . $value;
                    }
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> fue almacenado de forma exitosa!")->success();
                return redirect()->route('docente.index');
            } else {
                flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> no pudo ser almacenado. Error: " . $result)->error();
                return redirect()->route('docente.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        $docente->nombre = $docente->primer_nombre . " " . $docente->primer_apellido;
        $deptos = Departamento::all()->pluck('nombre', 'id');
        return view('academico.docente.edit')
            ->with('location', 'academico')
            ->with('docente', $docente)
            ->with('deptos', $deptos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        $m = new Docente($docente->attributesToArray());
        foreach ($docente->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                if ($key == 'email') {
                    $docente->$key = $request->$key;
                } else {
                    $docente->$key = strtoupper($request->$key);
                }
            }
        }
        $result = $docente->save();
        if ($result) {
            $u = Auth::user();
            $user = User::where('identificacion', $docente->identificacion)->first();
            foreach ($user->attributesToArray() as $key => $value) {
                if (isset($request->$key)) {
                    if ($key == 'email') {
                        $user->$key = $request->$key;
                    } else {
                        $user->$key = strtoupper($request->$key);
                    }
                }
            }
            $user->save();
            $aud = new Auditoriaacademico();
            $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
            $aud->operacion = "ACTUALIZAR DATOS";
            $str = "EDICION DE DOCENTE. DATOS NUEVOS: ";
            $str2 = " DATOS ANTIGUOS: ";
            foreach ($m->attributesToArray() as $key => $value) {
                if ($key == 'departamento_id') {
                    $str2 = $str2 . ", " . $key . ": " . $value . ", departamento:" . $m->departamento->nombre;
                } else {
                    $str2 = $str2 . ", " . $key . ": " . $value;
                }
            }
            foreach ($docente->attributesToArray() as $key => $value) {
                if ($key == 'departamento_id') {
                    $str = $str . ", " . $key . ": " . $value . ", departamento:" . $docente->departamento->nombre;
                } else {
                    $str = $str . ", " . $key . ": " . $value;
                }
            }
            $aud->detalles = $str . " - " . $str2;
            $aud->save();
            flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> fue modificado de forma exitosa!")->success();
            return redirect()->route('docente.index');
        } else {
            flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('docente.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        if (count($docente->cargaacademicas) > 0) {
            flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> no pudo ser eliminado porque tiene grupos asociados.")->warning();
            return redirect()->route('docente.index');
        } else {
            $result = $docente->delete();
            if ($result) {
                $user = User::where('identificacion', $docente->identificacion)->first();
                $user->delete();
                $aud = new Auditoriaacademico();
                $u = Auth::user();
                $aud->usuario = "ID: " . $u->identificacion . ",  USUARIO: " . $u->nombres . " " . $u->apellidos;
                $aud->operacion = "ELIMINAR";
                $str = "ELIMINACIÓN DE DOCENTE. DATOS ELIMINADOS: ";
                foreach ($docente->attributesToArray() as $key => $value) {
                    if ($key == 'departamento_id') {
                        $str = $str . ", " . $key . ": " . $value . ", departamento:" . $docente->departamento->nombre;
                    } else {
                        $str = $str . ", " . $key . ": " . $value;
                    }
                }
                $aud->detalles = $str;
                $aud->save();
                flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> fue eliminado de forma exitosa!")->success();
                return redirect()->route('docente.index');
            } else {
                flash("El Docente <strong>" . $docente->primer_nombre . " " . $docente->primer_apellido . "</strong> no pudo ser eliminado. Error: " . $result)->error();
                return redirect()->route('docente.index');
            }
        }
    }
}
