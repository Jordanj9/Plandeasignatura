@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Académico </a><span
                        class="fa-angle-right fa"></span><a href="{{route('plandeasignatura.index')}}"> Planes </a><span
                        class="fa-angle-right fa"></span> Crear
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
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
                        <form class="form-horizontal" method="POST" action="{{route('plandeasignatura.store')}}">
                        @csrf
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Registro del Plan de Asignatura
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            Datos del Plan de Asignatura
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Datos del Plan de Asignatura
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                                            Datos del Plan de Asignatura
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Datos del Plan de Asignaturas</h5>
                                        <div class="row">
                                            <di class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">school</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Facultad</label>
                                                            <select class="form-control selectpicker"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;" required="required"
                                                                    title="--Seleccione una opción--"
                                                                    name="facultad_id">
                                                                @foreach($facultades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </di>
                                            <di class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">apartment</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Departamento</label>
                                                            <select class="form-control selectpicker"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;" required="required"
                                                                    title="--Seleccione una opción--"
                                                                    name="departamento_id">
                                                                @foreach($facultades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </di>
                                            <di class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">style</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Programa</label>
                                                            <select class="form-control selectpicker"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;" required="required"
                                                                    title="--Seleccione una opción--"
                                                                    name="programa_id">
                                                                @foreach($facultades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </di>
                                        </div>
                                        <div class="row justify-content-center" >
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">layers_clear</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                            <div class="form-line">
                                                                <label class="">Asignatura</label>
                                                            <select class="form-control selectpicker"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;" required="required"
                                                                    title="--Seleccione una opción--"
                                                                    name="facultad_id">
                                                                @foreach($facultades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Periodos</label>
                                                            <select class="form-control selectpicker"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;" required="required"
                                                                    title="--Seleccione una opción--"
                                                                    name="periodo_id">
                                                                @foreach($facultades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h5 style="margin-left: 60px"><strong>Trabajo semanal del estudiante</strong>
                                        </h5>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">watch_later</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control"
                                                                   placeholder="Docencia Directa"
                                                                   name="dodencia_directa" id="dodencia_directa"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">perm_data_setting</i>
                                                            </span>
                                                    </div>

                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control"
                                                                   placeholder="Trabajo Independiente"
                                                                   name="trabajo_independiente"
                                                                   id="trabajo_independiente"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">perm_contact_calendar</i>
                                                            </span>
                                                    </div>

                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control"
                                                                   placeholder="Trabajo semestral del estudiante"
                                                                   name="trabajo_semestral" id="trabajo_semestral"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">restore</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Pre-requisitos"
                                                                   name="prerequisitos" id="prerequisitos"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">update</i>
                                                            </span>
                                                    </div>

                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Co-requisitos"
                                                                   name="corequisitos" id="corequisitos"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center" style="margin-left: 100px">
                                            <div class="col-sm-12">
                                                <div class="input-group form-control-lg">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">

                                                            <label for="exampleInput1"
                                                                   class="bmd-label-floating" style="font-size: 20px">Presentación (Requerido)</label>
                                                            <br>
                                                            <textarea rows="10" class="form-control" name="presentacion" id="presentacion"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h5 class="info-text"> Datos del Plan de Asignatura </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-timeline card-plain">
                                                    <ul class="timeline">
                                                        <li>
                                                            <div class="timeline-badge "
                                                                 style="background-color: #e91e63">
                                                                <i class="material-icons">gavel</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-rose">Justificación (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <textarea rows="15"  id="justificacion" name="justificacion" placeholder=" Justificación" required></textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-inverted">
                                                            <div class="timeline-badge info">
                                                                <i class="material-icons">list</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-info">Objetivo General (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <textarea rows="10" class="form-control" id="objetivogeneral"name="objetivogeneral" required></textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge warning">
                                                                <i class="material-icons">filter_list</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-warning">Objetivos Especificos (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <textarea rows="10"class="form-control" id="objetivoespecificos" name="objetivoespecificos" required></textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <h5 class="info-text"> Datos del Plan de Asignatura </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-timeline card-plain">
                                                    <ul class="timeline">
                                                        <li>
                                                            <div class="timeline-badge warning ">
                                                                <i class="material-icons">outlined_flag</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-warning">Competencias Generales y específicas (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                                    <textarea rows="15" class="form-control" id="justificacion" name="competencias" placeholder=" competencias" required></textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="timeline-inverted">
                                                            <div class="timeline-badge info">
                                                                <i class="material-icons">account_tree</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-info">Metodologías (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <textarea rows="10"
                                                                              class="form-control"
                                                                              id="metodologias"
                                                                              name="metodologias"
                                                                              required>
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="timeline-badge"
                                                                 style="background-color: #e91e63">
                                                                <i class="material-icons">menu_book</i>
                                                            </div>
                                                            <div class="timeline-panel">
                                                                <div class="timeline-heading">
                                                                    <span class="badge badge-pill badge-rose">Estrategías Metodológicas (Requerido)</span>
                                                                </div>
                                                                <div class="timeline-body">
                                                                    <textarea rows="10"
                                                                              class="form-control"
                                                                              id="estrategias"
                                                                              name="estrategias"
                                                                              required>
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                           name="finish" value="Finish" style="display: none;">
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
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
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
    </script>
@endsection
