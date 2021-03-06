@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Convocatorias @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Convocatorias</div>

					<div class="panel-body">
							@include('alerts.success')
							<a href="/asesorconvocatoria/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

							<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
							        <thead>
							            <tr>
							            	<th>Convocatoria</th>
							            <th>Descripción</th>
							            <th>Fondo</th>
							            <th>Dirigido A</th>
							            <th width="150px">Acción</th>
							            </tr>
							        </thead>
							        <tbody>
								      @foreach($convocatorias as $convocatoria)
											<tr>
												<th>{{$convocatoria->convocatoria}}</th>
												<td>{{$convocatoria->descripcion}}</td>
												<td>{{$convocatoria->fondo}}</td>
												<td>
												{!! link_to_route('dirigido.show', $title = '', $parameter = $convocatoria->id, $attributes = ['class'=>'ion-person-stalker icon-big']) !!}	</td>
												<td>
													<div class="col-md-2">
														{!! link_to_route('asesorconvocatoria.edit', $title = '', $parameters = $convocatoria->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
													</div>
										<!--			<div class="col-md-2">
														{!! Form::open(['method' => 'DELETE',	'route' => ['asesorconvocatoria.destroy', $convocatoria->id],	'id' => 'form-delete-convocatorias-' . $convocatoria->id]) !!}
														    <a href="" class="data-delete ion-trash-b icon-big"	data-form="convocatorias-{{ $convocatoria->id }}">	</a>
														{!! Form::close() !!}
													</div>	-->
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
	</div>
@endsection
