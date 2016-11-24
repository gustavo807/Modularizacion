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
