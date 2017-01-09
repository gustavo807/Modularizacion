@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs nav-justified">
		              <li class="active"><a href="#"><strong>Cuestionario de evaluación de riesgo</strong></a></li>
		              <li><a href="/empresaproyecto/resultados/{{ $proyecto->id }}">Resultados</a></li>
		            </ul>
				</div>

				<div class="panel-body">
					@include('alerts.success')
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th>Pregunta</th>
							<th>Tipo</th>
							<th>Nivel de riesgo</th>
							<th>Editar</th>
						</thead>
						<tbody>
							@foreach($datos as $dato)
							<tr>
								<th>{{ $dato->pregunta }}</th>
								<th>{{ $dato->variable }}</th>
								<td>
									@php
										if (count($dato->valor) > 0)
											echo $dato->valor;	
										else
											echo 'Por llenar';
									@endphp
								</td>
								<td>
									{!! link_to('/empresaproyecto/'.$proyecto->id.'/evaluacion/'.$dato->id, $title = '', $attributes = 'class="ion-edit icon-big" title="Editar"' ) !!}
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
@endsection