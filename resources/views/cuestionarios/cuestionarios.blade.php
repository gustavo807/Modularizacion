@extends('asesor.cuerpo')

@section('htmlheader_title')
	Cuestionarios de Prospección.
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Cuestionarios de Prospección</div>

            <div class="panel-body">
            					@include('alerts.success')

                      <table class="table table-bordered">
            				        <thead>
            				            <th>Razon Social</th>
            				            <th>RFC</th>
            				            <th>Nombre</th>
            				            <th>Website</th>
            				            <th>Giro</th>
            				        </thead>

                            @foreach($cuestionarios as $cuestionario)
                  							<tbody>

                  								<td>{{$cuestionario->razon_social}}</td>
                  								<td>{{$cuestionario->rfc}}</td>
                  								<td>{{$cuestionario->nombre_comercial}}</td>
                  								<td>{{$cuestionario->pagina_web}}</td>
                  								<td>{{$cuestionario->giro}}</td>
                                </tbody>
                  						@endforeach

            				    </table>
                        <div>
                          <a href="{{ url('cuestionarios/xlsx') }}"><button class="btn btn-info"><span class="glyphicon glyphicon-export"></span> Exportar a xlsx</button></a>
                        </div>
            </div>

				</div>
			</div>
		</div>
	</div>



@endsection
