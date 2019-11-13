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
    {{--    <div class="row clearfix">--}}
    {{--        <div class="col-md-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header card-header-success card-header-text">--}}
    {{--                    <div class="card-text col-md-6">--}}
    {{--                        <h4 class="card-title">DATOS DEL PLAN</h4>--}}
    {{--                    </div>--}}
    {{--                    <div class="pull-right col-md-6">--}}
    {{--                        <ul class="navbar-nav pull-right">--}}
    {{--                            <li class="nav-item dropdown">--}}
    {{--                                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"--}}
    {{--                                   aria-haspopup="true" aria-expanded="false">--}}
    {{--                                    <i class="material-icons">more_vert</i>--}}
    {{--                                </a>--}}
    {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">--}}
    {{--                                    <a class="dropdown-item" href="#" data-toggle="modal"--}}
    {{--                                       data-target="#mdModal">Ayuda</a>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="card-body">--}}
    {{--                    <div class="col-md-12">--}}
    {{--                        @component('layouts.errors')--}}
    {{--                        @endcomponent--}}
    {{--                    </div>--}}
    {{--                    <div class="col-md-12">--}}
    {{--                        <form class="form-horizontal" method="POST" action="{{route('plandeasignatura.store')}}">--}}
    {{--                            @csrf--}}
    {{--                            <br class="col-md-12">--}}
    {{--                            <h5>Trabajo Semanal del Estudiante</h5>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-4">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <input type="number" class="form-control"--}}
    {{--                                                   placeholder="Horas de docencia directa"--}}
    {{--                                                   name="docencia_directa" required="required"/>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-4">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <input type="number" class="form-control"--}}
    {{--                                                   placeholder="Horas de trabajo independiente"--}}
    {{--                                                   name="trabajo_independiente" required="required"/>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-4">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <input type="number" class="form-control"--}}
    {{--                                                   placeholder="Horas de trabajo semestral del estudiante"--}}
    {{--                                                   name="trabajo_independiente" required="required"/>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <br>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-6">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <input type="text" class="form-control"--}}
    {{--                                                   placeholder="Pre-requisitos de la asignatura"--}}
    {{--                                                   name="prerequisito" />--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="col-md-6">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <input type="text" class="form-control"--}}
    {{--                                                   placeholder="Co-requisitos"--}}
    {{--                                                   name="corequisitos de la asignatura"/>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-md-12">--}}
    {{--                                    <div class="form-group bmd-form-group">--}}
    {{--                                        <div class="form-line">--}}
    {{--                                            <label class="control-label">Presentación</label>--}}
    {{--                                            <textarea class="form-control"--}}
    {{--                                                   name="corequisitos de la asignatura"></textarea>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group">--}}
    {{--                                <br/><br/><a href="{{route('plandeasignatura.index')}}" class="btn btn-danger btn-round">Cancelar</a>--}}
    {{--                                <button class="btn btn-info btn-round" type="reset">Limpiar Formulario</button>--}}
    {{--                                <button class="btn btn-success btn-round" type="submit">Guardar</button>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
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
                    <div class="card card-wizard" style="opacity: 1;" data-color="rose" id="wizardProfile">
                        <form class="form-horizontal" method="POST" action="{{route('plandeasignatura.store')}}">
                        @csrf
                        <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Registro del Plan de Asignatura
                                </h3>
                                <h5 class="card-description">This information will let us know more about you.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            Datos basicos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Datos de la empresa
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Datos de contacto</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                    <div class="input-group form-control-lg">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">face</i>
                                                            </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control"
                                                                   placeholder="Horas de docencia directa"
                                                                   name="docencia_directa" required="required"/>
                                                        </div>
                                                    </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">face</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Nombre
                                                            (required)</label>
                                                        <input type="text" class="form-control" id="nombreid"
                                                               name="nombre" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">email</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput1" class="bmd-label-floating">Email
                                                            (required)</label>
                                                        <input type="email" class="form-control" id="exampleemalil"
                                                               name="email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">payment</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput1"
                                                               class="bmd-label-floating">Identificación
                                                            (required)</label>
                                                        <input type="number" class="form-control"
                                                               id="identificacionid"
                                                               name="identificacion" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">record_voice_over</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput11" class="bmd-label-floating">Apellido
                                                            (required)</label>
                                                        <input type="text" class="form-control" id="apellidoid"
                                                               name="apellido" required>
                                                    </div>
                                                </div>
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">call</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput1"
                                                               class="bmd-label-floating">Telefono
                                                            (required)</label>
                                                        <input type="number" class="form-control" id="telefonoid"
                                                               name="telefono" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-3">
                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">map</i>
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInput1"
                                                               class="bmd-label-floating">Dirección
                                                            (required)</label>
                                                        <input type="text" class="form-control" id="direccionid"
                                                               name="direccion" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h5 class="info-text"> Datos de la Empresa </h5>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">credit_card</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Nit
                                                                    (required)</label>
                                                                <input type="text" class="form-control"
                                                                       id="nitid"
                                                                       name="nit" required>
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">view_carousel</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Dependencia
                                                                    (required)</label>
                                                                <input type="text" class="form-control"
                                                                       id="dependenciaid"
                                                                       name="dependencia" required>
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">map</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Dirección
                                                                    (required)</label>
                                                                <input type="text" class="form-control"
                                                                       id="direccionemp"
                                                                       name="direccionemp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">account_balance</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Nombre de la
                                                                    Empresa
                                                                    (required)</label>
                                                                <input type="number" class="form-control"
                                                                       id="empresaid"
                                                                       name="empresa" required>
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">email</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Email
                                                                    (required)</label>
                                                                <input type="email" class="form-control"
                                                                       id="emailemp"
                                                                       name="emailempresa" required>
                                                            </div>
                                                        </div>
                                                        <div class="input-group form-control-lg">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="material-icons">call</i>
                                                            </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput1"
                                                                       class="bmd-label-floating">Telefono
                                                                    (required)</label>
                                                                <input type="number" class="form-control"
                                                                       id="telefonoemp"
                                                                       name="telefonoemp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="address">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-12">
                                                <h5 class="info-text"> Are you living in a nice area? </h5>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-group">
                                                    <label>Street Name</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Street No.</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group select-wizard">
                                                    <label>Country</label>
                                                    <select class="selectpicker" data-size="7"
                                                            data-style="select-with-transition"
                                                            title="Single Select">
                                                        <option value="Afghanistan"> Afghanistan</option>
                                                        <option value="Albania"> Albania</option>
                                                        <option value="Algeria"> Algeria</option>
                                                        <option value="American Samoa"> American Samoa</option>
                                                        <option value="Andorra"> Andorra</option>
                                                        <option value="Angola"> Angola</option>
                                                        <option value="Anguilla"> Anguilla</option>
                                                        <option value="Antarctica"> Antarctica</option>
                                                    </select>
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
                                    <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next"
                                           value="Next">
                                    <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd"
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
