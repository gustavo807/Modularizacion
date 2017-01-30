@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Documentos @endsection
@section('contentheader_description')  @endsection

@push('stylesheet')
	<link href="{{ asset('/css/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">	
@endpush

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Documentos</div>

				<div class="panel-body">
					@include('alerts.success')
					<a href="/asesordocumentos/create" class="float">	<i class="fa fa-plus my-float"></i> </a>

					<div class="table-responsive">
						<table id="documentoTable" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Categoria</th>
									<th>Nombre</th>
									<th>Asignado</th>
									<th>Acción</th>
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
	<script src="{{ asset('/js/bootstrap-toggle.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
 	<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>

 	<script>
 		$(document).ready(function(){
 			$('#documentoTable').DataTable( {
 				"processing": true,
 				"serverSide": true,
 				"ajax": "/api/asesordocumentos",
 				"columns":[
 				{data: "categoria", searchable:false,
 					render:  function(data, type, row, meta)
			        				{
			        					return '<strong>'+data+'</strong>';
			        				}
 				},
 				{data: "nombre"},
 				{data: "rol",searchable:false},
 				{data: "id", searchable:false,sortable:false,
 					render:  function ( data, type, row, meta )
			        				{
			        					return '<a href="/asesordocumentos/'+data+'/edit" class="ion-edit icon-big" title="Editar"></a>';
			        				}
 				}
 				]

 			} );
 		});


 	</script>

@endpush