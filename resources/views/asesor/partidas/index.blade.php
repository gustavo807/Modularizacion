@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') Partidas @endsection
@section('contentheader_description')  @endsection

@push('stylesheet')
	<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">	
@endpush

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Partidas</div>

					<div class="panel-body">
						@include('alerts.success')
						<a href="/partidas/create" class="float"> <i class="fa fa-plus my-float"></i> </a>
						<table id="idTable" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Sede</th>
									<th>Descripción</th>
									<th>Precio</th>
									<th>Cambio</th>
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
 				"ajax": "/api/partidas",
 				"columns":[
 				{data: "sede", searchable:false},
 				{data: "descripcion"},
 				{data: "precio"},
 				{data: "cambio"},
 				{data: "id", searchable:false,sortable:false,
 					render:  function ( data, type, row, meta )
			        				{
			        					return '<a href="/partidas/'+data+'/edit" class="ion-edit icon-big"></a>';
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