@extends('layouts.app')

@section('style')
    <style>
        table {
            width: 100%;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio</a> <span class="fa-angle-right fa"></span>
                    <a href="{{route('admin.plan')}}">Módulo Planes</a>
                    <span class="fa-angle-right fa"></span>
                    <a href="{{route('plandetrabajo.index')}}">Actividades del Docente</a>
                    <span class="fa-angle-right fa"></span>
                    <a href="{{route('menuActividades',$plan)}}">Gestión Cuadros Explicativos</a>
                    <span class="fa-angle-right fa"></span>
                    Cooperación
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
                        <h4 class="card-title">PLANES - GESTION DE ACTIVIDADES</h4>
                    </div>
                    <div class="pull-right col-md-6">
                        <ul class="navbar-nav pull-right">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a href="{{ route('cooperacion_create',$plan) }}" class="dropdown-item" href="#">Agregar
                                        Actividad de cooperación interinstitucional</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                       data-target="#mdModal">Ayuda</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <table>
                            <tbody>
                            <tr style="background-color: #38A970; color: white">
                                <td colspan="6">4. COOPERACIÓN INTERINSTITUCIONAL</td>
                                <td colspan="4">AUTORIZADA POR: </td>
                                <td>HORAS/SEMANAS</td>
                                <td>ACCIONES</td>
                            </tr>
                            <tr>
                                <td colspan="3">ACTIVIDADES</td>
                                <td colspan="3">DESCRIPCIÓN</td>
                                <td colspan="2">INSTITUCIÓN</td>
                                <td colspan="2">FECHA</td>
                                <td></td>
                                <td></td>
                            </tr>
                           @foreach($trabajos as $trabajo)
                               <tr>
                                   <td colspan="3">{{$trabajo->titulo}}</td>
                                   <td colspan="3">{{$trabajo->descripcion}}</td>
                                   <td colspan="2">{{$trabajo->institucion}}</td>
                                   <td colspan="2">{{$trabajo->fecha}}</td>
                                   <td><center>{{$trabajo->hora_semana}}</center></td>
                                   <td>
                                       <a href="{{route('eliminar_trabajo',$trabajo->id)}}"
                                          class="btn btn-link btn-danger btn-just-icon remove"
                                          data-toggle="tooltip"
                                          data-placement="top"
                                          title="Gestionar Actividades Docentes"><i
                                               class="material-icons">delete</i></a>
                                   </td>
                               </tr>
                           @endforeach
                            <tr>
                                <td colspan="10" style="text-align: center">TOTAL HORAS</td>
                                <td><center>{{$total}}</center></td>
                                <td></td>
                            </tr>

                            </tbody>
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
                    <strong>Detalles: </strong>Gestione cada una de las actividades de cooperación interinstitucional que desee agregar al plan de trabajo.
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
                    <strong>Detalles: </strong>Gestione los planes de asignaturas.
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


