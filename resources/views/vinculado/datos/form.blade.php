

{!!Form::label('descripcion','Descripcion:')!!}
{!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una descripcion'])!!}

{!!Form::label('website','Website:')!!}
{!!Form::text('website',null,['class'=>'form-control','placeholder'=>'Ingresa tu sitio web'])!!}

{!!Form::label('video','Video:')!!}
{!!Form::text('video',null,['class'=>'form-control','placeholder'=>'Ingresa una liga a tu video'])!!}

{!!Form::label('contacto','Nombre del Contacto:')!!}
{!!Form::text('contacto_nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del contacto'])!!}

{!!Form::label('email','Email del Contacto:')!!}
{!!Form::text('contacto_email',null,['class'=>'form-control','placeholder'=>'Ingresa el email del contacto'])!!}

{!!Form::label('telefono','Telefono del Contacto:')!!}
{!!Form::text('contacto_telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el telefono del contacto'])!!}

{!!Form::label('estado','Estado:')!!}
{!! Form::select('state',$states,($vinculado != null) ? $vinculado->estado_id : null,['id'=>'state','class'=>'form-control']) !!}
{!!Form::label('ciudad','Ciudad:')!!}

{!! Form::select('ciudad_id',($ciudades != null) ? $ciudades: [] ,null,['id'=>'ciudad_id','class'=>'form-control']) !!}



{!!Form::label('direccion','Direccion:')!!}
{!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion'])!!}

{!!Form::text('user_id',$user->id,['id'=>'user_id','style'=>'display:none;'])!!}



