{!!Form::label('nombre','Nombre del documento:')!!}
{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
{!!Form::select('rol_id',$roles,null,['class'=>'form-control'])!!}
{!!Form::select('categoria_id',$categorias,null,['class'=>'form-control'])!!}
