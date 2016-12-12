@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Módulos @endsection
@section('contentheader_description') Ordena @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Ordena Modulos </div>

            <div class="panel-body">
							@include('alerts.success')
							<div class="table-responsive">
                <table class="table table-hover ">
                      <thead>
                          <th width="150px">Orden</th>
                          <th>Modulo</th>
													<th width="100px">Action</th>
                      </thead>
											@foreach($modulos as $modulo)
          							<tbody>
          								<td>{{$modulo->orden}}</td>
                          <td>{{$modulo->modulo}}</td>
													<td>
															{!! link_to_route('aordenagnrl.edit', $title = '', $parameters = $modulo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
													</td>
          							</tbody>
          						@endforeach
                  </table>
								</div>
								{{ $modulos->links() }}
            </div>

				</div>
			</div>
		</div>
	</div>
@endsection
