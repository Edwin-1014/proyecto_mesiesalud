@extends('app')
@section('content')

<div class="container-fluid">
	<div class="border border-info mt-3 d-flex justify-content-center">
		<h3 class="fst-italic">Consulta Pacientes</h3>
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
			<form action="{{ route('consultaPaciente.index') }}" method="get">
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
				<th>Sexo</th>
				<th>Tipo Afiliacion</th>
				
			</thead>
			<tbody>
				@if(count($pacientes)<=0)
				<tr>
					<td colspan="11">No hay resultados<td>
					</tr>
					@else					
					@foreach($pacientes as $paciente)
					<tr>
						<td>{{ $paciente->nombres }}</td>
						<td>{{ $paciente->apellidos }}</td>
						<td>{{ $paciente->fechanacimiento }}</td>
						<td>{{ $paciente->rh }}</td>
						<td>{{ $paciente->telefono }}</td>
						<td>{{ $paciente->correo }}</td>
						<td>{{ $paciente->direccion }}</td>
						<td>{{ $paciente->tipo_documento }}</td>
						<td> <a href="{{ route('consultaUsuario.show' ,['consultaUsuario' => $paciente->paciente_id]) }}">{{ $paciente->numero_documento }}</a></td>						
						<td>{{ $paciente->pacienteEstado }}</td>
						<td>{{ $paciente->pacienteFechaAfiliacion }}</td>
						<td>{{ $paciente->sexo }}</td>
						<td>{{ $paciente->tipo_afiliacion }}</td>						
						
						
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{ $paciente->paciente_id }}">
								Eliminar
							</button>

							<!-- Modal -->
							<div class="modal fade" id="Modal{{ $paciente->paciente_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Paciente</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											¿Estas seguro de eliminar el Paciente {{ $paciente->nombres }} {{ $paciente->apellidos }}?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
											<form action="{{ route('consultaPaciente.destroy',['consultaPaciente' => $paciente->paciente_id]) }}" method="post">
											@method('DELETE')
											@csrf										
											<button type="submit" class="btn btn-primary">Eliminar</button>
										</form>											
										</div>
									</div>
								</div>
							</div>

							<a type="button" class="btn btn-primary"href="{{ route('consultaPaciente.show',['consultaPaciente' => $paciente->paciente_id]) }}">Editar</a>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>								
			</table>
			<div class="d-flex justify-content-center">
				{{$pacientes->links()}}
			</div>
		</div>
	</div>
</div>

@endsection