@extends('app')
@section('content')

<div class="container-fluid">
	<div class="border border-info mt-3 d-flex justify-content-center">
		<h3 class="fst-italic">Consulta Medicos</h3>
	</div>
</div>
<div class="container-fluid">
	<div class="d-flex justify-content-center">
		@if(session('success'))
		<h5 class="alert alert-success">{{ session('success') }}</h5>	
		@endif
	</div>
</div>
<div class="container-fluid" style="margin-top:20px">
<div class="card">
	<div class="card-body">
		<div class="d-flex justify-content-center" style="margin-top:20px;">
			<form action="{{ route('consultaMedico.index') }}" method="get">
				<div class="row">
					<div class="col-sm-10">
						<input type="text" class="form-control" name="texto" value="{{ $texto }}">
					</div>
					<div class="col-2"> 
						<input type="submit" class="btn btn-primary" name="" value="Buscar">
					</div>
				</div>
			</form>
		</div>
		<table class="table table-striped mt-3" id="usuarios">
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha Nacimiento</th>
				<th>RH</th>
				<th>Telefono</th>
				<th>Correo</th>
				<th>Direccion</th>
				<th>Tipo Documento</th>
				<th>Numero Documento</th>
				<th>Estado</th>
				<th>Fecha Afiliacion</th>
				<th>Fecha Retiro</th>
				<th>Sexo</th>
				
				
			</thead>
			<tbody>
				@if(count($medicos)<=0)
				<tr>
					<td colspan="11">No hay resultados<td>
					</tr>
					@else					
					@foreach($medicos as $medico)
					<tr>
						<td>{{ $medico->nombres }}</td>
						<td>{{ $medico->apellidos }}</td>
						<td>{{ $medico->fechanacimiento }}</td>
						<td>{{ $medico->rh }}</td>
						<td>{{ $medico->telefono }}</td>
						<td>{{ $medico->correo }}</td>
						<td>{{ $medico->direccion }}</td>
						<td>{{ $medico->tipo_documento }}</td>
						<td><a href="{{ route('consultaUsuario.show' ,['consultaUsuario' => $medico->medico_id]) }}">{{ $medico->numero_documento }}</a></td>						
						<td>{{ $medico->medicoestado }}</td>
						<td>{{ $medico->medicoFechaAfiliacion }}</td>
						<td>{{ $medico->medicoFechaRetiro }}</td>
						<td>{{ $medico->sexo }}</td>											
						
						
						<td>
							 {{-- Button trigger modal  --}}
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{ $medico->medico_id }}">
								Eliminar
							</button>

							{{-- Modal  --}}
							<div class="modal fade" id="Modal{{ $medico->medico_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Paciente</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											¿Estas seguro de eliminar el Paciente {{ $medico->nombres }} {{ $medico->apellidos }}?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
											<form action="{{ route('consultaMedico.destroy',['consultaMedico' => $medico->medico_id]) }}" method="post">
											@method('DELETE')
											@csrf										
											<button type="submit" class="btn btn-primary">Eliminar</button>
										</form>											
										</div>
									</div>
								</div>
							</div>

							<a type="button" class="btn btn-primary"href="{{ route('consultaMedico.show',['consultaMedico' => $medico->medico_id]) }}">Editar</a>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>								
			</table>
			<div class="d-flex justify-content-center">
				{{$medicos->links()}}
			</div>
		</div>
	</div>
</div>

@endsection