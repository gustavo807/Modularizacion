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
              @include('alerts.success')
  						@include('alerts.validar')
  						@include('alerts.errors')

  						@include('alerts.imagen')
  						<table class="table table-bordered">
  				        <thead>
  				            <th>Imagen</th>
  				            <th width="150px">Selecciona</th>
  				        </thead>
                  <div class="form-group">
                  {!!Form::open(['action'=>'AProyectoEmpresaController@storeimagenproyecto', 'method'=>'POST', 'class'=>'formimagen'])!!}
                      @foreach($imagenes as $imagen)
                      	<tbody>
                         <td>
  												 <img class="img" src="/documentos/{{ $imagen->imagen}}" alt="" class="img-responsive" style="width:200px;" descripcion="{{ $imagen->descripcion}}"	referencia="{{ $imagen->referencia}}" title="Click para ampliar"/>
                         </td>
                          <td>
  													{!! Form::radio('imagen',$imagen->id, (isset($proyectoimagen->imagen_id) ) ?	(($proyectoimagen->imagen_id == $imagen->id) ? 'true' : ''): '') !!}
                          </td>
                        </tbody>
      						    @endforeach
  					    </table>
                      {!!Form::text('proyecto',$proyecto->id,['class'=>'form-control','style'=>'display:none'])!!}
                      {!!Form::text('modulo',$modulo->id,['class'=>'form-control','style'=>'display:none'])!!}
  										{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
  									{!!Form::close()!!}
  								</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
