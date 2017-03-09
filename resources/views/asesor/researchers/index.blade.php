@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Investigadores @endsection
@section('contentheader_description')  @endsection

@push('stylesheet')
	<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">	
@endpush

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Investigadores</div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/investigadores/create" class="float"> <i class="fa fa-plus my-float"></i> </a>
						<table id="idTable" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Sede</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Grado</th>
									<th>Campo</th>
									<th>SNI</th>
									<th>Action</th>
								</tr>
							</thead>								
				    	</table>
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
 			$('#idTable').DataTable( {
 				"processing": true,
 				"serverSide": true,
 				"ajax": "/api/investigadores",
 				"columns":[
 				{data: "sede", searchable:false},
 				{data: "nombre",
 					render:  function(data, type, row, meta)
			        				{
			        					return '<strong>'+data+' '+row.apellidopaterno+' '+row.apellidomaterno+'</strong>';
			        				}
 				},
 				{data: "correo"},
 				{data: "grado"},
 				{data: "campo"},
 				{data: "sni"},
 				{data: "id", searchable:false,sortable:false,
 					render:  function ( data, type, row, meta )
			        				{
			        					return '<a href="/investigadores/'+data+'/edit" class="ion-edit icon-big"></a>';
			        				}
 				}
 				],
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

 			} );
 		});


 	</script>

@endpush