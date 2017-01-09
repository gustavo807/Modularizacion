@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Cuestionario de evaluación de riesgo</div>

				<div class="panel-body">
					@include('alerts.errors')
					
					{!! Form::model($valor, ['route' => ['empresaproyecto.update',$proyecto->id], 'method' => 'PUT']) !!}					
					<div class="form-group">						
						{!!Form::label($pregunta->pregunta,$pregunta->pregunta.":")!!}
						{!!Form::select('evariable_id',$opcion,null,['class'=>'form-control','placeholder' => 'Seleccione una opcion...'])!!}
						{!!Form::text('pregunta_id',$pregunta->id,['style'=>'display:none;'])!!}

					</div>
					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
