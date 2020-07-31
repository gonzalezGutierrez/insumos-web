@extends('layouts.admin')

@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Productos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item"><a href="/departamentos">Departamentos</a></li>
                <li class="breadcrumb-item"><a href="{{asset('departamentos/'.$departament->id.'/edit')}}">{{$departament->area}}</a></li>
                <li class="breadcrumb-item active">Productos <span class="info-count">({{$products->count()}})</span></li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-md-6">
            <form action="{{asset('departamentos/'.$departament->id.'/productos')}}" method="get">
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th></th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>Departamento</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        <img  data-toggle="modal" data-target=".cd-example-modal-sm-{{$product->id}}" class="image-avatar" src="{{asset($product->image)}}" alt="">
                                        <div class="modal fade cd-example-modal-sm-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content text-center">
                                                    <h3 class="modal-title image-title">{{$product->name}}</h3>
                                                    <img class="preview-image" src="{{asset($product->image)}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->departament->area}}</td>
                                    <td>
                                        <a href="{{asset('productos/'.$product->id.'/edit')}}" class="btn btn-outline-info">Editar</a>
                                        <form action="{{asset('productos/'.$product->id)}}" method="POST" class="form-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">Desactivar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
