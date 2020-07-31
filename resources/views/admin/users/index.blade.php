@extends('layouts.admin')

@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Usuarios</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item active">usuarios <span class="info-count">({{$users->count()}})</span></li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <a href="/usuarios/create" class="btn waves-effect waves-light btn-outline-danger pull-right hidden-sm-down">
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
                        En esta sección se pueden visualizar el listado de usuarios disponibles en el hospital,
                        así mismo actualizar y editar la información de cada usuario.
                    </p>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-md-6">
            <form action="{{asset('usuarios')}}" method="get">
                <div class="form-group">
                    <label for="">Buscar usuarios</label>
                    <input type="text" name="like" value="{{$like}}" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-lg-12">

            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Listado de usuarios</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Dirección de correo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{asset('/usuarios/'.$user->id.'/edit')}}" class="btn btn-outline-info">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
