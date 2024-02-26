$('.update_laguage_file').click(function(){
  if($('#lang_file_display').val()==""){
    alertadvertencia("El campo no puede quedar vacio.");  
    $("#lang_file_display").focus();
  }else{
    $.ajax({
      type: "POST",
      url: list_urls()+list_action()+"update_language_file",
      data:{"langs":$('#lang_file_display').attr("data"),"langs_data":$('#lang_file_display').val()},
      success: function(data) {
        alertexito("Guardado");
        document.location = list_urls()+"administrar_idioma/update/"+data;
      }
    });
  }
});

$('.language_file_eliminar').click(function(){
  let dtlang = $(this).attr("id");
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"eliminar_lang",
    data:{"langs":dtlang},
    success: function(data) {
      $("#administrar_idioma_"+dtlang).remove();
      alertexito("Eliminado");
    }
  });
});


$('.laguage_file_word').keyup(function(){
  let langfile_data = $(this).attr("data_ps");
  let data_word = $(this).val();
  let data_word_change = $(this).attr("data");
  if(data_word==""){
    alertadvertencia("El campo no puede quedar vacio.");  
    $(this).focus();
  }else{
    $.ajax({
      type: "POST",
      url: list_urls()+list_action()+"update_word_languages",
      data:{"lang_file":langfile_data,"langs_word":data_word_change,"lang_word_data":data_word},
      success: function(data){
      }
    });
  }
});