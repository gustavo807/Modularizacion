<div class="form-group">
  {!!Form::label('parrafo','Parrafo:')!!}
  {!!Form::textarea('parrafo',null,['class'=>'form-control','placeholder'=>'Ingresa el Parrafo'])!!}
  {!!Form::label('parrafo','Modulo:')!!}
  {!!Form::select('modulo_id',$modulos,null,['class'=>'form-control'])!!}
</div>
