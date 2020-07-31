@extends('layouts.admin')

@section('content')
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TOP 10 productos más entregados</h3>
                </div>
                <div class="card-body" style="height: 240px; overflow-y: scroll;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Entregas</th>
                                <th class="text-center">Producto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topProdDesc as $product)
                                <tr>
                                    <td class="text-center">{{$loop->index+1}}</td>
                                    <td class="text-center">{{$product->count_products_delivery}}</td>
                                    <td class="text-center">{{$product->product}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">TOP 10 productos menos entregados</h3>
                </div>
                <div class="card-body" style="height: 240px; overflow-y: scroll;">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Entregas</th>
                            <th class="text-center">Producto</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topProdAsc as $product)
                            <tr>
                                <td class="text-center">{{$loop->index+1}}</td>
                                <td class="text-center">{{$product->count_products_delivery}}</td>
                                <td class="text-center">{{$product->product}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                @if ($productSelected == true)
                    <div id="chart_div"  style="height: 450px;"></div>
                @else
                    <h3 class="text-center p-3">No hay ningun producto seleccionado</h3>
                @endif
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Insumos disponibles</h5>
                    <p style="font-size: 13px;">Selecciona un insumo para representar los datos de entrega en la gráfica.</p>
                    <form action="{{asset('/')}}">
                        <input type="hidden" value="{{$insumoSelected->id}}" name="insumo_id">
                        <input type="search" name="like" value="{{$like}}" class="form-control">
                    </form>
                </div>
                <div class="card-body">
                    <ul class="list-group p-3">
                        @foreach($insumos as $insumo)
                            <li class="list-group-item">
                                <a href="{{asset('/?insumo_id='.$insumo->id)}}">{{$insumo->name}}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@stop


@section('chart-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                [
                    'Entregas',
                    @foreach($charDataProduct as $departamentS)
                        '{{$departamentS->area}}',
                    @endforeach
                ],
                [
                    '',
                    @foreach($charDataProduct as $vEntr)
                        {{$vEntr->entregas}},
                    @endforeach
                ],
            ]);

            var options = {
                title : 'Insumo: {{$insumoSelected->name}}',
                vAxis: {title: 'Numero de entregas'},
                hAxis: {title: 'Áreas'},
                seriesType: 'bars',
                series: {5: {type: 'line'}}        };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@stop
