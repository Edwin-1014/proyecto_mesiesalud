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

			
			<select class="selectpicker" data-show-subtext="true" data-live-search="true">
				<option value='' selected="true">Seleccionar una marca</option>
				<option value='audi'>Audi</option>
				<option value='bmw'>BMW</option>
				<option value='citroen'>Citroen</option>
				<option value='fiat'>Fiat</option>
				<option value='ford'>Ford</option>
				<option value='honda'>Honda</option>
				<option value='hyundai'>Hyundai</option>
				<option value='kia'>Kia</option>
				<option value='mazda'>Mazda</option>
			</select>	

			@error('nombres')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row g-3">
				<div class="col-md-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input name="nombres" type="text" class="form-control" placeholder="Ingresa tu nombre" aria-label="nombre">
				</div>				
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