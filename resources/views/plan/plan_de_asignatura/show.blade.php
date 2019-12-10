@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.plan')}}"> Módulo Planes </a><span
                        class="fa-angle-right fa"></span>
                    Ver Plan de Asignatura
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
                        <h4 class="card-title">PLANES - VER PLAN DE ASIGNATURA</h4>
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
                                        IDENTIFICACION PLAN ASIGNATURA
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th colspan="1">
                                        NOMBRE DE LA ASIGNATURA
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->asignatura->nombre}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        CODIGO DE LA ASIGNATURA
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->asignatura->codigo}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        PROGRAMA ACADEMICO
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->asignatura->programa->nombre}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        CREDITOS
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->asignatura->creditos}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">TRABAJO SEMANAL DEL ESTUDIANTE
                                    </th>
                                    <td><strong>DOCENCIA DIRECTA: </strong>{{$plandeasignatura->dodencia_directa}}
                                    </td>
                                    <td>
                                        <strong>TRABAJO
                                            INDEPENDIENTE: </strong>{{$plandeasignatura->trabajo_independiente}}
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        PRE-REQUISITOS
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->prerequisitos}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        POS-REQUISITOS
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->corequisitos}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="1">
                                        DEPARTAMENTO OFERENTE:
                                    </th>
                                    <td colspan="3"><strong>{{$plandeasignatura->asignatura->creditos}}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <th colspan="1">TIPO DE ASIGNATURA
                                    </th>
                                    <td colspan="3">{{$plandeasignatura->asignatura->naturaleza}}
                                    </td>
                                </tr>

                                <tr>
                                    <th colspan="1">NATURALEZA DE LA ASIGNATURA
                                    </th>
                                    <td colspan="3">
                                        <strong>HABILITABLE: </strong>{{$plandeasignatura->asignatura->habilitable}}
                                    </td>
                                </tr>
                                </tbody>
                                <thead align="center" style="background-color: #38A970;color: white">
                                <tr>
                                    <th colspan="8"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <!--      Tabla --- Datos del plan de Asignatura        -->
                        <br>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>PRESENTACION</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->presentacion}}
                            </div>
                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>JUSTIFICACIÓN</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                <strong>{{$plandeasignatura->justificacion}}</strong>
                            </div>
                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>OBJETIVO GENERAL</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->objetivogeneral}}
                            </div>

                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>OBJETIVOS ESPECÍFICOS</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->objetivoespecificos}}
                            </div>

                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>COMPETENCIAS GENERALES Y ESPECÍFICAS</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->competencias}}
                            </div>

                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>METODOLOGÍA</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->metodologias}}
                            </div>

                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>ESTRATEGIAS METODOLÓGICAS</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                {{$plandeasignatura->estrategias}}
                            </div>

                        </div>
                        <div class="div">
                            <div class="col-sm-12 "><h5 class="info-text"
                                                        style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                    <strong>CONTENIDO</strong>
                                </h5>
                            </div>
                            <div class="col-sm-12 ">
                                @foreach($unidades as $u)
                                    <ul><b><strong>{{$u->nombre." : ".$u->descripcion}}</strong></b>
                                        @foreach($u->ejetematicos as $e)
                                            <li style="margin-left: 80px">
                                                {{$e->nombre}}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </div>
                        </div>
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
