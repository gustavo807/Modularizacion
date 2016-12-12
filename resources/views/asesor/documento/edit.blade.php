@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Documento @endsection
@section('contentheader_description') Edit @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Documentos</div>

						<div class="panel-body">
								@include('alerts.errors')
								{!! Form::model($documento, ['route' => ['asesordocumentos.update',$documento], 'method' => 'PUT']) !!}
									<div class="form-group">
										@include('asesor.documento.form')
									</div>
									{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
								{!!Form::close()!!}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
