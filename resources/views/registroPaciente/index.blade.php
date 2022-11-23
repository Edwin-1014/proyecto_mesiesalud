@extends('app')

@section('content')
<!--<meta name="csrf-token" content="{{ csrf_token() }}">-->
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">
		<div class="row">
			<form action="{{ route('registroPaciente.index') }}" class="form form-horizontal" method="get">
				@csrf	
				@if(session('success'))
				<h5 class="alert alert-success">{{ session('success') }}</h5>	
				@endif

				<div class="col" style="text-center";>
					<h3>Registro de Pacientes</h3>
				</div>

				<!-- Input para el buscador -->
				@error('documento')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="row">
					<div class="col-md-8">
						<input type="number" name="documento" class="form-control" placeholder="Documento">					
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary" value="Buscar">Buscar</button>
					</div>	
				</div>			
			</form>

			<form action="{{ route('registroPaciente.store') }}" method="post">
				@csrf
				<!-- Buscador, Cajas de texto para llamar Usuarios -->
				<div class="row">
					@if(isset($usuarios))
					@foreach($usuarios as $usuario)
					@error('nombres')
					<h5 class="alert alert-danger">{{ $message }}</h5>
					@enderror
					<div class="col-md-8">
						<label for="nombres" class="form-label">Nombre del Medico</label>
					</div>
					
					<div class="col-md-8">						
						<input class="form-control" type="text" disabled="true" name="nombres" value="{{ $usuario->nombres.' '.$usuario->apellidos }}" placeholder="Selecciona">						  
					</div>					
					<div class="col-md-4">						
						<input type="hidden" name="id_usuario" value="{{ $usuario->idUsuario }}">
					</div>
					@endforeach
					@endif
					
				

				<!-- Fin del Buscador, Cajas de texto para llamar Usuarios -->

				<!-- Registro de fechas -->

				@error('pacienteFechaAfiliacion')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="pacienteFechaAfiliacion" class="form-label">Fecha de Afiliacion</label>
					<input class="form-control" type="date" name="pacienteFechaAfiliacion">	     
				</div>

				
				@error('id_tipo_afiliacion')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="id_tipo_afiliacion" class="form-label">Tipo de Afiliacion</label>
					<select name="id_tipo_afiliacion" id="inputState" class="form-select">
						<option selected>Selecciona</option>
						
						@if(isset($tipoafiliacion))
						@foreach($tipoafiliacion as $tipo)
						<option value="{{ $tipo -> id }}">{{ $tipo -> tipo_afiliacion }} </option>
						@endforeach
						@endif
					</select>
				</div>
			
				<!-- Button Radios del Campo Enum -->

				<div class="col-6">
					<label for="nombres" class="form-label">Selecciona el Estado del Medico</label>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="pacienteEstado" id="flexRadioDefault1" value="Activo">
						<label class="form-check-label" for="flexRadioDefault1">
							Activo
						</label>
					</div>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="pacienteEstado" id="flexRadioDefault2" value="Inactivo">
						<label class="form-check-label" for="flexRadioDefault2">
							Inactivo
						</label>
					</div>
				</div>
				<div class="col-mb-6" style="margin-top: 10px;">
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
				</div>			
			</form>
		</div>
	</div>
	<div class="col-3"></div>
</div>
@yield('content')
@endsection