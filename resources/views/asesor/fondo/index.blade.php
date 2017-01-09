@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Fondos @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Fondos</div>

					<div class="panel-body">
							@include('alerts.success')
							<a href="/asesorfondo/create" class="float">  <i class="fa fa-plus my-float"></i>	</a>

							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
						        <thead>
						        	<tr>
						        		<th>Fondo</th>
						        		<th>Descripción</th>
												<th width="150px">Instituciones Participantes</th>
						            <th width="150px">Acción</th>
						        	</tr>

						        </thead>
									<tbody>
							      @foreach($fondos as $fondo)
										<tr>
											<th>{{$fondo->fondo}}</th>
											<td>{{$fondo->descripcion}}</td>
											<td>
											<div class="col-md-1">
												{!! link_to_route('asesorinstitucionfondo.show', $title = '', $parameters = $fondo->id, $attributes = ['class'=>'fa fa-university icon-big']) !!}
											</div>
											</td>
											<td>
										    <div class="col-md-2">
													{!! link_to_route('asesorfondo.edit', $title = '', $parameters = $fondo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
												</div>
									<!--			<div class="col-md-2">
													{!! Form::open(['method' => 'DELETE',	'route' => ['asesorfondo.destroy', $fondo->id],	'id' => 'form-delete-instituciones-' . $fondo->id]) !!}
															<a href="" class="data-delete ion-trash-b icon-big"	data-form="instituciones-{{ $fondo->id }}">	</a>
													{!! Form::close() !!}
												</div>	-->
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
@endsection
{{--

  <td>
    <div class="col-md-2">
      {!! link_to_route('asesorfondo.edit', $title = '', $parameters = $fondo, $attributes = ['class'=>'ion-edit icon-big']) !!}
    </div>
<!--		<div class="col-md-2">
      {!! Form::open(['method' => 'DELETE',	'route' => ['asesorfondo.destroy', $fondo->id],	'id' => 'form-delete-programas-' . $fondo->id]) !!}
          <a href="" class="data-delete ion-trash-b icon-big"	data-form="programas-{{ $fondo->id }}"></a>
      {!! Form::close() !!}
    </div> -->
  </td>

--}}
