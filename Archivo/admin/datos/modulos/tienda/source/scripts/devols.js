function search_client(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"data_cliente",
    data:{dat:datas,stored:true},
    dataType:"json",
    success: function(data) {
      console.log(data)
      $(".sugerencias_clientes_posible_dato").html(data.cliente);
      $(".sugerencias_clientes_posible_dato").prepend(data.new_cliente);
    }
  });
}

function devolucion_save(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"adregar_devolucion",
    data:{dat:datas,new_devolutions_init:"add_cliente"},
    dataType:"json",
    success: function(data) {
      window.location.reload();
    }
  });
}

function devolucion_save_new(datas){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"adregar_devolucion",
    data:{new_devolutions_init:"create_devolucion"},
    dataType:"json",
    success: function(data) {
      window.location.reload();
    }
  });
}

function devolucion_save_document(datas,type){
  $.ajax({
    type: "POST",
    url: list_urls()+list_action()+"adregar_devolucion",
    data:{doc:datas,new_devolutions_init:type},
    dataType:"json",
  });
}

$(document).on("click",'.cliente_data_act', function(){
  var valor = $(this).attr("data");
  var valordata = $(this).attr("data_val");
  $(".buscar_cliente_en_paginas_opcion").attr("data", valor);
  $(".buscar_cliente_en_paginas_opcion").val(valordata);
  $(".sugerencias_clientes_posible_dato").html("");
  $("#view_devolucion_stored").focus();
  devolucion_save(valor)
});

$(document).on("click",'.button_devoluciones', function(){
  devolucion_save_new(true)
});

$(document).on("keyup",'#view_devolucion_stored', function(){
  var val = $(this).val();
  search_client(val)
});

$(document).on("change",'.options_selects_document_dev_real_action', function(){
  var dtdoc=$(this).val();
  devolucion_save_document(dtdoc,"documents");
});
$(document).on("keyup",'.num_doc_in_devolutions', function(){
  var dtdoc=$(this).val();
  devolucion_save_document(dtdoc,"add_num_doc");
});



$(document).ready(function(){
  $("#teclado_devoluciones_stored_client a").on('click', function(e) {
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
    search_client(val)

    });
});


var div = document.getElementById('teclado_devoluciones_stored_client');
var div2 = document.getElementById('number_tec_client');
var div3 = document.getElementById('number_tec_clientdos');
var div4 = document.getElementById('number_tec_clienttres');
var div5 = document.getElementById('number_tec_clientcuatro');
var div6 = document.getElementById('number_tec_clientcinco');

var div7 = document.getElementById('select_document_store_shop_client');
var but = document.getElementById('view_devolucion_stored');
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