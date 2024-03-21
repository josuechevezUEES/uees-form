@extends('adminlte::page')

@section('title', 'Evaluadores')

@section('content_header')
    {{ Breadcrumbs::render('configuraciones.evaluaciones.tipos_evaluadores') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('tipos-evaluados')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
