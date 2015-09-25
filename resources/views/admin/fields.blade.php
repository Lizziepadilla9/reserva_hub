
<div class="form-group">
    Usuario
    <input type="text" name="name" id="name" class="form-control" value="{{$user->name or old('name')}}">
</div>

<div class="form-group">
    Contraseña
    <input type="password" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    Correo 
    <input type="email" name="email" value="{{ $user->company->email or old('email') }}" class="form-control">
</div>
<div class="form-group">
    nombre compañia
    <input type="text" name="company_name" id="company_name" class="form-control" value="{{$user->company->name or old('companie')}}">
</div>
<div class="form-group">
   Nombre de Representante
    <input type="text" name="representative" id="representative" class="form-control" value="{{$user->company->representative or old('representative')}}">
</div>
<div class="form-group">
    Telefono
    <input type="tel" name="telephone" id="password" class="form-control" value="{{$user->company->telephone or old('telephone')}}">
</div>




