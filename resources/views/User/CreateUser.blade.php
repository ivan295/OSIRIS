@extends('adminlte::page')
@section('title', 'Usuarios')
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
    
@stop

@section('content')
<script type="text/javascript">
  function consultar_tipo(){
    var dato = document.getElementById('idtipouser').value;
    document.getElementById('TipoUsuario').value = dato;
  }
</script>

<form method="post" action="/User/create"  enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<div class="card">
  		
  		<div class="card-body">
	<div class="row">
	<div class="col-md-6">
		<div class="form-group">
    <label for="inputnameuser" class="form-label">Nombre</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          	<span class="input-group-addon"><i class="fa fa-user"></i></span>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
        @error('name')
      <small class="text-danger">{{$message}}</small>
      @enderror
    </div>
		</div>
  	</div>

  	<div class="col-md-6">
  		<div class="form-group">
    <label for="inputlastname" class="form-label">Apellido</label>
   <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          	<span class="input-group-addon"><i class="fa fa-user"></i></span>
          </div>
        </div>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido">
      </div>
      @error('lastname')
      <small class="text-danger">{{$message}}</small>
      @enderror
  </div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
    <label for="inputemail" class="form-label">Email</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          	<span class="input-group-addon"><i class="fa fa-at"></i></span>
          </div>
        </div>
        <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
    </div>
      @error('email')
      <small class="text-danger">{{$message}}</small> 
      @enderror
  </div>
	</div>

  	<div class="col-md-6">
  		<div class="form-group">
    <label for="inputpassword" class="form-label">Contraseña</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
          	<span class="input-group-addon"><i class="fa fa-key"></i></span>
          </div>
        </div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
      </div>
      @error('password')
      <small class="text-danger">{{$message}}</small>
      @enderror
  	</div>
	</div>
	<div class="col-md-6">
		<label for="selecttipo" class="form-label">Tipo de Usuario</label>
		<select class="form-control" name="idtipouser" id="idtipouser" onchange="consultar_tipo()">                    
              <option value="0">Seleccionar tipo de Usuario</option>
              <?php $tipousuario = DB::table('type_users')->select('type_users.id','type_users.tipo_usuario')->get(); ?>
              @foreach($tipousuario as $tipouser)
              <option value="<?php  echo $tipouser->id ; ?>"> <?php echo $tipouser->tipo_usuario; ?>  </option>
              @endforeach
            </select>
           <input type="hidden" id="TipoUsuario" name="TipoUsuario">
        @error('TipoUsuario')
      	<small class="text-danger">{{$message}}</small>
      	@enderror
	</div>
	 <div class="col-md-6">
	 	<label for="selectgenero" class="form-label">Género</label>
	 	<select class="form-control" name="genero" id="genero">
        	<option value="0">Seleccionar Género</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
          @error('genero')
      	<small class="text-danger">{{$message}}</small>
      	@enderror
        </div>
  	<div class="col-md-6">
  		<br>
  	<button type="submit" class="btn btn-success">Guardar</button>
  	<!-- <div class="spinner-border text-dark"></div> -->
	</div>
	</div>
</div>
</div>
</form>

<div class="card"> 
	<div class="card-body">
		<div class="col-md-12">
		<table class="table table-striped table-hover " id="datatable">
			<thead>
				<tr class='text-center'>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
					<th>Tipo de Usuario</th>
					<th>Fecha de Creación</th>
					<th>Opciones</th>
				</tr>
			</thead>

			<tbody>
				@foreach($users as $user)
				<tr class='text-center'>
					<td>{{$user->name}}</td>
					<td>{{$user->lastname}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->TipoUser}}</td>
					<td>{{$user->created_at}}</td><!-- diffForHumans() -->
					<td>
          				<div class="row">
            				<div class="col-md-3 col-md-offset-2">
            				<a class="btn btn-primary" href="{{route('User.edit',$user->id)}}"><i class="fa fa-edit"></i></a>   
             					<!-- <form action="{{route('User.edit',$user->id)}}" method="post">
              					{{csrf_field()}}
									<button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button></form>
								</form> -->
            				</div>
           					<div class="col-md-6 col-md-offset-2">
           						<a class="btn btn-danger" href="{{route('User.edit',$user->id)}}"><i class="fa fa-trash"></i></a> 
             					<!-- <form action="" method="post">
                					<input type="hidden" name="_method" value="DELETE">
                					<input type="hidden" name="_token" value="{{ csrf_token() }}">
                					<button type="submit" class="btn btn-danger btn-xs" onclick="return borrar()"><i class="fa fa-trash"></i></button>
            					</form> -->
          					</div>
        				</div>
      				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@stop


@section('js')

<script src=" https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js
"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js 
"></script>
<script src="{{ asset('/js/datatables.js') }}" defer></script>


@stop

