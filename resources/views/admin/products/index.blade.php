@extends('layouts.admin')

@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Productos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item active">Productos <span class="info-count">({{$products->count()}})</span></li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <a href="/productos/create" class="btn waves-effect waves-light btn-outline-danger pull-right pr-2 hidden-sm-down">
                Agregar
            </a>
            <a href="abastecer-productos" class="  btn btn-outline-info pull-right hidden-sm-down">
                Abastecer
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <p>
                        En esta sección se pueden visualizar el listado de productos generales disponibles en el hospital,
                        así mismo actualizar y editar la información de cada producto.
                    </p>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-md-6">
            <form action="{{asset('productos')}}" method="get">
                <div class="form-group">
                    <label for="">Buscar producto</label>
                    <input type="text" name="like" value="{{$like}}" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Listado de productos</h4>
                    <div class="table-responsive">
                        @include('admin.products.data')
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
