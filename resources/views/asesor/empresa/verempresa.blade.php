@extends('asesor.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description')  @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#">Proyectos</a></li>
              <li><a href="#">Modulos Generales</a></li>
							<li><a href="#">Convocatoria</a></li>
            </ul>
					</div>

						<div class="panel-body">
								@include('alerts.confirm')
								@include('alerts.success')

						    {!! link_to_route('asesorempresa.edit', $title = 'Informacion General', $parameters = $empresa->id, $attributes = ['class'=>'']) !!}

								  <div class="row">
										<div class="col-md-4 ">
											<a href="/asesorproyecto/create" class="float" title="Agrega un proyecto">	<i class="fa fa-plus my-float"></i> </a>
										</div>

										<div class="col-md-4 col-md-offset-4">

										</div>

									</div>


								<table class="table table-hover">
							        <thead>
							            <th>Nombre</th>
													<th>Convocatoria</th>
						              <th>Descripcion</th>
							            <th width="150px">Action</th>
											</thead>

						          @foreach($proyectos as $proyecto)
													<tbody>
														<td>{{$proyecto->nombre}}</td>
														<td>{{$proyecto->convocatoria}}</td>
														<td>{{$proyecto->descripcion}}</td>
						                <td>
															<div class="col-md-2">
																{!! link_to_route('asesorproyecto.edit', $title = '', $parameters = $proyecto->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
															</div>

															<div class="col-md-2">
																{!! Form::open(['method' => 'DELETE',
																    'route' => ['asesorproyecto.destroy', $proyecto->id],
																    'id' => 'form-delete-proyectos-' . $proyecto->id]) !!}
																    <a href="" class="data-delete"
																      data-form="proyectos-{{ $proyecto->id }}">
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
		</div>
	</div>



@endsection
