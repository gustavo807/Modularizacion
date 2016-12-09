@section('register')
  <div class="login-box-body">
  <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
  <form action="{{ url('/logueo') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
          <div class="col-xs-8">
              <div class="checkbox icheck">
                  <label>
                      <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                  </label>
              </div>
          </div><!-- /.col -->
          <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
          </div><!-- /.col -->
      </div>
  </form>



  <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>
  <a href="{{ url('/register') }}" class="text-center">No estoy registrado</a>

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->

@endsection
