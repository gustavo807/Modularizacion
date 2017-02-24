@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Módulos @endsection
@section('contentheader_description') {{	Session::get('nomproyecto')	}} @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$proyecto->nombre}}</div>

				<div class="panel-body">
					@include('alerts.warning')
					@include('alerts.success')

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
								<th>Módulo</th>
									<th width="150px">Estatus</th>
								</tr>

							</thead>
							<tbody>
								@if($modulos->firstItem() == $modulos->currentPage())
								<tr>
									<th>
										{!! link_to('/empresaproyecto/preguntas/'.$proyecto->id, $title = 'Cuestionario de evaluación de riesgo') !!}
									</th>
									<td>
										@if ($status == "true")
												<strong>Completo</strong>
											@else
												Por llenar
											@endif
									</td>
								</tr>
								@endif
								@foreach($modulos as $modulo)
								<tr>
									<th>
										{!! link_to_route('empresaproyecto.edit', $title = $modulo->modulo, $parameters = $modulo->id ) !!}
									</th>
									<td>
										@if ($modulo->completo)
										<strong>Completo</strong>
										@else
										Por llenar
										@endif
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>

					{{ $modulos->links() }}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
