@extends('mails.mail_master')
@section('title', 'Registro en AliveTech')

@section('content')
  <header id="main-header" class="header">

  <div class="hero-text-box">

      <h1>¡Gracias por su registro en el sistema de Alive Tech!</h1>

      <a href='{{ url("register/confirm/{$user->token}") }}' class="btn btn-ghost">Activar Cuenta</a>

  </div>
 </header>

@endsection
