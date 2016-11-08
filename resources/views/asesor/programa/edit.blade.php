@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Programas</div>

					@include('alerts.errors')

					{!! Form::model($programa, ['route' => ['asesorprograma.update',$programa->id], 'method' => 'PUT']) !!}
		
						{!! Form::label('name','Nombre:') !!}
						{!! Form::text('programa',null,['class' => 'form-control']) !!}

						{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@endsection