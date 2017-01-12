@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ Auth::user()->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs nav-justified">
		              <li class="active"><a href="#"><strong>Cuestionario de evaluación de competitividad</strong></a></li>
		              <li><a href="/empresaresultados">Resultados</a></li>
		            </ul>
				</div>
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<div class="panel-body">
					@include('alerts.success')
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th>Pregunta</th>
							<th>Tipo</th>
							<th>Selecciona</th>
						</thead>
						<tbody>
							@foreach($datos as $dato)
							<tr>
								<th>{{ $dato->pregunta }}</th>
								<th>{{ $dato->variable }}</th>
								<td>

									{!! Form::model($dato, ['route' => ['empresamodulognrl.show',$dato->id], 'method' => 'PUT','id'=>'form-valor-'.$dato->id]) !!}					
										<div class="form-group">																	
											{!! Form::select('valor', ['1' => 'Si', '0' => 'No'], $dato->valor, ['class'=>'form-control svalor','placeholder' => 'Por llenar...','data-form'=>$dato->id]) !!}
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
