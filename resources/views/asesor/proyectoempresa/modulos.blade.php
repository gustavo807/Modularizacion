@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre  }} @endsection
@section('contentheader_description') {{ $proyecto->user->nombre  }}@endsection


@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs nav-justified">
						<li class="active"><a href="#"><strong>Proyectos</strong></a></li>
						<li><a href="/amodulognrl/{{ $proyecto->user->id}}">Módulos Generales</a></li>
						<li><a href="/documentosempresa/{{$proyecto->user->id}}">Documentos</a></li>
					</ul>
				</div>

				<div class="panel-body">
					<meta name="csrf-token" content="{{ csrf_token() }}">
					@include('alerts.warning')
					@include('alerts.success')

					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Modulo</th>
									<th width="150px">Estatus</th>
									<th width="150px">Módulos revisados por el asesor</th>
								</tr>
							</thead>
							<tbody>
								@if($modulos->firstItem() == $modulos->currentPage())
								<tr>
									<th>
										{!! link_to('/modulosproyecto/proyecto/'.$proyecto->id, $title = 'Cuestionario de evaluación de riesgo') !!}
									</th>
									<td>
										@if ($status == "true")
												<strong>Completo</strong>
											@else
												Por llenar
											@endif
									</td>
									<td></td>
								</tr>
								@endif
								@foreach($modulos as $modulo)
								<tr>
									<th>
										{!! link_to('clavesmodulo/'.$modulo->id.'/proyecto/'.$proyecto->id, $title = $modulo->modulo) !!}
									</th>
									<td>
										@if ($modulo->completo)
										<strong>Completo</strong>
										@else
										Por llenar
										@endif
									</td>
									<td>
			                          @php
			                            $boolean=false;
			                            $value='0';
			                            if($editados->contains($modulo->id))
			                            {
			                              $boolean=true;
			                              $value='1';
			                            }
			                          @endphp

			                          {{ Form::checkbox('editado', $value,$boolean,['class'=>'editado','data-modulo_id'=>$modulo->id]) }}
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
</div>
@endsection


@push('scripts')
  <script>
    $('.editado').change(function(evt) {
      var proyecto_id = {{ $proyecto->id }};
      var modulo_id = $(this).data('modulo_id');
      var route = "/modulosproyecto/"+proyecto_id+"/revisado/"+modulo_id;
      var token = $('meta[name="csrf-token"]').attr('content');
      var value = $( this ).val();  
      
      $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            method: 'POST',
            dataType: 'json',
            data:{value: value}
        });
    });
  </script>
@endpush