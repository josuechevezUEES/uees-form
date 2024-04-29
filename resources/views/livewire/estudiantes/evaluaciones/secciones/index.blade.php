@extends('adminlte::page')

@section('title', 'Secciones')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <livewire:estudiantes.evaluaciones.secciones.secciones />
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection


@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.form-input-opcion');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', function(e) {
                    if (checkbox.checked) {
                        Livewire.emit('agregar_opcion', e.target.value)
                    } else {
                        Livewire.emit('eliminar_opcion', e.target.value)
                    }
                });
            });
        });
    </script>
@endpush
