@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Documentos @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Documentos</div>

							<div class="panel-body">
									@include('alerts.success')
									<a href="/asesordocumentos/create" class="float">	<i class="fa fa-plus my-float"></i> </a>

									<div class="table-responsive">
											<table class="table table-bordered table-striped table-hover">
									        <thead>
												<tr>
																<th>Categoria</th>
					                    <th>Nombre</th>
									            <th>Asignado</th>
									            <th width="150px">Acción</th>
												</tr>
									        </thead>
											<tbody>
					                @foreach($documentos as $documento)
												<tr>		
															<th>{{$documento->categoria}}</th>
							                <td>{{$documento->nombre}}</td>
															<td>{{$documento->rol}}</td>
															<td>
																<div class="col-md-2">
																	{!! link_to_route('asesordocumentos.edit', $title = '', $parameters = $documento->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
																</div>
													<!--			<div class="col-md-2">
																	{!! Form::open(['method' => 'DELETE','route' => ['asesordocumentos.destroy', $documento->id],'id' => 'form-delete-documentos-' . $documento->id]) !!}
																	    <a href="" class="data-delete ion-trash-b icon-big" data-form="documentos-{{ $documento->id }}">	</a>
																	{!! Form::close() !!}
																</div>		-->
															</td>
														</tr>
													@endforeach
													</tbody>
										  </table>
										</div>
									{{ $documentos->links() }}
							</div>

				</div>
			</div>
		</div>
	</div>
@endsection
