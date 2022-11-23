@extends('app')
@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">			
		<form action="{{ route('consultaUsuario.update', ['consultaUsuario' => $usuario->id]) }}" method="post" class="row g-3">

			@csrf	
			@if(session('success'))
			<h5 class="alert alert-success">{{ session('success') }}</h5>	
			@endif


			<div class="col-md-8 justify-content-center">
				<h3>Actualizar Usuario</h3>
			</div>

			@error('nombres')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row g-3">
				<div class="col-md-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input name="nombres" type="text" class="form-control" placeholder="Ingresa tu nombre" aria-label="nombre" value="{{ $usuario->nombres }}">
				</div>

				@error('apellidos')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="apellido" class="form-label">Apellido</label>
					<input name="apellidos" type="text" class="form-control" placeholder="Ingresa tu apellido" aria-label="apellido" value="{{ $usuario->apellidos }}">
				</div>
			</div>	

			@error('fechanacimiento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="fecha" class="form-label">Fecha de Nacimiento</label>
				<input class="form-control" type="date" name="fechanacimiento" value="{{ $usuario->fechanacimiento }}" placeholder="Selecciona">	
			</div>

			@error('rh')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="tiposangre" class="form-label">Tipo de Sangre</label>
				<select name="rh"id="inputState" class="form-select" value="{{$usuario->rh}}">
					<option selected>Selecciona</option>
					@for($i=0; $i < count($rh); $i++)
					@if($usuario->rh == $rh[$i])
					<option value="{{ $rh[$i] }}" selected="true">{{ $rh[$i] }}</option>
					@else
					<option value="{{ $rh[$i] }}">{{ $rh[$i] }}</option>
					@endif
					@endfor
				</select>
			</div>

			@error('id_tipo_documento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="id_tipo_documento" class="form-label">Tipo de Documento</label>
				<select name="id_tipo_documento" id="inputState" class="form-select">
					<option selected>Selecciona</option>
					@foreach($tipodocumentos as $tipo)
					@if($tipo->id == $usuario->id_tipo_documento)
					<option value="{{ $tipo -> id }}" selected="true" >{{ $tipo -> tipo_documento }} </option>
					@else
					<option value="{{ $tipo -> id }}">{{ $tipo -> tipo_documento }} </option>
					@endif
					@endforeach
				</select>
			</div>

			@error('numero_documento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-6">
				<label for="numdoc" class="form-label">Numero de Documento</label>
				<input name="numero_documento" type="number" class="form-control" id="inputDocument" placeholder="Numero de Identificacion" value="{{ $usuario->numero_documento }}">
			</div>	

			@error('correo')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="email" class="form-label">Correo</label>
				<input name="correo" type="email" class="form-control" placeholder="Ingresa tu Correo" id="inputEmail4" value="{{ $usuario->correo }}">
			</div>

			@error('direccion')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror			
			<div class="col-md-6">
				<label for="direccion" class="form-label">Direccion</label>
				<input name="direccion" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ $usuario->direccion }}">
			</div>	

			@error('telefono')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror		
			<div class="col-6">
				<label for="telefono" class="form-label">Telefono</label>
				<input name="telefono" type="number" class="form-control" id="inputNumber" placeholder="Telefono" value="{{ $usuario->telefono }}">
			</div>	

			@error('id_sexo')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror					
			<div class="col-md-6">
				<label for="genero" class="form-label">Genero</label>
				<select name="id_sexo" id="inputState" class="form-select">
					<option selected>Selecciona</option>
					@foreach($sexos as $sexo)
					@if($sexo->id == $usuario->id_sexo)
					<option value="{{ $sexo -> id }}" selected="true">{{ $sexo -> sexo }}</option>
					@else
					<option value="{{ $sexo -> id }}">{{ $sexo -> sexo }}</option>
					@endif
					@endforeach										
				</select>				
			</div>
			<div class="col-mb-6" style="margin: 10px;">
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>			
		</form>
	</div>
	<div class="col-3"></div>
</div>
@yield('content')
@endsection