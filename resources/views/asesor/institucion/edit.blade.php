@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Instituciones</div>

					@include('alerts.errors')


					{!! Form::model($institucion, ['route' => ['asesorinstitucion.update',$institucion], 'method' => 'PUT']) !!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre:')!!}
							{!!Form::text('institucion',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
							{!!Form::select('programa_id',$programa,null,['class'=>'form-control'])!!}
						</div>
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
					

				</div>
			</div>
		</div>
	</div>
@endsection