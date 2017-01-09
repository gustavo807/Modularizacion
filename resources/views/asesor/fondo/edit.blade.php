@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Fondo @endsection
@section('contentheader_description') Edit @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Fondos</div>

							<div class="panel-body">
									@include('alerts.errors')
									{!! Form::model($fondo, ['route' => ['asesorfondo.update',$fondo], 'method' => 'PUT']) !!}
										<div class="form-group">
											{!!Form::label('fondo','Fondo:')!!}
											{!!Form::text('fondo',null,['class'=>'form-control','placeholder'=>'Nombre del fondo'])!!}
											{!!Form::label('descripcion','Descripción:')!!}
											{!!Form::textarea('descripcion', null,['class'=>'form-control','placeholder'=>'Descripción del fondo'])!!}
										</div>
										{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
									{!!Form::close()!!}
							</div>

				</div>
			</div>
		</div>
	</div>
@endsection
