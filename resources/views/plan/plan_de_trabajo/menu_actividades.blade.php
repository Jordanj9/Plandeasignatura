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
                        <h4 class="card-title">MODULO PLANES</h4>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('plandeasignatura.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="material-icons">edit</i> ORIENTACIÓN Y EVALUACIÓN DE LOS TRABAJOS DE GRADO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('plandedesarrolloasignatura.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="material-icons">crop_rotate</i> INVESTIGACIÓN APROBADA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('plandetrabajo.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i  class="material-icons">work</i> EXTENSIÓN Y PROYECCIÓN SOCIAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('plandetrabajo.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i  class="material-icons">work</i> COOPERACION INTERINSTITUCIONAL
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('plandetrabajo.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i  class="material-icons">work</i> OTRAS ACTIVIDADES
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

