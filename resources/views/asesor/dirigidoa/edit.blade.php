@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title')  @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dirigido A </div>

					<div class="panel-body">
						@include('alerts.errors')
						
						{!! Form::model($dato, ['route' => ['dirigidoa.update',$dato], 'method' => 'PUT']) !!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre:')!!}
							{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
						</div>
						{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection