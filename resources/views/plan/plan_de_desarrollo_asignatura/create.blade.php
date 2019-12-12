@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.plan')}}"> Modulo Plan </a><span
                        class="fa-angle-right fa"></span><a href="{{route('plandedesarrolloasignatura.index')}}"> Plan
                        de Desarrollo Asignatura </a><span
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
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                              action="{{route('plandedesarrolloasignatura.store')}}">
                            @csrf
                            @if($plandesarrollo == null)
                                <input type="hidden" name="plandesarrollo" value="null">
                            @else
                                <input type="hidden" name="plandesarrollo" value="{{$plandesarrollo->id}}">
                            @endif
                            <input type="hidden" name="docente_id" value="{{$docentes->id}}">
                            <input type="hidden" name="plandeasignatura_id" value="{{$planasignatura->id}}">
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Registro del Plan de Desarrollo de Asignatura
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            Datos del Plan de Desarrollo de Asignatura
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Datos del Plan de Desarrollo de Asignatura
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Datos del Plan de Asignatura</h5>
                                        <!--      Tabla --- Datos del plan de Asignatura       -->
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%">
                                                <tr>
                                                    <th colspan="1">Docente:</th>
                                                    <td colspan="9">{{$docentes->primer_nombre." ".$docentes->segundo_nombre." ".$docentes->primer_apellido." ".$docentes->segundo_apellido}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Correo:</th>
                                                    <td colspan="10">{{$docentes->email}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Programa:</th>
                                                    <td colspan="9">{{$planasignatura->asignatura->programa->nombre}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Facultad:</th>
                                                    <td colspan="9">{{$planasignatura->asignatura->programa->departamento->facultad->nombre}}</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">Asignatura:
                                                        <strong>{{$planasignatura->asignatura->nombre}}</strong></th>
                                                    <td><strong>CODIGO: </strong>{{$planasignatura->asignatura->codigo}}
                                                    </td>
                                                    <td>
                                                        <strong>CREDITOS: </strong>{{$planasignatura->asignatura->creditos}}
                                                    </td>
                                                    <td>
                                                        <strong>NATURALEZA: </strong>{{$planasignatura->asignatura->naturaleza}}
                                                    </td>
                                                    <td colspan="9">
                                                        <strong>HABILITABLE: </strong>{{$planasignatura->asignatura->habilitable}}
                                                    </td>
                                                <tr>
                                                    <th colspan="1">Periodo:
                                                        <strong> {{$planasignatura->periodo->anio}}</strong></th>
                                                    <td><strong>PERIODO
                                                            ACADEMICO: </strong> {{$planasignatura->periodo->periodo}}
                                                    </td>
                                                    <td><strong>FECHA INICIAL
                                                            : </strong>{{$planasignatura->periodo->fechainicio}}</td>
                                                    <td colspan="2"><strong>FECHA FINAL
                                                            : </strong>{{$planasignatura->periodo->fechafin}}</td>

                                                </tr>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--      Tabla --- Datos del plan de Asignatura        -->
                                        <br>
                                        <div class="col-sm-12 bg-success"><h5 class="info-text"
                                                                              style="color: white; padding: 15px">
                                                <strong>Datos del Plan de Desarrollo de Asignatura</strong>
                                            </h5>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">layers_clear</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Semanas</label>
                                                            <select class="form-control select2"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;"
                                                                    title="--Seleccione una opción--"
                                                                    name="semana" id="semana" required="required">
                                                                <option value="">--Seleccione una opción--</option>
                                                                @foreach($semanas as $key=>$value)
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
                                                                <i class="material-icons">layers_clear</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Unidad</label>
                                                            <select class="form-control select2"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%;"
                                                                    name="unidad_id" id="unidad_id" required="required"
                                                                    onchange="getEjesTematicos()">
                                                                <option value="">--Seleccione una opción--</option>
                                                                @foreach($unidades as $key=>$value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">date_range</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label class="">Ejes Tematicos</label>
                                                            <select class="form-control select2"
                                                                    data-style="select-with-transition"
                                                                    style="width: 100%"
                                                                    title="--Seleccione una opción--"
                                                                    name="ejetematico_id[]" id="ejetematico_id"
                                                                    required="required"
                                                                    multiple="">
                                                                <option value="">--Seleccione una opción--</option>
                                                            </select>
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
                                                            <label for="exampleInput1"
                                                                   class="bmd-label-floating">Temas de Trabajo
                                                                Independiente (Requerido) </label>
                                                            <textarea rows="7" class="form-control" name="tema_trabajo"
                                                                      required="required"
                                                                      id="tema_trabajo_id"></textarea>
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
                                                            <label for="exampleInput1"
                                                                   class="bmd-label-floating">Estrategias Metodológicas
                                                                o Acciones Pedagógicas(Requerido) </label>
                                                            <textarea rows="7" class="form-control" name="estrategias"
                                                                      required="required"
                                                                      id="estrategias_id"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="row justify-content">
                                            <div class="col-sm-12">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">restore</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group bmd-form-group">
                                                        <div class="form-line">
                                                            <label for="exampleInput1"
                                                                   class="bmd-label-floating">Competencias
                                                                (Requerido) </label><textarea rows="7"
                                                                                              class="form-control"
                                                                                              name="competencias"
                                                                                              id="competencias_id"
                                                                                              required="required"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">layers_clear</i>
                                                            </span> <label for="exampleInput1"
                                                                           class="bmd-label-floating"> Evaluaciones
                                                                (Requerido)</label>
                                                        </div>
                                                    </div>
                                                    <div class="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div class="form-line">
                                                            <input type="file" class="form-control"
                                                                   placeholder="Evaluaciones" name="evaluacion[]"
                                                                   required="required"
                                                                   multiple/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div>
                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">layers_clear</i>
                                                            </span> <label for="exampleInput1"
                                                                           class="bmd-label-floating">Bibliografias
                                                                (Requerido) </label>
                                                        </div>
                                                    </div>
                                                    <div class="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div class="form-line">
                                                            <input type="file" class="form-control"
                                                                   placeholder="Bibliografia" name="bibliografia[]"
                                                                   required="required"
                                                                   multiple/>
                                                        </div>
                                                    </div>
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
                                           name="finish" value="Finish" style="display: none;" id="finish">
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
    </script>
@endsection
