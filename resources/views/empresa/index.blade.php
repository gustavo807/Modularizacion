@extends('empresa.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresa @endsection
@section('contentheader_description') Proyectos asignados @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Vista Empresa</div>

					<div class="panel-body">

						<table class="table table-bordered">
					        <thead>
					            <th>Proyecto</th>
											<th>Convocatoria</th>
					            <th>Descripcion</th>
					        </thead>
	                @foreach($proyectos as $proyecto)
	                  <tbody>
	                   <td>{!! link_to_route('empresaproyecto.show', $title = $proyecto->nombre, $parameters = $proyecto->id ) !!}</td>
										 <td>{{$proyecto->convocatoria}}</td>
	                    <td>{{$proyecto->descripcion}}</td>
	                 </tbody>
							    @endforeach
					    </table>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
