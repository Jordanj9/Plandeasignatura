@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio</a> <span class="fa-angle-right fa"></span>
                    <a href="{{route('admin.plan')}}">Módulo Planes</a>
                    <span class="fa-angle-right fa"></span>
                    <a href="{{route('plandetrabajo.index')}}">Actividades del Docente</a>
                    <span class="fa-angle-right fa"></span>
                    Gestión Cuadros Explicativos
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
                        <h4 class="card-title">GESTIÓN DE CUADROS EXPLICATIVOS</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('orientacion',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                             ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('investigacion',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                             INVESTIGACIÓN APROBADA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('extension',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                             EXTENSIÓN Y PROYECCIÓN SOCIAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('cooperacion',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                             COOPERACION INTERINSTITUCIONAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('crecimiento',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                            CRECIMIENTO PERSONAL Y DESARROLLO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('actividades',$plan->id)}}">
                        <button class="btn btn-outline-success btn-round">
                             ACTIVIDADES ADMINISTRATIVAS
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('otras',$plan->id)}}">
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

