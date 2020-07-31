<div class="form-group">
    <label for="">Nombre completo</label>
    <input type="text" class="form-control" value="{{$user->name}}" name="name">
    @error('name')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" value="{{$user->email}}" name="email">
    @error('email')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    <label for="">Contraseña</label>
    <input type="password" class="form-control" name="password">
    @error('password')
        <span class="info-validation">{{$message}}</span>
    @enderror
</div>
