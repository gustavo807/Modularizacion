$(".formulario").submit(function () {
  var bandera = false;
    $('.txtvalor').each(function(){
       if($(this).val().trim().length < 1 && !bandera) {
           bandera = true;
       }
    });

    if (bandera) {
      $(".msjerror").fadeIn();
      return false;
    }

    return true;
});


$(".formparrafo").submit(function () {
    var bandera=true;
    if( !$("input[name=parrafo]:radio").is(':checked') ){
        $( ".livalida" ).text( 'Selecciona un parrafo' );
        $(".msjerror").fadeIn();
        bandera = false;
    }
    return bandera;
});


$(".formimagen").submit(function () {
    var bandera=true;
    if( !$("input[name=imagen]:radio").is(':checked') ){
        $( ".livalida" ).text( 'Selecciona una imagen' );
        $(".msjerror").fadeIn();
        bandera = false;
    }
    return bandera;
});
