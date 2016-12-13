@extends('mails.mail_master')
@section('title', 'Cuestionarios de Prospección')

@section('content')
  <header id="main-header" class="header">

  <div class="hero-text-box">

      <h1>¡Hay un nuevo cuestionario de prospección registrado!</h1>
      <a href='{{ url("/cuestionarios") }}' class="btn btn-ghost">Descargalos Aquí</a>

  </div>
 </header>

@endsection
