$(function () {
  $('.data-delete').on('click', function (e) {
    vform = $(this).data('form');
    e.preventDefault();
    bootbox.confirm({
        title: "Alert!",
        message: "ESTAS SEGURO DE ELIMINAR? <br> TODA LA INFORMACION SE PERDERA. <br><br> ",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancelar'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Confirmar'
            }
        },
        callback: function (result) {
            if(result)
            {
              $('#form-delete-' + vform ).submit();

              bootbox.dialog({
                  message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
                  closeButton: false
              });
            }
        }
    });

    //if (!confirm('Estas seguro de eliminar?')) return;
    //$('#form-delete-' + $(this).data('form')).submit();
  });

  $("#state").change(event => {
	$.get(`/ciudades/${event.target.value}`, function(res, sta){
		$("#ciudad_id").empty();
		res.forEach(element => {
			$("#ciudad_id").append(`<option value=${element.id}> ${element.ciudad} </option>`);
  		});
  	});
  });

  $('.myfile').change(function(evt) {
    varform = $(this).data('form');
    evt.preventDefault();
      bootbox.confirm({
          title: "Alert!",
          message: "ESTAS SEGURO DE ENVIAR? <br>  <br><br> ",
          buttons: {
              cancel: {
                  label: '<i class="fa fa-times"></i> Cancelar'
              },
              confirm: {
                  label: '<i class="fa fa-check"></i> Confirmar'
              }
          },
          callback: function (result) {
              if(result)
              {
                $('#form-add-' + varform ).submit();

                bootbox.dialog({
                    message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
                    closeButton: false
                });
              }
          }
      });
        //if (!confirm('Estas seguro de enviar?')) return;

        //$('#form-add-' + $(this).data('form')).submit();
    });


    $('img').each(function(){
      $(this).click(function(){
        $( "#descripcion" ).text( $(this).attr('descripcion') );
        $( "#referencia" ).text( $(this).attr('referencia') );
        $( "#imgmodal" ).attr('src', $(this).attr('src') );
        $("#myModal").modal();
      })
    });

    setTimeout(function() {
        $(".desaparece").fadeOut();
    },3000);


    $('.data-confirm').on('click', function (e) {
      form = $(this).data('form');
      e.stopImmediatePropagation();
      bootbox.confirm({
          title: "Alert!",
          message: "ESTAS SEGURO DE ESTA ACCION? <br>  <br><br> ",
          buttons: {
              cancel: {
                  label: '<i class="fa fa-times"></i> Cancelar'
              },
              confirm: {
                  label: '<i class="fa fa-check"></i> Confirmar'
              }
          },
          callback: function (result) {
              if(result)
              {
                $('#form-confirm-' + form ).submit();

                bootbox.dialog({
                    message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
                    closeButton: false
                });
              }
          }
      });

      //if (!confirm('Estas seguro de esta accion?')) return false;

      //$('#form-confirm-' + $(this).data('form')).submit();
    });


    $('.imgresumen').each(function(){
      $(this).click(function(){
        $( "#imgmodal" ).attr('src', $(this).attr('src') );
        $("#myModal").modal();
      })
    });


    // ALERT PARA COPIAR INFORMACION DE LA EMPRESA
      $('.copyempresa').on('click', function (e) {
        href = $(this).attr('href');
        e.preventDefault();
        bootbox.confirm({
            title: "Alert!",
            message: "ESTAS SEGURO DE COPIAR? <br> TODA LA INFORMACION ALMACENADA PREVIAMENTE POR LOS ASESORES SE BORRARA. <br><br> ",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirmar'
                }
            },
            callback: function (result) {
                if(result)
                {
                  window.location = href;

                  bootbox.dialog({
                      message: '<p class="text-center"><i class="fa fa-spin ion-load-a "></i> Please wait while we do something...</p>',
                      closeButton: false
                  });
                }
            }
        }); //window.location = $('.copyempresa').attr('href')
        //if (!confirm('ESTAS SEGURO DE COPIAR, TODA LA INFORMACION ALMACENADA PREVIAMENTE DE ESTA EMPRESA SE BORRARA?')) return false;

        //$('#form-delete-' + $(this).data('form')).submit();
      });

});

/*
$('#myModal').modal()
  .one('click', '#aceptar', function (e) {
    alert('nin');
    $('#form-confirm-' + $(this).data('form')).submit();
  });
*/


/*
$('.myfile').change(function(evt) {
  varform = ('#form-add-' + $(this).data('form'));
      if (!confirm('Estas seguro de enviar?')) return;
      evt.preventDefault();
      $('#form-add-' + $(this).data('form')).submit();
  });


  // HABILITAR O DESACTIVAR EMPRESA
  $('.data-confirm').on('click', function (e) {
    if (!confirm('Estas seguro de esta accion?')) return false;
    e.stopImmediatePropagation();
    $('#form-confirm-' + $(this).data('form')).submit();
  });

  // ELIMINAR ELEMENTOS
  $('.data-delete').on('click', function (e) {
    if (!confirm('Estas seguro de eliminar?')) return;
    e.preventDefault();
    $('#form-delete-' + $(this).data('form')).submit();
  });
*/
