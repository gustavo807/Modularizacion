@extends('asesor.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Institución @endsection
@section('contentheader_description') Add @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Instituciones</div>

<div class="panel-body">
					@include('alerts.errors')

					{!!Form::open(['route'=>'asesorinstitucion.store', 'method'=>'POST'])!!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre:')!!}
							{!!Form::text('institucion',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
							{!!Form::label('nombre','Programa:')!!}
							{!!Form::select('programa_id',$programas,null,['class'=>'form-control'])!!}
						</div>
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
</div>

				</div>
			</div>
		</div>
	</div>
@endsection
