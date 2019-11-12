@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Académico </a><span
                        class="fa-angle-right fa"></span><a href="{{route('asignatura.index')}}"> Asignaturas </a><span
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
                        <h4 class="card-title">DATOS DE LA ASIGNATURA</h4>
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
                        <form class="form-horizontal" method="POST" action="{{route('asignatura.store')}}">
                            @csrf
                            <br class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Codigo</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Escriba el codigo de la asignatura"
                                                   name="codigo" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Nombre</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Escriba el nombre del programa"
                                                   name="nombre" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Creditos</label>
                                            <input type="number" class="form-control"
                                                   max="20" min="0"
                                                   placeholder="Total de creditos de la asignatura"
                                                   name="creditos" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Total de Hora</label>
                                            <input type="number" class="form-control" min="0"
                                                   placeholder="Total de horas de la asignatura"
                                                   name="total_hora" required="required"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Naturaleza</label>
                                            <select class="selectpicker"
                                                    data-style="select-with-transition" style="width: 100%;"
                                                    required="required" title="--Seleccione una opción--"
                                                    name="naturaleza">
                                                <option value="TEORICO">TEÓRICO</option>
                                                <option value="PRACTICO">PRÁCTICO</option>
                                                <option value="TEORICO-PRACTICO">TEÓRICO-PRÁCTICO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Habilitable</label>
                                            <select class="selectpicker"
                                                    data-style="select-with-transition" style="width: 100%;"
                                                    required="required" title="--Seleccione una opción--"
                                                    name="habilitable">
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Horas Prácticas</label>
                                            <input type="number" class="form-control" min="0"
                                                    required="required" placeholder="Total de horas prácticas"
                                                   name="hora_practica"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Horas Teóricas</label>
                                            <input type="number" class="form-control" min="0"
                                                   required="required" placeholder="Total de horas teóricas"
                                                   name="hora_teorica"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <div class="form-line">
                                            <label class="control-label">Programa</label>
                                            <select class="form-control selectpicker"
                                                    data-style="select-with-transition" style="width: 100%;"
                                                    required="required" title="--Seleccione una opción--"
                                                    name="programa_id">
                                                @foreach($programas as $key=>$value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <br/><br/><a href="{{route('asignatura.index')}}" class="btn btn-danger btn-round">Cancelar</a>
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
