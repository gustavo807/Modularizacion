@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Investigadores @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Investigadores</div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/personal/create" class="float"><i class="fa fa-plus my-float"></i></a>
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Email</th>
									<th>Grado</th>
									<th>Campo</th>
									<th>SNI</th>
									<th>Editar</th>
								</tr>
							</thead>
							<tbody>
								@foreach($investigadores as $investigador)
									<tr>
										<td>
											{{ 
											   $investigador->nombre.' '.
											   $investigador->apellidopaterno.' '.
											   $investigador->apellidomaterno 
											}}
										</td>
										<td>{{ $investigador->correo }}</td>
										<td>{{ $investigador->grado }}</td>
										<td>{{ $investigador->campo }}</td>
										<td>{{ $investigador->sni }}</td>
										<td><a href="/personal/{{ $investigador->id }}/edit" class="ion-edit icon-big"></a></td>
									</tr>
								@endforeach
							</tbody>								
				    	</table>
				    	{{ $investigadores->links() }}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection