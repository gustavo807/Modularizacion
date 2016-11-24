$(function () {
  $('.data-delete').on('click', function (e) {
    if (!confirm('Estas seguro de eliminar?')) return;
    e.preventDefault();
    $('#form-delete-' + $(this).data('form')).submit();
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
        if (!confirm('Estas seguro de enviar?')) return;
        evt.preventDefault();
        $('#form-add-' + $(this).data('form')).submit();
    });

});
