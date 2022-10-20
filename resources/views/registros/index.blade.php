@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="max-width:319px;">
				<img src="img/Medico.png" class="card-img-top" alt="Card image"/>
				<div class="card-block">
					<h4 class="card-title">Medico</h4>
					<a href="/registroMedico" class="btn btn-primary" style="margin-bottom: 10px;">Registrar</a>
				</div>
			</div>
			<div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="max-width:319px;">
				<img src="img/Usuaro.png" class="card-img-top" alt="Card image"/>
				<div class="card-block">
					<h4 class="card-title">Usuarios</h4>
					<a href="/registroUsuario" class="btn btn-primary">Registrar</a>
				</div>
			</div>
			<div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 .img-fluid" style="max-width:319px;">
				<img src="img/Paciente.png" class="card-img-top" alt="Card image"/>
				<div class="card-block">
					<h4 class="card-title">Paciente</h4>
					<a href="/registroPaciente" class="btn btn-primary">Registrar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@yield('content')
@endsection