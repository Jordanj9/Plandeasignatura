@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio </a><span class="fa-angle-right fa"></span><a
                        href="{{route('admin.plan')}}"> Modulo Plan </a><span
                        class="fa-angle-right fa"></span><a href="{{route('plandetrabajo.index')}}"> Plan
                        de Trabajo </a><span
                        class="fa-angle-right fa"></span> Crear
                </p>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-md-12">
        @component('layouts.errors')
        @endcomponent
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12 mr-auto ml-auto">
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
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card card-wizard" style="opacity: 1;" data-color="green" id="wizardProfile">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                              action="{{route('plandedesarrolloasignatura.store')}}">
                            @csrf
                            <input type="hidden" name="docente_id" value="">
                            <input type="hidden" name="plandeasignatura_id" value="">
                            <div class="card-header text-center">
                                <h3 class="card-title">
                                    Registro del Plan de Trabajo
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                            Datos del Plan de Trabajo
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                            Datos del Plan de Trabajo
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="about">
                                        <h5 class="info-text"> Datos del Plan de Asignatura</h5>
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    DOCENTE
                                                </th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th colspan="1">1. DOCENTE:</th>
                                                    <td colspan="9"><strong>PROFESOR AUXILIAR</strong></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">2. CATEGORIA
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>PROFESOR AUXILIAR: </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">3. VINCULACION:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>PLANTA: </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">4. DEDICACION:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>TIEMPO COMPLETO: </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">5. SEDE:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>VALLEDUPAR: </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">6. FACULTAD:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>INGENIERIA Y TECNOLOGIA </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">7. PROGRAMA:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>INGENIERIA DE SISTEMAS </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="1">8. DEPARTAMENTO:
                                                        <strong></strong></th>
                                                    <td colspan="9"><strong>INGENIERIA E INFORMATICA </strong>
                                                    </td>
                                                </tr>
                                                </tbody>
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9">
                                                    9. ASIGNATURA
                                                </th>
                                                </thead>
                                                <tr align="center">
                                                    <td rowspan="2"><b>CODIGO</b></td>
                                                    <td rowspan="2"><b>NOMBRE DE LA ASIGNATURA</b></td>
                                                    <td colspan="2"><b>I.H.S</b></td>
                                                </tr>
                                                <tr align="center">
                                                    <td><b>TEORICA</b></td>
                                                    <td><b>PRACTICA</b></td>
                                                </tr>
                                                <tr align="center">
                                                    <td><b>CODIGO</b></td>
                                                    <td><b>NOMBRE DE LA ASIGNATURA</b></td>
                                                    <td colspan="1"><b>I.H.S</b></td>
                                                    <td colspan="1"><b>I.H.S</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    ACTIVIDADES DOCENTE
                                                </th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>10. TOTAL DE ASIGNATURAS A CARGO</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>11. TOTAL DE GRUPOS A CARGO</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>12. TOTAL DE ESTUDIANTES EN LOS GRUPOS A CARGO</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>13. TOTAL DE HORAS DE DOCENCIA DIRECTA ( TEÓRICA + PRÁCTICA)
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>14. HORAS DE ATENCIÓN A ESTUDIANTES (TUTORIAS - ASESORIAS)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>15. HORAS DE PREPARACIÓN Y EVALUACIÓN DE LAS ASIGNATURAS</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>16. TOTAL DE HORAS DEDICADAS A LAS ACTIVIDADES DOCENTES
                                                        (13+14+15)
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="20">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <table class="table-bordered " style="width: 100%; color: black">
                                                <thead style="background-color: #38A970;color: white;">
                                                <th colspan="9  ">
                                                    ACTIVIDADES DOCENTES COMPLEMENTARIAS
                                                </th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>17. HORAS DE ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO (CUADRO 1)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>18. HORAS DEDICADAS A LA INVESTIGACIÓN APROBADA (CUADRO 2)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19. HORAS DEDICADAS A LA PROYECCIÓN SOCIAL REGISTRADA (CUADRO 3)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>20. HORAS DEDICADAS A LA COOPERACIÓN INTERINSTITUCIONAL (CUADRO 4)
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>21. HORAS DEDICADAS PARA CRECIMIENTO PERSONAL Y PROFESIONAL (CUADRO 5)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22. HORAS DEDICADAS A LAS ACTIVIDADES ADMINISTRATIVAS (CUADRO 6)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="50">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>23. HORAS PARA OTRAS ACTIVIDADES (CUADRO 7)
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>24. TOTAL HORAS DEDICADAS A LAS ACTIVIDADES DOCENTES  COMPLEMENTARIAS<br>(17+18+19+20+21+22+23)
                                                    </td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>TOTAL DE HORAS POR SEMANA DEL PLAN DE TRABAJO  (16 + 24)</td>
                                                    <td align="center">
                                                        <input type="number" min="0" max="20">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <div class="row justify-content">
                                            <div class="col-sm-12 "><h5 class="info-text" style="background-color: #38A970;color: white; padding: 3px;text-align: center">
                                                    <strong>ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO</strong>
                                                </h5>
                                            </div>
                                            <div class="col-md-12" id="rr">
                                            </div>
                                            <a class="btn bg-blue waves-effect" onclick="add()">AGREGAR CAMPO PARA RECURSO</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="mr-auto">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd"
                                           name="previous" value="Previous">
                                </div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-next btn-fill btn-info btn-wd" name="next"
                                           value="Next">
                                    <input type="button" class="btn btn-finish btn-fill btn-info btn-wd"
                                           name="finish" value="Finish" style="display: none;" id="finish">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- wizard container -->
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
            $('.select2').select2();
            $("#finish").attr('type', 'submit');
            md.checkFullPageBackgroundImage();
            // Initialise the wizard
            demo.initMaterialWizard();
            setTimeout(function () {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
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

        function add() {
            var html = $("#rr").html();
            $("#rr").html(html + "<div class='row'><div class='col-md-12'>"
                + "<div class='form-group'>"
                + "<div class='form-line'>"
                + "<label>Titulo</label>"
                + "<input class='form-control' type='text' name='titulo[]'  multiple>"
                + "<label>Acta</label>"
                + "<input class='form-control' type='text' name='acta[]'  multiple>"
                + "<label>Fecha</label>"
                + "<input class='form-control' type='date' name='fecha[]'  multiple>"
                + "<label>Fecha Inicio</label>"
                + "<input class='form-control' type='date' name='fechainicio[]'  multiple>"
                + "<label>Fecha De terminación</label>"
                + "<input class='form-control' type='date' name='fechafin[]'  multiple>"
                + "<label>Horas/Semanas</label>"
                + "<input class='form-control' type='number' name='hora[]'  multiple>"
                + "</div>"
                + "</div>"
                + "</div>"
                + "</div>");
        }

        function getEjesTematicos() {
            var id = $("#unidad_id").val();
            $.ajax({
                type: 'GET',
                url: '{{url('plan/plandedesarrolloasignatura/')}}/' + id + "/get/ejetematicos",
                data: {},
            }).done(function (msg) {
                $('#ejetematico_id option').each(function () {
                    $(this).remove();
                });
                if (msg !== "null") {
                    var m = JSON.parse(msg);
                    $("#ejetematico_id").append("<option value=''>" + "--Seleccione una opción--" + "</option>");
                    $.each(m, function (index, item) {
                        $("#ejetematico_id").append("<option value='" + item.id + "'>" + item.value + "</option>");
                    });
                } else {
                    $.notify({
                        icon: "add_alert",
                        message: '<strong>Atención!</strong><br>La Unidad  seleccionada no posee Ejes Tematicos  asociados.'
                    }, {type: 'danger', timer: 3e3, placement: {from: 'top', align: 'right'}});
                }
            });
        }
    </script>

@endsection
