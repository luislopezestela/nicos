function enviardatascliente(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"dni_view",
    data:{dat:datas,stored:true},
    dataType:"json",
    success: function(data) {
      $(".contiene_sugerencias_clientes_pages").html(data.cliente);
      $(".contiene_sugerencias_clientes_pages").prepend(data.new_cliente);
    }
  });
}
function guarda_cliente_en_compra(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{dat:datas,newventa_init:"add_cliente"},
    dataType:"json",
    success: function(data) {
      window.location.reload();
    }
  });
}
function guarda_num_doc_en_compra(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{dat:datas,newventa_init:"add_num_doc"},
    dataType:"json",
    success: function(data) {
    }
  });
}

function guarda_metodo_order(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{dat:datas,newventa_init:"add_metodo_order"},
    dataType:"json",
    success: function(data){
      if(data.visible==1){
        $(".input_order_order_pag_item").attr('placeholder', data.label);
        $('.input_order_order_pag_item').attr('type', "number");
      }else{
        $('.input_order_order_pag_item').attr('type', "hidden");
      }
    }
  });
}

$(document).on("click",'.contiene_sugerencias_clientes', function(){
  var valor = $(this).attr("data");
  var valordata = $(this).attr("data_val");
  $(".view_clients_stored").attr("data", valor);
  $(".view_clients_stored").val(valordata);
  $(".contiene_sugerencias_clientes_pages").html("");
  $("#search_products_store").focus();
  guarda_cliente_en_compra(valor);
});

$(document).on("keyup",'.document_type_change', function(){
  var val = $(this).val();
  guarda_num_doc_en_compra(val)
});

$(document).on("keyup",'.view_clients_stored', function(){
  var val = $(this).val();
  enviardatascliente(val)
});

$(document).on("focus",'.view_clients_stored', function(e){
       e.preventDefault();
    e.stopPropagation();
    div.style.display = "block";
});

$(document).ready(function(){
  $("#teclado_venta_stored_client a").on('click', function(e) {
    e.preventDefault();
    e.stopPropagation();
    if ($(this).attr('data') == 'DEL') {
      board_text = $('input.board').val();
      board_text = board_text.substring(0, board_text.length-1);
      $('input.board').val(board_text);
    } else {
      $('input.board').val($('input.board').val() + $(this).attr('data'));
    }
    $('input.board').focus();
    var val = $('input.board').val();
    enviardatascliente(val)

    });
});


$(document).on("click",'.delete_order_user_view', function(e){
  $.ajax({
    url: list_urls()+list_action()+"delete_order",
    success: function(data){
      $(".addeds_orders_items").html('<p class="message_order_null">Agrega productos por codigo de barras o nombre.</p>');
      $(".mount_order_client_litingff").html("0.00");
      window.location.reload();
    }
  });
});

var div = document.getElementById('teclado_venta_stored_client');
var div2 = document.getElementById('number_tec_client');
var div3 = document.getElementById('number_tec_clientdos');
var div4 = document.getElementById('number_tec_clienttres');
var div5 = document.getElementById('number_tec_clientcuatro');
var div6 = document.getElementById('number_tec_clientcinco');

var div7 = document.getElementById('select_document_store_shop_client');
var but = document.getElementById('view_clients_stored');
function showHide(e){
e.preventDefault();
e.stopPropagation();
div.style.display = "block";
}

but.addEventListener("click", showHide, false);
document.addEventListener("click", function(e){
var clic = e.target;
if(div.style.display == "block" && clic != div && clic != div2 && clic != div3 && clic != div4 && clic != div5 && clic != div6 && clic != div7){
 div.style.display = "none";
}
}, false);



/*$(document).on("change",'.select_document_store_shop_client', function(){
  var div = document.getElementById('teclado_venta_stored_client');
  var val = $(this).val();
  var valst = $(".select_document_store_shop_client option:selected").text();
  $(".document_type_change").attr('placeholder',"NUMERO DE "+valst)
  if(val===""){
    $(".view_clients_stored").addClass("documentdata_client");
    $(".view_clients_stored").removeClass("documentdata_clients");

    $(".number_document_page_lists_view").addClass("documentdata_client");
    $(".number_document_page_lists_view").removeClass("documentdata_clients");
    div.style.display = "none";
  }else{
    $(".number_document_page_lists_view").removeClass("documentdata_client");
    $(".number_document_page_lists_view").addClass("documentdata_clients");


    $(".view_clients_stored").removeClass("documentdata_client");
    $(".view_clients_stored").addClass("documentdata_clients");

    $("#view_clients_stored").click();
    $("div#teclado_venta_stored_client").click()
    $("#view_clients_stored").focus();
  }
});*/

function crear_venta(datas,entrega){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{newventa_init:"new_order",entregar:entrega},
    dataType:"json",
    success: function(data) {
      console.log(data)
      if(data.estado){
        window.location.reload();
      }
    }
  });
}

function realizar_la_venta(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{documento:datas,newventa_init:"documents"},
    dataType:"json",
    success: function(data) {
      var valst = $(".select_document_store_shop_client option:selected").text();
      $(".document_type_change").attr('placeholder',"NUMERO DE "+valst)
      if(data.estado){
      }
    }
  });
}

$(document).on("click",'.document_new_order_in_pages', function(){
  var pry = $(".entregar_venta_reservado_por_cliente:checked").val();
  crear_venta(true,pry);
});

$(document).on("change",'#select_document_store_shop_client', function(){
  var val = $(this).val();
  realizar_la_venta(val);
});

////// PRODUCTOS
$('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');

function agregarproducto_a_la_compra(datas){
  $("input[name='codigo']").select();
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{dat:datas,newventa_init:"add_items_in_order"},
    dataType:"json",
    success: function(data){
      console.log(data)
      if(data.product_data){
        $(".addeds_orders_items").append(data.product_data);
        $(".message_order_null").remove();
      }
      if(data.td_tabla){
        $(".data_items_stock_controls"+data.order).append(data.td_tabla);
      }
      $("input[name='codigo']").val("");
      $(".cantidad_items_view_pages_count_items"+data.order).html(data.cantidad_stock);
      $(".mount_order_client_litingff").html(data.costo_total_de_compra);

      $(".contiene_sugerencias_products_pages").html("");
    }
  });
}

function update_order_clients_views(datas,newdata){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"update_order",
    data:{identbox:datas,btls:newdata},
    dataType:"json",
    success: function(data) {
      console.log(data)
      $("input[name='codigo']").val("");
      $(".cantidad_cound_item"+data.order).val(data.itemcount);
      $(".mount_order_client_litingff").html(data.totalpriceorderslist);
    }
  });
}


$('.quantity').each(function(){
  var luislopezestelanumbermove = $(this),
  input = luislopezestelanumbermove.find('input[type="number"]'),
  btnUp = luislopezestelanumbermove.find('.quantity-up'),
  btnDown = luislopezestelanumbermove.find('.quantity-down'),
  min = input.attr('min'),
  max = input.attr('max'),
  ide = input.attr('data_code');
  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if(oldValue >= max){
      var newVal = oldValue;
    }else{
      var newVal = oldValue + 1;
    }
    luislopezestelanumbermove.find("input").val(newVal);
    update_order_clients_views(ide,newVal);
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    }else{
      var newVal = oldValue - 1;
    }
    luislopezestelanumbermove.find("input").val(newVal);
    update_order_clients_views(ide,newVal);
  });
});
//////// BARCODE
document.addEventListener('DOMContentLoaded', function() {
  let codigobarras = document.getElementById('codigobarras');
  codigobarras.codigo.focus();
  codigobarras.addEventListener("submit", function(e) {
    e.preventDefault();
    agregarproducto_a_la_compra(codigobarras.codigo.value);
  });
}, false);

$(document).on('click', ".quantity-down", function() {
  var code_ids=$(this).attr("datav");
  var luislopezestelanumbermove = $('.quantity'+code_ids),
  input = luislopezestelanumbermove.find('input[type="number"]'),
  btnDown = luislopezestelanumbermove.find('.quantity-down'),
  min = input.attr('min'),
  max = input.attr('max'),
  ide = input.attr('data_code');
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    }else{
      var newVal = oldValue - 1;
    }
    luislopezestelanumbermove.find("input").val(newVal);
    update_order_clients_views(ide,newVal);
});



$(document).on('click', ".quantity-up", function() {
  var code_ids=$(this).attr("datav");
  var luislopezestelanumbermove = $('.quantity'+code_ids),
  input = luislopezestelanumbermove.find('input[type="number"]'),
  btnUp = luislopezestelanumbermove.find('.quantity-up'),
  min = input.attr('min'),
  max = input.attr('max'),
  ide = input.attr('data_code');
    var oldValue = parseFloat(input.val());
    if(oldValue >= max){
      var newVal = oldValue;
    }else{
      var newVal = oldValue + 1;
    }
    luislopezestelanumbermove.find("input").val(newVal);
    update_order_clients_views(ide,newVal);
});

function details_items_previews(datas){ 
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"details_product",
    data:{dat:datas},
    dataType:"json",
    success: function(data) {
      console.log(data)
      $(".contiene_sugerencias_products_pages").html(data.item_view);
    }
  });
}

function delete_item_in_order_data(datas){ 
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"delete_items_in_order_stock",
    data:{dat:datas},
    dataType:"json",
    success: function(data){
      console.log(data)
      if(data.estado==true){
        alertexito(data.mensaje);
      }else{
        alertadvertencia(data.mensaje);
      }
      $(".mount_order_client_litingff").html(data.totalpriceorderslist);
      $(".contiene_sugerencias_products_pages").html("");
      
        $("#itemsviewscartorder"+datas).remove();

    }
  });
}

function delete_stock_in_order_list(datas,dataid,item){ 
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"delete_item_stock_order_page",
    data:{dat:datas},
    dataType:"json",
    success: function(data){
      console.log(data)
      if(data.estado==true){
        
        alertexito(data.mensaje);
      }else{
        alertadvertencia(data.mensaje);
      }
      if (data.delete==true){
        $("#itemsviewscartorder"+item).remove();
      }
      $(".mount_order_client_litingff").html(data.totalpriceorderslist);
      $(".cantidad_items_view_pages_count_items"+data.order).html(data.itemcount);
      $("#item_on_code_list_order"+dataid).remove();
    }
  });
}



$(document).on("keyup",'#search_products_store', function(){
  var val = $(this).val();
  details_items_previews(val)
});

$(document).on("click",'.item_prev_list_in_page_up_adds', function(){
  var valsd = $(this).attr("barcode");
 agregarproducto_a_la_compra(valsd);
});


$(document).on("change",'.metodo_de_pago_order_in_pages_client', function(){
  var val_dfs = $(this).val();
  guarda_metodo_order(val_dfs);
});

$(document).on("click",'.boton_eliminar_producto_de_carrito', function(){
  var val_item = $(this).attr("data_cart");
  delete_item_in_order_data(val_item);
});

$(document).on("click",'.delete_item_on_code_list_order', function(){
  var val_item = $(this).attr("data_conf");
  var val_item_id = $(this).attr("data_config");
  var item_id = $(this).attr("config_box");
  delete_stock_in_order_list(val_item,val_item_id,item_id);
});


$(document).on("click",'.barcodes_items_view_in_page_button_action', function(){
  var val_item = $(this).attr("data-fonfig");
  alerta_view_codes(val_item,false);
});

function procesar_venta_actual(pago){ 
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"procesar_venta_carrito",
    data:{pagos:pago},
    dataType:"json",
    success: function(data){
      console.log(data)
      
    }
  });
}

$(document).on("click",'.process_order_user_view', function(){
  var monto_pago = $(".input_order_order_pag_item_monto_pago").val();
  procesar_venta_actual(monto_pago);
});



/////////////****************web 
$(document).on("click",'.item_prev_list_in_page_up_adds_web', function(){
  var valsd = $(this).attr("barcode");
 agregarproducto_a_la_compra_web(valsd);console.log(valsd)
});

function agregarproducto_a_la_compra_web(datas){
  $("input[name='codigo']").select();
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"agregar_a_la_compra",
    data:{dat:datas,newventa_init:"add_items_in_order"},
    dataType:"json",
    success: function(data){
      console.log(data)
      if(data.product_data){
        $(".addeds_orders_items").append(data.product_data);
        $(".message_order_null").remove();
      }
      if(data.td_tabla){
        $(".data_items_stock_controls"+data.order).append(data.td_tabla);
      }
      $("input[name='codigo']").val("");
      $(".cantidad_items_view_pages_count_items"+data.order).html(data.cantidad_stock);
      $(".mount_order_client_litingff").html(data.costo_total_de_compra);

      $(".contiene_sugerencias_products_pages").html("");
    }
  });
}

$(document).on("keyup", ".ac_new_search_order_in_page", function(){
  let compra_data = $(this).val();
  $.ajax({
    type:"POST",
    url:list_urls()+list_action()+"buscar_venda_por_informacion",
   // dataType:"json",
    data:{compra:compra_data},
    success: function(data){
      console.log(data);
    }
  });
})