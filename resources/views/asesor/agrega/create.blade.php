@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Asesor @endsection
@section('contentheader_description') Add @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Agrega Asesor</div>

						<div class="panel-body">
								@include('alerts.errors')

								{!!Form::open(['route'=>'asesoradd.store', 'method'=>'POST'])!!}
									@include('asesor.agrega.form')
								{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
