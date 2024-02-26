$(document).ready(function () {


$('.agregarproveedor').click(function(){
  var idl = i++;
  let vh = $(".message").attr("btr");
  if($('#ruc').val()==""){
    alertadvertencia("Escribe el ruc");  
    $("#ruc").focus();
  }else if ($('#nombre').val()==""){
    alertadvertencia("Escribe los nombres");  
    $("#nombre").focus();
  }else if($('#celular').val()==""){
    alertadvertencia("Escribe numero de celular");
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
      url: list_urls()+list_action()+"agregarproveedor",
      data:{"nombre":$('#nombre').val(),"ruc":$('#ruc').val(),"celular":$('#celular').val(),"direccion":$('#direccion').val()},
      success: function(data) {
        alertexito(data);
        setTimeout(function(){
          document.location = list_urls()+"proveedores";
        }, 1000);
      }
    });
  }
});

$('.acctualizarproveedor').click(function(){
  var idl = i++;
  let vh = $(".message").attr("btr");
  if($('#ruc').val()==""){
    alertadvertencia("Escribe el ruc");  
    $("#ruc").focus();
  }else if ($('#nombre').val()==""){
    alertadvertencia("Escribe los nombres");  
    $("#nombre").focus();
  }else if($('#celular').val()==""){
    alertadvertencia("Escribe numero de celular");
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
      url: list_urls()+list_action()+"editarproveedor",
      data:{"id":$('#id').val(),"nombre":$('#nombre').val(),"ruc":$('#ruc').val(),"celular":$('#celular').val(),"direccion":$('#direccion').val()},
      success: function(data) {
        alertexito(data);
      }
    });
  }
});


$('.proveedor_eliminar').click(function(){
  var id = $(this).attr('id');
  let dt = $(this).attr('data_rt');
  var dato_id = 'id='+id;
  $.ajax({
  type: "POST",
  url:list_urls()+list_action()+"eliminar_proveedor",
  data: dato_id,
  success: function(data) {
  $('#provedorsdels'+id).addClass("eliminando");
  $('#provedorsdels'+id).slideUp(600);
   alertexito(data);
    }
  });
  });

});