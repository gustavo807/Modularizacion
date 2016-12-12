@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Documentos @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Documentos</div>

						<div class="panel-body">
								@include('alerts.errors')
								@include('alerts.success')
								<div class="table-responsive">
								<table class="table table-hover">
						        <thead>
												<th>Categoria</th>
						            <th>Nombre</th>
						            <th>Documento</th>
												@if (Auth::user()->activo == 1)
			                    <th>Selecciona</th>
							            <th width="150px">Action</th>
												@endif
						        </thead>
				            @foreach($documentos as $documento)
											<tbody>
												<td>{{$documento->categoria}}</td>
				                <td>{{$documento->nombre}}</td>
				                <td>	<a target="_blank" href="/documentos/{{$documento->documento}}">{{$documento->documento}}</a>	</td>

													@if (Auth::user()->activo == 1)
						                <td>
																{!!Form::open(['route'=>'empresadocumentos.store', 'method'=>'POST','files' => true, 'id' => 'form-add-documentos-' . $documento->id])!!}
						                      {!!Form::text('user_id',$userid,['id'=>'user_id','style'=>'display:none;'])!!}
						                      {!!Form::text('documento_id',$documento->id,['id'=>'documento_id','style'=>'display:none;'])!!}
						                      {!!Form::file('documento', ['class' => 'myfile','data-form'=>'documentos-'.$documento->id ])!!}
						                    {!! Form::close() !!}
						                </td>
														<td>
															@if($documento->documento != null)
																{!! Form::open(['method' => 'DELETE','route' => ['empresadocumentos.destroy', $documento->id],'id' => 'form-delete-documentos-' . $documento->id]) !!}
																		<a href="" class="data-delete"	data-form="documentos-{{ $documento->id }}">	<i class="ion-trash-b icon-big"></i>	</a>
																{!! Form::close() !!}
															@endif
														</td>
													@endif
											</tbody>
										@endforeach
								  </table>
								</div>
								{{ $documentos->links() }}
							</div>

				</div>
			</div>
		</div>
	</div>


@endsection
