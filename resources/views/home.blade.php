@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($evaluaciones as $evaluacion)
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header bg-navy p-3">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img src="{{ asset('img/logo-uees.png') }}" alt="Logo-UEES" class="w-100">
                                        </div>
                                        <div class="col-sm-10 pt-2">
                                            <h3 class="widget-user-username text-left">
                                                {{ $evaluacion->tiposEvaluacione->nombre }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">
                                                    {{ $evaluacion->activo ? 'Activo' : 'Desactivado' }}
                                                </h5>
                                                <span class="description-text">Estado</span>
                                            </div>

                                        </div>

                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">4 Fac.</h5>
                                                <span class="description-text">Facultades</span>
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">01-2024</h5>
                                                <span class="description-text">Periodo/Año</span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{ route('estudiantes.evaluaciones.secciones', ['evaluacion_id' => $evaluacion->id]) }}"
                                                class="btn btn-sm btn-warning btn-block">
                                                Ver Evaluacion
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
