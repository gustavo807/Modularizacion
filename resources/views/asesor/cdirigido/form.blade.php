<div class="form-group">
	{!!Form::label('nombre','Nombre:')!!}
	{!!Form::select('nombre',$opciones,null,['placeholder' => 'Selecciona','class'=>'form-control'])!!}
	{!!Form::text('convocatoria',$convocatoria->id,['style'=>'display:none;'])!!}
</div>