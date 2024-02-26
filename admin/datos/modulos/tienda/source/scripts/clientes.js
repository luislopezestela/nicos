$(document).ready(function () {
  $(document).on("click", "input[name='optionlog']:checked", function(){
    if($("input[name='optionlog']:checked").val()==2){
      $(".sucursal_type_users").addClass("view_sucursales");
      $(".sucursal_type_users").removeClass("none_sucursales");
      $("#sucursal_selected_users_option").val("0");
    }else{
      $(".sucursal_type_users").addClass("none_sucursales");
      $(".sucursal_type_users").removeClass("view_sucursales");
      $("#sucursal_selected_users_option").val("nd");
    }
  })

  $('.new_client_in_page').click(function(){
    if($("input[name='optionlog']:checked").val()==null){
      alertadvertencia("Selecciona el tipo de usuario.");
      $("input[name='optionlog']").focus();
    }else if($('#dni').val()==""){
      alertadvertencia("Escribe el dni.");
      $("#dni").focus();
    }else if ($('#nombre').val()==""){
      alertadvertencia("Escribe un nombre.");
      $("#nombre").focus();
    }else if($('#apellido_p').val()==""){
      alertadvertencia("Escribe el apellido paterno.");
      $("#apellido_p").focus();
    }else if($('#apellido_m').val()==""){
      alertadvertencia("Escribe el apellido materno.");
      $("#apellido_m").focus();
    }else if($('#celular').val()==""){
      alertadvertencia("Escribe un numero de celular."); 
      $("#celular").focus();
    }else if($('#direccion').val()==""){
      alertadvertencia("Escribe una direccion.");
      $("#direccion").focus();
    }else if($('#correo').val()==""){
      alertadvertencia("Escribe el correo electronico.");
      $("#correo").focus();
    }else if($('#pass').val()==""){
      alertadvertencia("Escribe la contrase&ntilde;a");
      $("#pass").focus();
    }else{
      $.ajax({
        type: "POST",
        url:list_urls()+list_action()+"agregar_cliente_new",
        dataType:"json",
        data:{"linedefault":$("input[name='optionlog']:checked").val(),"nombre":$('#nombre').val(),"apellido_paterno":$('#apellido_p').val(),"apellido_materno":$('#apellido_m').val(),"dni":$('#dni').val(),"celular":$('#celular').val(),"direccion":$('#direccion').val(),"correo":$('#correo').val(),"pass":$('#pass').val()},
        success: function(data){
          if (data.estado==1){
            alertexito(data.mensaje);
            $('input').val('');
            $('input').prop('checked', false)
          }else{
            alertadvertencia(data.mensaje);
          }
        }
      });
    }
  });

$('.update_client_in_pages').click(function(){
  var aps = $(this).attr("data_conf");
    if($("input[name='optionlog']:checked").val()==null){
      alertadvertencia("Selecciona el tipo de usuario.");
      $("input[name='optionlog']").focus();
    }else if($('#dni').val()==""){
      alertadvertencia("Escribe el dni.");
      $("#dni").focus();
    }else if ($('#nombre').val()==""){
      alertadvertencia("Escribe un nombre.");
      $("#nombre").focus();
    }else if($('#apellido_p').val()==""){
      alertadvertencia("Escribe el apellido paterno.");
      $("#apellido_p").focus();
    }else if($('#apellido_m').val()==""){
      alertadvertencia("Escribe el apellido materno.");
      $("#apellido_m").focus();
    }else if($('#celular').val()==""){
      alertadvertencia("Escribe un numero de celular."); 
      $("#celular").focus();
    }else if($('#direccion').val()==""){
      alertadvertencia("Escribe una direccion.");
      $("#direccion").focus();
    }else if($('#correo').val()==""){
      alertadvertencia("Escribe el correo electronico.");
      $("#correo").focus();
    }else{
      $.ajax({
        type: "POST",
        url:list_urls()+list_action()+"update_cliente_new",
        dataType:"json",
        data:{id:aps,"linedefault":$("input[name='optionlog']:checked").val(),"nombre":$('#nombre').val(),"apellido_paterno":$('#apellido_p').val(),"apellido_materno":$('#apellido_m').val(),"dni":$('#dni').val(),"celular":$('#celular').val(),"direccion":$('#direccion').val(),"correo":$('#correo').val(),"pass":$('#pass').val()},
        success: function(data){
          if (data.estado==1){
            alertexito(data.mensaje);
          }else{
            alertadvertencia(data.mensaje);
          }
        }
      });
    }
  });

  ///delete
  $(document).on('click', ".delete_client_in_pages", function(){
    var datds = $(this).attr("data-config");
    alerta_confirm("eliminar_cliente",datds);
  })
});
