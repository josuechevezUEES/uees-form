@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-navy">
                        <h5>
                            <span class="text-center fa fa-home"></span>
                            Evaluaciones
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
