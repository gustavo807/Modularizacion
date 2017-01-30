@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Categorías @endsection
@section('contentheader_description') Documentos @endsection

@push('stylesheet')
	<link href="{{ asset('/css/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">	
@endpush

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Categorías</div>

						<div class="panel-body">
									@include('alerts.success')
									<a href="/asesorcategoria/create" class="float">	<i class="fa fa-plus my-float"></i>	</a>

									<div class="table-responsive">
										<table id="categoriaTable" class="table table-bordered table-striped table-hover">
										        <thead>
										            <tr>
										            	<th>Categoría</th>
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
 			$('#categoriaTable').DataTable( {
 				"processing": true,
 				"serverSide": true,
 				"ajax": "/api/asesorcategoria",
 				"columns":[
 				{data: "categoria",
 					render:  function(data, type, row, meta)
			        				{
			        					return '<strong>'+data+'</strong>';
			        				}
 				},
 				{data: "id", searchable:false,sortable:false,
 					render:  function ( data, type, row, meta )
			        				{
			        					return '<a href="/asesorcategria/'+data+'/edit" class="ion-edit icon-big" title="Editar"></a>';
			        				}
 				}
 				]

 			} );
 		});


 	</script>

@endpush