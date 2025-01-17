@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.plan')}}"> Módulo Planes </a><span
                        class="fa-angle-right fa"></span>
                    Plan de Desarrollo de Asignatura
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
                        <h4 class="card-title">PLANES - PLAN DE DESARROLLO DE ASIGNATURA</h4>
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
                    <div class="material-datatables">
                        @if(session('ROL') == 'DOCENTE')
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0"
                                   width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>CODIGO DE LA ASIGNATURA</th>
                                    <th>ASIGNATURA</th>
                                    <th>PERIODO</th>
                                    <th>PRE-REQUISITOS</th>
                                    <th>CO-REQUISITOS</th>
                                    <th>CREADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($planes as $p)
                                    <tr>
                                        <td>{{$p->asignatura->codigo}}</td>
                                        <td>{{$p->asignatura->nombre}}</td>
                                        <td>{{$p->periodo->anio."-".$p->periodo->periodo}}</td>
                                        <td>{{$p->prerequisitos}}</td>
                                        <td>{{$p->corequisitos}}</td>
                                        <td>{{$p->created_at}}</td>
                                        <td>
                                            <a href="{{ route('plandedesarrolloasignatura.crear',$p->id)}}"
                                               class="btn btn-link btn-success btn-just-icon remove"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="Crear Plan de Desarrollo de Asignatura"><i
                                                    class="material-icons">note_add</i></a>
                                            <a href="{{ route('plandedesarrolloasignatura.show',$p->id)}}"
                                               class="btn btn-link btn-success btn-just-icon remove"
                                               data-toggle="tooltip"
                                               data-placement="top" title="Ver Plan de Desarrollo de Asignatura"><i
                                                    class="material-icons">remove_red_eye</i></a>
                                            <a target="_blank" href="{{ route('plandedesarrolloasignatura.imprimir',$p->id)}}"
                                               class="btn btn-link btn-just-icon remove" data-toggle="tooltip"
                                               data-placement="top" style="color: #38A970" title="Imprimir"><i
                                                    class="material-icons">print</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>CODIGO DE LA ASIGNATURA</th>
                                    <th>ASIGNATURA</th>
                                    <th>PERIODO</th>
                                    <th>PRE-REQUISITOS</th>
                                    <th>CO-REQUISITOS</th>
                                    <th>CREADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                   cellspacing="0"
                                   width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>CODIGO DE LA ASIGNATURA</th>
                                    <th>ASIGNATURA</th>
                                    <th>PERIODO</th>
                                    <th>PRE-REQUISITOS</th>
                                    <th>CO-REQUISITOS</th>
                                    <th>ESTADO</th>
                                    <th>DOCENTE</th>
                                    <th>CREADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plandesarrollos as $p)
                                    <tr>
                                        <td>{{$p->plandeasignatura->asignatura->codigo}}</td>
                                        <td>{{$p->plandeasignatura->asignatura->nombre}}</td>
                                        <td>{{$p->plandeasignatura->periodo->anio."-".$p->plandeasignatura->periodo->periodo}}</td>
                                        <td>{{$p->plandeasignatura->prerequisitos}}</td>
                                        <td>{{$p->plandeasignatura->corequisitos}}</td>
                                        <td>{{$p->estado}}</td>
                                        <td>{{$p->docente->primer_nombre." ".$p->docente->primer_apellido}}</td>
                                        <td>{{$p->created_at}}</td>
                                        <td>
                                            <a href="{{ route('plandedesarrolloasignatura.show',$p->id)}}"
                                               class="btn btn-link btn-success btn-just-icon remove"
                                               data-toggle="tooltip"
                                               data-placement="top" title="Ver Plan de Desarrollo de Asignatura"><i
                                                    class="material-icons">remove_red_eye</i></a>
                                            <a target="_blank" href="{{ route('plandedesarrolloasignatura.imprimir',$p->id)}}"
                                               class="btn btn-link btn-just-icon remove" data-toggle="tooltip"
                                               data-placement="top" style="color: #38A970" title="Imprimir"><i
                                                    class="material-icons">print</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>CODIGO DE LA ASIGNATURA</th>
                                    <th>ASIGNATURA</th>
                                    <th>PERIODO</th>
                                    <th>PRE-REQUISITOS</th>
                                    <th>CO-REQUISITOS</th>
                                    <th>ESTADO</th>
                                    <th>DOCENTE</th>
                                    <th>CREADO</th>
                                    <th>ACCIONES</th>
                                </tr>
                                </tfoot>
                            </table>
                        @endif
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
                    <strong>Detalles: </strong>Gestione los planes de Desarrollo de Asignaturas.
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-mini modal-primary" id="addUnidad" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <strong>Detalles: </strong>Gestione los planes de Desarrollo de Asignaturas.
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
