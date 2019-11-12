@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio</a> <span class="fa-angle-right fa"></span> Módulo Académico
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
                    <div class="card-text">
                        <h4 class="card-title">MODULO ACADÉMICO</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('periodo.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> PERIODOS
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('facultad.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> FACULTAD
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('departamento.index')}}">
                    <button class="btn btn-outline-success btn-round">
                        <i class="fa fa-cubes"></i> DEPARTAMENTOS
                        <div class="ripple-container"></div>
                    </button>
                    </a>
                    <a href="{{route('programa.index')}}">
                    <button class="btn btn-outline-success btn-round">
                        <i class="fa fa-cubes"></i> PROGRAMAS
                        <div class="ripple-container"></div>
                    </button>
                    </a>
                    <a href="{{route('asignatura.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> ASIGNATURAS
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('grupousuario.privilegios')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> GRUPOS
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-success card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">ESTRUCTURA CURRICULAR</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('docente.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> DOCENTES
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('grupousuario.privilegios')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i>CARGA ACADÉMICA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
