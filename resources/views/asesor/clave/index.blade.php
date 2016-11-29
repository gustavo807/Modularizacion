@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Claves</div>

<div class="panel-body">
					@include('alerts.success')

					<a href="/asesorclave/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>

					<table class="table table-bordered">
				        <thead>
				            <th>Clave</th>
                    <th>Identificador</th>
                    <th>Modulo</th>
				            <th width="150px">Action</th>
				        </thead>

                @foreach($claves as $clave)
							<tbody>
								<td>{{$clave->nombre}}</td>
                <td>{{$clave->identificador}}</td>
                <td>{{$clave->modulo}}</td>
								<td>
									<div class="col-md-2">
										{!! link_to_route('asesorclave.edit', $title = '', $parameters = $clave->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
									</div>


									<div class="col-md-2">
										{!! Form::open(['method' => 'DELETE',
										    'route' => ['asesorclave.destroy', $clave->id],
										    'id' => 'form-delete-clave-' . $clave->id]) !!}
										    <a href="" class="data-delete"
										      data-form="clave-{{ $clave->id }}">
										      <i class="ion-trash-b icon-big"></i></a>
										  {!! Form::close() !!}
									</div>

								</td>
							</tbody>
						@endforeach
				    </table>

						{{ $claves->links() }}
</div>

				</div>
			</div>
		</div>
	</div>



@endsection
