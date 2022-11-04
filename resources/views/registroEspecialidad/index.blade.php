@extends('app')

@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">			
		<form action="{{ route('registroEspecialidad.store') }}" method="post" class="row g-3">
			@csrf	
			@if(session('success'))
			<h5 class="alert alert-success">{{ session('success') }}</h5>	
			@endif

			@error('nombre_especialidad')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row g-3">
				<div class="col-md-6">
					<label for="nombre_especialidad" class="form-label">Nombre Especialidad</label>
					<input name="nombre_especialidad" type="text" class="form-control" placeholder="Nueva Espacialidad Medica" aria-label="nombre">
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
