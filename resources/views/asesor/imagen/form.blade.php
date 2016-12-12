<div class="form-group">
  {!!Form::label('descripcion','Descripcion:')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una Descripcion','rows'=>'4'])!!}
  {!!Form::label('referencia','Referencia:')!!}
  {!!Form::textarea('referencia',null,['class'=>'form-control','placeholder'=>'Ingresa la referencia','rows'=>'4'])!!}
  {!!Form::label('modulo','Modulo:')!!}
  {!!Form::select('modulo_id',$modulos,null,['class'=>'form-control'])!!}
  {!!Form::label('imagen','Imagen:')!!}
  {!!Form::file('imagen')!!}
</div>
