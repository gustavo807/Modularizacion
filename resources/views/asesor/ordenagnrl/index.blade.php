@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Módulos @endsection
@section('contentheader_description') Ordena @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Ordena Módulos </div>

            <div class="panel-body">
							@include('alerts.success')
							<div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                      <thead>
                          <tr>
                          	<th width="150px">Orden</th>
                          <th>Módulo</th>
													<th width="100px">Acción</th>
                          </tr>
                      </thead>
                      					<tbody>
											@foreach($modulos as $modulo)
          							<tr>
          								<th>{{$modulo->orden}}</th>
                          <td>{{$modulo->modulo}}</td>
													<td>
															{!! link_to_route('aordenagnrl.edit', $title = '', $parameters = $modulo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
													</td>
          							</tr>
          						@endforeach
          						</tbody>
                  </table>
								</div>
								{{ $modulos->links() }}
            </div>

				</div>
			</div>
		</div>
	</div>
@endsection
