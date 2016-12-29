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
              @include('alerts.warning')
							@include('alerts.success')

							<div class="table-responsive">
								<table class="table table-hover">
						        <thead>
						            <th>Modulo</th>
						            <th width="150px">Estatus</th>
						        </thead>
		                @foreach($modulos as $modulo)
		                  <tbody>
		                   <td>
		                     {!! link_to('clavesmodulo/'.$modulo->id.'/proyecto/'.$proyecto->id, $title = $modulo->modulo) !!}
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
								</div>

								{{ $modulos->links() }}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
