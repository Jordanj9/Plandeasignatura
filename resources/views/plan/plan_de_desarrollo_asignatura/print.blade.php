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

        td {
            padding: 8px;
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
            <tr>
                <td>VERSIÓN: 1</td>
            </tr>
            <tr>
                <td align="center">PLAN DESARROLLO DE ASIGNATURA</td>
                <td>PAG:</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table style="font-size: 14px; font-family: Arial !important;">
            <tbody>
            <tr>
                <td colspan="4" style="background-color: #D6E3BC">APELLIDOS Y NOMBRES DEL DOCENTE</td>
                <td colspan="12">{{$docente->primer_nombre." ".$docente->segundo_nombre." ".$docente->primer_apellido." ".$docente->segundo_apellido}}</td>
            </tr>
            <tr>
                <td colspan="4">CORREO ELECTRÓNICO</td>
                <td colspan="12">{{$docente->email}}</td>
            </tr>
            <tr>
                <td colspan="4">PROGRAMAS USUARIOS:</td>
                <td colspan="12">{{$plandeasignatura->asignatura->programa->nombre}}</td>
            </tr>
            <tr>
                <td colspan="4">FACULTAD USUARIA:</td>
                <td colspan="12">{{$plandeasignatura->asignatura->programa->departamento->facultad->nombre}}</td>
            </tr>
            <tr>
                <td colspan="4">ASIGNATURA:<strong>{{$plandeasignatura->asignatura->nombre}}</strong></td>
                <td colspan="2">CÓDIGO: {{$plandeasignatura->asignatura->codigo}}</td>
                <td colspan="2">CRÉDITOS: {{$plandeasignatura->asignatura->creditos}}</td>
                @if($plandeasignatura->asignatura->naturaleza == "TEORICO")
                    <td colspan="2">TEÓRICO: <strong>X</strong></td>
                    <td colspan="2">TEÓRICO – PRÁCTICO:</td>
                @elseif($plandeasignatura->asignatura->naturaleza == "TEORICO-PRACTICO")
                    <td colspan="2">TEÓRICO:</td>
                    <td colspan="2">TEÓRICO – PRÁCTICO: <strong>X</strong></td>
                @endif
                @if($plandeasignatura->asignatura->habilitable == "SI")
                    <td colspan="2">HABILITABLE:<strong>X</strong></td>
                    <td colspan="2">NO HABILITABLE:</td>
                @else
                    <td colspan="2">HABILITABLE:</td>
                    <td colspan="2">NO HABILITABLE:<strong>X</strong></td>
                @endif
            </tr>
            <tr>
                <td colspan="4">AÑO LECTIVO: {{$plandeasignatura->periodo->anio}}</td>
                <td colspan="2">PERÍODO ACADÉMICO: {{$plandeasignatura->periodo->periodo}}</td>
                <td colspan="4">FECHA DE INICIO: {{$plandeasignatura->periodo->fechainicio}} </td>
                <td colspan="4">TOTAL: {{$plandeasignatura->asignatura->total_hora}} </td>
                <td colspan="2">FECHA TERMINACIÓN: {{$plandeasignatura->periodo->fechafin}} </td>
            </tr>
            <tr style="background-color: #D6E3BC;text-align: center">
                <td colspan="2">SEMANA</td>
                <td colspan="2">EJES TEMÁTICOS</td>
                <td colspan="2">TEMAS DOCENCIA DIRECTA</td>
                <td colspan="2">TEMAS TRABAJO INDEPENDIENTE</td>
                <td colspan="2">ESTRATEGIAS METODOLÓGICAS O ACCIONES PEDAGÓGICAS</td>
                <td colspan="2">COMPETENCIAS</td>
                <td colspan="2">EVALUACIÓN ACADÉMICA</td>
                <td colspan="2">BIBLIOGRAFÍA (capítulos, páginas)</td>
            </tr>
            @foreach($plandesarrollo->semanas as $p)
                <tr>
                    <td colspan="2">{{$p->semana}}</td>
                    <td colspan="2">
                        @if($p->unidad_id !== null)
                            {{$p->unidad->nombre}}<br><br>
                            {{$p->unidad->descripcion}}
                        @else
                            SEMANA DE PARCIAL
                        @endif
                    </td>
                    <td colspan="2">
                        @if($p->unidad_id !== null)
                            @foreach($p->ejetematicos as $e)
                                <li style="margin-left: 80px">{{$e->nombre}}</li>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td colspan="2">@if($p->tema_trabajo != null){{$p->tema_trabajo}}@endif</td>
                    <td colspan="2">@if($p->estrategias != null){{$p->estrategias}}@endif</td>
                    <td colspan="2"> @if($p->competencias != null){{$p->competencias}}@endif</td>
                    <td colspan="2">
                        @if($p->competencias != null)
                            @foreach($p->eval as $e)
                                <a target="_blank" href="{{asset('docs/evaluacion/'.$e)}}">{{$e}}</a>
                            @endforeach
                        @else
                            {{$p->evaluacion}}
                        @endif
                    </td>
                    <td colspan="2">
                        @if($p->competencias != null)
                            @foreach($p->bibl as $e)
                                <a target="_blank" href="{{asset('docs/bibliografia/'.$e)}}">{{$e}}</a>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
