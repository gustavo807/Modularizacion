@extends('mails.mail_master')
@section('title', 'Registro en AliveTech')

@section('content')
  <header id="main-header" class="header">

  <div class="hero-text-box">

      <p>Estas recibiendo este mensaje porque recibimos una solicitud para restablecer tu password</p><br>

      <a href="{{ url('password/reset/'.$token) }} " class="btn btn-ghost">Restablecer mi password</a>

      <p>ó copia y pega este enlace en tu navegador:</p>
      <a href="{{ url('password/reset/'.$token) }}" class="btn btn-ghost">{{ url('password/reset/'.$token) }}</a>
      <p>Si tu no solicitaste un cambio de contraseña, ignora este mensaje.</p>
  </div>
 </header>

@endsection
