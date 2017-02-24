@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title')  {{ $convocatoria->convocatoria }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dirigido A</div>

					<div class="panel-body">
							@include('alerts.success')
							<a href="/asesorconvocatoria/a/dirigido/crear/{{ $convocatoria->id }}" class="float">	<i class="fa fa-plus my-float"></i>	</a>
						
						<table class='table table-bordered table-striped table-hover' >
							<thead>
								<tr>
									<th>Dirigido A</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach($convocatoria->dirigidos as $dirigido)
									<tr>
										<th>{{ $dirigido->nombre }}</th>
										<td>
											{!! link_to('/asesorconvocatoria/a/dirigido/editar/'.$convocatoria->id.'/'.$dirigido->id, $title = '', $attributes = ['class'=>'ion-edit icon-big']) !!}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

					</div>

				</div>
			</div>
		</div>
	</div>
@endsection