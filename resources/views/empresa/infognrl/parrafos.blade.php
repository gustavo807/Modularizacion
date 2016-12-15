@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresa @endsection
@section('contentheader_description') Información General @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li ><a href="/einfognrl">Claves</a></li>
              <li class="active"><a href="#">Párrafos e imágenes</a></li>
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
              @endphp
                <table class="table table-hover">
                      <thead>
                          <th width="100">Módulo</th>
                          <th>Párrafo</th>
                          <th width="150">Imagen</th>
                      </thead>
                      @foreach($parrafos as $parrafo)
                          <tbody>
                            <td>{{$parrafo->modulo}}</td>
                            <td class="no-copy">
															@php
																if (isset($arr1)) {
																	echo str_replace($arr1,$arr2,$parrafo->parrafo);
																}
															@endphp
                            </td>
                            <td>
                              @if ($parrafo->imagen)
                                <img class="img" src="/documentos/{{ $parrafo->imagen}}" alt="" class="img-responsive" style="width:200px;"	title="Click para ampliar"/>
                              @endif
                            </td>
                          </tbody>
                        @endforeach
                  </table>
                  {{ $parrafos->links() }}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
