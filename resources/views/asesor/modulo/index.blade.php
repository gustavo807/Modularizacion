@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modulos</div>

					@include('alerts.success')

					<a href="/asesormodulo/create" class="float">
					<i class="fa fa-plus my-float"></i>
					</a>

					<table class="table table-bordered">
				        <thead>
				            <th>Modulo</th>
                    <th>Clasificacion</th>
				            <th width="150px">Action</th>
				        </thead>

                @foreach($modulos as $modulo)
                  <tbody>
                   <td>{{$modulo->modulo}}</td>
                    <td>{{$modulo->clasificacion}}</td>
                    <td>
                      <div class="col-md-2">
                        {!! link_to_route('asesormodulo.edit', $title = '', $parameters = $modulo->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
                      </div>


                      <div class="col-md-2">
                        {!! Form::open(['method' => 'DELETE',
                            'route' => ['asesormodulo.destroy', $modulo->id],
                            'id' => 'form-delete-modulo-' . $modulo->id]) !!}
                            <a href="" class="data-delete"
                              data-form="modulo-{{ $modulo->id }}">
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



@endsection
