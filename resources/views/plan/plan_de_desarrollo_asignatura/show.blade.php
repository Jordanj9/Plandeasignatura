@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.academico')}}"> Módulo Plan </a><span
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
                        <h4 class="card-title">PLANES - Plan de Desarrolllo De Asignatura</h4>
                    </div>
                    <div class="card-body">

                        <!--      Tabla --- Datos del plan de Asignatura       -->
                        <div class="col-md-12">
                            <table class="table-bordered " style="width: 100%; color: black">
                                <tr>
                                    <th colspan="1">Docente:</th>
                                    <td colspan="9">{{$docentes->primer_nombre." ".$docentes->segundo_nombre." ".$docentes->primer_apellido." ".$docentes->segundo_apellido}}</td>
                                </tr>
                                <tr>
                                    <th>Correo:</th>
                                    <td colspan="10">{{$docentes->email}}</td>
                                </tr>
                                <tr>
                                    <th>Programa:</th>
                                    <td colspan="9">{{$plandeasignatura->asignatura->programa->nombre}}</td>
                                </tr>
                                <tr>
                                    <th>Facultad:</th>
                                    <td colspan="9">{{$plandeasignatura->asignatura->programa->departamento->facultad->nombre}}</td>
                                </tr>
                                <tr>
                                    <th colspan="1">Asignatura:
                                        <strong>{{$plandeasignatura->asignatura->nombre}}</strong></th>
                                    <td><strong>CODIGO: </strong>{{$plandeasignatura->asignatura->codigo}}
                                    </td>
                                    <td>
                                        <strong>CREDITOS: </strong>{{$plandeasignatura->asignatura->creditos}}
                                    </td>
                                    <td>
                                        <strong>NATURALEZA: </strong>{{$plandeasignatura->asignatura->naturaleza}}
                                    </td>
                                    <td colspan="9">
                                        <strong>HABILITABLE: </strong>{{$plandeasignatura->asignatura->habilitable}}
                                    </td>
                                <tr>
                                    <th colspan="1">Periodo:
                                        <strong> {{$plandeasignatura->periodo->anio}}</strong></th>
                                    <td><strong>PERIODO
                                            ACADEMICO: </strong> {{$plandeasignatura->periodo->periodo}}
                                    </td>
                                    <td><strong>FECHA INICIAL
                                            : </strong>{{$plandeasignatura->periodo->fechainicio}}</td>
                                    <td colspan="2"><strong>FECHA FINAL
                                            : </strong>{{$plandeasignatura->periodo->fechafin}}</td>

                                </tr>
                                </tr>
                            </table>
                        </div>
                        <!--      Tabla --- Datos del plan de Asignatura        -->
                        <div class="material-datatables">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-rose">
                                        <div class="card-icon">
                                            <i class="material-icons">assignment</i>
                                        </div>
                                        <h4 class="card-title ">Plan de Desarrollo de la Asignatura :
                                            <strong>{{$plandeasignatura->asignatura->nombre}}</strong></h4>
                                    </div>
                                    <div class="card-body">
                                        <!--      Tabla --- Datos del plan de Asignatura       -->
                                        <div class="material-datatables col-md-12">
                                            <table id="datatables" class="table-bordered "
                                                   style="width: 100%; color: black">
                                                <thead align="center" style="background-color: #38A970;color: white;">
                                                <tr>
                                                    <th>
                                                        SEMANA
                                                    </th>
                                                    <th>
                                                        UNIDADES
                                                    </th>
                                                    <th>
                                                        EJES TEMATICOS
                                                    </th>
                                                    <th>
                                                        TEMAS TRABAJO INDEPENDIENTE
                                                    </th>
                                                    <th>
                                                        ESTRATEGIAS METODOLÓGICAS O ACCIONES PEDAGÓGICAS
                                                    </th>
                                                    <th>
                                                        COMPETENCIAS
                                                    </th>
                                                    <th>
                                                        EVALUACIÓN ACADÉMICA
                                                    </th>
                                                    <th>
                                                        BIBLIOGRAFÍA
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($plandedesarrollos->semanas as $p)
                                                    <tr>
                                                        <td>
                                                            <strong>{{$p->semana}}</strong>
                                                        </td>
                                                        <td>
                                                            <strong>{{$p->unidad->nombre}}
                                                                <br>{{$p->unidad->descripcion}}</strong>
                                                        </td>

                                                        <td>
                                                            @foreach($p->ejetematicos as $e)
                                                                <strong>
                                                                    <li>{{$e->nombre}}</li>
                                                                    <br></strong>
                                                            @endforeach
                                                        </td>
                                                        <td>

                                                            <strong>
                                                                {{$p->tema_trabajo}}
                                                            </strong>

                                                        </td>
                                                        <td>
                                                            <strong>
                                                                {{$p->estrategias}}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                {{$p->competencias}}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            @foreach($p->eval as $e)
                                                                <a target="_blank" href="{{asset('docs/evaluacion/'.$e)}}">{{$e}}</a>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($p->bibl as $e)
                                                                <a target="_blank" href="{{asset('docs/bibliografia/'.$e)}}">{{$e}}</a>
                                                            @endforeach
                                                        </td>

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
                        <strong>Detalles: </strong>
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
