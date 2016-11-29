@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Parrafos</div>

<div class="panel-body">
					@include('alerts.success')

					<a href="/asesorparrafo/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>

					<table class="table table-bordered">
				        <thead>
				            <th>Parrafo</th>
                    <th width="150px">Modulo</th>
				            <th width="150px">Action</th>
				        </thead>

                @foreach($parrafos as $parrafo)
      							<tbody>
      								<td>{{$parrafo->parrafo}}</td>
                      <td>{{$parrafo->modulo}}</td>
      								<td>
      									<div class="col-md-2">
      										{!! link_to_route('asesorparrafo.edit', $title = '', $parameters = $parrafo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
      									</div>


      									<div class="col-md-2">
      										{!! Form::open(['method' => 'DELETE',
      										    'route' => ['asesorparrafo.destroy', $parrafo->id],
      										    'id' => 'form-delete-parrafo-' . $parrafo->id]) !!}
      										    <a href="" class="data-delete"
      										      data-form="parrafo-{{ $parrafo->id }}">
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
