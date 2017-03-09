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
            @include('alerts.success')
             <div class="table-responsive">
                <table id="proyectoTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Empresa</th>
                            <th>Proyecto</th>
                            <th>Convocatoria</th>
                            <th>Avance</th>
                            <th>Fecha Asignado</th>
                            <th>Sedes</th>
                            <th>Copiar</th>
                            <th>Action</th>
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
            {data: 'estado'},
            {data: 'ciudad'},
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
            {data: 'created_at'},
            {data: 'id', searchable:false, sortable:false,
                  render:  function(data, type, row, meta)
                      {
                        return '<a href="/aproyectosgnrl/sedes/'+data+'" class="fa fa-bank icon-big" title="Editar"></a>';
                      }
            },
            {data: 'id', searchable:false,sortable:false,
                  render:  function ( data, type, row, meta )
                      {
                        return $('<a>')
                                .attr('href', "/copyproyecto/"+data)
                                .attr('class', "ion-ios-browsers icon-big copyproyecto")
                                .attr('title', "Copiar módulos de esta empresa")
                                .wrap('<div></div>')
                                .parent()
                                .html();
                      }
            },
            {data: 'id', searchable:false, sortable:false,
                  render:  function(data, type, row, meta)
                      {
                        return '<a href="/aproyectosgnrl/'+data+'" class="ion-edit icon-big" title="Editar"></a>';
                      }
            }
          ],
          "fnDrawCallback": function() {
              $('.copyproyecto').on('click', function (e) {
                  href = $(this).attr('href');
                  e.preventDefault();
                  bootbox.confirm({
                      title: "Confirmar!",
                      message: "Estas seguro de copiar? <br> Toda la información almacenada previamente por los asesores se borrara. <br><br> ",
                      buttons: {
                          cancel: {
                              label: '<i class="fa fa-times"></i> Cancelar'
                          },
                          confirm: {
                              label: '<i class="fa fa-check"></i> Confirmar'
                          }
                      },
                      callback: function (result) {
                          if(result)
                          {
                            window.location = href;

                            bootbox.dialog({
                                message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
                                closeButton: false
                            });
                          }
                      }
                  }); 
                });
          },
          "language":{
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
      });
    });
  </script>

@endpush