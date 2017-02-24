@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title')  @endsection
@section('contentheader_description') Dirigido A @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Dirigido A </div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/dirigidoa/create" class="float">  <i class="fa fa-plus my-float"></i></a>
						
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Acción</th>
								</tr>
							</thead>
							@foreach($datos as $dato)
								<tr>
									<th>{{ $dato->nombre }}</th>
									<td>{!! link_to_route('dirigidoa.edit', $title = '', $parameters = $dato, $attributes = ['class'=>'ion-edit icon-big']) !!}</td>
								</tr>
							@endforeach
						</table>

						{{ $datos->links() }}
					
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
