@extends('app')

@section('content')
<form>
    <div class="container  mt-4 border-3 p-4">
        <div class="row ">
            <div class="col-md-4" >
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/Medico.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Medico</h4>
                        <a href="{{ route('consultaMedico.index') }}" class="btn btn-primary" style="margin-bottom: 10px;">Consultar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/Usuaro.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Usuarios</h4>
                        <a href="{{ route('consultaUsuario.index') }}" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/Paciente.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Paciente</h4>
                        <a href="{{ route('consultaPaciente.index') }}" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top:10px;">
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/especialistas.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Especialidad</h4>
                        <a href="#" style="margin-bottom:10px;" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="margin-top:10px;">
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/902044.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Tipo de Afiliacion</h4>
                        <a href="#" style="margin-bottom:10px;" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 250px;">
                    <img src="img/Identificacion.png" class="card-img-top" alt="Card image"/>
                    <div class="card-body">
                        <h4 class="card-title">Tipo Documento</h4>
                        <a href="#" style="margin-bottom:10px;" class="btn btn-primary">Consultar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

@endsection