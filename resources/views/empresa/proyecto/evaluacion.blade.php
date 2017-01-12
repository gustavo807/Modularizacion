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
					<meta name="csrf-token" content="{{ csrf_token() }}">
					@include('alerts.success')
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th>Pregunta</th>
							<th>Tipo</th>
							<th>Nivel de riesgo</th>
						</thead>
						<tbody>
							@foreach($array as $dato)
							<tr> 
								<th>{{ $dato->pregunta }}</th>
							 	<th>{{ $dato->variable }}</th>
								<td>
									{!! Form::model($dato, ['route' => ['empresaproyecto.update',$proyecto->id], 'method' => 'PUT','id'=>'form-opcion-'.$proyecto->id]) !!}					
										<div class="form-group">																	
											{!! Form::select('valor', $dato->opcion, $dato->valor, ['class'=>'form-control sopcion','placeholder' => 'Selecciona ...','data-form'=>$proyecto->id,'data-pregunta'=>$dato->id]) !!}
										</div>
									{!!Form::close()!!}
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

