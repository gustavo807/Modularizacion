@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Parrafos</div>

					@include('alerts.errors')


					{!!Form::open(['route'=>'asesorparrafo.store', 'method'=>'POST'])!!}

            @include('asesor.parrafo.form')

					{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
					{!!Form::close()!!}


				</div>
			</div>
		</div>
	</div>
@endsection
