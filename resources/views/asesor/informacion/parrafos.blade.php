@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{$empresa->nombre}} @endsection
@section('contentheader_description') Claves {{$user}} @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li ><a href="/{{$ruta}}/{{$id}}/user/{{$user}}">Claves</a></li>
              <li class="active"><a href="#"><strong>Párrafos e imágenes</strong></a></li>
            </ul>
					</div>
						<div class="panel-body">
              @include('alerts.imagenresumen')
              @php
                $arr1;
                $arr2;
                foreach ($claves as $clave) {
                  $arr1[] = $clave->identificador;
                  $arr2[] = $clave->valor;
                }
                //Si existe claves generales
                if (isset($clavesg)) {
                  foreach ($clavesg as $clave) {
                    $arr1[] = $clave->identificador;
                    $arr2[] = $clave->valor;
                  }
                }
              @endphp
							<div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                          <th width="100">Módulo</th>
                        <th>Párrafo</th>
                        <th width="150">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($parrafos as $parrafo)
                      <tr>
                        <th>{{$parrafo->modulo}}</th>
                        <td class="no-copy">
													@php
														if (isset($arr1)) {
															echo str_replace($arr1,$arr2,$parrafo->parrafo);
														}
													@endphp
                        </td>
                        <td>
                          @if ($parrafo->imagen)
                            <img class="img" src="/documentos/{{ $parrafo->imagen}}" alt="" class="img-responsive" style="width:200px;" title="Click para ampliar"/>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
							</div>
                {{ $parrafos->links() }}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
