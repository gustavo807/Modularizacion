@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Programa @endsection
@section('contentheader_description') Edit @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Programas</div>

							<div class="panel-body">
									@include('alerts.errors')
									{!! Form::model($programa, ['route' => ['asesorprograma.update',$programa], 'method' => 'PUT']) !!}
										{!! Form::label('programa','Nombre:') !!}
										{!! Form::text('programa',null,['class' => 'form-control']) !!}
										{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
									{!! Form::close() !!}
							</div>

				</div>
			</div>
		</div>
	</div>
@endsection
