<div class="form-group">
  {!!Form::label('clave','Clave:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
  {!!Form::label('identificador','Identificador:')!!}
  {!!Form::text('identificador',null,['class'=>'form-control','placeholder'=>'Ingresa el Identificador'])!!}
  {!!Form::label('ejemplo','Ejemplo:')!!}
  {!!Form::text('ejemplo',null,['class'=>'form-control','placeholder'=>'Ingresa un ejemplo'])!!}
  {!!Form::label('modulo','Modulo:')!!}
  {!!Form::select('modulo_id',$modulos,null,['class'=>'form-control'])!!}

</div>
