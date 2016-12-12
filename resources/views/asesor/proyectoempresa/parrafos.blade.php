@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre  }} @endsection
@section('contentheader_description') {{ $proyecto->user->nombre  }}@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#">Proyectos</a></li>
              <li><a href="/amodulognrl/{{ $proyecto->user->id}}">Módulos Generales</a></li>
							<li><a href="/documentosempresa/{{$proyecto->user->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              @include('alerts.success')
							@include('alerts.validar')
							@include('alerts.errors')

							@php
								$arr1;
								$arr2;
								foreach ($claves as $clave) {
									$arr1[] = $clave->identificador;
									$arr2[] = $clave->valor;
								}
							@endphp
							<table class="table table-bordered">
										<thead>
												<th>Párrafo</th>
												<th width="150px">Selecciona</th>
										</thead>
										<div class="form-group">
										{!!Form::open(['action'=>'AProyectoEmpresaController@storeparrafoproyecto', 'method'=>'POST', 'class'=>'formparrafo'])!!}
												@foreach($parrafos as $parrafo)
													<tbody>
													 <td class="no-copy">
														 @php
																echo str_replace($arr1,$arr2,$parrafo->parrafo);
														 @endphp
													 </td>
														<td>
															{!! Form::radio('parrafo', $parrafo->id,(isset($proyectoparrafo->parrafo_id) ) ?	(($proyectoparrafo->parrafo_id == $parrafo->id) ? 'true' : ''): '' ) !!}
														</td>
														</tbody>
												@endforeach
								</table>
												<br>
												{!!Form::label('nombre','Comentario: ')!!}
												{!!Form::textarea('observacion',(isset($proyectoparrafo->observacion)) ? $proyectoparrafo->observacion : null ,['class'=>'form-control txtobservacion','rows'=>'5','placeholder'=>'Comentario acerca de los parrafos'])!!}
                        {!!Form::text('proyecto',$proyecto->id,['class'=>'form-control','style'=>'display:none'])!!}
                        {!!Form::text('modulo',$modulo->id,['class'=>'form-control','style'=>'display:none'])!!}
                        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
										{!!Form::close()!!}
										</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
