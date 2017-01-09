@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Instituciones @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Instituciones</div>

					<div class="panel-body">
							@include('alerts.success')
							<a href="/asesorinstitucionfondo/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

							<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
							        <thead>
							        	<tr>
							        		<th>Instituciónes que participan en este fondo</th>
								          <th width="150px">Acción</th>
							        	</tr>

							        </thead>
										<tbody>
								      @foreach($instituciones as $institucion)
											<tr>
												<td>{{$institucion->institucion}}</td>
												<td>
													<div class="col-md-2">
														{!! link_to_route('asesorinstitucionfondo.edit', $title = '', $parameters = $institucion->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
													</div>
												</td>
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
{{--<div class="col-md-2">
	{!! link_to_route('asesorinstitucionfondo.edit', $title = '', $parameters = $institucion->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
</div>--}}
