@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') {{ $proyecto->nombre }}  @endsection
@section('contentheader_description')  @endsection


@section('main-content')
<div class="container spark-screen">
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading">Editar Proyecto</div>

           <div class="panel-body">
            @include('alerts.errors')
            {!! Form::model($proyecto, ['route' => ['aproyectosgnrl.update',$proyecto
            ], 'method' => 'PUT']) !!}
              <div class="form-group">
                {!!Form::label('estado','Estado:')!!}
                {!!Form::select('estado',$estados,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}
                {!!Form::label('ciudad','Ciudad:')!!}
                {!!Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'Ingresa la Ciudad'])!!}
              </div>
                {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}

            {!!Form::close()!!}
          </div>

    </div>
</div>
</div>
</div>
@endsection

