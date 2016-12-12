@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Párrafos @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Párrafos</div>

							<div class="panel-body">
									@include('alerts.success')
									<a href="/asesorparrafo/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

									<div class="table-responsive">
										<table class="table table-hover" >
							        <thead>
							            <th width="200px">Modulo</th>
					                <th>Parrafo</th>
							            <th width="150px">Action</th>
							        </thead>
					            @foreach($parrafos as $parrafo)
				  							<tbody>
				  								<td>{{$parrafo->modulo}}</td>
				                  <td>{{$parrafo->parrafo}}</td>
				  								<td>
				  									<div class="col-md-2">
				  										{!! link_to_route('asesorparrafo.edit', $title = '', $parameters = $parrafo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
				  									</div>
				  									<div class="col-md-2">
				  										{!! Form::open(['method' => 'DELETE','route' => ['asesorparrafo.destroy', $parrafo->id],'id' => 'form-delete-parrafo-' . $parrafo->id]) !!}
				  										    <a href="" class="data-delete ion-trash-b icon-big"	data-form="parrafo-{{ $parrafo->id }}">	</a>
				  										{!! Form::close() !!}
				  									</div>
				  								</td>
				  							</tbody>
					  					@endforeach
									  </table>
									</div>
									{{ $parrafos->links() }}
							</div>

				</div>
			</div>
		</div>
	</div>
@endsection
