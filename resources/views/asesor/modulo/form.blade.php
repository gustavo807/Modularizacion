<div class="form-group">
  {!!Form::label('modulo','Modulo:')!!}
  {!!Form::text('modulo',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
  {!!Form::select('clasificacion_id',$clasificaciones,null,['class'=>'form-control'])!!}
</div>
