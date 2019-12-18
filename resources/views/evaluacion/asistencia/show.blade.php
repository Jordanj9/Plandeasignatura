@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.evaluacion')}}"> Módulo Evaluaciones </a><span
                        class="fa-angle-right fa"></span>
                    Ver Asistencia
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
                        <h4 class="card-title">PLANES - VER ASISTENCIA</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="material-datatables">
                        <!--      Tabla --- Datos del plan de Asignatura       -->
                        <div class="col-md-12">
                            <table class="table-bordered " style="width: 100%">
                                <thead align="center" style="background-color: #38A970;color: white">
                                <tr>
                                    <th colspan="8">
                                        REGISTRO DE ASISTENCIA
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th colspan="1">DOCENTE:
                                        <strong></strong></th>
                                    <td colspan="9"><strong>{{$carga->docente->primer_nombre." ".$carga->docente->segundo_nombre." ".$carga->docente->primer_apellido." ".$carga->docente->segundo_apellido}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">ASIGNATURA:
                                        <strong></strong></th>
                                    <td colspan="9"><strong>{{$carga->asignatura->nombre}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">FACULTAD:
                                        <strong></strong></th>
                                    <td colspan="9"><strong>{{$carga->docente->departamento->facultad->nombre}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">DEPARTAMENTO:
                                        <strong></strong></th>
                                    <td colspan="9"><strong>{{$carga->docente->departamento->nombre}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">Periodo:
                                        <strong> {{$carga->periodo->anio}}</strong></th>
                                    <td><strong>PERIODO
                                            ACADEMICO: </strong> {{$carga->periodo->periodo}}
                                    </td>
                                    <td><strong>FECHA INICIAL
                                            : </strong>{{$carga->periodo->fechainicio}}</td>
                                    <td colspan="2"><strong>FECHA FINAL
                                            : </strong>{{$carga->periodo->fechafin}}</td>

                                </tr>
                                <tr>
                                     <td colspan="9" align="center" style="background-color: #38A970;color: white ">
                                        <strong>ASISTENCIA - ESTUDIANTES</strong>
                                     </td>
                                </tr>
                                <tr>
                                    <td align="center"><b>IDENTIFICACIÓN</b></td>
                                    <td align="center" colspan="3"><b>NOMBRES COMPLETO</b></td>
                                    <td align="center"><b>ASISTENCIA</b></td>
                                </tr>
                                @foreach($asistencia as $a)
                                <tr>
                                    <td align="center">{{$a->estudiante->identificacion}}</td>
                                    <td align="center" colspan="3">{{$a->estudiante->primer_nombre." ".$a->estudiante->segundo_nombre." ".$a->estudiante->primer_apellido." ".$a->estudiante->segundo_apellido}}</td>
                                    <td align="center">{{$a->asistencia}}</td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--      Tabla --- Datos del plan de Asignatura        -->
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
