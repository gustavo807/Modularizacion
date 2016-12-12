@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{$proyecto->nombre}} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"> Descripción: </div>

						<div class="panel-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td><strong>Nombre:</strong></td> <td>{{ $proyecto->nombre }}</td>
                  </tr>
                  <tr>
                    <td><strong>Descripción:</strong></td> <td>{{ $proyecto->descripcion }}</td>
                  </tr>
                  <tr>
                    <td><strong>Convocatoria: </strong></td> <td> {{ $proyecto->convocatoria }} </td>
                  </tr>
                  <tr>
                    <td><strong>Institución:</strong></td> <td> {{ $proyecto->institucion }} </td>
                  </tr>
                  <tr>
                    <td><strong>Programa:</strong></td> <td> {{ $proyecto->programa }} </td>
                  </tr>
                </tbody>
              </table>
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
