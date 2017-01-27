@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') Empresas @endsection
@section('contentheader_description')  @endsection

@push('stylesheet')
	<!-- 
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
	-->
	<link href="{{ asset('/css/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">	
@endpush

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Empresas</div>

				<div class="panel-body">
					@include('alerts.success')
					
					<div class="table-responsive">
						<table id="myTable" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Email</th>
									<th>Avance</th>
									<th>Editar</th>
									<th>Empresa</th>
									<th>Asesor</th>
									<th>Estado</th>
									<th>Copiar</th>
								</tr>
							</thead>
						</table>
						<br><br>
					</div>
					
				</div>

			</div>
		</div>
	</div>
</div>
@endsection


@push('scripts')
	<!--
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	 -->
	<script src="{{ asset('/js/bootstrap-toggle.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
 	<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>

 	<script>
 		$(document).ready(function(){
		    $('#myTable').DataTable( {
			        "processing": true,
			        "serverSide": true,
			        "ajax": "/api/empresas",
			        "columns":[
			        	{data: 'nombre',
			        		render:  function(data, type, row, meta)
			        				{
			        					return '<a href="/asesorempresa/'+row.id+'"><strong>'+row.nombre+'</strong></a>';
			        				}			        		
			        	},
			        	{data: 'email'},
			        	{data: 'modulo', searchable:false,
			        		render:  function ( data, type, row, meta )
			        				{
			        					return row.modulo+'/{{ $modulos }}';
			        				}
			        	},
			        	{data: 'id', searchable:false,sortable:false,
			        		render:  function ( data, type, row, meta )
			        				{
			        					return $('<a>')
						                    .attr('href', "/asesorempresa/perfil/"+data)
						                    .attr('class', "ion-edit icon-big")
						                    .wrap('<div></div>')
						                    .parent()
						                    .html();
			        					//return '<a href="/asesorempresa/perfil/'+data+'" class="ion-edit icon-big"></a>';
			        				}
			        	},
			        	{
			        		data:  function ( row, type, val, meta )
			        				{
			        					return '<a href="/informaciognrl/'+row.id+'/user/empresa" class="ion-ios-paper icon-big" title="Información General" title="Información General"></a>';
			        				}
			        		,searchable:false,sortable:false
			        	},
			        	{
			        		data:  function ( row, type, val, meta )
			        				{
			        					return '<a href="/informaciognrl/'+row.id+'/user/asesor" class="ion-ios-paper icon-big" title="Información General" title="Información General"></a>';
			        				}
			        		,searchable:false,sortable:false
			        	},
			        	{data: 'activo', searchable:false,sortable:false,
			        		render:  function ( data, type, row, meta )
			        				{
			        					var cheked = "";
			        					if(data == 1) cheked = "checked";

			        					return '<form method="POST" action="/asesorempresa/'+row.id+'" accept-charset="UTF-8" id="form-confirm-empresa-'+row.id+'">'+'<input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="{{ csrf_token() }}">'+'<div class="data-confirm" data-form="empresa-'+row.id+'" title="Habilitar - Deshabilitar" >'+'<input class="toggle-demo" type="checkbox" '+cheked+' data-toggle="toggle" data-on="On" data-off="Off"  data-size="small"  >'+'</div> </form>';
			        					//return '<input type="checkbox" checked data-toggle="toggle">';
			        				}
			        	},
			        	{data: 'id', searchable:false,sortable:false,
			        		render:  function ( data, type, row, meta )
			        				{
			        					return $('<a>')
						                    .attr('href', "/copyempresa/"+data)
						                    .attr('class', "ion-ios-browsers icon-big copyempresa")
						                    .attr('title', "Copiar módulos de esta empresa")
						                    .wrap('<div></div>')
						                    .parent()
						                    .html();
			        				}
			        	},
			        ],
			        "fnDrawCallback": function() {
			            $('.toggle-demo').bootstrapToggle();


			            $('.copyempresa').on('click', function (e) {
					        href = $(this).attr('href');
					        e.preventDefault();
					        bootbox.confirm({
					            title: "Alert!",
					            message: "ESTAS SEGURO DE COPIAR? <br> TODA LA INFORMACION ALMACENADA PREVIAMENTE POR LOS ASESORES SE BORRARA. <br><br> ",
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




			            $('.data-confirm').on('click', function (e) {
						      form = $(this).data('form');
						      e.stopImmediatePropagation();
						      bootbox.confirm({
						          title: "Alert!",
						          message: "ESTAS SEGURO DE ESTA ACCION? <br>  <br><br> ",
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
						                $('#form-confirm-' + form ).submit();

						                bootbox.dialog({
						                    message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
						                    closeButton: false
						                });
						              }
						          }
						      });
						    });
			        },
			    } );
		});

		
 	</script>
@endpush



