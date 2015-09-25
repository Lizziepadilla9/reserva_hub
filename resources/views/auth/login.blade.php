@extends('layouts.admin')
@section('content')
<br>
<br>
<br>
<br>
<h1 align="center">Sistema de Reservación de Sala de Reuniones Hub170</h1>
<br>
<br>
<div class="col-md-4 col-md-offset-4" align="center">

<div class="panel panel-primary">
   
  <div class="panel-heading"> 

    <br><small>Inicio de sesión</small>
    </div>
  <div class="panel-body">

       <form method="POST" action="/auth/login">

        {!! csrf_field() !!}
        <br>

        <div  class="input-group col-md-8" align="center">
         <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        </div>
        <br>
        <div class="input-group col-md-8">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        
            <input id="password" class="form-control" name="password" placeholder="Password" type="password">
                    
                 </div>
                 <br>
        <div>
            <input type="checkbox" name="remember" align="rigth"> Remember Me
        </div>

        <div>
        <button type="submit" href="#" class="btn btn-success pull-center"><i class="glyphicon glyphicon-log-in"></i> Entrar</button>                            
        </div>
    </form>
    
  </div>
</div>
    
</div>
@endsection