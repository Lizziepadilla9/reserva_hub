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

<form action="{{route('admin.users.update', $user->id)}}" method="POST">
  {!! csrf_field() !!}
  <input type="hidden" name="_method" value="put">

    <div class="row"> 
       <div class="col-md-8 col-md-offset-2">
          @include('admin.fields')

      </div>
  </div>
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <input type="submit" value="Crear usuario" class="btn btn-success"> 
          
      </div>
  </div>





</form>
@endsection