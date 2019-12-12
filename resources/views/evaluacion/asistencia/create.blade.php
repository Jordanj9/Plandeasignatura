@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.evaluacion')}}"> Evaluación </a><span
                        class="fa-angle-right fa"></span><a href="{{route('asistencia.index')}}"> Asistencia </a><span
                        class="fa-angle-right fa"></span> Crear
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text col-md-6">
                        <h4 class="card-title">DATOS DE LA ASISTENCIA </h4>
                    </div>
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
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        @component('layouts.errors')
                        @endcomponent
                    </div>
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('asistencia.store')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">CARGA ACADEMICA</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="cargaacademica_id" id="cargaacademica_id" onchange="getEstudiantes()">
                                                    <option value="">--Seleccione una opción--</option>
                                                    @foreach($cargas as $key=>$value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Fecha de Asistencia</label>
                                                <input type="date" class="form-control"
                                                       placeholder="Digite la Fecha"
                                                       name="fechaasistencia" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                               width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>IDENTIFICACIÓN</th>
                                                <th>NOMBRE</th>
                                                <th>ASISTENCIA</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tb2">

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>IDENTIFICACIÓN</th>
                                                <th>NOMBRE</th>
                                                <th>ASISTENCIA</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <br/><br/><a href="{{route('asistencia.index')}}" class="btn btn-danger btn-round">Cancelar</a>
                                <button class="btn btn-info btn-round" type="reset">Limpiar Formulario</button>
                                <button class="btn btn-success btn-round" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                    <strong>Agregue nuevos docentes,</strong> gestione los docente pertenecientes a los diferentes
                    departamentos.
                    <br><strong>Nota: </strong>Recuerde que despues de registrar al docente debe dirigirce al modulo de
                    usuario y darle el rol con el cual ingresara al sistema.
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

        function getEstudiantes() {

            $("#tb2").html("");
            var carga = $("#cargaacademica_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url("evaluacion/asistencia/get/estudiante/")}}/' + carga + "/estudiantes",
                data: {},
            }).done(function (msg) {

                if (msg != "null") {
                    var m = JSON.parse(msg);
                    var html = "";
                    $.each(m, function (index, item) {
                        html = html + "<tr><td>" + item.identificacion + "</td>";
                        html = html + "<td>" + item.nombre + "</td>";
                        html = html + "<td><input type='checkbox' name='asistencia'></td>";
                        +"</tr>";
                    });

                    $("#tb2").html(html);
                    var table = $('#datatables').DataTable({

                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: 'Alerta, No hay estudiantes para los parametros seleccionados.'
                    }, {type: 'warning', timer: 3e3, placement: {from: 'top', align: 'right'}});
                    return;
                }
            });
        }
    </script>
@endsection
