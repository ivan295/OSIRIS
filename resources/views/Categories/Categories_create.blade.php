@extends('adminlte::page')

@section('title', 'Categorias')

@section('content')
  <form method="post" action="/Categories/create"  enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-12 col-md-offset-0">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Crear Categorias</h3>
					</div>
					<!-- <input type="hidden" class="form-control" name="id_usuario" id="id_usuario" value="{{Auth::user()->id}}"> -->
					<div class="col-md-12">
						<label for="titulo">Título</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
							<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título" required>
						</div>
					</div>
					

					<div class="modal-footer">
						<br>
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop