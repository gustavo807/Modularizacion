@if(session('info'))
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<ul>
				<li>{{ session('info') }}</li>
		</ul>
	</div>
@endif