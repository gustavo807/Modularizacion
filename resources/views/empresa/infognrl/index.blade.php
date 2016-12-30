@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresa @endsection
@section('contentheader_description') Información General @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#"><strong>Claves</strong></a></li>
              <li><a href="/einfognrl/create">Párrafos e imágenes</a></li>
            </ul>
					</div>

						<div class="panel-body">
              <div class="claves">
								<div class="table-responsive">
	                <table class="table table-bordered table-striped table-hover">
	                      <thead>
	                      	<tr>
	                      		<th>Nombre</th>
	                          <th>Valor</th>
	                      	</tr>
	                          
	                      </thead>
	                      <tbody>
	                      @foreach($claves as $clave)
	                          <tr>
	                            <th>{{$clave->nombre}}</th>
	                            <td>{{$clave->valor}}</td>
	                          </tr>
	                        @endforeach
	                        </tbody>
	                  </table>
									</div>
                  {{ $claves->links() }}
                </div>
						</div>

				</div>
			</div>
		</div>
	</div>


@endsection
