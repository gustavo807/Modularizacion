@extends('vinculado.cuerpo')

@section('htmlheader_title')
	Home
@endsection

@section('main-content')
	
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
							Informacion General 
						
							{!! link_to_route('datosvinculado.edit', $title = '', $parameters = $vinculado->id, $attributes = ['class'=>'ion-ios-gear icon-big', 'style'=>'float:right;"']) !!}
						
					</div>


					
					<div class="row">
						<div class="col-md-3">
							<label>Nombre:</label>
						</div>
						<div class="col-md-6">
							{{ $user->nombre }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Email:</label>
						</div>
						<div class="col-md-6">
							{{ $user->email }}
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3">
							<label>Descripcion:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->descripcion }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Website:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->website }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Video:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->video }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Nombre del contacto:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->contacto_nombre }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Email del contacto:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->contacto_email }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Telefono del contacto:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->contacto_telefono }}
						</div>
					</div>					
					<div class="row">
						<div class="col-md-3">
							<label>Ciudad:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->ciudad }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<label>Direccion:</label>
						</div>
						<div class="col-md-6">
							{{ $vinculado->direccion }}
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>

	
	
@endsection