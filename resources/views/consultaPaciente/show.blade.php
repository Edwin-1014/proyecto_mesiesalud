@extends('app')

@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">
		<div class="row">

			<div class="col-md-8">
				<h3>Actualizar Paciente</h3>
			</div>

			<div class="col-md-8">						
				<input class="form-control" type="text" disabled="true" name="nombres" value="{{ $usuario->nombres.' '.$usuario->apellidos }}" placeholder="Selecciona">						  
			</div>

			<form action="{{ route('consultaPaciente.update', ['consultaPaciente' => $pacientes->id]) }}" method="post">
				@csrf
				@method('PATCH')
				

				<!-- Registro de fechas -->

				@error('pacienteFechaAfiliacion')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror

				<div class="col-md-6">
					<label for="pacienteFechaAfiliacion" class="form-label">Fecha de Afiliacion</label>
					<input class="form-control" type="date" name="pacienteFechaAfiliacion" value="{{$pacientes->pacienteFechaAfiliacion}}">	     
				</div>

				
				@error('id_tipo_afiliacion')
				<h5 class="alert alert-danger">{{ $message }}</h5>
				@enderror

				<div class="col-md-6">
					<label for="id_tipo_afiliacion" class="form-label">Tipo de Afiliacion</label>
					<select name="id_tipo_afiliacion" id="inputState" class="form-select">
						<option selected>Selecciona</option>
						@foreach($tipos as $item)
						<option value="{{ $item->id }}" {{ ($item->id == $tipo->id)? 'selected' : '' }}>{{ $item->tipo_afiliacion }}</option>
						@endforeach
					</select>
				</div>
			
				<!-- Button Radios del Campo Enum -->

				<div class="col-6">
					<label for="nombres" class="form-label">Selecciona el Estado del Paciente</label>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="pacienteEstado" id="flexRadioDefault1" {{  ($pacientes->pacienteEstado == 'Activo') ? 'checked':''  }} value="Activo">
						<label class="form-check-label" for="flexRadioDefault1">
							Activo
						</label>
					</div>
					<div class="form-check">						
						<input class="form-check-input" type="radio" name="pacienteEstado" id="flexRadioDefault2" {{  ($pacientes->pacienteEstado == 'Inactivo') ? 'checked':''  }} value="Inactivo">
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
@endsection