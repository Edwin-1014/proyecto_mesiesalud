@extends('app')

@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">			
		<form action="{{ route('registroUsuario.store') }}" method="post" class="row g-3">
			@csrf	
			@if(session('success'))
			<h5 class="alert alert-success">{{ session('success') }}</h5>	
			@endif

			@error('nombres')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row g-3">
				<div class="col-md-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input name="nombres" type="text" class="form-control" placeholder="Ingresa tu nombre" aria-label="nombre">
				</div>

				@error('apellidos')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="apellido" class="form-label">Apellido</label>
					<input name="apellidos" type="text" class="form-control" placeholder="Ingresa tu apellido" aria-label="apellido">
				</div>
			</div>	

			@error('fechanacimiento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="fecha" class="form-label">Fecha de Nacimiento</label>
				<input class="form-control" type="date" name="fechanacimiento" value="" placeholder="Selecciona">	
			</div>

			@error('rh')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="tiposangre" class="form-label">Tipo de Sangre</label>
				<select name="rh"id="inputState" class="form-select">
					<option selected>Selecciona </option>
					<option>A+</option>
					<option>A-</option>
					<option>B+</option>
					<option>B-</option>
					<option>AB+</option>
					<option>AB-</option>
					<option>O+</option>
					<option>O-</option>
				</select>
			</div>

			@error('id_tipodocumento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="tipodoc" class="form-label">Tipo de Documento</label>
				<select name="id_tipodocumento" id="inputState" class="form-select">
					<option selected>Selecciona</option>
					@foreach($tipodocumentos as $tipo)
					<option value="{{ $tipo -> id }}">{{ $tipo -> tipo_documento }} </option>
					@endforeach
				</select>
			</div>

			@error('numero_documento')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-6">
				<label for="numdoc" class="form-label">Numero de Documento</label>
				<input name="numero_documento" type="number" class="form-control" id="inputDocument" placeholder="Numero de Identificacion">
			</div>	

			@error('correo')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-md-6">
				<label for="email" class="form-label">Correo</label>
				<input name="correo" type="email" class="form-control" placeholder="Ingresa tu Correo" id="inputEmail4">
			</div>

			@error('direccion')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror			
			<div class="col-md-6">
				<label for="direccion" class="form-label">Direccion</label>
				<input name="direccion" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
			</div>	

			@error('telefono')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror		
			<div class="col-6">
				<label for="telefono" class="form-label">Telefono</label>
				<input name="telefono" type="number" class="form-control" id="inputNumber" placeholder="Telefono">
			</div>	

			@error('id_sexo')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror					
			<div class="col-md-6">
				<label for="genero" class="form-label">Genero</label>
				<select name="id_sexo" id="inputState" class="form-select">
					<option selected>Selecciona</option>
					@foreach($sexos as $sexo)
					<option value="{{ $sexo -> id }}">{{ $sexo -> sexos }}</option>
					@endforeach										
				</select>				
			</div>

			@error('condiciones')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="col-mb-6 form-check" style="margin-top:20px; margin: 10px;">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" names="condiciones" for="condiciones">Acepta Terminos y Condiciones</label>
			</div>
			<div class="col-mb-6" style="margin: 10px;">
				<button type="submit" class="btn btn-primary">Registrar</button>
			</div>			
		</form>
	</div>
	<div class="col-3"></div>
</div>
@yield('content')
@endsection