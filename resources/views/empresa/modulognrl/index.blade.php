@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Modulos Generales @endsection
@section('contentheader_description') Modulos Generales @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modulos Generales</div>

						<div class="panel-body">
								@include('alerts.warning')
								@include('alerts.success')
								<div class="table-responsive">
									<table class="table table-hover">
								        <thead>
								            <th>Modulo</th>
								            <th width="150px">Estatus</th>
								        </thead>
				                @foreach($modulos as $modulo)
				                  <tbody>
				                   <td>
															 {!! link_to_route('empresamodulognrl.edit', $title = $modulo->modulo, $parameters = $modulo->id ) !!}
				                   </td>
				                    <td>
															@if ($modulo->completo)
																<strong>Completo</strong>
															@endif
				                    </td>
				                 </tbody>
										    @endforeach
								    </table>
									</div>
									{{ $modulos->links() }}
						</div>

				</div>
			</div>
		</div>
	</div>
@endsection
