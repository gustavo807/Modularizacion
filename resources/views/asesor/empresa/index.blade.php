@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresas @endsection
@section('contentheader_description')  @endsection

@push('stylesheet')
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Empresas</div>

				<div class="panel-body">
					@include('alerts.success')

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Email</th>
									<th>Avance</th>
									<th>Editar</th>
									<th>Empresa</th>
									<th>Asesor</th>
									<th>Estado</th>
									<th>Copiar</th>
								</tr>
							</thead>
							<tbody>
								@foreach($empresas as $empresa)
								<tr>
									<th>{!! link_to_route('asesorempresa.show', $title = $empresa->nombre, $parameters = $empresa->id, $attributes = '') !!}</th>
									<td>{{$empresa->email}}</td>
									<td>{{ $empresa->modulo }}/{{ $modulos }}</td>
									<td>
										
									{!! link_to('asesorempresa/perfil/'.$empresa->id, $title = '',  $attributes = ['class'=>'ion-edit icon-big']) !!}

									</td>
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
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					{{ $empresas->links() }}
				</div>

			</div>
		</div>
	</div>
</div>
@endsection


@push('scripts')
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

