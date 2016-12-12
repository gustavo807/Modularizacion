<div class="form-group">
  {!!Form::label('modulo','Módulo:')!!}
  {!!Form::text('modulo',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
  {!!Form::label('descripcion','Descripción:')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una descripción de este modulo','rows'=>'4'])!!}
  {!!Form::label('modulo','Clasificación:')!!}
  {!!Form::select('clasificacion_id',$clasificaciones,null,['class'=>'form-control'])!!}
</div>
