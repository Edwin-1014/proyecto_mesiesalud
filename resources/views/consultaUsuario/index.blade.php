@extends('app')
@section('content')

<div class="container-fluid">
	<div class="border border-info mt-3 d-flex justify-content-center">
		<h3 class="fst-italic">Consulta Usuarios</h3>
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
				<form action="{{ route('consultaUsuario.index') }}" method="get">
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
					<th>ID</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Fecha Nacimiento</th>
					<th>RH</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Direccion</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Sexo</th>

				</thead>
				<tbody>
					@if(count($usuarios)<=0)
					<tr>
						<td colspan="11">No hay resultados<td>
						</tr>
						@else					
						@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->id }}</td>
							<td>{{ $usuario->nombres }}</td>
							<td>{{ $usuario->apellidos }}</td>
							<td>{{ $usuario->fechanacimiento }}</td>
							<td>{{ $usuario->rh }}</td>
							<td>{{ $usuario->telefono }}</td>
							<td>{{ $usuario->correo }}</td>
							<td>{{ $usuario->direccion }}</td>
							<td>{{ $usuario->tipo_documento }}</td>
							<td>{{ $usuario->numero_documento }}</td>
							<td>{{ $usuario->sexo}}</td>
							<td>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal{{ $usuario->id }}">
									Eliminar
								</button>

								<!-- Modal -->
								<div class="modal fade" id="Modal{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Usuario</h1>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												¿Estas seguro de eliminar el usuario {{ $usuario->nombres }} {{ $usuario->apellidos }}?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
												<form action="{{ route('consultaUsuario.destroy',['consultaUsuario' => $usuario->id]) }}" method="post">
													@method('DELETE')
													@csrf										
													<button type="submit" class="btn btn-primary">Eliminar</button>
												</form>												
											</div>
										</div>
									</div>
								</div>

								<a type="button" class="btn btn-primary"href="{{ route('consultaUsuario.show',['consultaUsuario' => $usuario->id]) }}" >Actualizar</a>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>								
				</table>
				<div class="d-flex justify-content-center">
					{{$usuarios->links()}}
				</div>
			</div>
		</div>
	</div>
	<!-- Intento fallido -->
<!--@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
	$('#usuarios').DataTable();
</script>
@endsection
-->

@endsection