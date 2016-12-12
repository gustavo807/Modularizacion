@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Proyectos @endsection
@section('contentheader_description') Empresas @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Proyectos Empresas</div>

            <div class="panel-body">
							<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>Empresa</th>
                        <th>Proyecto</th>
                        <th>Convocatoria</th>
                        <th>Avance</th>
												<th>Fecha Asignado</th>
                    </thead>
                    @foreach($proyectos as $proyecto)
        							<tbody>
        								<td>{{$proyecto->empresa}}</td>
                        <td>{{$proyecto->nombre}}</td>
        								<td>{{$proyecto->convocatoria}}</td>
                        <td>{{$proyecto->modulo}} / {{ $modulos }} módulos </td>
												<td>{{$proyecto->created_at}}</td>
        							</tbody>
          					@endforeach
                  </table>
								</div>
                {{ $proyectos->links() }}
            </div>

				</div>
			</div>
		</div>
	</div>
@endsection
