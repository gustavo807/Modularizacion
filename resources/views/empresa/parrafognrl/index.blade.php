@extends('empresa.cuerpo')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Parrafos Generales</div>

					@include('alerts.success')

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

				            <th>Parrafo</th>
				            <th width="150px">Selecciona</th>
				        </thead>
                <div class="form-group">
                {!!Form::open(['route'=>'empresaparrafognrl.store', 'method'=>'POST', 'class'=>'formulario'])!!}

                    @foreach($parrafos as $parrafo)
                      <tbody>
                       <td>
                         @php
                            echo str_replace($arr1,$arr2,$parrafo->parrafo);

                         @endphp

                       </td>
                        <td>
                          {!! Form::radio('parrafo', $parrafo->id,(isset($userparrafo->parrafo_id) ) ?
                                                                      (($userparrafo->parrafo_id == $parrafo->id) ? 'true' : ''): '' ) !!}
                        </td>
                        </tbody>
    						    @endforeach

				    </table>
                    <br>
                    {!!Form::label('nombre','Comentario: ')!!}
                    {!!Form::textarea('observacion',(isset($userparrafo->observacion)) ? $userparrafo->observacion : null ,['class'=>'form-control','rows'=>'5','placeholder'=>'Comentario acerca de los parrafos'])!!}
                    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

                {!!Form::close()!!}
                </div>
				</div>
			</div>
		</div>
	</div>


@endsection
