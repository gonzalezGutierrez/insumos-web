@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <p>
                       En esta sección se pueden generar los reportes de entregas e insumos proximos a agotarse.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 m-t-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Reportes de insumos</h3>
                </div>
                <div class="card-body text-center m-b-10">
                    <a href="/reportes/insumos" class="btn btn-outline-primary">Descargar reporte</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 m-t-10">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Reportes de entregas</h3>
                </div>
                <div class="card-body text-center m-b-10">
                    <a href="/reportes/entregas" class="btn btn-outline-primary">Descargar reporte</a>
                </div>
            </div>
        </div>
    </div>
@stop
