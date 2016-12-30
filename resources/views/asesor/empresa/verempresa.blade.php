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
              <li class="active"><a href="#"><strong>Proyectos</strong></a></li>
              <li><a href="/amodulognrl/{{$empresa->id}}">Módulos Generales</a></li>
							<li><a href="/documentosempresa/{{$empresa->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
								@include('alerts.confirm')
								@include('alerts.success')
								<a href="/asesorproyecto/create" class="float" title="Agrega un proyecto">	<i class="fa fa-plus my-float"></i> </a>

								<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
							        <thead>
							            <tr>
							            	<th>Nombre</th>
													<th>Convocatoria</th>
						              <th>Descripción</th>
													<th>Empresa</th>
													<th>Asesor</th>
							            <th >Acción</th>
							            <th >Excel</th>
							            </tr>
											</thead>
											<tbody>
						          @foreach($proyectos as $proyecto)
									<tr>
										<th>{!! link_to('modulosproyecto/'.$proyecto->id, $title = $proyecto->nombre, $attributes = ['class'=>'']) !!}</th>
										<td>{{$proyecto->convocatoria}}</td>
										<td>{{$proyecto->descripcion}}</td>
										<td>
											{!! link_to('proyectoclaves/'.$proyecto->id.'/user/empresa', $title = '',$attributes = 'class="ion-ios-paper icon-big" title="Resumen del proyecto"') !!}
										</td>
										<td>
											{!! link_to('proyectoclaves/'.$proyecto->id.'/user/asesor', $title = '',$attributes = 'class="ion-ios-paper icon-big" title="Resumen del proyecto"') !!}
										</td>
		                                <td>
											<div class="col-md-2">
												{!! link_to_route('asesorproyecto.edit', $title = '', $parameters = $proyecto->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
											</div>

								<!--			<div class="col-md-2">
												{!! Form::open(['method' => 'DELETE',	'route' => ['asesorproyecto.destroy', $proyecto->id],	'id' => 'form-delete-proyectos-' . $proyecto->id]) !!}
												    <a href="" class="data-delete ion-trash-b icon-big"	data-form="proyectos-{{ $proyecto->id }}">	</a>
												{!! Form::close() !!}
											</div> -->
										</td>
										<td>
											<div class="col-md-2">
												{!! link_to_route('excel.show', $title = '', $parameters = $proyecto->id, $attributes = ['class'=>'ion-archive icon-big exceld', 'title' => 'Descargar']) !!}
											</div>
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
	</div>
@endsection
