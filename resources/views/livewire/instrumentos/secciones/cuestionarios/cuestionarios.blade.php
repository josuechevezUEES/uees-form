@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.secciones.cuestionarios', 1, 1) }}
@stop


@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">

            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
