@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($evaluaciones as $evaluacion)
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-warning p-3">
                            <div class="row">
                                <div class="col-sm-2 text-center p-3">
                                    <img src="{{ asset('img/logo-uees.png') }}" class="img-fluid w-50" alt="Logo-UEES">
                                </div>
                                <div class="col-sm-10 text-start">
                                    <h1 class="widget-user-username font-weight-bold text-left pt-3 text-dark">
                                        {{ $evaluacion->tiposEvaluacione->nombre }}
                                    </h1>
                                    <h5 class="text-dark">
                                        La evaluacion se encuentra {{ $evaluacion->estado ? 'Activa' : 'Desactivado' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 text-center">
                                    <img src="{{ asset('img/servicios-educativos.jpg') }}" class="img-fluid w-100"
                                        alt="logo-seccion">
                                </div>
                                <div class="col-sm-6 pt-3">
                                    <h3 class="font-weight-bold">
                                        Información Importante
                                    </h3>
                                    <hr>
                                    <p>
                                        <strong>
                                            La evaluación termina el dia
                                            <strong>
                                                {{ $evaluacion->fecha_fin_evaluacion ? date('d-m', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                                            </strong>
                                            <strong>
                                                {{ $evaluacion->fecha_fin_evaluacion ? date('h:i A', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                                            </strong>
                                        </strong>

                                        <br> <br>

                                        La Universidad Evangélica de El Salvador (UEES) es una institución reconocida por su
                                        compromiso con la excelencia académica y el bienestar de sus estudiantes. Para
                                        mantener y mejorar la calidad de sus servicios, la UEES implementa regularmente
                                        evaluaciones que permiten a los estudiantes y personal académico expresar sus
                                        opiniones y sugerencias. En este evaluacion, exploraremos la importancia de estas
                                        evaluaciones y cómo impactan positivamente en la comunidad
                                        universitaria.<br><br>

                                        <strong>Importancia de las Evaluaciones</strong><br><br>Las evaluaciones de
                                        servicios son una herramienta esencial para cualquier institución educativa. En la
                                        UEES, estas evaluaciones se utilizan para:<br><br>

                                        <strong>Identificar Áreas de Mejora</strong>: A
                                        través de encuestas y cuestionarios, los estudiantes pueden señalar áreas
                                        específicas donde sienten que los servicios pueden mejorarse, ya sea en la
                                        biblioteca, servicios administrativos, tecnología, instalaciones deportivas, entre
                                        otros.<br><br>

                                        <strong>Fomentar la Transparencia</strong>: Al permitir que los estudiantes y el
                                        personal compartan sus opiniones, en UEES promueve un ambiente de transparencia y
                                        confianza. Esto demuestra que la universidad está dispuesta a escuchar y actuar en
                                        base a las necesidades y preocupaciones de su comunidad.<br><br>

                                        <strong>Mejorar Experiencia Estudiantil</strong>: La retroalimentación constante
                                        ayuda a la universidad a
                                        adaptar y perfeccionar sus servicios para asegurar una experiencia estudiantil
                                        satisfactoria. Esto incluye desde la calidad de la enseñanza hasta los servicios de
                                        apoyo estudiantil.

                                        <hr>
                                        <a href="{{ route('estudiantes.evaluaciones.secciones', ['evaluacion_id' => $evaluacion->id]) }}"
                                            class="btn btn-warning">
                                            Iniciar Evaluación
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
