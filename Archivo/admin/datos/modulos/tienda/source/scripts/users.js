  $(document).ready(function () {
  $('.usuariospt').click(function(){
  var id = $(this).attr('id');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url: list_urls()+list_action()+"usuariospt",
  data: dato_id,
  success: function(data) {
  $('.usuariospt'+id).html(data);
  alertexito("Los cambios se guardaron con exito.");
  }
  });
  });

  $('.usuario_eliminar').click(function(){
  var id = $(this).attr('id');
  let dt = $(this).attr('data_rt');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url:list_urls()+list_action()+"eliminar_usuario",
  data: dato_id,
  success: function(data) {
  $('#userdels'+id).addClass("eliminando");
  $('#userdels'+id).slideUp(600);
   alertexito(data);
    }
  });
  }); 

});