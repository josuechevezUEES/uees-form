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
                    <div class="card-header">
                        <h5><span class="text-center fa fa-home"></span> @yield('title')</h5>
                    </div>
                    <div class="card-body">
                        <h5>Hi <strong>{{ Auth::user()->name }},</strong>
                            {{ __('You are logged in to ') }}{{ config('app.name', 'Laravel') }}</h5>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
