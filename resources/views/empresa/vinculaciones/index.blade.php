@extends('empresa.cuerpo')

@section('htmlheader_title')  @endsection
@section('contentheader_title') Instituciones @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Instituciones</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Estado</th>
									<th>Ciudad</th>
									<th>Sede</th>
									<th>Email</th>
								</tr>								
							</thead>
							<tbody>
								@foreach($proyecto->sedes as $sede)
									<tr>
										<td>{{ $sede->user->estado }}</td>
										<td>{{ $sede->user->ciudad }}</td>
										<th>
											<a href="/vinculaciones/{{ $proyecto->id }}/sede/{{ $sede->id }}"
												title="Click para ver más">
												{{ $sede->user->nombre }}
											</a>
										</th>
										<td>{{ $sede->user->email }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection