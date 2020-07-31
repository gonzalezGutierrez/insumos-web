@extends('layouts.admin')

@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Agregar producto</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item"><a href="/productos">Productos</a></li>
                <li class="breadcrumb-item active">Registrar</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">

        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <form action="{{asset('productos/')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.products.form')
                        <button type="submit" class="btn btn-outline-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
