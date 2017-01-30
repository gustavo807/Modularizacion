@extends('asesor.cuerpo')
@section('htmlheader_title')
{{ $empresa->nombre }}
@endsection
@section('main-content')

<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"> {{ $empresa->nombre }} </div>

				<div class="panel-body">
					@include('alerts.success')

					<table class="table table-hover">
						<thead>
							<th>Nombre</th>
							<th>Identificador</th>
							<th>Valor</th>
						</thead>

						@foreach($claves as $clave)
						<tbody>
							<td>{{$clave->nombre}}</td>
							<td>{{$clave->identificador}}</td>
							<td>{{$clave->valor}}</td>
						</tbody>
						@endforeach
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
