@extends('adminlte::page')

@section('title', 'Tipos')

@section('content_header')
    {{ Breadcrumbs::render('evaluaciones.tipos') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('tipos-evaluaciones')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
