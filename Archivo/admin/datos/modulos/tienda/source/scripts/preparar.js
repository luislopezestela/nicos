$(document).on("change",'#select_document_store_shop_client', function(){
  var val = $(this).val();
  var vent = $(this).attr("data");
  realizar_la_venta(val,vent);
});

function realizar_la_venta(datas,ventas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"preparar_la_compra",
    data:{documento:datas,newventa_init:"documents",venta:ventas},
    dataType:"json",
    success: function(data){
      //var valst = $(".select_document_store_shop_client option:selected").text();
      //$(".document_type_change").attr('placeholder',"NUMERO DE "+valst)
      if(data.documento==4){
        $('.document_requerid_factura').html('<div class="order_current_for_client_data_order_sty"><label class="order_current_for_client_data_order_sty_label">RUC:</label><span class="order_current_for_client_data_order_sty_text">'+data.ruc+'</span></div>');
      }else{
        $('.document_requerid_factura').html('');
      }
    }
  });
}

//////// BARCODE
$(document).on("keypress",'.inpt_ac_barcode_limit', function(){
  var val = $(this).val();
  var item = $(this).attr("data");
  var ac = $(this).attr("data-ac");
  details_items_previews_web(val,item,ac);
});

function details_items_previews_web(val,item,ac){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"preparar_productos_de_venta_web",
    data:{valor:val,items:item},
    dataType:"json",
    success: function(data){
      if(data.estado==1){
        alertexito(data.mensaje);
      }
      if(data.estado==0){
        alertadvertencia(data.mensaje);
      }
      $(".acs_number_prepared_order"+ac).html(data.cantidad);
      $(".text_data_modal_prov"+item).html(data.proveedor);
    }
  });
}


$(document).on("click",'.delete_item_on_code_list_order_ac', function(){
  var item = $(this).attr("data");
  var ac = $(this).attr("data-ac");
  details_items_previews_web_dells(item,ac);
});

function details_items_previews_web_dells(item,ac){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"eliminar_stock_barcode_orden",
    data:{items:item},
    dataType:"json",
    success: function(data){
      $(".acs_number_prepared_order"+ac).html(data.cantidad);
      $(".inpt_ac_barcode_limit"+item).val("");
      $(".text_data_modal_prov"+item).html("-");
    }
  });
}
//  

//listo_para_entregar_button_but_on ac_process_order_listo_entregar
$(document).on("click", ".ac_process_order_listo", function(){
  let compra_data = $(this).attr("data");
  $.ajax({
    type:"POST",
    url:list_urls()+list_action()+"preparar_listo_venta",
    dataType:"json",
    data:{compra:compra_data},
    success: function(data){
      if(data.estado=="exito"){
        $(".venta_en_lista_pr"+compra_data).slideUp();
        alertexito(data.mensaje);
        window.location = list_urls()+"ventas/ventas_en_linea/listos";
      }
      if(data.estado=="error"){
        alertadvertencia(data.mensaje);
      }
    }
  });
})


$(document).on("click", ".ac_process_order_listo_entregar", function(){
  let compra_data = $(this).attr("data");
  $.ajax({
    type:"POST",
    url:list_urls()+list_action()+"entregar_process_venta",
    dataType:"json",
    data:{compra:compra_data},
    success: function(data){
      if(data.estado=="exito"){
        $(".venta_en_lista_pr"+compra_data).slideUp();
        alertexito(data.mensaje);
        window.location = list_urls()+"ventas/ventas_en_linea/entregado_al_cliente";
      }
      if(data.estado=="error"){
        alertadvertencia(data.mensaje);
      }
    }
  });
})



//