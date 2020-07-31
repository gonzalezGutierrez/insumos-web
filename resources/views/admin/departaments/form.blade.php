<div class="form-group">
    <label for="">Área: </label>
    <input type="text" class="form-control" name="area" value="{{$departament->area}}">
    @error('area')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Responsable: </label>
    <input type="text" class="form-control" name="responsable" value="{{$departament->responsable}}">
    @error('responsable')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
