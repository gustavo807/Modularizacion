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

					<!--<div class="panel-body">
						<h1>Programa</h1>
					</div>
					-->

					<table class="table table-bordered">
				        <thead>
				            <th>Nombre</th>
				            <th width="150px">Action</th>
				        </thead>

				        @foreach($programas as $programa)
							<tbody>
								<td>{{$programa->programa}}</td>
								<td>
									{!! link_to_route('asesor.edit', $title = '', $parameters = $programa->id, $attributes = ['class'=>'ion-edit icon-big']) !!}
								
									<i class="ion-trash-b icon-big"></i>
										
								</td>
							</tbody>
						@endforeach
				    
				    </table>

				</div>
			</div>
		</div>
	</div>
@endsection