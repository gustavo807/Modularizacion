@if(Auth::user()->rol_id == 1)
	@php
    	$var='empresa';
	@endphp
@elseif(Auth::user()->rol_id == 2)
	@php
    	$var='vinculado';
	@endphp
@else
	@php
    	$var='asesor';
	@endphp
@endif

@extends($var.'.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Perfil @endsection
@section('contentheader_description')  @endsection

@section('main-content')

	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Proporcione una nuevo nombre y/o contraseña</div>
						<div class="panel-body">							
							@include('alerts.errors')
							@include('alerts.success')
							{!!Form::open(['route'=>'perfil.store', 'method'=>'POST'])!!}
								{{ csrf_field() }}
								<div class="form-group">
								  {!!Form::label('nombre','Nombre:')!!}
								  {!!Form::text('nombre',Auth::user()->nombre,['class'=>'form-control','placeholder'=>''])!!}
								  {!!Form::label('password','Password:')!!}
								  {!!Form::password('password',['class'=>'form-control','placeholder'=>''])!!}
								  {!!Form::label('pass','Vuelve a escribir el password:')!!}
								  {!!Form::password('pass',['class'=>'form-control','placeholder'=>''])!!}								  
								</div>
								{!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}
							{!!Form::close()!!}

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection