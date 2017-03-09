@extends('vinculado.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Claves por proyecto @endsection
@section('contentheader_description')  @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
			              <li><a href="/proyectos/{{ $p->id }}/clavesc"><strong>Claves de proyecto</strong></a></li>
			              <li class="active"><a href="#">Claves generales</a></li>
			            </ul>
					</div>

					<div class="panel-body">
						@include('vinculado.claves.table')
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection