@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Párrafos @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Párrafos Generales</div>

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
								<div class="table-responsive">
						    <table class="table table-bordered table-striped table-hover">
						        <thead>
						        	<tr>
						        		<th>Párrafo</th>
						            	<th width="150px">Selecciona</th>
						        	</tr>
						        </thead>
						        <div class="form-group">
						        {!!Form::open(['route'=>'empresaparrafognrl.store', 'method'=>'POST', 'class'=>'formparrafo'])!!}
						        	<tbody>
						            @foreach($parrafos as $parrafo)	
						            	<tr>
						            		<td class="no-copy">
							                 @php
							                    echo str_replace($arr1,$arr2,$parrafo->parrafo);
							                 @endphp
							               </td>
							                <td>
							                  {!! Form::radio('parrafo', $parrafo->id,(isset($userparrafo->parrafo_id) ) ?	(($userparrafo->parrafo_id == $parrafo->id) ? 'true' : ''): '' ) !!}
							                </td>
						            	</tr>					              
						               						                
										@endforeach
									</tbody>
							    </table>
								</div>
						              <br>
						              {!!Form::label('nombre','Comentario: ')!!}
						              {!!Form::textarea('observacion',(isset($userparrafo->observacion)) ? $userparrafo->observacion : null ,['class'=>'form-control txtobservacion','rows'=>'5','placeholder'=>'Escriba aquí algún comentario o corrección que desee hacer del párrafo seleccionado'])!!}
						              {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
						          {!!Form::close()!!}
						          </div>
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
