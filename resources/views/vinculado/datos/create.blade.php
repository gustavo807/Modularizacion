@extends('vinculado.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Crear Informacion General</div>

					@include('alerts.errors')

					{!!Form::open(['route'=>'datosvinculado.store', 'method'=>'POST'])!!}
						@include('vinculado.datos.form')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}


					<div class="3"></div>

				</div>
			</div>
		</div>
	</div>



@endsection
