@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Asesores @endsection
@section('contentheader_description') Vista @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Agrega Asesor</div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/asesoradd/create" class="float">	<i class="fa fa-plus my-float"></i> </a>

						<div class="table-responsive">
		          <table class="table table-bordered table-striped table-hover">
						        <thead>
						            <tr>
						            	<th>Nombre</th>
		                    <th>Email</th>
						            <th width="150px">Acción</th>
						            </tr>
						        </thead>
						<tbody>
		                @foreach($asesores as $asesor)
		      						<tr>	
		      								<th>{{$asesor->nombre}}</th>
		      								<td>{{$asesor->email}}</td>
		                      <td>
		                        <div class="col-md-2">
		      										{!! link_to_route('asesoradd.edit', $title = '', $parameters = $asesor->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
		      									</div>
		                    <!--    <div class="col-md-2">
		      										{!! Form::open(['method' => 'DELETE',	'route' => ['asesoradd.destroy', $asesor->id],	'id' => 'form-delete-asesores-' . $asesor->id]) !!}
		      										    <a href="" class="data-delete ion-trash-b icon-big"	data-form="asesores-{{ $asesor->id }}">	</a>
		      										{!! Form::close() !!}
		      									</div>	-->
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
