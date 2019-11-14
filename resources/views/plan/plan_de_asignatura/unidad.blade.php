@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Módulo Plan </a><span
                        class="fa-angle-right fa"></span><a
                        href="{{route('plandeasignatura.index')}}">Plan de Asignatura</a><span
                        class="fa-angle-right fa"></span>
                    Unidad
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
                        <h4 class="card-title">PLAN DE ASIGNATURA - UNIDADES </h4>
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
                                       data-target="#addUnidad">Agregar
                                        nueva unidad</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#mdModal">Ayuda</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                               width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITULO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unidades as $unidad)
                                <tr>
                                    <td>{{$unidad->id}}</td>
                                    <td>{{$unidad->nombre}}</td>
                                    <td>{{$unidad->descripcion}}</td>
                                    <td>
                                        <a href="{{ route('unity.edit',$unidad->id)}}"
                                           class="btn btn-link btn-info btn-just-icon remove" data-toggle="tooltip"
                                           data-placement="top" title="Editar Unidad"><i class="material-icons">mode_edit</i></a>
                                        <a href="{{ route('unity.delete',$unidad->id)}}"
                                           class="btn btn-link btn-danger btn-just-icon remove" data-toggle="tooltip"
                                           data-placement="top" title="Eliminar Asignatura"><i class="material-icons">delete</i></a>
                                        <a href=""
                                           class="btn btn-link btn-danger btn-just-icon remove" data-toggle="tooltip"
                                           data-placement="top" title="Agregar Eje Tematico"><i class="material-icons">plus</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>TITULO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                            </tfoot>
                        </table>
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
                    <strong>Detalles: </strong>Gestione las Unidades  pertenecientes al Plan de Asignatura.
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-mini modal-primary" id="addUnidad" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="POST" action="{{route('unity.store')}}">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Unidad</label>
                                                <input type="number" min="1" max="15" class="form-control"
                                                       placeholder="Numero de la Unidad"
                                                       name="unidad" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group bmd-form-group">
                                            <div class="form-line">
                                                <label class="control-label">Descripciòn</label>
                                                <input type="text" class="form-control"
                                                       placeholder="Numero de la Unidad"
                                                       name="descripcion" required="required"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$plan}}" name="plan">
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer justify-content-center">
                                <button class="btn btn-info btn-round" type="reset">Limpiar Formulario</button>
                                <button class="btn btn-success btn-round" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
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
