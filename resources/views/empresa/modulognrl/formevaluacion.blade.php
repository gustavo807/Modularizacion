@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ Auth::user()->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Cuestionario de evaluación de competitividad</div>

				<div class="panel-body">
					@include('alerts.errors')
					{!!Form::open(['url'=>'/empresamodulognrl/storeevaluacion/', 'method'=>'POST'])!!}					
					<div class="form-group">
						@php
						$var1="";
						$var2="";
						if (isset($valor->valor)) {
							if ($valor->valor == '1') {
								$var1=true;
								$var2='';
							}elseif ($valor->valor == '0') {
								$var1='';
								$var2=true;
							}
						}
						@endphp
						{!!Form::label($pregunta->pregunta,$pregunta->pregunta)!!}
						<div class="radio">
							<label>
								{!! Form::radio('valor', '1',$var1)!!}
								SI
							</label>
						</div>
						<div>
							<label>
								{!! Form::radio('valor', '0',$var2)!!}
								No
							</label>
						</div>
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
