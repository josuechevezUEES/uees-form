@section('title', 'Secciones')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones', $instrumento_id) }}
@stop

<div class="container-fluid">
    @include('livewire.ins-instrumentos-secciones.modals')
    <div class="row justify-content-start mb-4">
        <div class="col-sm-1 col-12 col-lg-1">
            <button type="button" class="btn bg-warning btn-block" data-bs-toggle="modal" data-bs-target="#createDataModal">
                <i class="fa fa-plus"></i>
                Agregar
            </button>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col-sm-12">
            <div class="row">
                @forelse($insInstrumentosSecciones as $row)
                    <div class="col-sm-4">
                        <div class="card" data-toggle="tooltip" data-placement="top"
                            title=" {{ $row->literal }}. {{ $row->nombre }}">
                            <div class="card-header bg-navy">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <strong class="d-inline-block text-truncate" style="max-width: 150px;">
                                            {{ $row->literal }}. {{ $row->nombre }}
                                        </strong>
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

                                <div class="p-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('instrumentos_evaluaciones.secciones.cuestionarios', ['seccion_id' => $row->id, 'instrumento_id' => $instrumento_id]) }}"
                                            class="btn btn-xs" data-toggle="tooltip" data-placement="left"
                                            title="Ver Preguntas">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs" data-bs-toggle="modal"
                                            data-bs-target="#updateDataModal" wire:click="edit({{ $row->id }})">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs"
                                            onclick="confirm('Confirmar eliminacion de {{ $row->nombre }}?')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{ $row->id }})">
                                            <i class="fa fa-trash"> </i>
                                        </a>
                                    </div>
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
            <div class="float-end">{{ $insInstrumentosSecciones->links() }}</div>
        </div>
    </div>
</div>
