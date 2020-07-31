<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Producto</th>
            <th>Stock</th>
            <th>Departamento</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    <img style="width: 45px; height: 45px;" data-toggle="modal" data-target=".cd-example-modal-sm-{{$product->id}}" class="image-avatar" src="{{asset($product->image)}}" alt="">
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
                <td>
                    {{$product->stock}}
                </td>
                <td>{{$product->departament->area}}</td>
                <td>
                    <a data-toggle="modal" data-target="#staticBackdrop-{{$product->id}}" class="btn btn-default">Código QR</a>
                    <a href="{{asset('productos/'.$product->id.'/edit')}}" class="btn btn-outline-info">Editar</a>
                    <form action="{{asset('productos/'.$product->id)}}" method="POST" class="form-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Desactivar</button>
                    </form>
                </td>

                <div class="modal fade" id="staticBackdrop-{{$product->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content" style="padding:0px !important; margin:0px !important;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">CÓDIGO QR</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="padding:0px !important; margin:0px !important;">
                                <img style="width: 200px; height:200px;" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl={{asset('productos-comprobante/'.$product->id)}}" title="Codigo QR" />
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        @endforeach
    </tbody>
</table>
