@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    {{ Breadcrumbs::render('home') }}
@stop
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($evaluaciones as $evaluacion)
                        <div class="col-sm-12">
                            <div class="card card-widget widget-user">
                                <div class="widget-user-header text-white"
                                    style="background: url('https://adminlte.io/themes/v3/dist/img/photo1.png') center center;">
                                    <h3 class="widget-user-username text-right">
                                        {{ $evaluacion->tiposEvaluacione->nombre }}
                                    </h3>
                                    <h5 class="widget-user-desc text-right">
                                        {{ $evaluacion->tiposEvaluacione->descripcion }}
                                    </h5>
                                </div>
                                <div class="widget-user-image">
                                    <img class="img-circle" src="https://adminlte.io/themes/v3/dist/img/user3-128x128.jpg" alt="User Avatar">
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">3,200</h5>
                                                <span class="description-text">SALES</span>
                                            </div>

                                        </div>

                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">13,000</h5>
                                                <span class="description-text">FOLLOWERS</span>
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">35</h5>
                                                <span class="description-text">PRODUCTS</span>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
