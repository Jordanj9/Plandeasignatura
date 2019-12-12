@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.plan')}}"> Modulo Plan </a><span
                        class="fa-angle-right fa"></span><a href="{{route('plandetrabajo.index')}}"> Plan
                        de Trabajo </a><span
                        class="fa-angle-right fa"></span> Crear
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12">
        @component('layouts.errors')
        @endcomponent
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 mr-auto ml-auto">
                <div class="pull-right col-md-6">
                    <ul class="navbar-nav pull-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                   data-target="#mdModal">Ayuda</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" style="opacity: 1;" data-color="green" id="wizardProfile">
                        <form id="plan" class="form-horizontal" method="POST" enctype="multipart/form-data"
                              action="{{route('plandetrabajo.store')}}">
                            @csrf
                            <input type="hidden" name="docente_id" value="">
                            <input type="hidden" name="plandeasignatura_id" value="">
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Registro del Plan de Trabajo
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            Datos del Plan de Trabajo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Datos del Plan de Trabajo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account2" data-toggle="tab" role="tab">
                                            Datos del Plan de Trabajo
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Datos del Plan De Trabajo</h5>
                                        <div class="col-md-12">
                                            <table align="right">
                                                <thead>
                                                <th>
                                                    <td>
                                                    PERIODO LECTIVO: 2019-2
                                                </td>
                                                </th>
                                                </thead>
                                            </table>
                                            <br>
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    DOCENTE
                                                </th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th colspan="1">1. DOCENTE:</th>
                                                    <td colspan="9">
                                                        <strong>{{$docente->primer_nombre.' '.$docente->primer_apellido}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">2. CATEGORIA
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>{{$docente->categoria}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">3. VINCULACION:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>{{$docente->vinculacion}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">4. DEDICACION:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>{{$docente->dedicacion}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">5. SEDE:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>{{$docente->sede}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">6. FACULTAD:
                                                        <strong></strong></th>
                                                    <td colspan="9">
                                                        <strong>{{$docente->departamento->facultad->nombre}}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">8. DEPARTAMENTO:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>{{$docente->departamento->nombre}}</strong>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9">
                                                    9. ASIGNATURA
                                                </th>
                                                </thead>
                                                <tr align="center">
                                                    <td rowspan="2"><b>CODIGO</b></td>
                                                    <td rowspan="2"><b>NOMBRE DE LA ASIGNATURA</b></td>
                                                    <td colspan="2"><b>I.H.S</b></td>
                                                </tr>
                                                <tr align="center">
                                                    <td><b>TEORICA</b></td>
                                                    <td><b>PRACTICA</b></td>
                                                </tr>
                                                @foreach($carga as $item)
                                                    <tr align="center">
                                                        <td><b>{{$item->asignatura->codigo}}</b></td>
                                                        <td>
                                                            <b>{{$item->asignatura->nombre.' ('.$item->grupo->nombre.')'}}</b>
                                                        </td>
                                                        <td colspan="1"><b>{{$item->asignatura->hora_teorica}}</b></td>
                                                        <td colspan="1"><b>{{$item->asignatura->hora_practica}}</b></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    ACTIVIDADES DOCENTE
                                                </th>
                                                </thead>
                                                <tbody>
                                                @foreach($actividades as $actividad)
                                                    @if($actividad->tipo =='DOCENTE')
                                                        <tr>
                                                            <td>{{$actividad->id.'. '.$actividad->nombre}}</td>
                                                            <td align="center">
                                                                <input name="valor-{{$actividad->id}}"
                                                                       type="number" min="0" max="50">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    ACTIVIDADES DOCENTES COMPLEMENTARIAS
                                                </th>
                                                </thead>
                                                <tbody>
                                                @foreach($actividades as $actividad)
                                                    @if($actividad->tipo =='COMPLEMENTARIAS')
                                                        <tr>
                                                            <td>{{$actividad->id.'. '.$actividad->nombre}}</td>
                                                            <td align="center">
                                                                <input name="valor-{{$actividad->id}}"
                                                                       type="number" min="0" max="50">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal"
                                               data-target="#orientacion"></a>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>INVESTIGACION APROBADA</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr2">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#investigacion"></a>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>EXTENSIÓN Y PROYECCIÓN SOCIAL</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr3">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#proyecionSocial"></a>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>COOPERACION INTERINSTITUCIONAL</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr4">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#cooperacion"></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account2">
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>CRECIMIENTO PERSONAL Y DESARROLLO</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr5">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#crecimiento"></a>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>ACTIVIDADES ADMINISTRATIVAS</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr6">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#activiadad"></a>
                                        </div>
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text"
                                                                        style="background-color: #38A970;color: white; padding: 3px;">
                                                    <strong>OTRAS ACTIVIDADES </strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr7">
                                            </div>
                                            <a class="fa fa-plus-circle btn btn-success btn-round btn-fab"
                                               style="color: white; margin-left:90%" data-toggle="modal" data-target="#otra"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="mr-auto">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd"
                                           name="previous" value="Previous">
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-next btn-fill btn-info btn-wd" name="next"
                                           value="Next">
                                    <input type="button" class="btn btn-finish btn-fill btn-info btn-wd"
                                           name="finish" onclick="guardarTodo(event)" value="Finish" style="display: none;" id="finish">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- wizard container -->
            </div>
        </div>
    </div>

    <div class="modal fade modal-mini modal-primary" id="mdModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <strong>Agregue nuevas asignaturas,</strong> gestione las asignaturas pertenecientes a un programa.
                    departamentos.
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>

    <!--modales para agregar nuevas actividades-->
    <div class="modal fade" id="orientacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE
                        GRADO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloOrientacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="actaOrientacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha" id="fechaOrientacion"
                                                name="fecha" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha Inicio" id="fecha_inicioOrientacion"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="fecha_finOrientacion"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Horas/Semanas" id="horasOrientacion"
                                                name="fechahora" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarOrientacion(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="investigacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">INVESTIGACION APROBADA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloInvestigacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="actaInvestigacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha" id="fechaInvestigacion"
                                                name="fecha" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha Inicio" id="fecha_inicioInvestigacion"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="fecha_finInvestigacion"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Horas/Semanas" id="horasInvestigacion"
                                                name="fechahora" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarInvestigacion(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="proyecionSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EXTENSIÓN Y PROYECCIÓN SOCIAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloProyecion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="descripcionProyecion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha" id="institucionProyecion"
                                                name="fecha" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="date" class="form-control"
                                                placeholder="Fecha Inicio" id="fechaProyecion"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="horaProyecion"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarProyecion(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cooperacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">COOPERACION INTERINSTITUCIONAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloCooperacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="descripcionCooperacion"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha" id="institucionCooperacion"
                                                name="fecha" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="date" class="form-control"
                                                placeholder="Fecha Inicio" id="fechaCooperacion"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="horaCooperacion"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarCooperacion(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="crecimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CRECIMIENTO PERSONAL Y DESARROLLO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloCrecimiento"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="actaCrecimiento"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha Inicio" id="institucionCrecimiento"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="date" class="form-control"
                                                placeholder="Fecha" id="fechaCrecimeinto"
                                                name="fecha" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="horaCrecimeinto"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarCrecimeiento(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="activiadad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ACTIVIDADES ADMINISTRATIVAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloActividad"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="actaActividad"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha Inicio" id="institucionActividad"
                                                name="fecha_inicio" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="date" class="form-control"
                                                placeholder="Fecha" id="fechaActividad"
                                                name="fecha" required="required"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Fecha de Terminación" id="horaActividad"
                                                name="fecha_fin" required="required"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarCrecimeiento(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="otra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ACTIVIDADES ADMINISTRATIVAS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="orientacion">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Titulo"
                                                name="titulo" required="required" id="tituloOtra"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <br/><input type="text" class="form-control"
                                                placeholder="Acta" name="acta" id="horaOtra"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <br/><br/><a href="#" data-dismiss="modal" class="btn btn-danger btn-round">Cancelar</a>
                        <button class="btn btn-success btn-round" type="submit" onclick="guardarOtras(event)">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">

        let orientacion = [];
        let investigacion = [];
        let proyecionSocial = [];
        let cooperacion = [];
        let crecimiento = [];
        let actividades = [];
        let otras = [];

        $(document).ready(function () {
            $('.select2').select2();
            $("#finish").attr('type', 'submit');
            md.checkFullPageBackgroundImage();
            // Initialise the wizard
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
        $(document).ready(function () {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });

            var table = $('#datatable').DataTable();

            // Edit record
            table.on('click', '.edit', function () {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
            });

            // Delete a record
            table.on('click', '.remove', function (e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });

            //Like record
            table.on('click', '.like', function () {
                alert('You clicked on Like button');
            });
        });

        function getEjesTematicos() {
            var id = $("#unidad_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url('plan/plandedesarrolloasignatura/')}}/' + id + "/get/ejetematicos",
                data: {},
            }).done(function (msg) {
                $('#ejetematico_id option').each(function () {
                    $(this).remove();
                });
                if (msg !== "null") {
                    var m = JSON.parse(msg);
                    $("#ejetematico_id").append("<option value=''>" + "--Seleccione una opción--" + "</option>");
                    $.each(m, function (index, item) {
                        $("#ejetematico_id").append("<option value='" + item.id + "'>" + item.value + "</option>");
                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: '<strong>Atención!</strong><br>La Unidad  seleccionada no posee Ejes Tematicos  asociados.'
                    }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }

        function guardarOrientacion(event) {

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloOrientacion').val(),
                'acta': $('#actaOrientacion').val(),
                'fecha': $('#fechaOrientacion').val(),
                'fecha_inicio': $('#fecha_inicioOrientacion').val(),
                'fecha_fin': $('#fecha_finOrientacion').val(),
                'fechahora': $('#horasOrientacion').val(),
            }

            orientacion.push(newObject);

            $('#tituloOrientacion').val("");
            $('#actaOrientacion').val("");
            $('#fechaOrientacion').val("");
            $('#fecha_inicioOrientacion').val("");
            $('#fecha_finOrientacion').val("");
            $('#horasOrientacion').val("");

        }
        function guardarInvestigacion(event) {

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloInvestigacion').val(),
                'acta': $('#actaInvestigacion').val(),
                'fecha': $('#fechaInvestigacion').val(),
                'fecha_inicio': $('#fecha_inicioInvestigacion').val(),
                'fecha_fin': $('#fecha_finInvestigacion').val(),
                'fechahora': $('#horasInvestigacion').val(),
            }

            investigacion.push(newObject);

            console.log(investigacion);

            $('#tituloInvestigacion').val("");
            $('#actaInvestigacion').val("");
            $('#fechaInvestigacion').val("");
            $('#fecha_inicioInvestigacion').val("");
            $('#fecha_finInvestigacion').val("");
            $('#horasInvestigacion').val("");

            $("#investigacion").modal('hide');

        }
        function guardarProyecion(event){

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloProyecion').val(),
                'descripcion': $('#descripcionProyecion').val(),
                'institucion': $('#institucionProyecion').val(),
                'fecha': $('#fechaProyecion').val(),
                'hora': $('#horaProyecion').val(),
            }

            proyecionSocial.push(newObject);

            $('#tituloProyecion').val("");
            $('#descripcionProyecion').val("");
            $('#institucionProyecion').val("");
            $('#fecha_inicioInvestigacion').val("");
            $('#fechaProyecion').val("");
            $('#horaProyecion').val("");

            $("#proyecionSocial").modal('hide');

        }
        function guardarCooperacion(event){

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloCooperacion').val(),
                'descripcion': $('#descripcionCooperacion').val(),
                'institucion': $('#institucionCooperacion').val(),
                'fecha': $('#fechaCooperacion').val(),
                'hora': $('#horaCooperacion').val(),
            }

            cooperacion.push(newObject);

            $('#tituloCoopereacion').val("");
            $('#descripcionCoopereacion').val("");
            $('#institucionCoopereacion').val("");
            $('#fecha_inicioCoopereacioncion').val("");
            $('#fechaCooperacion').val("");
            $('#horaCooperacion').val("");

            $('#cooperacion').modal('hide');

            console.log(cooperacion);
        }
        function guardarCrecimeiento(event) {

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloCrecimiento').val(),
                'acta': $('#actaCrecimiento').val(),
                'institucion': $('#institucionCrecimiento').val(),
                'fecha': $('#fechaCrecimeinto').val(),
                'hora': $('#horaCrecimeinto').val(),
            }

            crecimiento.push(newObject);

            $('#tituloCrecimiento').val("");
            $('#actaCrecimiento').val("");
            $('#institucionCrecimiento').val("");
            $('#fechaCrecimeinto').val("");
            $('#horaCrecimeinto').val("");

        }
        function guardarActividades(event) {

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloActividad').val(),
                'acta': $('#actaActividad').val(),
                'institucion': $('#institucionActividad').val(),
                'fecha': $('#fechaActividad').val(),
                'hora': $('#horaActividad').val(),
            }

            actividades.push(newObject);

            console.log(actividades);

            $('#tituloActividad').val("");
            $('#actaActividad').val("");
            $('#institucionActividad').val("");
            $('#fechaActividad').val("");
            $('#horaActividad').val("");

        }
        function guardarOtras(event) {

            event.preventDefault();

            let newObject = {
                'titulo': $('#tituloOtra').val(),
                'hora': $('#horaOtra').val(),
            }

            otras.push(newObject);

            $('#tituloOtra').val("");
            $('#horaOtra').val("");

            console.log(otras);

            $('#otra').modal('hide');

        }

        function guardarTodo(event){

            event.preventDefault();

            let actividadesDocente = $('#plan').serializeArray();

            let datos = {
                'actividadesDocente' :  actividadesDocente,
                'actividades':actividades,
                'orientacion' : orientacion,
                'investigacion' : investigacion,
                'proyecionSocial' : proyecionSocial,
                'crecimiento':crecimiento,
                'cooperacion': cooperacion,
                'otras': otras
            }

            console.log(datos);

           $.post({
               url : '{{url('plan/plandetrabajo/guardar/')}}',
               data : datos,
               method : 'POST',
               headers: {
                   'X-CSRF-Token': '{{csrf_token()}}',
               }
           }).done(function (msg) {
               console.log(msg);
           });
        }


    </script>

@endsection
