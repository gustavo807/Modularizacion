@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresas @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Empresas</div>

						<div class="panel-body">
								@include('alerts.success')

								<div class="table-responsive">
							    <table class="table table-hover">
							        <thead>
							            <th>Nombre</th>
							            <th>Email</th>
													<th>Registro</th>
													<th>Empresa</th>
													<th>Asesor</th>
													<th>Estatus</th>
													<th>Copiar</th>
							        </thead>

							        @foreach($empresas as $empresa)
													<tbody>
														<td>{!! link_to_route('asesorempresa.show', $title = $empresa->nombre, $parameters = $empresa->id, $attributes = '') !!}</td>
														<td>{{$empresa->email}}</td>
														<td>{{$empresa->created_at}}</td>
														<td>
															{!! link_to('informaciognrl/'.$empresa->id.'/user/empresa', $title = '',$attributes = 'class="ion-ios-paper icon-big" title="Información General"') !!}
														</td>
														<td>
															{!! link_to('informaciognrl/'.$empresa->id.'/user/asesor', $title = '',$attributes = 'class="ion-ios-paper icon-big" title="Información General"') !!}
														</td>
														<td>
															{!! Form::open(['method' => 'PUT',	'route' => ['asesorempresa.update', $empresa->id],	'id' => 'form-confirm-empresa-' . $empresa->id]) !!}
																	<div class="data-confirm" data-form="empresa-{{ $empresa->id }}" title="Habilitar - Deshabilitar" >
																		<input type="checkbox"
																		@if ($empresa->activo == 1)
																			checked
																		@endif
																		data-toggle="toggle" data-on="On" data-off="Off"  data-size="small"  >
																	</div>
															{!! Form::close() !!}
														</td>
														<td>{!! link_to('copyempresa/'.$empresa->id, $title = '',
																	$attributes = 'class="ion-ios-browsers icon-big copyempresa" title="Copiar módulos de esta empresa"') !!}
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
