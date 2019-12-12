@extends('layouts.app')
@section('breadcrumb')
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <p class="animated fadeInDown">
                    <a href="{{route('inicio')}}">Inicio</a> <span class="fa-angle-right fa"></span> Módulo Evaluación
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
                        <h4 class="card-title">MODULO EVALUACIÓN</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if(session()->exists('PAG_EVALUACION-ASISTENCIA'))
                        <a href="{{route('asistencia.index')}}">
                            <button class="btn btn-outline-success btn-round">
                                <i class="material-icons">spellcheck</i> TOMAR ASISTENCIA
                                <div class="ripple-container"></div>
                            </button>
                        </a>
                    @endif
                    @if(session()->exists('PAG_EVALUACION-EVALUACION'))
                        <a href="{{route('evaluacion.index')}}">
                            <button class="btn btn-outline-success btn-round">
                                <i class="material-icons">tab</i> EVALUACIÓN
                                <div class="ripple-container"></div>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
