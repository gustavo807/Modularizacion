@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Proyectos @endsection
@section('contentheader_description') Empresas @endsection

@push('stylesheet')
  <link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> 
@endpush

@section('main-content')
<div class="container spark-screen">
  <div class="row">
     <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
           <div class="panel-heading">Proyectos Empresas</div>

           <div class="panel-body">
             <div class="table-responsive">
                <table id="proyectoTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Proyecto</th>
                            <th>Convocatoria</th>
                            <th>Avance</th>
                            <th>Fecha Asignado</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection

@push('scripts')
  <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>

  <script>
    $(document).ready(function(){
      $('#proyectoTable').DataTable({ 
          "processing": true,
          "serverSide": true,
          "ajax": "/api/aproyectosgnrl",
          "columns":[
            {data: 'empresa', searchable:false,
                render:  function(data, type, row, meta)
                      {
                        return '<strong>'+data+'</strong>';
                      }
            },
            {data: 'nombre'},
            {data: 'convocatoria',searchable:false},
            {data: 'modulo', searchable:false,
                render:  function(data, type, row, meta)
                      {
                        return data+'/{{ $modulos }} Módulos';
                      }
            },
            {data: 'created_at'}
          ]
      });
    });
  </script>

@endpush