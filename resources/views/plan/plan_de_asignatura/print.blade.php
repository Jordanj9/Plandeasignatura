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
        <table class="table" border="1" style="font-family: Arial !important;margin-bottom: 20px; ">
            <tbody>
            <tr align="center">
                <td rowspan="3"><img src="{{asset('assets/img/upclogo.png')}}" alt="" width="80px" height="80px"></td>
                <td rowspan="2"><b>UNIVERSIDAD POPULAR DEL CESAR</b></td>
                <td>CODIGO: 201-300-PRO05-FOR01</td>
            </tr>
            <tr align="center">
                <td>VERSIÓN: 1</td>
            </tr>
            <tr align="center">
                <td>PLAN DE ASIGNATURA</td>
                <td>PAG:</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table>
            <tbody>
            <tr>
                <td colspan="4" style="background-color: #38A970; padding: 5px;text-align: center"><b>IDENTIFICACIÓN</b>
                </td>
            </tr>
            <tr>
                <td colspan="1">Nombre de la asignatura</td>
                <td colspan="3">{{$plandeasignatura->asignatura->nombre}}</td>
            </tr>
            <tr>
                <td colspan="1">Código de la asignatura</td>
                <td colspan="3">{{$plandeasignatura->asignatura->codigo}}</td>
            </tr>
            <tr>
                <td colspan="1">Programa Académico</td>
                <td colspan="3">{{$plandeasignatura->asignatura->programa->nombre}}</td>
            </tr>
            <tr>
                <td colspan="1">Créditos adémicos</td>
                <td colspan="3">{{$plandeasignatura->asignatura->creditos}}</td>
            </tr>
            <tr>
                <td colspan="1">Trabajo semanal del estudiante</td>
                <td colspan="1">Docencia directa: {{$plandeasignatura->dodencia_directa}}</td>
                <td colspan="2">Trabajo independiente: {{$plandeasignatura->trabajo_independiente}}</td>
            </tr>
            <tr>
                <td colspan="1">Trabajo semestral del estudiante</td>
                <td colspan="3">144</td>
            </tr>
            <tr>
                <td colspan=1>Pre-requisitos</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan=1>Co-requisitos</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan=1>Departamento oferente</td>
                <td colspan="3">Ingenieria de Sistemas</td>
            </tr>
            <tr>
                <td colspan=1>Tipo de Asignatura</td>
                <td>Teórico:</td>
                <td>Teórico-Práctico:</td>
                <td>Práctico:</td>
            </tr>
            <tr>
                <td colspan="1" rowspan="3">Naturaleza de la Asignatura</td>
                <td colspan="1">Habilitable:</td>
                <td colspan="2">No Habilitable:</td>
            </tr>
            <tr>
                <td colspan="1">Validable:</td>
                <td colspan="2">No Validable::</td>
            </tr>
            <tr>
                <td colspan="1">Homologable:</td>
                <td colspan="2">No Homologable::</td>
            </tr>
            </tbody>


        </table>
        <table style="border-top: none">
            <tbody>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>PRESENTACIÓN</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->presentacion}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>JUSTICACIÓN</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->justificacion}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>OBJETIVO GENERAL</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->objetivogeneral}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>OBJETIVOS ESPECÍFICOS</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->objetivoespecificos}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>COMPETENCIAS GENERALES Y
                        ESPECÍFICAS</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->competencias}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>METODOLOGÍA</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->metodologias}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>ESTRATEGIAS METODOLÓGICAS</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {!! $plandeasignatura->estrategias !!}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>UNIDADES</b></td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    @foreach($unidades as $u)
                        <ul><b><strong>{{$u->nombre." : ".$u->descripcion}}</strong></b>
                            @foreach($u->ejetematicos as $e)
                                <li style="margin-left: 80px">
                                    {{$e->nombre}}
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>EVALUACIONES</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->evaluacion}}
                </td>
            </tr>
            <tr>
                <td style="background-color: #38A970; padding: 5px;text-align: center"><b>REFERENCIAS BIBLIOGRAFICAS</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: justify">
                    {{$plandeasignatura->referencias}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
