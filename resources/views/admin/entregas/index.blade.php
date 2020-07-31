@extends('layouts.admin')
@section('top-content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-primary m-b-0 m-t-0">Entregas</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Resumen</a></li>
                <li class="breadcrumb-item active">Entregas <span class="info-count">({{$entregas->count()}})</span></li>
            </ol>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <p>Se despliegan las entregas realizadas segun su estatus, departamento y  fecha.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Entregas a departamentos</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr >
                                    <th class="text-center">#</th>
                                    <th class="text-center">Departamento</th>
                                    <th class="text-center">Estatus</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Productos</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entregas as $entrega)
                                <tr class="text-center">
                                    <td>{{$entrega->id}}</td>
                                    <td>{{$entrega->departamento->area}}</td>
                                    <td>
                                        <span class="badge-info badge">{{strtoupper($entrega->estatus)}}</span>
                                    </td>
                                    <td>{{$entrega->created_at}}</td>
                                    <td>
                                        <a href=""  data-toggle="modal" data-target="#exampleModal-{{$entrega->id}}" class="btn btn-outline-info">Ver productos</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="exampleModal-{{$entrega->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Enviar productos al departamento {{$entrega->departamento->area}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach($entrega->productos($entrega->id) as $producto)
                                                        <div class="col-md-4">
                                                           <div class="card">
                                                               <div class="card-block">
                                                                   <h4 class="card-title">{{$producto->name}}</h4>
                                                                   <img style="width: 100%;" src="{{asset($producto->image)}}" alt="">
                                                                   <span>Cantidad: {{$producto->cantidad}}</span>
                                                               </div>
                                                           </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{$entregas->links()}}
                </div>
            </div>
        </div>
    </div>
@stop
