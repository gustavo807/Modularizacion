<div class="form-group">
  {!!Form::label('modulo','Modulo:')!!}
  {!!Form::text('modulo',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
  {!!Form::label('modulo','Clasificacion:')!!}
  {!!Form::select('clasificacion_id',$clasificaciones,null,['class'=>'form-control'])!!}
</div>
