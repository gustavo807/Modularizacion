@extends('vinculado.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Informacion General</div>

					@include('alerts.errors')
					
					{!!Form::model($vinculado,['route'=> ['datosvinculado.update',$vinculado->id], 'method'=>'PUT'])!!}
						@include('vinculado.datos.form')
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
					

				</div>
			</div>
		</div>
	</div>

	
	
@endsection