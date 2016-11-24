@extends('empresa.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Imagenes Generales</div>
					@include('alerts.success')
					<div class="panel-body">
						<h1>Imagenes </h1>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
