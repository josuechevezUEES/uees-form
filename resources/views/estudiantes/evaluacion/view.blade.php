@section('title', $evaluacion->tiposEvaluacione->nombre)

@section('title', 'Evaluaciones')

@section('content_header')
    {{ Breadcrumbs::render('estudiantes.evaluaciones.secciones', $evaluacion_id) }}
@stop


<section class="d-flex justify-content-center">
    <div class="card w-100">
        <div class="card-header px-3 bg-dark-yellow">
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
            <div class="my-3 p-3 rounded">
                <div class="row">
                    @foreach ($secciones as $seccion)
                        <div class="col-sm-6 mb-3">
                            <div class="media text-muted pt-3 row">
                                <div class="col-sm-3">
                                    <img src='{{ asset("storage/photos/$seccion->fondo_img") }}'
                                        class="bd-placeholder-img mr-2 rounded w-100" alt="icon">
                                </div>
                                <div class="col-sm-9">
                                    <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray text-break">
                                        <strong class="d-block text-gray-dark">
                                            {{ $seccion->literal }})
                                            {{ $seccion->nombre }}
                                        </strong>
                                        {{-- {{ $seccion }} --}}
                                        Descripcion de la evaluacion,
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed laboriosam error
                                        ipsa
                                        earum nemo vel asperiores veritatis eius animi cupiditate. Vel eos dolor illum
                                        voluptates, veritatis ab blanditiis exercitationem minus?
                                        la evaluacion esta incompleta porfavor.
                                        <br> <br>

                                        @if ($seccion->verificar_seccion_completada_por_usuario(Auth::user()->name, $seccion->id) == true)
                                            <a href="#" class="disable">
                                                Completada
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('estudiantes.evaluaciones.seccion', ['evaluacion_id' => $evaluacion->id, 'seccion_id' => $seccion->id]) }}">
                                                Ingresar
                                            </a>
                                        @endif

                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
