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
                  <li><a href="/aproyectosgnrl/sedes/{{ $proyecto->id }}">Sedes participantes</a></li>
                  <li class="active"><a href="#"><strong>Investigadores</strong></a></li>
                  <li><a href="/aproyectosgnrl/partidas/{{ $proyecto->id }}">Partidas</a></li>
              </ul>
           </div>

           <div class="panel-body">
              <h3>Investigadores asignados por las sedes</h3>
              <br>
             <div class="table-responsive">
                <table id="idTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Sede</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Grado</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($investigadores as $investigador)
                        <tr>
                          <td>{{ $investigador->sede }}</td>
                          <td>{{ $investigador->nombre }}</td>
                          <td>{{ $investigador->correo }}</td>
                          <td>{{ $investigador->grado }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $investigadores->links() }}
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection