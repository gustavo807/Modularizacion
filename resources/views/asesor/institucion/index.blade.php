@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Instituciones</div>

					@include('alerts.success')

					<a href="/asesorinstitucion/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>
					
					<table class="table table-bordered">
				        <thead>
				            <th>Nombre</th>
				            <th>Programa</th>
				            <th width="150px">Action</th>
				        </thead>



				        @foreach($instituciones as $institucion)
							<tbody>

								<td>{{$institucion->institucion}}</td>
								<td>{{$institucion->programa}}</td>
								<td>
									<div class="col-md-2">
										{!! link_to_route('asesorinstitucion.edit', $title = '', $parameters = $institucion->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
									</div>
									

									<div class="col-md-2">
										{!! Form::open(['method' => 'DELETE', 
										    'route' => ['asesorinstitucion.destroy', $institucion->id], 
										    'id' => 'form-delete-instituciones-' . $institucion->id]) !!}
										    <a href="" class="data-delete" 
										      data-form="instituciones-{{ $institucion->id }}">
										      <i class="ion-trash-b icon-big"></i></a>
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

	
@endsection