@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading">Agregar sede</div>

            <div class="panel-body">
              @include('alerts.errors')

              {!!Form::open(['url'=>'aproyectosgnrl/sedes/'.$proyecto->id.'/store', 'method'=>'POST'])!!}
                <div class="form-group">
                  {!!Form::label('sede','Sede:')!!}
                  {!!Form::select('sede_id',$s,null,['class'=>'form-control','placeholder'=>'Selecciona'])!!}
                </div>                
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
              {!!Form::close()!!}
             
            </div>

    </div>
</div>
</div>
</div>
@endsection