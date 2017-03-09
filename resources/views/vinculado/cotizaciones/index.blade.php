@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Cotizaciones @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Cotizaciones</div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/cotizaciones/create" class="float"><i class="fa fa-plus my-float"></i></a>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Tipo de cambio</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody>
								@foreach($partidas as $partida)
									<tr>
										<td>{{ $partida->descripcion }}</td>
										<td>{{ $partida->precio }}</td>
										<td>{{ $partida->cambio }}</td>
										<td><a href="/cotizaciones/{{ $partida->id }}/edit" class="ion-edit icon-big"></a></td>
									</tr>
								@endforeach
							</tbody>								
				    	</table>
				    	{{ $partidas->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection