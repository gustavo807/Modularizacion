@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') Párrafos Generales @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li><a href="/asesorempresa/{{$empresa->id}}">Proyectos</a></li>
              <li class="active"><a href="#"><strong>Módulos Generales</strong></a></li>
							<li><a href="/documentosempresa/{{$empresa->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              @include('alerts.errors')
              @include('alerts.validar')
              @include('alerts.success')

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
                  {!!Form::open(['action'=>'AModuloGnrlController@storeparrafo', 'method'=>'POST', 'class'=>'formparrafo'])!!}
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
                        {!!Form::textarea('observacion',(isset($userparrafo->observacion)) ? $userparrafo->observacion : null ,['class'=>'form-control txtobservacion','rows'=>'5','placeholder'=>'Comentario acerca de los parrafos'])!!}
												{!!Form::text('empresa',$empresa->id,['class'=>'form-control','style'=>'display:none'])!!}
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
