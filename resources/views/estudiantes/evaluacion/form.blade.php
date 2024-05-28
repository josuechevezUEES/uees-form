@section('title', $evaluacion->tiposEvaluacione->nombre)

<section class="d-flex justify-content-center">
    <div class="card w-75">
        <div class="card-header px-3 bg-warning">
            <div class="row">
                <div class="col-sm-2 pt-3">
                    <img src="{{ asset('/img/logo-uees.png') }}" alt="logo-uees" class="w-100 img-fluid">
                </div>
                <div class="col-sm-10 pt-4">
                    <h1 class="font-weight-bolder text-dark-blue">
                        <strong>
                            Universidad Evangelica de El Salvador
                        </strong>
                    </h1>
                    <h4 class="font-weight-normal text-dark-blue">
                       <strong>
                        {{ $evaluacion->tiposEvaluacione->nombre }}
                        {{ $evaluacion->fecha_fin_evaluacion ? date('Y', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                       </strong>
                    </h4>
                    <p class="font-italic text-dark">
                        Termina
                        {{-- {{ $evaluacion->fecha_inicio_evaluacion ? date('d-m-Y h:i A', strtotime($evaluacion->fecha_inicio_evaluacion)) : null }} --}}
                        {{-- - --}}
                        {{ $evaluacion->fecha_fin_evaluacion ? date('d-m-Y h:i A', strtotime($evaluacion->fecha_fin_evaluacion)) : null }}
                    </p>

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
                                            {{ $evaluacion->id }}.{{ $seccion->literal }}
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
                                        <a href="#evaluacion_id={{ $evaluacion->id }}&seccion_id={{ $seccion->id }}">
                                            Ingresar
                                        </a>
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
