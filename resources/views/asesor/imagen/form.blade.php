<div class="form-group">
  {!!Form::label('descripcion','Descripcion:')!!}
  {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una Descripcion'])!!}
  {!!Form::label('referencia','Referencia:')!!}
  {!!Form::text('referencia',null,['class'=>'form-control','placeholder'=>'Ingresa la referencia'])!!}
  {!!Form::label('modulo','Modulo:')!!}
  {!!Form::select('modulo_id',$modulos,null,['class'=>'form-control'])!!}
  {!!Form::label('imagen','Imagen:')!!}
  {!!Form::file('imagen')!!}
</div>
