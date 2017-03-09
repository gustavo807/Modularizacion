<table class="table table-bordered table-hover table-striped">
	<thead>
		<th>Clave</th>
		<th>Valor</th>
	</thead>
	<tbody>
		@foreach($claves as $clave)
			<tr>
				<td>{{ $clave->nombre }}</td>
				<td>{{ $clave->valor }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
{{ $claves->links() }}