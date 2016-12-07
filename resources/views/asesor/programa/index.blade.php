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

					<a href="/asesorprograma/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>

					<table class="table table-hover">
				        <thead>
				            <th>Nombre</th>
				            <th width="150px">Action</th>
				        </thead>

				        @foreach($programas as $programa)
							<tbody>
								<td>{{$programa->programa}}</td>
								<td>
									<div class="col-md-2">
										{!! link_to_route('asesorprograma.edit', $title = '', $parameters = $programa, $attributes = ['class'=>'ion-edit icon-big']) !!}
									</div>


									<div class="col-md-2">
										{!! Form::open(['method' => 'DELETE',
										    'route' => ['asesorprograma.destroy', $programa->id],
										    'id' => 'form-delete-programas-' . $programa->id]) !!}
										    <a href="" class="data-delete"
										      data-form="programas-{{ $programa->id }}">
										      <i class="ion-trash-b icon-big"></i></a>
										  {!! Form::close() !!}
									</div>

								</td>
							</tbody>
						@endforeach

				    </table>
</div>

				</div>
			</div>
		</div>
	</div>



@endsection
