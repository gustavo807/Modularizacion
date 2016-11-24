@extends('empresa.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modulos Generales</div>

					@include('alerts.success')



					<table class="table table-bordered">
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

                    </td>
                 </tbody>
						    @endforeach


				    </table>

				</div>
			</div>
		</div>
	</div>


@endsection
