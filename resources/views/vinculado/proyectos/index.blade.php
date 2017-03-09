@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Proyectos @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Proyectos</div>

					<div class="panel-body">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Estado</th>
									<th>Ciudad</th>
									<th>Empresa</th>
									<th>Convocatoria</th>
									<th>Proyecto</th>
									<th>Fecha asignado</th>
									<th>Investigadores</th>
								</tr>
							</thead>
							<tbody>
								@foreach($proyectos as $proyecto)
									<tr>
										<td>{{ $proyecto->estado }}</td>
										<td>{{ $proyecto->ciudad }}</td>
										<td>{{ $proyecto->user }}</td>
										<td>{{ $proyecto->convocatoria }}</td>
										<th><a href="/proyectos/{{ $proyecto->id }}/clavesc" title="Ver información del proyecto">{{ $proyecto->nombre }}</a></th>
										<td>{{ $proyecto->created_at }}</td>
										<td>
											<a href="/proyectos/{{ $proyecto->id }}" class="ion-ios-people icon-big"
											title="Agregar investigadores al proyecto"></a>
										</td>
									</tr>
								@endforeach
							</tbody>								
				    	</table>
				    	{{ $proyectos->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
