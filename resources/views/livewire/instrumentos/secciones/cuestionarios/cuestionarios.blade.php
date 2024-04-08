@section('title', 'Cuestionario')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', $instrumento_id, $seccion_id) }}
@stop

<div class="container-fluid" wire:poll>
    <div class="card">
        <div class="card-header">
            <strong>
                Instrumento
            </strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label for="">{{ $seccion->literal }}.1) ¿Numero de CIF?</label>
                    <input type="text" name="" id="" class="form-control form-control-border border-width-2">
                </div>
            </div>
        </div>
    </div>
</div>
