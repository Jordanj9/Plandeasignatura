@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Académico </a><span
                        class="fa-angle-right fa"></span><a href="{{route('docente.index')}}">
                        Docentes </a><span
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
                        <h4 class="card-title">EDITAR DATOS DEL DOCENTE : {{$docente->nombre}}</h4>
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
                              action="{{route('docente.update',$docente->id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PUT"/>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Tipo de Documento</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="tipo_documento">
                                                    @if($docente->tipo_documento == 'CC')
                                                        <option value="CC" selected>CEDULA DE CIUDADANÍA</option>
                                                        <option value="CE">CEDULA DE EXTRANJERÍA</option>
                                                        <option value="PS">PASAPORTE</option>
                                                    @elseif($docente->tipo_documento == 'CE')
                                                        <option value="CC">CEDULA DE CIUDADANÍA</option>
                                                        <option value="CE" selected>CEDULA DE EXTRANJERÍA</option>
                                                        <option value="PS">PASAPORTE</option>
                                                    @else
                                                        <option value="CC">CEDULA DE CIUDADANÍA</option>
                                                        <option value="CE">CEDULA DE EXTRANJERÍA</option>
                                                        <option value="PS" selected>PASAPORTE</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Documento de Identidad</label>
                                                <input type="text" class="form-control"
                                                       placeholder="Número de identificación"
                                                       name="identificacion" value="{{$docente->identificacion}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Sede</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition"
                                                        title="--Seleccione una opción--">
                                                    @if($docente->sede == 'VALLEDUPAR')
                                                        <option value="VALLEDUPAR" selected>VALLEDUPAR</option>
                                                        <option value="AGUACHICA">AGUACHICA</option>
                                                    @else
                                                        <option value="VALLEDUPAR" selected>VALLEDUPAR</option>
                                                        <option value="AGUACHICA">AGUACHICA</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Primer Nombre</label>
                                                <input type="text" class="form-control" maxlength="20"
                                                       placeholder="Primer nombre del docente"
                                                       name="primer_nombre" required="required"
                                                       value="{{$docente->primer_nombre}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Segundo Nombre</label>
                                                <input type="text" class="form-control" maxlength="20"
                                                       placeholder="Segundo Nombre del docente"
                                                       name="segundo_nombre" value="{{$docente->segundo_nombre}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Primer Apellido</label>
                                                <input type="text" class="form-control" maxlength="20"
                                                       placeholder="Primer nombre del docente"
                                                       name="primer_apellido" required="required"
                                                       value="{{$docente->primer_apellido}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Segundo Apellido</label>
                                                <input type="text" class="form-control" maxlength="20"
                                                       placeholder="Segundo Apellido del docente"
                                                       name="segundo_apellido" required="required"
                                                       value="{{$docente->segundo_apellido}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Categoría</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="categoria">
                                                    @if($docente->categoria == 'AUXILIAR')
                                                        <option value="AUXILIAR" selected>AUXILIAR</option>
                                                        <option value="ASISTENTE">ASISTENTE</option>
                                                        <option value="ASOCIADO">ASOCIADO</option>
                                                        <option value="TITULAR">TITULAR</option>
                                                    @elseif($docente->categoria == 'ASISTENTE')
                                                        <option value="AUXILIAR">AUXILIAR</option>
                                                        <option value="ASISTENTE" selected>ASISTENTE</option>
                                                        <option value="ASOCIADO">ASOCIADO</option>
                                                        <option value="TITULAR">TITULAR</option>
                                                    @elseif($docente->categoria == 'ASOCIADO')
                                                        <option value="AUXILIAR">AUXILIAR</option>
                                                        <option value="ASISTENTE">ASISTENTE</option>
                                                        <option value="ASOCIADO" selected>ASOCIADO</option>
                                                        <option value="TITULAR">TITULAR</option>
                                                    @else
                                                        <option value="AUXILIAR">AUXILIAR</option>
                                                        <option value="ASISTENTE">ASISTENTE</option>
                                                        <option value="ASOCIADO">ASOCIADO</option>
                                                        <option value="TITULAR" selected>TITULAR</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Vinculación</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="vinculacion">
                                                    @if($docente->vinculacion == 'PLANTA')
                                                        <option value="PLANTA" selected>PLANTA</option>
                                                        <option value="OCACIONAL">OCACIONAL</option>
                                                    @else
                                                        <option value="PLANTA">PLANTA</option>
                                                        <option value="OCACIONAL" selected>OCACIONAL</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Dedicación</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="dedicacion">
                                                    @if($docente->dedicacion == 'EXCLUSIVA')
                                                        <option value="EXCLUSIVA" selected>EXCLUSIVA</option>
                                                        <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
                                                        <option value="MEDIO TIEMPO">MEDIO TIEMPO</option>
                                                        <option value="CATEDRA">CÁTEDRA</option>
                                                    @elseif($docente->dedicacion == 'TIEMPO COMPLETO')
                                                        <option value="EXCLUSIVA">EXCLUSIVA</option>
                                                        <option value="TIEMPO COMPLETO" selected>TIEMPO COMPLETO
                                                        </option>
                                                        <option value="MEDIO TIEMPO">MEDIO TIEMPO</option>
                                                        <option value="CATEDRA">CÁTEDRA</option>
                                                    @elseif($docente->dedicacion == 'MEDIO TIEMPO')
                                                        <option value="EXCLUSIVA">EXCLUSIVA</option>
                                                        <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
                                                        <option value="MEDIO TIEMPO" selected>MEDIO TIEMPO</option>
                                                        <option value="CATEDRA">CÁTEDRA</option>
                                                    @else
                                                        <option value="EXCLUSIVA">EXCLUSIVA</option>
                                                        <option value="TIEMPO COMPLETO">TIEMPO COMPLETO</option>
                                                        <option value="MEDIO TIEMPO">MEDIO TIEMPO</option>
                                                        <option value="CATEDRA" selected>CÁTEDRA</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Email</label>
                                                <input type="email" class="form-control" maxlength="100"
                                                       placeholder="Correo electronico del docente"
                                                       name="email" required="required" value="{{$docente->email}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Telefono</label>
                                                <input type="number" class="form-control"
                                                       placeholder="Telefono del docente"
                                                       name="telefono" value="{{$docente->telefono}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Departamento</label>
                                                <select class="form-control selectpicker"
                                                        data-style="select-with-transition" style="width: 100%;"
                                                        required="required" title="--Seleccione una opción--"
                                                        name="departamento_id">
                                                    @foreach($deptos as $key=>$value)
                                                        @if($key==$docente->departamento->id)
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
                                <br/><br/><a href="{{route('docente.index')}}"
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
                    <strong>Detalles: </strong> Edite la información del docente seleccionado.
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
    </script>
@endsection
