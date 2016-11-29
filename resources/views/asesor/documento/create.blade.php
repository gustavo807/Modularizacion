@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Documentos</div>

<div class="panel-body">
					@include('alerts.errors')

					{!!Form::open(['route'=>'asesordocumentos.store', 'method'=>'POST'])!!}
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
