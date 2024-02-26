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


$('.nuevousuarios').click(function(){
var idl = i++;
  if($("#sucursal_selected_users").val()=="0"){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Selecciona una sucursal.</p>");   
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($("input[name='optionlog']:checked").val()==null){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Selecciona el tipo de usuario.</p>");   
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#dni').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe el dni.</p>");   
    $("#dni").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if ($('#nombre').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe un nombre </p>");
    $("#nombre").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#apellido').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe el apellido.</p>");   
    $("#apellido").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#celular').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe un numero de celular.</p>");   
    $("#celular").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#direccion').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe una direccion.</p>");   
    $("#direccion").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#correo').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'>Escribe el correo electronico.</p>");   
    $("#correo").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else if($('#pass').val()==""){
    $(".message").html("<p id='rem"+idl+"' class='mens advertencia'> Escribe la contrase&ntilde;a</p>");   
    $("#pass").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
    }, 500);
    }, 6000);
  }else{
 $.ajax({
  type: "POST",
  url:list_urls()+list_action()+"agregar_usuario",
  data:{"linedefault":$("input[name='optionlog']:checked").val(),"sucursal":$("#sucursal_selected_users").val(),"nombre":$('#nombre').val(),"apellido":$('#apellido').val(),"dni":$('#dni').val(),"celular":$('#celular').val(),"direccion":$('#direccion').val(),"correo":$('#correo').val(),"pass":$('#pass').val()},
  success: function(data) {
    $(".message").html("<p id='rem"+idl+"' class='mens exitos'>"+data+"</p>");   
    $("#nom_90").focus();
    $(".mens").addClass("mensn");
    window.setTimeout(function(){
      $("#rem"+idl).addClass("remove_mens");
      setTimeout(function(){
      $("#rem"+idl).remove();
      window.location = "usuarios";
    }, 500);
    }, 1000);
    }
  });
}
  }); 




});