@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Módulo @endsection
@section('contentheader_description') Edit @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Edita Módulo</div>

            <div class="panel-body">
              @include('alerts.errors')
    					{!! Form::model($orden, ['route' => ['aordenagnrl.update',$orden->modulo_id], 'method' => 'PUT']) !!}
                @include('asesor.ordenagnrl.form')
    						{!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
    					{!! Form::close() !!}
            </div>

				</div>
			</div>
		</div>
	</div>
@endsection
