@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Programas @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Programas</div>

					<div class="panel-body">
							@include('alerts.success')
							<a href="/asesorprograma/create" class="float">  <i class="fa fa-plus my-float"></i>	</a>

							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
						        <thead>
						        	<tr>
						        		<th>Programa</th>
						            	<th width="150px">Acción</th>
						        	</tr>
						            
						        </thead>
									<tbody>
							      @foreach($programas as $programa)
										<tr>
											<th>{{$programa->programa}}</th>
											<td>
												<div class="col-md-2">
													{!! link_to_route('asesorprograma.edit', $title = '', $parameters = $programa, $attributes = ['class'=>'ion-edit icon-big']) !!}
												</div>
										<!--		<div class="col-md-2">
													{!! Form::open(['method' => 'DELETE',	'route' => ['asesorprograma.destroy', $programa->id],	'id' => 'form-delete-programas-' . $programa->id]) !!}
													    <a href="" class="data-delete ion-trash-b icon-big"	data-form="programas-{{ $programa->id }}"></a>
													{!! Form::close() !!}
												</div> -->
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
