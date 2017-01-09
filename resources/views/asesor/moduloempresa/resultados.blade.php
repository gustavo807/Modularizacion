@extends('asesor.cuerpo')
@section('htmlheader_title') Home @endsection
@section('contentheader_title') {{ $empresa->nombre }} @endsection
@section('contentheader_description') @endsection

@section('main-content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs nav-justified">
						<li><a href="/amodulognrl/empresa/{{ $empresa->id }}"><strong>Cuestionario de evaluación de competitividad</strong></a></li>
						<li class="active"><a href="#">Resultados</a></li>
					</ul>
				</div>

				<div class="panel-body">
					
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th colspan="3"> EVALUACIÓN DE LA COMPETITIVIDAD </th>
						</thead>
						<tbody>
							<tr>
								<th></th>
								<th></th>
								<th>NIVEL DE COMPETITIVIDAD</th>
							</tr>
							@foreach($array1 as $key)
							<tr>
								<td>{{ $key['variable'] }}</td>
								<td>{{ $key['promedio'] }}</td>
								<th>{{ $key['nivel'] }}</th>
							</tr>
							@endforeach
							<tr>
								<th> PROMEDIO TOTAL </th>
								<td> {{ (int) (array_sum($data1)/count($data1)) }} </td>
								<th> {{ $promedio1 }} </th>
							</tr>
						</tbody>
					</table>

					<canvas id="myChart" ></canvas>

					<br><br><br><br>

					<table class="table table-bordered table-striped table-hover">
						<thead>
							<th colspan="3"> EVALUACIÓN DE EMPRENDIMIENTO DE ALTO IMPACTO </th>
						</thead>
						<tbody>
							<tr>
								<th></th>
								<th></th>
								<th>NIVEL DE EMPRENDIMIENTO DE ALTO IMPACTO</th>
							</tr>
							@foreach($array2 as $key)
							<tr>
								<td width="55%">
									{{ $key['variable'] }}
								</td>
								<td>
									{{ $key['promedio'] }}
								</td>
								<th>
									{{ $key['nivel'] }}
								</th>
							</tr>
							@endforeach
							<tr>
								<th> PROMEDIO TOTAL </th>
								<td> {{ (int) (array_sum($data2)/count($data2)) }} </td>
								<th> {{ $promedio2 }} </th>
							</tr>
						</tbody>
					</table>


					<canvas id="myRadar" ></canvas>


				</div>

			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <script>
    	var ctx = document.getElementById("myChart");    	
		var myChart = new Chart(ctx, {
		  type: 'radar',
		  data: {
		    labels:  [
			    		 @foreach($variable1 as $value)
			    		 	"{{ $value }}",
			    		 @endforeach
		    		 ],
		    datasets: [{
		      label: 'EVALUACIÓN DE LA COMPETITIVIDAD',
		      backgroundColor: "rgba(102,45,145,.1)",
		      borderColor: "rgba(102,45,145,1)",
		      data: [
		      			@foreach($data1 as $val)
			    		 	"{{ $val }}",
			    		 @endforeach	
		      		]
		    }]
		  },
		options: {
            scale: {
                ticks: {
                    max: 10,
                    min: 0,
                    maxTicksLimit: 5,
                }
            }
    	}
		});

		//Second Radar
		var ctx2 = document.getElementById("myRadar");    	
		var myChart2 = new Chart(ctx2, {
		  type: 'radar',
		  data: {
		    labels:  [
			    		 @foreach($variable2 as $value)
			    		 	"{{ $value }}",
			    		 @endforeach
		    		 ],
		    datasets: [{
		      label: 'EVALUACIÓN DE EMPRENDIMIENTO DE ALTO IMPACTO',
		      backgroundColor: "rgba(63,169,245,.1)",
		      borderColor: "rgba(63,169,245,1)",
		      data: [
		      			@foreach($data2 as $val)
			    		 	"{{ $val }}",
			    		 @endforeach	
		      		]
		    }]
		  },
		options: {
            scale: {
                ticks: {
                    max: 10,
                    min: 0,
                    maxTicksLimit: 5,
                }
            }
    	}
		});
    </script>
@endpush
