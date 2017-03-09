<div class="form-group">  

  {!!Form::label('descripcion','Descripción de la cotización:')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa una descripción'])!!}

  {!!Form::label('precio','Precio con iva incluido:')!!}
  {!!Form::text('precio',null,['class'=>'form-control','placeholder'=>'Ingresa el precio'])!!}

  {!!Form::label('cambio','Tipo de cambio:')!!}
  {!!Form::select('cambio',['pesos'=>'pesos','dólares'=>'dólares'],null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}

  {!!Form::hidden('sede_id',Auth::user()->sede->id)!!}

</div>