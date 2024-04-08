@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="container-fluid">
    @include('livewire.instrumentos.secciones.cuestionarios.modal')
    <div class="card">
        <div class="card-header bg-navy">
            <div class="row">
                <div class="col-sm-10">
                    <h3>
                        {{ $seccion->literal }}. Instrumento
                    </h3>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn bg-warning btn-block" data-bs-toggle="modal" data-bs-target="#createDataModal">
                        Nueva Pregunta
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($preguntas_instrumento as $pregunta)
                    <div class="col-sm-12 mb-5">
                        @if ($pregunta->tipo_pregunta_id == 1)
                            <label for="">{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}) {{ $pregunta->nombre }}</label>
                            <div class="row pt-2">
                                <div class="col-sm-auto">
                                    <input type="radio" name="" id="" class="form-radio-input"> Si
                                </div>
                                <div class="col-sm-auto">
                                    <input type="radio" name="" id="" class="form-radio-input"> No
                                </div>
                                <div class="col-sm-auto">
                                    <input type="radio" name="" id="" class="form-radio-input"> Nunca
                                </div>
                            </div>
                        @endif

                        @if ($pregunta->tipo_pregunta_id == 2)
                            <label for="">{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}) {{ $pregunta->nombre }}</label>
                            <div class="row pt-2">
                                <div class="col-sm-12">
                                    <input type="text" name="" id="" class="form-control"
                                        placeholder="Requerido">
                                </div>
                            </div>
                        @endif


                        @if ($pregunta->tipo_pregunta_id == 3)
                            <label for="">{{ $seccion->literal }}.{{ $pregunta->sub_numeral }}) {{ $pregunta->nombre }}</label>
                            <div class="row pt-2">
                                <div class="col-sm-auto">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
