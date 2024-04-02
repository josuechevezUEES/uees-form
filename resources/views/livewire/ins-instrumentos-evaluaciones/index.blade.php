@extends('adminlte::page')

@section('title', 'Evaluados')

@section('content_header')
    {{ Breadcrumbs::render('configuraciones.evaluaciones.tipos_evaluados') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('ins-instrumentos-evaluaciones')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
