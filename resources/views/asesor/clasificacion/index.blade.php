@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Clasificaciones @endsection
@section('contentheader_description')  @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Clasificaciones</div>

						<div class="panel-body">
								@include('alerts.success')
								<a href="/asesorclasificacion/create" class="float"> <i class="fa fa-plus my-float"></i> </a>
								<div class="table-responsive">
										<table class="table table-hover">
									        <thead>
									            <th>Clasificacion</th>
									            <th width="150px">Action</th>
									        </thead>

					                @foreach($clasificaciones as $clasificacion)
														<tbody>
															<td>{{$clasificacion->clasificacion}}</td>
															<td>
																<div class="col-md-2">
																	{!! link_to_route('asesorclasificacion.edit', $title = '', $parameters = $clasificacion, $attributes = ['class'=>'ion-edit icon-big']) !!}
																</div>
																<div class="col-md-2">
																	{!! Form::open(['method' => 'DELETE',	'route' => ['asesorclasificacion.destroy', $clasificacion->id],	'id' => 'form-delete-clasificacion-' . $clasificacion->id]) !!}
																	    <a href="" class="data-delete ion-trash-b icon-big"	data-form="clasificacion-{{ $clasificacion->id }}">	</a>
																	{!! Form::close() !!}
																</div>
															</td>
														</tbody>
													@endforeach
									  </table>
								</div>
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
