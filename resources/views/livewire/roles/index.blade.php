@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    {{ Breadcrumbs::render('roles.index') }}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('roles')
            </div>
        </div>
    </div>
@endsection

@section('footer')
    Universidad Evangelica de El Salvador | {{ date('Y') }}
@endsection
