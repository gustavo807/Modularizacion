@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Fondo @endsection
@section('contentheader_description') Add @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Fondos</div>

						<div class="panel-body">
								@include('alerts.errors')
								{!!Form::open(['route'=>'asesorfondo.store', 'method'=>'POST'])!!}
									<div class="form-group">
										{!!Form::label('fondo','Nombre:')!!}
										{!!Form::text('fondo',null,['class'=>'form-control','placeholder'=>'Nombre del Fondo'])!!}
										{!!Form::label('descripcion','Descripción:')!!}
										{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción del Fondo'])!!}
									</div>
									{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
