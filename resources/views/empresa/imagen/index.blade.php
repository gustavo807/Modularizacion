@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Imagenes @endsection
@section('contentheader_description') {{	Session::get('nomproyecto')	}} @endsection

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Imágenes</div>

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
                {!!Form::open(['route'=>'empresaimagen.store', 'method'=>'POST', 'class'=>'formimagen'])!!}
                    @foreach($imagenes as $imagen)
                    	<tbody>
                       <td>
												 <img class="img" src="documentos/{{ $imagen->imagen}}" alt="" class="img-responsive" style="width:200px;" descripcion="{{ $imagen->descripcion}}"	referencia="{{ $imagen->referencia}}" title="Click para ampliar"/>
                       </td>
                        <td>
													{!! Form::radio('imagen',$imagen->id, (isset($proyectoimagen->imagen_id) ) ?	(($proyectoimagen->imagen_id == $imagen->id) ? 'true' : ''): '') !!}
                        </td>
                      </tbody>
    						    @endforeach
					    </table>
										{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
									{!!Form::close()!!}
								</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
