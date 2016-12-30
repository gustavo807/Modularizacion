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
              <li><a href="/amodulognrl/{{$empresa->id}}">Módulos Generales</a></li>
							<li class="active"><a href="#"><strong>Documentos</strong></a></li>
            </ul>
					</div>

					<div class="panel-body">
								@include('alerts.errors')
								@include('alerts.success')
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
							        <thead>
										<tr>
														<th>Categoria</th>
							            <th>Nombre</th>
							            <th>Documento</th>
										</tr>
							        </thead>
							        <tbody>
	                    @foreach ($documentos as $documento)
	                      <tr>
	                        <th>{{$documento->categoria}}</th>
	                        <td>{{$documento->nombre}}</td>
	                        <td>
	                          <a target="_blank" href="/documentos/{{$documento->documento}}">{{$documento->documento}}</a>
	                        </td>
	                      </tr>
	                    @endforeach
	                    </tbody>
									</table>
								</div>
                {{$documentos->links()}}
					</div>

				</div>
			</div>
		</div>
	</div>


@endsection
