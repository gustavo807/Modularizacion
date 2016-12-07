@if(session('warning'))
  <div class="alert alert-warning alert-dismissible desaparece" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Warning!</strong> {{ session('warning') }}
  </div>
@endif
