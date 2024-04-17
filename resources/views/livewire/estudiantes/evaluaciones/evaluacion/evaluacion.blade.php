@section('title', 'Evaluacion')

@section('content_header')
    {{ Breadcrumbs::render('estudiantes.evaluaciones.ver', $this->evaluacion->tipo_evaluacion_id) }}
@stop

<div class="row">
    @forelse($secciones as $row)
        <div class="col-sm-4">
            <div class="card" data-toggle="tooltip" data-placement="top"
                title=" {{ $row->literal }}. {{ $row->nombre }}">
                <div class="card-header bg-warning">
                    <div class="row">
                        <div class="col-sm-11">
                            <strong class="d-inline-block text-truncate" style="max-width: 150px;">
                                {{ $row->literal }}. {{ $row->nombre }}
                            </strong>
                        </div>
                        <div class="col-sm-1">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('estudiantes.evaluaciones.cuestionarios', ['seccion_id' => $row->id]) }}"
                                    class="btn btn-xs" data-toggle="tooltip" data-placement="left"
                                    title="Ver Preguntas">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative shadow">
                    <img src="{{ asset("storage/photos/$row->fondo_img") }}" class="img-fluid w-100 h-100"
                        alt="logo-seccion">

                    <div class="ribbon-wrapper">
                        @if ($row->estado == 1)
                            <div class="ribbon bg-primary">
                                Activo
                            </div>
                        @else
                            <div class="ribbon bg-danger">
                                No Activo
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-sm-12 pt-5">
            <div class="p-5">
                @include('adminLTE.errors.datos-no-encontrados')
            </div>
        </div>
    @endforelse
</div>
