@extends('adminlte::page')


@section('content')
    <div class="container-fluid pt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('estudiantes.evaluacion.secciones.view')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
