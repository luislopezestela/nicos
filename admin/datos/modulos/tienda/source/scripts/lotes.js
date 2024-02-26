function devolucion_save_document(datas,type){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"reserv",
    data:{dat:datas,conf:type},
    dataType:"json",
    success: function(data) {
      if(data.estado==true){
        $(".reservar_items_users"+datas).html("RESERVADO");
        $(".reservar_items_users"+datas).addClass("reservs");
      }else{
        $(".reservar_items_users"+datas).html("RESERVAR");
        $(".reservar_items_users"+datas).removeClass("reservs");
      }
    }
  });
}

$(document).on("click",'.ver_lotes_en_lista_detalles', function(){
  var dat=$(this).attr("data");
  window.location = list_urls()+"lotes/"+dat;
});

$(document).on("click",'.reservar_items_users', function(){
  var dat=$(this).attr("data");
  devolucion_save_document(dat,"reservar");

  
});