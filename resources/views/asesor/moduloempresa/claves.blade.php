@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') Cláves Generales @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li><a href="/asesorempresa/{{$empresa->id}}">Proyectos</a></li>
              <li class="active"><a href="#"><strong>Módulos Generales</strong></a></li>
							<li><a href="/documentosempresa/{{$empresa->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              @include('alerts.errors')
              @include('alerts.validar')
							@if (isset($modulo->descripcion))
								<div class="bs-callout bs-callout-primary"> <h4>Instrucciones</h4> 
									<p>{{$modulo->descripcion}}</p> 
								</div>
							@endif
              {!!Form::open(['route'=>'amodulognrl.store', 'method'=>'POST', 'class'=>'formulario'])!!}
                  <div class="form-group">
                    @foreach ($claves as $clave )
                      {!!Form::label('nombre',$clave->nombre)!!}
                      {!!Form::textarea('valor[]',$clave->valor,['class'=>'form-control txtvalor', 'rows'=>'1', 'placeholder'=>$clave->ejemplo])!!}
                      {!!Form::text('clave_id[]',$clave->id,['class'=>'form-control','style'=>'display:none'])!!}
                    @endforeach
                  </div>
                  {!!Form::text('empresa',$empresa->id,['class'=>'form-control','style'=>'display:none'])!!}
                  {!!Form::text('modulo',$modulo->id,['class'=>'form-control','style'=>'display:none'])!!}
              {!!Form::submit('Registrar',['class'=>'btn btn-primary btnenviar'])!!}

              {!!Form::close()!!}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
