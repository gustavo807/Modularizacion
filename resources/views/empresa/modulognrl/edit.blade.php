@extends('empresa.cuerpo')
@section('htmlheader_title')	Home @endsection
@section('contentheader_title') Claves @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Módulos Generales</div>

							<div class="panel-body">
									@include('alerts.errors')
									@include('alerts.validar')
									@if (isset($modulo->descripcion))
										<div class="bs-callout bs-callout-primary"> <h4>Instrucciones</h4> 
											<p>{{$modulo->descripcion}}</p> 
										</div>										
									@endif
								
							    {!!Form::open(['route'=>'empresamodulognrl.store', 'method'=>'POST', 'class'=>'formulario'])!!}
							        <div class="form-group">
							          @foreach ($claves as $clave )
							            {!!Form::label('nombre',$clave->nombre)!!}
							            {!!Form::textarea('valor[]',$clave->valor,['class'=>'form-control txtvalor', 'rows'=>'1', 'placeholder'=>$clave->ejemplo])!!}
							            {!!Form::text('clave_id[]',$clave->id,['class'=>'form-control','style'=>'display:none'])!!}
							          @endforeach
							        </div>
									{!!Form::submit('Registrar',['class'=>'btn btn-primary btnenviar'])!!}
										<button type="button" name="button" class="btn btn-danger" onclick="window.location.href='/empresamodulognrl'">Regresar</button>
									{!!Form::close()!!}
							</div>

				</div>
			</div>
		</div>
	</div>
@endsection
