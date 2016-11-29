<div class="form-group">
  {!!Form::label('nombre','Nombre:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
  {!!Form::label('email','Email:')!!}
  {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el email'])!!}
  {!!Form::label('password','Password:')!!}
  {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingresa el password'])!!}
  {!!Form::label('password','Confirma Password:')!!}
  {!!Form::password('password_confirm',['class'=>'form-control','placeholder'=>'Confirma el password'])!!}
</div>
