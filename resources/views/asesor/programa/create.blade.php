@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Programa @endsection
@section('contentheader_description') Add @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Programas</div>

						<div class="panel-body">
								@include('alerts.errors')
								{!!Form::open(['route'=>'asesorprograma.store', 'method'=>'POST'])!!}
									<div class="form-group">
										{!!Form::label('nombre','Nombre:')!!}
										{!!Form::text('programa',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
									</div>
									{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
