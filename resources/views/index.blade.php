@extends('app')
@section('content')
<main>
	<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/1.png" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/2.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
				<img src="img/3.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>


	<div class="row justify-content-center mt-3" style="background-color: #5800FF;">
		<div class="col-sm-3"></div>

		<div class="col-sm-6" style="padding-bottom: 10px; padding-top: 10px;">
			<h1 style="color: white; font-weight: bold;">Prestación de servicio</h1>
		</div>
		<div class="col-sm-3"></div>

	</div>
</div>
</main>
<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="padding-top: 10px; padding-bottom: 10px;">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title" style="text-align: center;">Envía tus sugerencias</h4>
				<h6 class="card-subtitle mb-2 text-muted">Ingresa tus datos personales</h6>
				<div class="mb-3">
					<label for="exampleFormControlInput1" class="form-label">Dirección de Correo</label>
					<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
				</div>
				<div class="mb-3">
					<label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<a href="#" class="card-link">Acerca de</a>
				<a href="#" class="card-link">Politicas de privacidad</a>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-sm-3"></div>
<div class="container-fluid" style="background-color: #0096FF; color: white; padding-top: 10px; padding-bottom: 10px;">
	<div class="row">
		<div class="col-3">
			<h5>Legales</h5>
			<p>
				Portabilidad
				Protección de datos personales
				Nuestros tiempos de espera en citas
				Cuotas moderadoras, copagos y UPC 2022
				Informe de Gestión
				Donación de órganos y tejidos
				¿Conoces posibles actos de corrupción?
				SARLAFT
				Código de conducta y de buen gobierno
				Estados financieros
			</p>
		</div>

		<div class="col-3">

		</div>

		<div class="col-3">
			<h5>Normatividad</h5>
			<span>
				Decreto 780 de 2016
				Circular 008 de 2018
				Circular 000016 de 2016
				Circular 000011 de 2020
			</span>
		</div>
		<div class="col-3"></div>
	</div>
</div>
<footer>
  <div style="font-size: small; text-align: right; padding: 12px;" class="con-animate">
    <div class="animate1">
      <p style="margin: auto; font-size: large;">© Copyright 2022 - Todos los derechos reservados - Desarrollado por MesieSalud
      </p>
    </div>
  </footer>
@endsection