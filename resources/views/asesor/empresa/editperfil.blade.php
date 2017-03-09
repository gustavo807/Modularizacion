@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Perfil</div>

				<div class="panel-body">
					@include('alerts.errors')
					@if($tipo == 'password')
						<div class="bs-callout bs-callout-primary"> <h4>Instrucciones</h4> 
							<p>La contraseña se muestra encriptada! 
							   Escriba en texto simple para editarla</p> 
						</div>
					@endif
					
						{!! Form::model($empresa, ['url' => ['/asesorempresa/updateperfil',$empresa], 'method' => 'PUT','files' => true]) !!}
							<div class="form-group">
							{!!Form::label($tipo,$tipo.':')!!}
							@if($tipo == 'foto')
								<br>
								<img src="/documentos/{{ $empresa->foto }}" alt="Logo de la empresa">
								<br>
								{!!Form::file('foto')!!}
								<br>
							@elseif($tipo == 'estado')
								{!!Form::select($tipo,$estados,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}
							@else
							{!!Form::text($tipo,null,['class'=>'form-control','placeholder'=>'Ingresa el valor'])!!}
							@endif

							{!!Form::text('tipo',$tipo,['class'=>'form-control','style'=>'display:none;'])!!}
							</div>
						{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						{!!Form::close()!!}
						
						
				</div>

			</div>
		</div>
	</div>
</div>
@endsection