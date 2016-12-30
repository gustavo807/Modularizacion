@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Módulos Generales @endsection
@section('contentheader_description') Módulos Generales @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Módulos Generales</div>

						<div class="panel-body">
								@include('alerts.warning')
								@include('alerts.success')
								<div class="table-responsive">
									<table class="table table-bordered table-striped table-hover">
								        <thead>
								        	<tr>
									            <th>Módulo</th>
									            <th width="150px">Estatus</th>
								        	</tr>
								        </thead>
								        <tbody>
				                @foreach($modulos as $modulo)
				                  
				                   <tr>
				                   		<th>
															 {!! link_to_route('empresamodulognrl.edit', $title = $modulo->modulo, $parameters = $modulo->id ) !!}
				                   		</th>				                   
				                    	<td>
															@if ($modulo->completo)
																<strong>Completo</strong>
															@else
																Por llenar
															@endif
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
@endsection
