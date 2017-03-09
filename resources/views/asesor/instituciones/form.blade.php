<div class="form-group">  
  {!!Form::file('logo')!!}
  {!!Form::label('nombre','Nombre:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
  {!!Form::label('paginaweb','Página Web:')!!}
  {!!Form::text('paginaweb',null,['class'=>'form-control','placeholder'=>'Ingresa la página web'])!!}
  {!!Form::label('reniecyt','Reniecyt:')!!}
  {!!Form::text('reniecyt',null,['class'=>'form-control','placeholder'=>'Ingresa el Reniecyt'])!!}
  {!!Form::label('linkvideo','Link de video institucional:')!!}
  {!!Form::text('linkvideo',null,['class'=>'form-control','placeholder'=>'Ingresa el link'])!!}
</div>