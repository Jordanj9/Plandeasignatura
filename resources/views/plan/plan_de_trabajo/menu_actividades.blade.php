@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio</a> <span class="fa-angle-right fa"></span> Módulo Planes
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
                        <h4 class="card-title">GESTIÓN DE ACTIVIDADES</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('orientacion')}}">
                        <button class="btn btn-outline-success btn-round">
                             ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('investigacion')}}">
                        <button class="btn btn-outline-success btn-round">
                             INVESTIGACIÓN APROBADA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('extension')}}">
                        <button class="btn btn-outline-success btn-round">
                             EXTENSIÓN Y PROYECCIÓN SOCIAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('cooperacion')}}">
                        <button class="btn btn-outline-success btn-round">
                             COOPERACION INTERINSTITUCIONAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('crecimiento')}}">
                        <button class="btn btn-outline-success btn-round">
                            CRECIMIENTO PERSONAL Y DESARROLLO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('actividades')}}">
                        <button class="btn btn-outline-success btn-round">
                             ACTIVIDADES ADMINISTRATIVAS
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('otras')}}">
                        <button class="btn btn-outline-success btn-round">
                            OTRAS ACTIVIDADES
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

