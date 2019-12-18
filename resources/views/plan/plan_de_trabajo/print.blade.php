<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: small;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <table class="table" border="1" style="font-family: Arial !important;margin-bottom: 20px; font-size: 14px">
            <tbody>
            <tr align="center">
                <td rowspan="3"><img src="{{asset('assets/img/upclogo.png')}}" alt="" width="80px" height="80px"></td>
                <td rowspan="2"><b>UNIVERSIDAD POPULAR DEL CESAR</b></td>
                <td>CODIGO: 201-300-PRO05-FOR03</td>
            </tr>
            <tr>
                <td>VERSIÓN: 1</td>
            </tr>
            <tr>
                <td align="center">PLAN TRABAJO</td>
                <td>PAG:</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table>
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td>1. DOCENTE</td>
                <td colspan="9">{{$docente->primer_nombre." ".$docente->segundo_nombre." ".$docente->primer_apellido." ".$docente->segundo_apellido}}</td>
            </tr>
            <tr>

                <td>2. CATEGORIA</td>
                <td></td>
                <td>@if($docente->categoria =="AUXILIAR")<strong>X</strong>@endif</td>
                <td>PROF. AUXILIAR</td>
                <td>@if($docente->categoria =="ASISTENTE")<strong>X</strong>@endif</td>
                <td>PROF. ASISTENTE</td>
                <td>@if($docente->categoria =="ASOCIADO")<strong>X</strong>@endif</td>
                <td>PROF. ASOCIADO</td>
                <td>@if($docente->categoria =="TITULAR")<strong>X</strong>@endif</td>
                <td>PROF. TITULAR</td>
            </tr>
            <tr>
                <td>3. VINCULACIÓN</td>
                <td></td>
                <td>@if($docente->vinculacion =="PLANTA")<strong>X</strong>@endif</td>
                <td>PLANTA</td>
                <td>@if($docente->vinculacion =="OCASIONAL")<strong>X</strong>@endif</td>
                <td colspan="5">OCASIONAL</td>
            </tr>
            <tr>
                <td>4. DEDICACIÓN</td>
                <td></td>
                <td>@if($docente->dedicacion =="EXCLUSIVA")<strong>X</strong>@endif</td>
                <td>EXCLUSIVA</td>
                <td>@if($docente->dedicacion =="TIEMPO COMPLETO")<strong>X</strong>@endif</td>
                <td>TIEMPO COMPLETO</td>
                <td>@if($docente->dedicacion =="MEDIO TIEMPO")<strong>X</strong>@endif</td>
                <td>MEDIO TIEMPO</td>
                <td>@if($docente->dedicacion =="CÁTEDRA")<strong>X</strong>@endif</td>
                <td>CÁTEDRA</td>
            </tr>
            <tr>
                <td>5. SEDE</td>
                <td colspan="9">{{$docente->sede}}</td>
            </tr>
            <tr>
                <td>6. FACULTAD</td>
                <td colspan="9">{{$docente->departamento->facultad->nombre}}</td>
            </tr>
            <tr>
                <td>7. PROGRAMA</td>
                <td colspan="9">{{$carga[1]->asignatura->programa->nombre}}</td>
            </tr>
            <tr>
                <td>8. DEPARTAMENTO</td>
                <td colspan="9">{{$docente->departamento->nombre}}</td>
            </tr>

            <tr>
                <td> 9. ASIGNATURAS</td>
                <td colspan="9"></td>
            </tr>

            </tbody>
        </table>
    </div>
    <div>
        <table style="border-top: none">
            <tbody>
            <tr align="center">
                <td rowspan="2">CODIGO</td>
                <td rowspan="2">NOMBRE DE LA ASIGNATURA</td>
                <td colspan="2">I.H.S</td>
            </tr>
            <tr align="center">
                <td>TEORICA</td>
                <td>PRACTICA</td>
            </tr>
            @foreach($carga as $item)
                <tr align="center">
                    <td>{{$item->asignatura->codigo}}</td>
                    <td>
                        {{$item->asignatura->nombre.' ('.$item->grupo->nombre.')'}}
                    </td>
                    <td colspan="1">{{$item->asignatura->hora_teorica}}</td>
                    <td colspan="1">{{$item->asignatura->hora_practica}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <div>
        <div style="padding: 0px; background-color: white;text-align: center;color: black">
            <h4>ACTIVIDADES DOCENTES</h4>
        </div>
        <table style="margin-top: -20px">
            @foreach($plantrabajo->actividaddocentes as $item)
                @if($item->tipo == 'DOCENTE')
                    <tr>
                        <td colspan="8">
                            {{$item->id.". ".$item->nombre}}</td>
                        <td>{{$item->pivot->valor}}</td>
                        @else
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
    <div>
        <div style="padding: 0px; background-color: white;text-align: center;color: black">
            <h4>ACTIVIDADES DOCENTES COMPLEMENTARIAS</h4>
        </div>
        <table style="margin-top: -20px">
            @foreach($plantrabajo->actividaddocentes as $item)
                @if($item->tipo != 'DOCENTE')
                    <tr>
                        <td colspan="8">
                            {{$item->id.". ".$item->nombre}}</td>
                        <td>{{$item->pivot->valor}}</td>
                        @else
                        </td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
    <div>
        <div style="padding: 0px; background-color: white;text-align: center;color: black">
            <h4>CUADROS EXPLICATIVOS DE LAS ACTIVIDADES DOCENTES</h4>
        </div>
        <table style="margin-top: -20px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td>1. ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO</td>
                <td colspan="2">APROBADO POR</td>
                <td colspan="2">FECHA DE:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td>TITULO DE CADA TRABJO DE GRADO</td>
                <td>Acta</td>
                <td>Fecha</td>
                <td>Iniciación</td>
                <td>Terminación</td>
                <td></td>
            </tr>
            <tr>
                <td>TITULO DE CADA TRABJO DE GRADO</td>
                <td>Acta</td>
                <td>Fecha</td>
                <td>Iniciación</td>
                <td>Terminación</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td>1. ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO</td>
                <td colspan="2">APROBADO POR</td>
                <td colspan="2">FECHA DE:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td>TITULO DE CADA TRABJO DE GRADO</td>
                <td>Acta</td>
                <td>Fecha</td>
                <td>Iniciación</td>
                <td>Terminación</td>
                <td></td>
            </tr>
            <tr>
                <td>TITULO DE CADA TRABJO DE GRADO</td>
                <td>Acta</td>
                <td>Fecha</td>
                <td>Iniciación</td>
                <td>Terminación</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td colspan="6">3. EXTENSIÓN Y PROYECCIÓN SOCIAL</td>
                <td colspan="4">AUTORIZADA POR:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td colspan="3">ACTIVIDADES</td>
                <td colspan="3">DESCRIPCIÓN</td>
                <td colspan="2">INSTITUCIÓN</td>
                <td colspan="2">FECHA</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td colspan="6">4. COOPERACION INTERINSTITUCIONAL</td>
                <td colspan="4">AUTORIZADA POR:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td colspan="3">ACTIVIDADES</td>
                <td colspan="3">DESCRIPCIÓN</td>
                <td colspan="2">INSTITUCIÓN</td>
                <td colspan="2">FECHA</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td colspan="6">5. CRECIMIENTO PERSONAL Y DESARROLLO</td>
                <td colspan="4">AUTORIZADA POR:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td colspan="6">DESCRIPCIÓN</td>
                <td colspan="2">INSTITUCIÓN</td>
                <td colspan="2">FECHA</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td colspan="6">6. ACTIVIDADES ADMINISTRATIVAS</td>
                <td colspan="4">AUTORIZADA POR:</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            <tr>
                <td colspan="3">ACTIVIDADES</td>
                <td colspan="3">DESCRIPCIÓN</td>
                <td colspan="2">INSTITUCIÓN</td>
                <td colspan="2">FECHA</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table style="margin-top: 15px">
            <tbody>
            <tr style="background-color: #4DC172; color: black">
                <td>OTRAS ACTIVIDADES</td>
                <td>HORAS/SEMANAS</td>
            </tr>
            )
            <tr>
                <td></td>
                <td>
                    <center></center>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">TOTAL HORAS</td>
                <td>
                    <center></center>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div>
        <div style="padding: 0px; background-color: white;text-align: center;color: black">
            <h4>HORARIO DE ACTIVIDADES</h4>
        </div>
        <table style="margin-top: -20px">
            <tbody>
            <tr style="background-color:#4DC172;text-align: center">
                <td>HORAS</td>
                <td>LUNES</td>
                <td>MARTES</td>
                <td>MIERCOLES</td>
                <td>JUEVES</td>
                <td>VIERNES</td>
                <td>SBADO</td>
            </tr>
            <tr style="text-align: center">
                <td>06:00-07:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="text-align: center">

                <td>07:00-08:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">

                <td>08:00-09:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>


            </tr>
            <tr style="text-align: center">
                <td>09:00-10:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>11:00-12:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>12:00-13:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>13:00-14:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>14:00-15:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>15:00-16:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>16:00-17:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>17:00-18:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>18:00-19:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>19:00-20:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <tr style="text-align: center">
                <td>20:00-21:00</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                ss
            </tr>
            </tbody>
        </table>
    </div>
    <div style="border: solid 1px;padding: 40px; margin-top: 10px">
        <h4 style="text-align: left; margin-top: -25px;margin-left: -35px">OBSERVACIONES:</h4>
    </div>
    <div style="border: solid 1px;padding: 40px; margin-top: 10px">
        <h5>
            FIRMA DE PROFESOR: ___________________________________
        </h5>
        <h5 style="margin-top: -38px; margin-left: 400px">
            FECHA:__________________
        </h5>
        <hr style="margin-top: -10px;border: solid 1px">
        <p style="margin-left: 20px">________<span style="margin-left: 10px"> </span> _______________________________
            <span style="margin-left: 10px"> </span>_______________________</p>
        <p style="margin-left: 30px;margin-top: -18px;font-size: 14px"><strong>Vo.Bo</strong></p>
        <p style="margin-left: 125px;margin-top: -30px;font-size: 12px"><strong>DIRECTOR DE DEPARTAMENTO </strong></p>
        <p style="margin-left: 380px;margin-top: -30px;font-size: 12px"><strong>APROBADO POR <span
                    style="margin-left: 10px"></span>ACTA Nº</strong></p>
    </div>
</div>
</body>
</html>
