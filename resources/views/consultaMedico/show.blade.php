@extends('app')
@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">
		<div class="row">

			<div class="col-md-8">						
				<input class="form-control" type="text" disabled="true" name="nombres" value="{{ $usuario->nombres.' '.$usuario->apellidos }}" placeholder="Selecciona">
			
			<form action="{{ route('consultaMedico.update', ['consultaMedico' => $medicos->id]) }}" method="post">
				@csrf
				@method('PATCH')			


				<!-- Registro de fechas -->
				@error('medicoFechaAfiliacion')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="medicoFechaAfiliacion" class="form-label">Fecha de Afiliacion</label>
					<input class="form-control" type="date" name="medicoFechaAfiliacion" value="{{ $medicos->medicoFechaAfiliacion }}">	     
				</div>

				@error('medicoFechaRetiro')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror
				<div class="col-md-6">
					<label for="medicoFechaRetiro" class="form-label">Fecha de Retiro</label>
					<input class="form-control" type="date" name="medicoFechaRetiro" value="{{ $medicos->medicoFechaRetiro }}" placeholder="Selecciona">	
				</div>

				<!-- Button Radios del Campo Enum -->

				<div class="col-6">
					<label for="nombres" class="form-label">Selecciona el Estado del Medico</label>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="medicoEstado" id="flexRadioDefault1" {{  ($medicos->medicoEstado == 'Activo') ? 'checked':''  }} value="Activo">
						<label class="form-check-label" for="flexRadioDefault1">
							Activo
						</label>
					</div>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="medicoEstado" id="flexRadioDefault2" {{  ($medicos->medicoEstado == 'Inactivo') ? 'checked':''  }} value="Inactivo">
						<label class="form-check-label" for="flexRadioDefault2">
							Inactivo
						</label>
					</div>
				</div>
				<div class="col-mb-6" style="margin-top: 10px;">
					<button type="submit" class="btn btn-primary">Actualizar</button>
				</div>
				</div>			
			</form>
		</div>
	</div>
	<div class="col-3"></div>
</div>
@yield('content')
@endsection