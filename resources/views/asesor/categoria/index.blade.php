@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Categorías @endsection
@section('contentheader_description') Documentos @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Categorías</div>

						<div class="panel-body">
									@include('alerts.success')
									<a href="/asesorcategoria/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

									<div class="table-responsive">
											<table class="table table-bordered table-striped table-hover">
										        <thead>
										            <tr>
										            	<th>Categoría</th>
										            <th width="150px">Acción</th>
										            </tr>
										        </thead>
										<tbody>
						                @foreach($categorias as $categoria)
						      							<tr>
						      								<th>{{$categoria->categoria}}</th>
						      								<td>
						      									<div class="col-md-2">
						      										{!! link_to_route('asesorcategoria.edit', $title = '', $parameters = $categoria->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
						      									</div>
						      						<!--			<div class="col-md-2">
						      										{!! Form::open(['method' => 'DELETE','route' => ['asesorcategoria.destroy', $categoria->id],'id' => 'form-delete-categorias-' . $categoria->id]) !!}
						      										    <a href="" class="data-delete ion-trash-b icon-big"	data-form="categorias-{{ $categoria->id }}"></a>
						      										{!! Form::close() !!}
						      									</div>		-->
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
