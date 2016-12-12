@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Imágenes @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Imágenes</div>

						<div class="panel-body">
									@include('alerts.success')
									<a href="/asesorimagen/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

									<div class="table-responsive">
											<table class="table table-hover">
										        <thead>
																<th>Modulo</th>
										            <th>Imagen</th>
						                    <th>Descripcion</th>
						                    <th>Referencia</th>
										            <th width="150px">Action</th>
										        </thead>

						                @foreach($imagenes as $imagen)
																<tbody>
																	<td width="200px">{{$imagen->modulo}}</td>
																	<td>
									                  <a target="_blank" href="/documentos/{{$imagen->imagen}}">{{$imagen->imagen}}</a>
									                </td>
									                <td>{{$imagen->descripcion}}</td>
									                <td>{{$imagen->referencia}}</td>
																	<td>
																		<div class="col-md-2">
																			{!! link_to_route('asesorimagen.edit', $title = '', $parameters = $imagen->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
																		</div>
																		<div class="col-md-2">
																			{!! Form::open(['method' => 'DELETE','route' => ['asesorimagen.destroy', $imagen->id], 'id' => 'form-delete-imagen-' . $imagen->id]) !!}
																			    <a href="" class="data-delete"	data-form="imagen-{{ $imagen->id }}"><i class="ion-trash-b icon-big"></i></a>
																			{!! Form::close() !!}
																		</div>
																	</td>
																</tbody>
														@endforeach
										    </table>
										</div>
							 	{{ $imagenes->links() }}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
