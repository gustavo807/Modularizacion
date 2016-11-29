<div class="form-group">
  {!!Form::label('nombre','Nombre:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
  {!!Form::label('email','Descripcion:')!!}
  {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una descripcion'])!!}
  {!!Form::label('convocatoria','Convocatoria:')!!}
  {!!Form::select('convocatoria_id',$convocatorias,null,['class'=>'form-control'])!!}
</div>
