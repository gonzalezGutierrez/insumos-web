<div class="form-group">
    <label for="">Producto</label>
    <input type="text" class="form-control" name="name" value="{{$product->name}}">
    @error('name')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Stock</label>
    <input type="" @if($product->departament) disabled @endif  class="form-control" name="stock" value="{{$product->stock}}">
    @error('stock')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Departamento</label>
    <select name="departament_id" class="form-control">
        @foreach($departaments as $departament)
            <option value="{{$departament->id}}">{{$departament->area}}</option>
        @endforeach
    </select>
    @error('departament_di')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Imagen</label>
    <input type="file" class="form-control" name="fileImage">
    @if($product->image)
        <div class="content-image">
            <img src="{{asset($product->image)}}" alt="">
        </div>
    @endif
</div>
<div class="form-group">
    <label for="">Descripción</label>
    <textarea name="description" id="" class="form-control" cols="30" rows="10">{{$product->description}}</textarea>
</div>
<div class="form-group">
    <label for="">Compatibilidad</label>
    <textarea name="compatibility" id="" class="form-control" cols="30" rows="10">{{$product->compatibility}}</textarea>
</div>
