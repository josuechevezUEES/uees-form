@extends('adminlte::page')

@section('title', 'Instrumentos')

@section('content_header')
    {{ Breadcrumbs::render('instrumentos_evaluaciones.index') }}
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
