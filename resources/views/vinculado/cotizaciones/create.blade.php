@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Cotizaciones @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Cotizaciones</div>

					<div class="panel-body">
						@include('alerts.errors')
						{!!Form::open(['route'=>'cotizaciones.store', 'method'=>'POST'])!!}
				      		@include('vinculado.cotizaciones.form')
							{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection