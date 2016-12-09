@extends('asesor.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') Documentos @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li><a href="/asesorempresa/{{$empresa->id}}">Proyectos</a></li>
              <li><a href="/amodulognrl/{{$empresa->id}}">Modulos Generales</a></li>
							<li class="active"><a href="#">Documentos</a></li>
            </ul>
					</div>

					<div class="panel-body">
								@include('alerts.errors')
								@include('alerts.success')
								<div class="table-responsive">
									<table class="table table-hover">
							        <thead>
													<th>Categoria</th>
							            <th>Nombre</th>
							            <th>Documento</th>
							        </thead>

	                    @foreach ($documentos as $documento)
	                      <tbody>
	                        <td>{{$documento->categoria}}</td>
	                        <td>{{$documento->nombre}}</td>
	                        <td>
	                          <a target="_blank" href="/documentos/{{$documento->documento}}">{{$documento->documento}}</a>
	                        </td>
	                      </tbody>
	                    @endforeach
									</table>
								</div>
                {{$documentos->links()}}
						</div>

				</div>
			</div>
		</div>
	</div>


@endsection
