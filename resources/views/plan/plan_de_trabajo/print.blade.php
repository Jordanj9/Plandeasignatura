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
                <td colspan="9">YORK DAU</td>
            </tr>
            <tr>
                <td>2. CATEGORIA</td>
                <td></td>
                <td></td>
                <td>PROF. AUXILIAR</td>
                <td></td>
                <td>PROF. ASISTENTE</td>
                <td></td>
                <td>PROF. ASOCIADO</td>
                <td></td>
                <td>PROF. TITULAR</td>
            </tr>
            <tr>
                <td>3. VINCULACIÓN</td>
                <td></td>
                <td></td>
                <td>PLANTA</td>
                <td></td>
                <td colspan="5">OCASIONAL</td>
            </tr>
            <tr>
                <td>4. DEDICACIÓN</td>
                <td></td>
                <td></td>
                <td>EXCLUSIVA</td>
                <td></td>
                <td>TIEMPO COMPLETO</td>
                <td></td>
                <td>MEDIO TIEMPO</td>
                <td></td>
                <td>CÁTEDRA</td>
            </tr>
            <tr>
                <td>5. SEDE</td>
                <td colspan="9">cac</td>
            </tr>
            <tr>
                <td>6. FACULTAD</td>
                <td colspan="9">cac</td>
            </tr>
            <tr>
                <td>7. PROGRAMA</td>
                <td colspan="9">cac</td>
            </tr>
            <tr>
                <td>8. DEPARTAMENTO</td>
                <td colspan="9">cac</td>
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
            <tr>
                <td colspan="8">dvgs</td>
                <td></td>
            </tr>
        </table>
    </div>
    <div>
        <div style="padding: 0px; background-color: white;text-align: center;color: black">
            <h4>ACTIVIDADES DOCENTES COMPLEMENTARIAS</h4>
        </div>
        <table style="margin-top: -20px">
            <tr>
                <td colspan="8">dvgs</td>
                <td></td>
            </tr>
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
                <td colspan="2">FECHA DE: </td>
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
                <td colspan="2">FECHA DE: </td>
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
                <td colspan="6">6.  ACTIVIDADES ADMINISTRATIVAS</td>
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
                <td >OTRAS ACTIVIDADES</td>
                <td>HORAS/SEMANAS</td>
            </tr>)
                <tr>
                    <td></td>
                    <td><center></center></td>
                </tr>
            <tr>
                <td style="text-align: center">TOTAL HORAS</td>
                <td><center></center></td>
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
                <td></td>ss
            </tr>


            </tbody>
        </table>
    </div>
</div>
</body>
</html>
