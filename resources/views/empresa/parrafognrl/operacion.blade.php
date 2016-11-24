@php
  $arr1;
  $arr2;
  foreach ($claves_2 as $clave) {
    $arr1[] = $clave->identificador;
    $arr2[] = $clave->valor;
  }
@endphp


@include('empresa.parrafognrl.operacion')
