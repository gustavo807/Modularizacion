<div class="form-group">  

  {!!Form::label('nombre','Nombre:')!!}
  {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}

  {!!Form::label('apellidopaterno','Apellido paterno:')!!}
  {!!Form::text('apellidopaterno',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido'])!!}

  {!!Form::label('apellidomaterno','Apellido materno:')!!}
  {!!Form::text('apellidomaterno',null,['class'=>'form-control','placeholder'=>'Ingresa el apellido'])!!}
  
  {!!Form::label('sexo','Sexo:')!!}
  {!!Form::select('sexo',['F'=>'F','M'=>'M'],null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('usuarioconacyt','Usuario conacyt:')!!}
  {!!Form::text('usuarioconacyt',null,['class'=>'form-control','placeholder'=>'Ingresa el usuario'])!!}
  
  {!!Form::label('correo','Correo electrónico:')!!}
  {!!Form::text('correo',null,['class'=>'form-control','placeholder'=>'Ingresa el correo'])!!}

  {!!Form::label('telefono','Teléfono:')!!}
  {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingresa el teléfono'])!!}

  {!!Form::label('grado','Grado máximo de estudios:')!!}
  {!!Form::select('grado',$g,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('campo','Campo de conocimiento:')!!}
  {!!Form::select('campo',$c,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('sni','SNI:')!!}
  {!!Form::select('sni',$sni,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::label('informacion','Información relevante:')!!}
  {!!Form::textarea('informacion',null,['class'=>'form-control','placeholder'=>'Ingresa una descripción'])!!}

  {!!Form::label('actividades','Actividades generales que realizara en los proyectos:')!!}
  {!!Form::textarea('actividades',null,['class'=>'form-control','placeholder'=>'Ingresa una descripción'])!!}

  {!!Form::label('entregables','Entregables generales que realizara en los proyectos vinculados:')!!}
  {!!Form::textarea('entregables',null,['class'=>'form-control','placeholder'=>'Ingresa una descripción'])!!}

  {!!Form::hidden('sede_id',Auth::user()->sede->id)!!}

</div>