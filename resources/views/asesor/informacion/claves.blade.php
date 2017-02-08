@extends('asesor.cuerpo')
@section('htmlheader_title')  @endsection
@section('contentheader_title') {{$empresa->nombre}} @endsection
@section('contentheader_description') Claves {{$user}} @endsection

@push('stylesheet')
  <link href="{{ asset('/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"> 
@endpush

@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#"><strong>Claves</strong></a></li>
              <li><a href="/{{$ruta}}/{{$id}}/user/{{$user}}">Párrafos e imágenes</a></li>
            </ul>
					</div>

						<div class="panel-body">
              <div class="table-responsive">
                <table id="clavesTable" class="table table-bordered table-striped table-hover">
                      <thead>
                          <tr>
                            <th>Nombre</th>
                            <th width="50%">Valor</th>
                            <th>Created_at</th>
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
      $('#clavesTable').DataTable({ 
          "processing": true,
          "serverSide": true,
          "ajax": "/api/asesorempresa/claves/{{ $id }}/user/{{ $user }}/tipo/{{ $tipo }}",
          "columns":[
            {data: 'nombre',
                render:  function(data, type, row, meta)
                      {
                        return '<strong>'+data+'</strong>';
                      }
            },
            {data: 'valor', searchable:false},
            {data: 'created_at', searchable:false, visible:false}
          ],
          "order": [[ 2, "asc" ]]
      });
    });
  </script>

@endpush