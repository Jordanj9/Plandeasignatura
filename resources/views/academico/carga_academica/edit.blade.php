@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Académico </a><span
                        class="fa-angle-right fa"></span><a href="{{route('carga_academica.index')}}">
                        Carga Académica </a><span
                        class="fa-angle-right fa"></span> Editar
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
                        <h4 class="card-title">EDITAR DATOS DE LA CARGA ACADÉMICA : {{$carga->docente->primer_nombre." ".$carga->docente->primer_apellido}}</h4>
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
                        <form class="form-horizontal" method="POST"
                              action="{{route('carga_academica.update',$carga->id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PUT"/>
                            <input name="asignatura" type="hidden" value="{{$carga->asignatura_id}}" id="asignatura"/>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Facultad: <i style="color: red">{{$carga->asignatura->programa->departamento->facultad->nombre}}</i></label>
                                                <select class="select2" onchange="getDepartamentos()"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        id="facultad_id">
                                                    <option value="">--Seleccione una opción--</option>
                                                    @foreach($facultades as $facultad)
                                                        <option value="{{$facultad->id}}">{{$facultad->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Departamento: <i style="color: red">{{$carga->asignatura->programa->departamento->nombre}}</i></label>
                                                <select class="select2" onchange="getProgramas()"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        id="departamento_id">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Programa: <i style="color: red">{{$carga->asignatura->programa->nombre}}</i></label>
                                                <select class="select2" onchange="getAsignaturas()"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        title="--Seleccione una opción--"
                                                        id="programa_id">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Asignaturas: <i style="color: red">{{$carga->asignatura->codigo." ".$carga->asignatura->nombre}}</i></label>
                                                <select class="select2" onchange="cambiar()"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        title="--Seleccione una opción--"
                                                        name="asignatura_id" id="asignatura_id">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Grupo</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required"
                                                        name="grupo_id">
                                                    @foreach($grupos as $key=>$value)
                                                        @if($key==$carga->grupo_id)
                                                            <option value="{{$key}}" selected="">{{$value}}</option>
                                                        @else
                                                            <option value="{{$key}}">{{$value}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Periodo</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="periodo_id">
                                                    <option value="">--Seleccione una opción--</option>
                                                    @foreach($periodos as $key=>$value)
                                                        @if($key==$carga->periodo_id)
                                                            <option value="{{$key}}" selected="">{{$value}}</option>
                                                        @else
                                                            <option value="{{$key}}">{{$value}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <br/><br/><a href="{{route('carga_academica.index')}}"
                                             class="btn btn-danger btn-round">Cancelar</a>
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
                    <strong>Detalles: </strong> Edite la carga académica seleccionada. <br>
                    <strong>Nota: </strong>Si no desea cambiar la asignatura no seleccione ninguna.
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

        function getPersona(event) {
            event.preventDefault();
            var id = $("#docente").val();
            if (id.length === 0) {
                $.notify({
                    icon: "add_alert",
                    message: '<strong>Atención!</strong><br>Debe ingresar identificación para continuar...'
                }, {type: 'warning', timer: 3e3, placement: {from: 'top', align: 'right'}});
            } else {
                const url ='{{url('academico/docente')}}/' + id + "/buscar";
                axios.get(url)
                    .then(function (response) {
                        const data = response.data;
                        if (data.status == "ok") {
                            document.getElementById('datos_docente').style.display = 'flex';
                            document.getElementById('docente_id').value = data.id;
                            const nombres =  document.getElementById('nombre_docente');
                            nombres.value = data.nombre;
                            const departamento =  document.getElementById('departamento_docente');
                            departamento.value = data.departamento;
                        } else {
                            $.notify({
                                icon: "add_alert",
                                message: '<strong>Atención!</strong><br>'+data.message,
                            }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                        }
                    });
            }
        }
        function getDepartamentos() {
            var id = $("#facultad_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url('academico/facultad/')}}/'+ id + "/get/departamentos",
                data: {},
            }).done(function (msg) {
                $('#departamento_id option').each(function () {
                    $(this).remove();
                });
                if (msg !== "null") {
                    var m = JSON.parse(msg);
                    $("#departamento_id").append("<option value=''>"+"--Seleccione una opción--"+"</option>");
                    $.each(m, function (index, item) {
                        $("#departamento_id").append("<option value='" + item.id + "'>" + item.value + "</option>");
                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: '<strong>Atención!</strong><br>La Facultad seleccionada no posee Departamentos asociados.'
                    }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }
        function getProgramas() {
            var id = $("#departamento_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url('academico/departamento/')}}/'+ id + "/get/programas",
                data: {},
            }).done(function (msg) {
                $('#programa_id option').each(function () {
                    $(this).remove();
                });
                if (msg !== "null") {
                    var m = JSON.parse(msg);
                    $("#programa_id").append("<option value=''>"+"--Seleccione una opción--"+"</option>");
                    $.each(m, function (index, item) {
                        $("#programa_id").append("<option value='" + item.id + "'>" + item.value + "</option>");
                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: '<strong>Atención!</strong><br>El Departamento seleccionada no posee Departamentos asociados.'
                    }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }
        function getAsignaturas() {
            var id = $("#programa_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url('academico/programa/')}}/'+ id + "/get/asignaturas",
                data: {},
            }).done(function (msg) {
                $('#asignatura_id option').each(function () {
                    $(this).remove();
                });
                if (msg !== "null") {
                    var m = JSON.parse(msg);
                    $("#asignatura_id").append("<option value=''>"+"--Seleccione una opción--"+"</option>");
                    $.each(m, function (index, item) {
                        $("#asignatura_id").append("<option value='" + item.id + "'>" + item.value + "</option>");
                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: '<strong>Atención!</strong><br>El programa seleccionada no posee asignaturas asociados.'
                    }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }
        function cambiar() {
            var id = $("#asignatura_id").val();
            $("#asignatura").val(id);
        }
    </script>
@endsection
