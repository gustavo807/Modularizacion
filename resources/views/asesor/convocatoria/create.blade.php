@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Convocatorias</div>

<div class="panel-body">
					@include('alerts.errors')

					{!!Form::open(['route'=>'asesorconvocatoria.store', 'method'=>'POST'])!!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre:')!!}
							{!!Form::text('convocatoria',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
							{!!Form::label('descripcion','Descripcion:')!!}
							{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la descripcion'])!!}
							{!!Form::label('nombre','Institucion:')!!}
							{!!Form::select('institucion_id',$instituciones,null,['class'=>'form-control'])!!}
						</div>
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
</div>

				</div>
			</div>
		</div>
	</div>
@endsection
