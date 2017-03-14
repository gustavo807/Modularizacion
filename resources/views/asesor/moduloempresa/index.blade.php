@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') Módulos Generales @endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-tabs nav-justified">
              <li><a href="/asesorempresa/{{$empresa->id}}">Proyectos</a></li>
              <li class="active"><a href="#"><strong>Módulos Generales</strong></a></li>
							<li><a href="/documentosempresa/{{$empresa->id}}">Documentos</a></li>
            </ul>
					</div>

						<div class="panel-body">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              @include('alerts.success')
              <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                          <th>Módulo</th>
                          <th width="150px">Estado</th>
                          <th width="150px">Módulos revisados por el asesor</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($modulos->firstItem() == $modulos->currentPage())
                      <tr>
                        <th>
                        {!! link_to('/amodulognrl/empresa/'.$empresa->id, $title = 'Cuestionario de evaluación de competitividad') !!}
                        </th>
                        <td>
                          @if ($status == "true")
                            <strong>Completo</strong>
                          @else
                            Por llenar
                          @endif
                        </td>
                        <td></td>
                      </tr>
                      @endif
                    @foreach($modulos as $modulo)
                      <tr>
                       <th>
                           {!! link_to('amodulognrl/'.$modulo->id .'/empresa/'.$empresa->id, $title = $modulo->modulo) !!}
                       </th>
                        <td>
                          @if ($modulo->completo)
                            <strong>Completo</strong>
                          @else
                            Por llenar
                          @endif
                        </td>
                        <td>
                          @php
                            $boolean=false;
                            $value='0';
                            if($editados->contains($modulo->id))
                            {
                              $boolean=true;
                              $value='1';
                            }
                          @endphp

                          {{ Form::checkbox('editado', $value,$boolean,['class'=>'editado','data-modulo_id'=>$modulo->id]) }}
                        </td>
                     </tr>
                    @endforeach

                    </tbody>
              </table>
              </div>
              {{ $modulos->links() }}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
  <script>
    $('.editado').change(function(evt) {
      var empresa_id = {{ $empresa->id }};
      var modulo_id = $(this).data('modulo_id');
      var route = "/amodulognrl/"+empresa_id+"/revisado/"+modulo_id;
      var token = $('meta[name="csrf-token"]').attr('content');
      var value = $( this ).val();  
      
      $.ajax({
            url: route,
            headers: {'X-CSRF-TOKEN': token},
            method: 'POST',
            dataType: 'json',
            data:{value: value}
        });
    });
  </script>
@endpush
