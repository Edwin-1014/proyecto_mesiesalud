@extends('app')

@section('content')
<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">			
		<form action="{{ route('registroTipoAfiliacion.store') }}" method="post" class="row g-3">

			@csrf	
			@if(session('success'))
			<h5 class="alert alert-success">{{ session('success') }}</h5>	
			@endif

			@error('tipo_afiliacion')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row g-3">
				<div class="col-md-6">
					<label for="tipo_afiliacion" class="form-label">Tipo de Afiliacion</label>
					<input name="tipo_afiliacion" type="text" class="form-control" placeholder="Ingresa El Tipo" aria-label="nombre">
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
