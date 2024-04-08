@extends('adminlte::page')

@section('title', 'Tipos Preguntas')

@section('content_header')
    {{ Breadcrumbs::render('configuraciones.tipos-preguntas') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('tip-tipos-preguntas')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
