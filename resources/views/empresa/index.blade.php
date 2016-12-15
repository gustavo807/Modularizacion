@extends('empresa.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Proyectos Asignados @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Vista Empresa</div>

					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-hover">
					        <thead>
					            <th>Proyecto</th>
											<th>Convocatoria</th>
					            <th>Descripcion</th>
											<th>Fecha Asignado</th>
					        </thead>
	                @foreach($proyectos as $proyecto)
	                  <tbody>
	                   <td>{!! link_to_route('empresaproyecto.show', $title = $proyecto->nombre, $parameters = $proyecto->id ) !!}</td>
										 <td>{!! link_to_route('empresa.show', $title = $proyecto->convocatoria, $parameters = $proyecto->id ) !!}</td>
	                    <td>{{$proyecto->descripcion}}</td>
											<td>{{$proyecto->created_at}}</td>
	                 </tbody>
							    @endforeach
					    </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
