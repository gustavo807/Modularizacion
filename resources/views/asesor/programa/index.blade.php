@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	


	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Programas</div>

					@include('alerts.success')

					<a class="btn btn-success" href="/asesorprograma/create" role="button">Agregar</a>
					
					<div class="botonadd" >
					<button class="kc_fab_main_btn">+</button>
					</div>
					

					<table class="table table-bordered">
				        <thead>
				            <th>Nombre</th>
				            <th width="150px">Action</th>
				        </thead>

				        @foreach($programas as $programa)
							<tbody>
								<td>{{$programa->programa}}</td>
								<td>
									<div class="col-md-2">
										{!! link_to_route('asesorprograma.edit', $title = '', $parameters = $programa->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
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

	@push('scripts')
		<script type="text/javascript">
			$(function () {
			  $('.data-delete').on('click', function (e) {
			    if (!confirm('Estas seguro de eliminar?')) return;
			    e.preventDefault();
			    $('#form-delete-' + $(this).data('form')).submit();
			  });
			});
		</script>
	@endpush
	
@endsection