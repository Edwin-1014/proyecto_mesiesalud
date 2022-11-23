@extends('app')

@section('content')



<div class="row">
	<div class="col-3"></div>
	<div class="col-6 border border-success p-2 mb-2 border-opacity-25" style="margin: 5px;">			
		<form action="{{ route('registroFarmacos.store') }}" method="post" class="row g-3">
			<div class="border border-info mt-3 d-flex justify-content-center">
				<h3 class="fst-italic">Farmacos</h3>
			</div>
			@csrf	
			@if(session('success'))
			<h5 class="alert alert-success">{{ session('success') }}</h5>	
			@endif

			@error('codigo')
			<h5 class="alert alert-danger">{{ $message }}</h5>
			@enderror
			<div class="row md-3 mt-3 justify-content-center">
				<div class="col-md-6 ">
					<label for="codigo" class="form-label">Codigo</label>
					<input name="codigo" type="number" class="form-control" placeholder="Ingresa El Codigo" aria-label="nombre">
				</div>
			</div>

			<div class="row md-3 mt-3 justify-content-center">
				<div class="col-md-6">
					<label for="nombre_medicamento" class="form-label">Nombre del Medicamento</label>
					<input name="nombre_medicamento" type="text" class="form-control" placeholder="Ingresa El Nombre del Farmaco" aria-label="nombre">
				</div>
			</div>
			<div class="row md-3 mt-3 justify-content-center">
				<div class="col-mb-6" style="position: right: 50px;">
				<button type="submit" class="btn btn-primary">Registrar</button>
			</div>	
			</div>				
						
		</form>
	</div>
	<div class="col-3"></div>
</div>
@yield('content')
@endsection
