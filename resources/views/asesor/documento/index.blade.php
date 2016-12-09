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

					<a href="/asesordocumentos/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>

					<table class="table table-hover">
				        <thead>
										<th>Categoria</th>
                    <th>Nombre</th>
				            <th>Asignado</th>
				            <th width="150px">Action</th>
				        </thead>


                @foreach($documentos as $documento)
							<tbody>

								<td>{{$documento->categoria}}</td>
                <td>{{$documento->nombre}}</td>
								<td>{{$documento->rol}}</td>
								<td>
									<div class="col-md-2">
										{!! link_to_route('asesordocumentos.edit', $title = '', $parameters = $documento->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
									</div>


									<div class="col-md-2">
										{!! Form::open(['method' => 'DELETE',
										    'route' => ['asesordocumentos.destroy', $documento->id],
										    'id' => 'form-delete-documentos-' . $documento->id]) !!}
										    <a href="" class="data-delete"
										      data-form="documentos-{{ $documento->id }}">
										      <i class="ion-trash-b icon-big"></i></a>
										  {!! Form::close() !!}
									</div>

								</td>
							</tbody>
						@endforeach
				    </table>

						 {{ $documentos->links() }}
</div>

				</div>
			</div>
		</div>
	</div>


@endsection
