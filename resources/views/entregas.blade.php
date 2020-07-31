<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de entregas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<img class="text-center" src="{{asset('logo.jpg')}}" style="width:180px; text-align: center;" alt="">
<h3 class="text-center">Reporte de entregas generales</h3>
<h6>Fecha: {{NOW()->format('d-m-y')}}</h6>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Departamento</th>
        <th>Fecha</th>
        <th>Estatus</th>
    </tr>
    </thead>
    <tbody>
        @foreach($entregas as $entrega)
            <tr>
                <td>{{$entrega->id}}</td>
                <td>{{$entrega->departamento->area}}</td>
                <td>{{$entrega->created_at->format('d-m-y')}}</td>
                <td>{{$entrega->estatus}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
