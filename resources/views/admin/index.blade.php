@extends('layouts.admin')
@section('content')
@if(session('status')) 
{{session('status')}}
@endif



@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div id='calendar'></div>
<a href="/admin/users/create">Crear Usuario</a>
<div class="col-md-10 col-md-offset-1">
	
	<table class="table table-striped">
		<thead>
			<th>
				Nombre
			</th>
			<th>
				Correo
			</th>
			<th>
				Fecha de creacion
			</th>
			<th>
				Nombre de la compañia
			</th>
			<th>
				representante
			</th>
			<th>
				numero de telefono
			</th>
		</thead>
		<tbody>
		
			@foreach($users as $user )
			<tr>
				<td>
					{{$user->name}}
				</td>
				<td>
					{{$user->email}}
				</td>
				<td>
					{{$user->created_at}}
				</td>
				<td>
					@if(!is_null($user->company))
					
						{{ $user->company->name }}
					@endif
				</td>
				<td>
					@if(!is_null($user->company))
					
						{{ $user->company->representative }}
					@endif
				</td>
				<td>
					@if(!is_null($user->company))
					
						{{ $user->company->telephone }}
					@endif
					
				</td>	
				<td>
					<a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-success">editar</a> 
				</td>
				<td>
				
					{!! Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE', 'role' => 'form'))!!}
  <div class="row">
    <div class="form-group col-md-4">
        {!! Form::submit('Eliminar usuario', array('class' => 'btn btn-danger'))!!}
    </div>
  </div>
{!!Form::close()!!}
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	{!!$users->render()!!}
</div>
@endsection

