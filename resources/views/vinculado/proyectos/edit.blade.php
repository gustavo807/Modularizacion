@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') {{ $p->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Agregar investigador</div>

					<div class="panel-body">
						@include('alerts.errors')
						{!! Form::model($p, ['route' => ['proyectos.update',$p->id], 'method' => 'PUT']) !!}
							<div class="form-group">  
				      		{!!Form::label('investigador','Investigador:')!!}
  							{!!Form::select('investigador',$investigadores,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}
							</div>
							{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection