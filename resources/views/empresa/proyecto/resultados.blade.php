@extends('empresa.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $proyecto->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs nav-justified">
						<li><a href="/empresaproyecto/preguntas/{{ $proyecto->id }}"><strong>Cuestionario de evaluación de riesgo</strong></a></li>
						<li class="active"><a href="#">Resultados</a></li>
					</ul>
				</div>

				<div class="panel-body">

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th colspan="3"> RIESGO DEL PROYECTO </th>
						</thead>
						<tbody>
							<tr>
								<th>Variables</th>
								<th>Score</th>
								<th>NIVEL DE RIESGO</th>
							</tr>
							@foreach($array as $key)
							<tr>
								<td>{{ $key['variable'] }}</td>
								<td>{{ (int)$key['promedio'] }}%</td>
								<th>{{ $key['nivel'] }}</th>
							</tr>
							@endforeach
						</tbody>
					</table>


					<canvas id="myRadar"></canvas>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script>
    	var ctx = document.getElementById("myRadar");    	
		var myRadar = new Chart(ctx, {
		  type: 'radar',
		  data: {
		    labels:  [
			    		 @foreach($variable as $value)
			    		 	"{{ $value }}",
			    		 @endforeach
		    		 ],
		    datasets: [{
		      label: 'RIESGO DEL PROYECTO',
		      backgroundColor: "rgba(102,45,145,.1)",
		      borderColor: "rgba(102,45,145,1)",
		      data: [
		      			@foreach($data as $val)
			    		 	"{{ $val }}",
			    		 @endforeach	
		      		]
		    }]
		  },
		options: {
            scale: {
                ticks: {
                    max: 100,
                    min: 0,
                    maxTicksLimit: 5,
                }
            }
    	}
		});
		
    </script>
@endpush
