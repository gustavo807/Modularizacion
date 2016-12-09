@extends('empresa.cuerpo')

@section('htmlheader_title') Home @endsection
@section('contentheader_title') Claves @endsection
@section('contentheader_description') {{	Session::get('nomproyecto')	}} @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Modulos Convocatoria</div>

<div class="panel-body">
					@include('alerts.errors')
					@include('alerts.validar')
                {!!Form::open(['route'=>'empresaproyecto.store', 'method'=>'POST', 'class'=>'formulario'])!!}

                    <div class="form-group">
                      @foreach ($claves as $clave )
                        {!!Form::label('nombre',$clave->nombre)!!}
                        {!!Form::text('valor[]',$clave->valor,['class'=>'form-control txtvalor','placeholder'=>$clave->ejemplo])!!}
                        {!!Form::text('clave_id[]',$clave->id,['class'=>'form-control','style'=>'display:none'])!!}
                      @endforeach

                    </div>

								{!!Form::submit('Registrar',['class'=>'btn btn-primary btnenviar'])!!}
								<button type="button" name="button" class="btn btn-danger" onclick="javascript: window.history.go(-1)">Regresar</button>
      					{!!Form::close()!!}
</div>

				</div>
			</div>
		</div>
	</div>


@endsection
