@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Investigadores @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Investigadores</div>

					<div class="panel-body">
						@include('alerts.errors')
						{!! Form::model($r, ['route' => ['investigadores.update',$r->id], 'method' => 'PUT']) !!}
				      		@include('asesor.researchers.form')
							{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection