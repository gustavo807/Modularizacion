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
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                        <th>Proyecto</th>
                        <th>Convocatoria</th>
                        <th>Avance</th>
                                                <th>Fecha Asignado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($proyectos as $proyecto)
        						<tr>	
        								<th>{{$proyecto->empresa}}</th>
                        <td>{{$proyecto->nombre}}</td>
        								<td>{{$proyecto->convocatoria}}</td>
                        <td>{{$proyecto->modulo}} / {{ $modulos }} Módulos </td>
												<td>{{$proyecto->created_at}}</td>
        							</tr>
          					@endforeach
                            </tbody>
                  </table>
								</div>
                {{ $proyectos->links() }}
            </div>

				</div>
			</div>
		</div>
	</div>
@endsection
