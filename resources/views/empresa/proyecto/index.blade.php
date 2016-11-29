@extends('empresa.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Modulos por proyecto @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{$proyecto->nombre}}</div>

					<div class="panel-body">

						<table class="table table-bordered">
					        <thead>

					            <th>Modulo</th>
					            <th width="150px">Estatus</th>
					        </thead>


	                @foreach($modulos as $modulo)
	                  <tbody>
	                   <td>
	                     {!! link_to_route('empresaproyecto.edit', $title = $modulo->modulo, $parameters = $modulo->id ) !!}
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
				</div>
			</div>
		</div>
	</div>
@endsection
