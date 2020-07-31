<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Características del insumo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 align-middle">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Características del insumo</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item text-center">
                                <img style="width: 100%;" src="{{asset($product->image)}}" alt="">
                            </li>
                            <li class="list-group-item">
                                <span>Insumo: {{$product->name}}</span>
                            </li>
                            <li class="list-group-item">
                                <span>Cantidad: {{$product->stock}}</span>
                            </li>
                            <li class="list-group-item">
                                <span>Fecha de registro: {{$product->created_at}}</span>
                            </li>
                            <li class="list-group-item">
                                <span>Departamento: {{$product->departament->area}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>