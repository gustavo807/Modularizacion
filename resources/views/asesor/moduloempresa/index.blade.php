@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') Módulos Generales @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li><a href="/asesorempresa/{{$empresa->id}}">Proyectos</a></li>
              <li class="active"><a href="#">Módulos Generales</a></li>
							<li><a href="/documentosempresa/{{$empresa->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              @include('alerts.success')
              <table class="table table-hover">
                    <thead>
                        <th>Módulo</th>
                        <th width="150px">Estado</th>
                    </thead>
                    @foreach($modulos as $modulo)
                      <tbody>
                       <td>
                           {!! link_to('amodulognrl/'.$modulo->id .'/empresa/'.$empresa->id, $title = $modulo->modulo) !!}
                       </td>
                        <td>
                          @if ($modulo->completo)
                            <strong>Completo</strong>
                          @else
                            Por llenar
                          @endif
                        </td>
                     </tbody>
                    @endforeach
              </table>
              {{ $modulos->links() }}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
