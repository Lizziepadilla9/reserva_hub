@extends('layouts.admin')
@section('content')


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('admin.users.store')}}" method="POST">

<div class="row"> 
  <div class="col-md-8 col-md-offset-2">
    @include('admin.fields')
    
  </div>
</div>

  

  {!! csrf_field() !!}

<input type="submit" value="Crear usuario"> 

</form>
@endsection