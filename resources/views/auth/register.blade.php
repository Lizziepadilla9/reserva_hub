@extends('layouts.admin')
@section('content')






<h1 align="center"> REGISTRATE!</h1>

<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

   <div class="col-md-6 col-md-offset-3" align="left">


    <div class="form-group"> 
        Nombre
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Ingresa tu Nombre">
    </div>

    <div class="form-group">
        Correo
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Ingresa tu correo electronico">
    </div>

    <div class="form-group">
        Contraseña
        <input type="password" name="password" class="form-control" placeholder="Ingresa una contraseña">
    </div>

    <div class="form-group">
        Confirma Contraseña
        <input type="password" name="password_confirmation" class="form-control" placeholder="Repite contraseña">
    </div>

    <div class="form-group">
         <button type="submit" href="#" class="btn btn-primary pull-center">Registrarse</button>
    </div>
</form>
@endsection