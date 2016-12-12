@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre  }} @endsection
@section('contentheader_description') {{ $proyecto->user->nombre  }}@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#">Proyectos</a></li>
              <li><a href="/amodulognrl/{{ $proyecto->user->id}}">Módulos Generales</a></li>
							<li><a href="/documentosempresa/{{$proyecto->user->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              @include('alerts.errors')
              @include('alerts.validar')
							@if (isset($modulo->descripcion))
								<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<ul>
											<li>{{$modulo->descripcion}}</li>
									</ul>
								</div>
							@endif
              {!!Form::open(['route'=>'proyectomodulos.store', 'method'=>'POST', 'class'=>'formulario'])!!}
                  <div class="form-group">
                    @foreach ($claves as $clave )
                      {!!Form::label('nombre',$clave->nombre)!!}
                      {!!Form::text('valor[]',$clave->valor,['class'=>'form-control txtvalor','placeholder'=>$clave->ejemplo])!!}
                      {!!Form::text('clave_id[]',$clave->id,['class'=>'form-control','style'=>'display:none'])!!}
                    @endforeach
                  </div>
              {!!Form::text('proyecto',$proyecto->id,['class'=>'form-control','style'=>'display:none'])!!}
              {!!Form::text('modulo',$modulo->id,['class'=>'form-control','style'=>'display:none'])!!}
              {!!Form::submit('Registrar',['class'=>'btn btn-primary btnenviar'])!!}
                <button type="button" name="button" class="btn btn-danger" onclick="javascript: window.history.go(-1)">Regresar</button>
              {!!Form::close()!!}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
