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
                <td>CODIGO: 201-300-PRO05-FOR02</td>
            </tr>
            <tr align="center">
                <td>VERSIÓN: 1</td>
            </tr>
            <tr align="center">
                <td>PLAN DESARROLLO DE ASIGNATURA</td>
                <td>PAG:</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table style="font-size: 14px; font-family: Arial !important;">
            <tbody>
            <tr>
                <td colspan="1">APELLIDOS Y NOMBRES DEL DOCENTE</td>
                <td colspan="6">{{$docente->primer_nombre." ".$docente->segundo_nombre." ".$docente->primer_apellido." ".$docente->segundo_apellido}}</td>
            </tr>
            <tr>
                <td colspan="1">CORREO ELECTRÓNICO</td>
                <td colspan="6">{{$docente->email}}</td>
            </tr>
            <tr>
                <td colspan="1">PROGRAMAS USUARIOS:</td>
                <td colspan="6">{{$plandeasignatura->asignatura->programa->nombre}}</td>
            </tr>
            <tr>
                <td colspan="1">FACULTAD USUARIA:</td>
                <td colspan="6">{{$plandeasignatura->asignatura->programa->departamento->facultad->nombre}}</td>
            </tr>
            <tr>
                <td colspan="1">ASIGNATURA:<strong>{{$plandeasignatura->asignatura->nombre}}</strong></td>
                <td colspan="1">CÓDIGO: {{$plandeasignatura->asignatura->codigo}}</td>
                <td colspan="1">CRÉDITOS: {{$plandeasignatura->asignatura->creditos}}</td>
                @if($plandeasignatura->asignatura->naturaleza != "PRACTICO")
                    <td colspan="1">TEÓRICO: <strong>X</strong></td>
                    <td colspan="1">TEÓRICO – PRÁCTICO:</td>
                @else
                    <td colspan="1">TEÓRICO:</td>
                    <td colspan="1">TEÓRICO – PRÁCTICO:<strong>X</strong></td>
                @endif
                @if($plandeasignatura->asignatura->habilitable == "SI")
                    <td colspan="1">HABILITABLE:<strong>X</strong></td>
                    <td colspan="1">NO HABILITABLE:</td>
                @else
                    <td colspan="1">HABILITABLE:</td>
                    <td colspan="1">NO HABILITABLE:<strong>X</strong></td>
                @endif
            </tr>
            <tr>
                <td colspan="1">AÑO LECTIVO: {{$plandeasignatura->periodo->anio}}</td>
                <td colspan="1">PERÍODO ACADÉMICO: {{$plandeasignatura->periodo->periodo}}</td>
                <td colspan="2">FECHA DE INICIO: {{$plandeasignatura->periodo->fechainicio}} </td>
                <td colspan="1">TOTAL:</td>
                <td colspan="2">FECHA TERMINACIÓN: {{$plandeasignatura->periodo->fechafin}} </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <table>
            <tr>
                <td>SEMANA</td>
                <td>EJES TEMÁTICOS</td>
                <td>TEMAS DOCENCIA DIRECTA</td>
                <td>TEMAS TRABAJO INDEPENDIENTE</td>
                <td>ESTRATEGIAS METODOLÓGICAS O ACCIONES PEDAGÓGICAS</td>
                <td>COMPETENCIAS</td>
                <td>EVALUACIÓN ACADÉMICA</td>
                <td>BIBLIOGRAFÍA (capítulos, páginas)</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
