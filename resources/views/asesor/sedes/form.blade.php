<div class="form-group">  

  {!!Form::file('foto')!!}

  {!!Form::label('nombre','Nombre de la Sede:')!!}
  {!!Form::text('nombre',(isset($u)) ? $u->nombre : null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}

  {!!Form::label('email','Email:')!!}
  {!!Form::text('email',(isset($u)) ? $u->email : null,['class'=>'form-control','placeholder'=>'Ingresa el Correo'])!!}

  {!!Form::label('password','Password:')!!}
  {!!Form::text('password',null,['class'=>'form-control','placeholder'=>'Ingresa el Password'])!!}

  {!!Form::label('paginaweb','Página Web:')!!}
  {!!Form::text('paginaweb',null,['class'=>'form-control','placeholder'=>'Ingresa la página web'])!!}

  {!!Form::label('estado','Estado:')!!}
  {!!Form::select('estado',$estados,(isset($u)) ? $u->estado : null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('ciudad','Ciudad:')!!}
  {!!Form::text('ciudad',(isset($u)) ? $u->ciudad : null,['class'=>'form-control','placeholder'=>'Ingresa la Ciudad'])!!}

  {!!Form::label('direccion','Dirección:')!!}
  {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa la Dirección'])!!}

  {!!Form::label('linkgooglemaps','Link a Google Maps:')!!}
  {!!Form::text('linkgooglemaps',null,['class'=>'form-control','placeholder'=>'Ingresa el link a Google Maps'])!!}

  {!!Form::label('contacto','Nombre del contacto:')!!}
  {!!Form::text('contacto',null,['class'=>'form-control','placeholder'=>'Ingresa el Contacto'])!!}

  {!!Form::label('telefono','Teléfono del contacto:')!!}
  {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el Teléfono'])!!}

  {!!Form::label('correo','Correo electrónico del contacto:')!!}
  {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el Correo'])!!}

  {!!Form::label('institucion','Institución:')!!}
  {!!Form::select('institution_id',$i,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('descripcion','Descripción de sus servicios:')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la Descripción'])!!}

</div>