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
              <li class="active"><a href="#">Claves</a></li>
              <li><a href="/{{$ruta}}/{{$id}}/user/{{$user}}">Párrafos e imágenes</a></li>
            </ul>
					</div>

						<div class="panel-body">

              <div class="table-responsive">
                <table class="table table-hover">
                      <thead>
                          <th>Nombre</th>
                          <th>Valor</th>
                      </thead>
                      @foreach($claves as $clave)
                          <tbody>
                            <td>{{$clave->nombre}}</td>
                            <td>{{$clave->valor}}</td>
                          </tbody>
                        @endforeach
                  </table>
                  {{ $claves->links() }}
              </div>

						</div>
				</div>
			</div>
		</div>
	</div>
@endsection
