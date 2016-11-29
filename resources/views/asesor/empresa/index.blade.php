@extends('asesor.cuerpo')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')



	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Empresas</div>

<div class="panel-body">
					@include('alerts.success')

          <table class="table table-bordered">
				        <thead>
				            <th>Nombre</th>
                    <th>Email</th>
				        </thead>

                @foreach($empresas as $empresa)
      							<tbody>
      								<td>{!! link_to_route('asesorempresa.show', $title = $empresa->nombre, $parameters = $empresa->id, $attributes = '') !!}</td>
      								<td>{{$empresa->email}}</td>

      							</tbody>
      						@endforeach

				    </table>
</div>

				</div>
			</div>
		</div>
	</div>



@endsection
