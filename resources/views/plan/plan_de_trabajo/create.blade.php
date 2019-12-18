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
                            <input type="hidden" name="docente_id" value="{{$docente->id}}">
                            <input type="hidden" name="periodo_id" value="{{$periodo->id}}">
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
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
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
                                                                @if($actividad->id == 10)
                                                                    <input name="actividades[{{$actividad->id}}]"
                                                                           required
                                                                           type="number" min="0" max="50"
                                                                           value="{{$asig}}">
                                                                @elseif($actividad->id == 11)
                                                                    <input name="actividades[{{$actividad->id}}]"
                                                                           required
                                                                           type="number" min="0" max="50"
                                                                           value="{{$grup}}">
                                                                @elseif($actividad->id == 12)
                                                                    <input name="actividades[{{$actividad->id}}]"
                                                                           required
                                                                           type="number" min="0" max="50"
                                                                           value="{{$est}}">
                                                                @else
                                                                    <input name="actividades[{{$actividad->id}}]"
                                                                           required
                                                                           type="number" min="0" max="50">
                                                                @endif
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
                                                                <input name="actividades[{{$actividad->id}}]" required
                                                                       type="number" min="0" max="50">
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
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
                                           name="finish" value="Guardar" style="display: none;" id="finish">
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
                    <strong>Agregue nuevas Tareas al Plan de Trabajo,</strong> gestione cada una de las actividades
                    docentes pertenecientes al plan de trabajo.
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
    </script>

@endsection
