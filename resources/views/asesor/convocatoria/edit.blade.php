@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Convocatoria @endsection
@section('contentheader_description') Edit @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Convocatorias</div>

						<div class="panel-body">
								@include('alerts.errors')
								{!! Form::model($convocatoria, ['route' => ['asesorconvocatoria.update',$convocatoria], 'method' => 'PUT']) !!}
									<div class="form-group">
										{!!Form::label('nombre','Nombre:')!!}
										{!!Form::text('convocatoria',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
										{!!Form::label('descripcion','Descripción:')!!}
										{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la descripcion','rows'=>'4'])!!}
										{!!Form::label('fondos_id','Institucion:')!!}
										{!!Form::select('fondos_id',$fondos,null,['class'=>'form-control'])!!}
									</div>
									{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
