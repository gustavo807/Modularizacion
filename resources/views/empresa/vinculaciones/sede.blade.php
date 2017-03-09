@extends('empresa.cuerpo')

@section('htmlheader_title')  @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $sede->user->nombre }}</div>
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<div class="panel-body">
					
					<h2>Institución: {{ $institution->nombre }}</h2>
					<h4>
						Página web: 
						<a href="http://{{ $institution->paginaweb }}" 
							target="_blank"
							title="Click para ver más">
							{{ $institution->paginaweb }}
						</a>
					</h4>
					<a href="http://{{ $institution->linkvideo }}" 
						target="_blank"
						title="Click para ver el video">
						Video de la institución
					</a>

					<br><br>

					<h2>Sede: {{ $sede->user->nombre }}</h2>
					<h4>Estado: {{ $sede->user->estado }}</h4>
					<h4>Ciudad: {{ $sede->user->ciuadad }}</h4>
					<h4>
						Página web: 
						<a href="http://{{ $sede->paginaweb }}" 
							target="_blank"
							title="Click para ver más">
							{{ $sede->paginaweb }}
						</a>
					</h4>
					<h4>Dirección: {{ $sede->direccion }}</h4>
					<p>Descripción: 
						{{ $sede->descripcion }}
					</p>

					<br><br>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Moneda</th>
									<th>Seleccionar</th>
								</tr>								
							</thead>
							<tbody>
								@foreach($partidas as $partida)
									<tr>
										<td>{{ $partida->descripcion }}</td>
										<td>{{ $partida->precio }}</td>
										<td>{{ $partida->cambio }}</td>
										<td>
											@php
												$boolean=false;
												$value='0';
												if($check->contains($partida->id))
												{
													$boolean=true;
													$value='1';
												}
											@endphp
											
											{{ Form::checkbox('partida', $value,$boolean,['class'=>'partida','data-partida_id'=>$partida->id]) }}
											
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $partidas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
	<script>
		$('.partida').change(function(evt) {
			var proyecto_id = {{ $proyecto->id }};
			var partida_id = $(this).data('partida_id');
			var route = "/vinculaciones/"+proyecto_id+"/partida/"+partida_id;
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