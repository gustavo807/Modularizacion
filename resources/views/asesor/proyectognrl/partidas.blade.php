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
                  <li><a href="/aproyectosgnrl/investigadores/{{ $proyecto->id }}">Investigadores</a></li>
                  <li class="active"><a href="#"><strong>Partidas</strong></a></li>
              </ul>
           </div>

           <div class="panel-body">
              <h3>Partidas seleccionadas por la empresa</h3>
              <br>
             <div class="table-responsive">
                <table id="idTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Sede</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Moneda</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($partidas as $partida)
                        <tr>
                          <td>{{ $partida->estado }}</td>
                          <td>{{ $partida->ciudad }}</td>
                          <td>{{ $partida->nombre }}</td>
                          <td>{{ $partida->descripcion }}</td>
                          <td>{{ $partida->precio }}</td>
                          <td>{{ $partida->cambio }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                {{ $partidas->links() }}
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection