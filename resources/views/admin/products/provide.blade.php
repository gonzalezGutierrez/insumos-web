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
            <a href="/productos" class="btn waves-effect waves-light btn-outline-danger pull-right pr-2 hidden-sm-down">
                Listado de productos
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
                        En esta sección se pueden visualizar el listado de productos generales disponibles en el hospital ,
                        así mismo actualizar abastecer el stock a cada producto.
                    </p>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-md-6">
            <form action="{{asset('abastecer-productos')}}" method="get">
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
                                <th></th>
                                <th>Producto</th>
                                <th>Departamento</th>
                                <th>Stock</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>


                                            <td>
                                                <img style="width: 45px; height: 45px;" data-toggle="modal" data-target=".cd-example-modal-sm-{{$product->id}}" class="image-avatar" src="{{asset($product->image)}}" alt="">
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->departament->area}}</td>
                                            <td>
                                                {{$product->stock}}
                                            </td>
                                            <td>
                                                <form action="{{asset('abastecer-productos')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="number" name="amount" required class="form-control">
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
