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
                            <i class="fa fa-cubes"></i> PLAN DE ASIGNATURA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('facultad.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> PLAN DE DESARROLO DE ASOGNATURA
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                    <a href="{{route('departamento.index')}}">
                        <button class="btn btn-outline-success btn-round">
                            <i class="fa fa-cubes"></i> PLAN DE TRABAJO
                            <div class="ripple-container"></div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
