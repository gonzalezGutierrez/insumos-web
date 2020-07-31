@extends('layouts.admin')

@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Departamentos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item active">Departamentos <span class="info-count">({{$departaments->count()}})</span></li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <a href="/departamentos/create" class="btn waves-effect waves-light btn-outline-danger pull-right hidden-sm-down">
                Agregar
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
                        En esta sección se pueden visualizar el listado de departamentos disponibles en el hospital,
                        así mismo actualizar y editar la información de cada departamento.
                    </p>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-md-6">
            <form action="{{asset('departamentos')}}" method="get">
                <div class="form-group">
                    <label for="">Buscar área</label>
                    <input type="text" name="like" value="{{$like}}" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-lg-12">

            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Listado de departamentos</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Área</th>
                                <th>Responsable</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($departaments as $departament)
                                    <tr>
                                        <td>{{$departament->id}}</td>
                                        <td>{{$departament->area}}</td>
                                        <td>{{$departament->responsable}}</td>
                                        <td>
                                            <a href="{{asset('departamentos/'.$departament->id.'/edit')}}"   class="btn btn-outline-info">Editar</a>
                                            <a href="{{asset('departamentos/'.$departament->id.'/productos')}}" class="btn btn-outline-info">Productos</a>
                                            <form action="{{asset('departamentos/'.$departament->id)}}" method="POST" class="form-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-outline-danger button">Desactivar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$departaments->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
