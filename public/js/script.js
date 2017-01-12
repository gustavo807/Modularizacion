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


      // TOOLTIP
      $('[title]').tooltip({placement: "left"});
      $('.ion-edit').tooltip({title: "Editar", placement: "left"});
      $('.ion-trash-b').tooltip({title: "Eliminar", placement: "left"});
      $('.float').tooltip({title: "Agregar", placement: "left"});



      function stripTrailingSlash(str) {
          if(str.substr(-1) == '/') {
            return str.substr(0, str.length - 1);
          }
          else{
            var n = str.indexOf("/",1);
            if (n != -1) {
              var cad = str.substr(0,n);
              return cad;
            }
            else
            return str;
          }
        }

        var url = window.location.pathname;
        var activePage = stripTrailingSlash(url);

        $('.sidebar-menu a').each(function(){
          var currentPage = stripTrailingSlash($(this).attr('href'));

          if (activePage == currentPage) {
            $('#urlempresa').removeClass('active');
            $('#principal').removeClass('active');
            $(this).parent().addClass('active');
            $(this).closest('.treeview').addClass('active');
          }
        });



      // ALERT EXCEL
      $('.exceld').on('click', function (e) {
          href = $(this).attr("href");
          e.preventDefault();
          bootbox.confirm({
              title: "Confirmar",
              message: "Estas seguro de descargar la informacion? <br> Esto podría tardar unos segundos. <br><br> ",
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
                  }
              }
          });
        });


$('.svalor').change(function(evt) {
    vform = $(this).data('form');
    var route = "/empresamodulognrl/"+vform;
    var token = $('meta[name="csrf-token"]').attr('content');
    var valor = $( this ).val();  
    
    if (valor.trim().length < 1)    
      alert('campo requerido');
    else    
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        method: 'GET',
        dataType: 'json',
        data:{valor: valor}
      });

});


$('.sopcion').change(function(evt) {
    vform = $(this).data('form');
    var route = "/empresaproyecto/"+vform+"";
    var token = $('meta[name="csrf-token"]').attr('content');
    var valor = $( this ).val();  
    var pregunta = $(this).data('pregunta');
    
    //alert(route);

    if (valor.trim().length < 1)    
      alert('campo requerido');
    else    
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        method: 'PUT',
        dataType: 'json',
        data:{evariable_id: valor, pregunta_id:pregunta }
      });

});



$('.sevalor').change(function(evt) {
    vform = $(this).data('form');
    var empresa = $('meta[name="empresa"]').attr('content');
    var route = "/amodulognrl/empresa/"+empresa+"/editpregunta/"+vform;
    var token = $('meta[name="csrf-token"]').attr('content');
    var valor = $( this ).val();  
    //alert(route);
    if (valor.trim().length < 1)    
      alert('campo requerido');
    else    
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        method: 'PUT',
        dataType: 'json',
        data:{valor: valor}
      });

});


$('.seopcion').change(function(evt) {
    vform = $(this).data('form');
    var route = "/proyectomodulos/"+vform+"";
    var token = $('meta[name="csrf-token"]').attr('content');
    var valor = $( this ).val();  
    var pregunta = $(this).data('pregunta');
    
    //alert(route);

    if (valor.trim().length < 1)    
      alert('campo requerido');
    else    
      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        method: 'PUT',
        dataType: 'json',
        data:{evariable_id: valor, pregunta_id:pregunta }
      });

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
