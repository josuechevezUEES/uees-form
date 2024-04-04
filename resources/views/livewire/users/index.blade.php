@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    {{ Breadcrumbs::render('users.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('users')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('.form-check-input-rol');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', function(e) {
                    if (checkbox.checked) {
                        Livewire.emit('agregar_rol', e.target.value)
                    } else {
                        Livewire.emit('eliminar_rol', e.target.value)
                    }
                });
            });
        });
    </script>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
