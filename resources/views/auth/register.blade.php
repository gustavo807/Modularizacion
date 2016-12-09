@extends('layouts.auth')

@section('htmlheader_title')
    Registro
@endsection

@section('content')

    <body class="hold-transition register-page">



    <div class="register-box">
      @if (count($errors)>0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors ->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session()->has('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
      @endif

        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>Alive</b>Tech</a>
        </div>


        <div class="register-box-body">
            <p class="login-box-msg">Registrar nuevo usuario</p>
            <form action="{{ url('/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.fullname') }}" name="name" value="{{ old('name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <!--
                <div class="form-group has-feedback">
                    <input type="radio" class="form-control"  name="tipo" value="1" />
                    <span class="">Empresa</span>
                </div>
                <div class="form-group has-feedback">
                    <input type="radio" class="form-control"  name="tipo" value="2" />
                    <span class="">Centros de Investigación y Universidades</span>
                </div>
                !!Form::text('activo','true',['id'=>'activo','style'=>'display:none;'])!!

                -->


                <div class="row">
                    <div class="col-xs-1">
                        <label>
                            <div class="checkbox_register icheck">
                                <label>
                                    <input type="checkbox" name="terminos">
                                </label>
                            </div>
                        </label>
                    </div><!-- /.col -->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Política de privacidad</button>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4 col-xs-push-1">
                        <button type="submit" class="c">{{ trans('adminlte_lang::message.register') }}</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    @include('layouts.partials.scripts_auth')

    @include('auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
