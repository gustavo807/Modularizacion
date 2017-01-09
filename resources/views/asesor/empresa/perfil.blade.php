@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Perfil</div>

				<div class="panel-body">
				@include('alerts.success')
				<div class="table-responsive">	
				<table class="table table-bordered table-striped table-hover">
					<tbody>
						<tr>
							<th>Nombre:</th>
							<td>{{ $empresa->nombre }}</td>
							<td>
								{!! link_to('asesorempresa/perfil/nombre/'.$empresa->id, $title = '',  $attributes = ['class'=>'ion-edit icon-big']) !!}
							</td>
						</tr>
						<tr>
							<th>Email:</th>
							<td>{{ $empresa->email }}</td>
							<td>
								{!! link_to('asesorempresa/perfil/email/'.$empresa->id, $title = '',  $attributes = ['class'=>'ion-edit icon-big']) !!}
							</td>
						</tr>
						<tr>
							<th>Password:</th>
							<td>{{ $empresa->password }}</td>
							<td>
								{!! link_to('asesorempresa/perfil/password/'.$empresa->id, $title = '',  $attributes = ['class'=>'ion-edit icon-big']) !!}
							</td>
						</tr>
						<tr>
							<th>Foto:</th>
							<td><img src="/documentos/{{ $empresa->foto }}" alt="Logo de la empresa">
							</td>
							<td>
								{!! link_to('asesorempresa/perfil/foto/'.$empresa->id, $title = '',  $attributes = ['class'=>'ion-edit icon-big']) !!}
							</td>
						</tr>
					</tbody>
				</table>
				</div>	
						
				</div>

			</div>
		</div>
	</div>
</div>
@endsection