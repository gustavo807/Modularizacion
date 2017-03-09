@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description')  @endsection

@section('main-content')
<div class="container spark-screen">
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading">
              <ul class="nav nav-tabs nav-justified">
                  <li class="active"><a href="#"><strong>Sedes participantes</strong></a></li>
                  <li><a href="/aproyectosgnrl/investigadores/{{ $proyecto->id }}">Investigadores</a></li>
                  <li><a href="/aproyectosgnrl/partidas/{{ $proyecto->id }}">Partidas</a></li>
              </ul>
           </div>

           <div class="panel-body">
            @include('alerts.success')
            <a href="/aproyectosgnrl/sedes/{{ $proyecto->id }}/create" class="float"> <i class="fa fa-plus my-float"></i> </a>
             <div class="table-responsive">
                <table id="idTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Sede</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($proyecto->sedes as $sede)
                        <tr>
                          <td>{{ $sede->user->estado }}</td>
                          <td>{{ $sede->user->ciudad }}</td>
                          <th>{{ $sede->user->nombre }}</th>
                          <td>{{ $sede->user->email }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection