$(document).ready(function(){

  $(document).on("click", ".ram_memory", function (){
    let datas=$(this).html();
    $(".add_details_items_inputs").val(datas);
  });

  $(document).on("click", ".unidad_almacenamiento", function (){
    let datas=$(this).html();
    $(".add_details_items_inputs").val(datas);
  });

  $(document).on("click", ".tarjeta_video", function (){
    let datas=$(this).html();
    $(".add_details_items_inputs").val(datas);
  });

  function StringluisRand(length) {
    var textos = "";
    var cods = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < length; i++)
        textos += cods.charAt(Math.floor(Math.random() * cods.length));
    return textos;
  }

  function vistaprevia(file, id) {
    var datbass=$(".addnewimageluisbotsccc").attr("data-got");
    var imagenencode = URL.createObjectURL(file);
    var img = $("<span class=\"addnewimageluisboxud\" id=\""+id+"\"><span class=\"addnewimageluisboxudremove\"><img src=\""+datbass+"datos/imagenes/icons/csacdjkclos.png\"></span><img class=\"addnewimageluisboxudimage\" src=\"" + imagenencode + "\" title=\"Foto\"/></span>");
    $(img).insertBefore("#litimgecurrrent");
  }

  var formData = new FormData();
  formData.append('intlinear',$(".hipboxmp").val());
  formData.append('titulo',$("#ifgooda").val());
  formData.append('precio',$("#ifgoodb").val());
  formData.append('precio_final',$("#ifgoodb_two").val());
  formData.append('marca',$("#ifodmarc").val());
  formData.append('listone',$("#ifgoodc").val());
  formData.append('listtwo',$("#ifgoodd").val());
  if($("#editor").length > 0){
    formData.append('listboxstrin',CKEDITOR.instances['editor'].getData());
  }

  $(document).on("change", "#files", function () {
    $(".addnewimageluisboxus").removeClass("errorboxrequred")
    var files = this.files;
    var filesLength = files.length;
    var element;
    var supportedImages = ["image/jpeg", "image/png", "image/gif", "image/webp"];
    var seEncontraronElementoNoValidos = false;
    if(filesLength<=5 ) {
    for (var i = 0; i < files.length; i++) {
      var fileReader = new FileReader();
      element = files[i];
      fileReader.onload = (function(e) {
      var $divs = $(".addnewimageluisboxudimage").toArray().length;
      $(".coukbox").html($divs);
      if($divs>=5) {
        $(".addnewimageluisbotsccc").removeClass("adsfdg5");
        $(".addnewimageluisbotsccc").addClass("adsgdg5");
        $(".addnewimageluisboxus").removeClass("afsfdg5");
        $(".addnewimageluisboxus").addClass("afyfdg5");
      }

      if ($divs>5){
        $(".addnewimageluisbotsccc").attr('disabled', "disabled");
        $(".contentboxitemslistcread .infmaximgs").addClass("dihs")
      }

      });
      fileReader.readAsDataURL(element);
      if (supportedImages.indexOf(element.type) != -1) {
        var id = StringluisRand(10);
        vistaprevia(element, id);
        formData.append(id, element);
      }else{
        seEncontraronElementoNoValidos = true;
      }
    }
    }


  });

  // Eliminar previsualizaciones
    
  $(document).on("click", ".addnewimageluisboxudremove", function(e){
      var parent = $(this).parent();
      var id = $(parent).attr("id");
      formData.delete(id);
      $(parent).remove();
      var $divgs=$(".addnewimageluisboxudimage").length;
      $(".coukbox").html($divgs);
      if($divgs==4){
        $(".addnewimageluisbotsccc").removeClass("adsgdg5");
        $(".addnewimageluisbotsccc").addClass("adsfdg5");
        $(".addnewimageluisboxus").removeClass("afyfdg5");
        $(".addnewimageluisboxus").addClass("afsfdg5");
      }

      if($divgs<=5){
        $(".addnewimageluisbotsccc").removeAttr('disabled', "disabled");
        $(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
      }
  });

  $("#ifgoodc").change(function(){
    $.ajax({
      type:'POST',
      url:list_urls()+list_action()+"function_bord",
      data:{"cats":$("#ifgoodc").val()},
      cache: false,
      success: function(msg){
        if(msg!==""){
          $("#ifgoodd").removeAttr("disabled")
          $("#ifgoodd").attr('required',"required")
          $("#ifgoodd").parent().css({"display":"block"})
        }else{
          $("#ifgoodd").attr('disabled',"disabled")
          $("#ifgoodd").removeAttr("required")
          $("#ifgoodd").parent().css({"display":"none"})
        }
        $("#ifgoodd").html(msg);
      }
    });
  });


  $(document).on("click", '.aphlistbuttonnextopembox', function(){
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus()
      alertadvertencia("Ingresa un título válido.");
    }else if($("#ifgoodb").val()==""){
      $("#ifgoodb").focus()
      alertadvertencia("Ingresa el precio venta por cantidad.");
    }else if($("#ifgoodb_two").val()==""){
      $("#ifgoodb_two").focus()
      alertadvertencia("Ingresa un precio en soles.");
    }else if($("#ifodmarc").val()==""){
      $("#ifodmarc").focus()
      alertadvertencia("Selecciona una marca.");
    }else if($("#ifgoodc").val()==""){
      $("#ifgoodc").focus()
      alertadvertencia("Selecciona una categoría.");
    }else if(CKEDITOR.instances['editor'].getData() == ''){
      let focusManager = new CKEDITOR.focusManager('editor');
      focusManager.focus();
      alertadvertencia("Ingresa una descripcion.");
    }else{
      $("#blocknullfom12").click();
    }
});

$(".rols_int_disp").on( "click", function(){
  let datnull=$(this).attr("data-null");
  var optlnull=$(".optlistnull").attr("data-nullb");
  $fds=false;
  $(this).parent(".addnewimageluisboxud").remove();
  var $divgs=$(".addnewimageluisboxudimage").length;
  $(".coukbox").html($divgs);
  $.ajax({
      type:'POST',
      url:list_urls()+list_action()+"ubprodims",
      data:{infd:datnull},
      cache:false,
      success: function(data){
      }
    })
  if($divgs==4){
    $(".addnewimageluisbotsccc").removeClass("adsgdg5");
    $(".addnewimageluisbotsccc").addClass("adsfdg5");
    $(".addnewimageluisboxus").removeClass("afyfdg5");
    $(".addnewimageluisboxus").addClass("afsfdg5");
  }
  if($divgs<=5){
    $(".addnewimageluisbotsccc").removeAttr('disabled', "disabled");
    $(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
  }
});
/* update product */
$('.aphlistbuttonnextopemboxlist100').on("click", function(){
    var idl = i++;
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus()
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Ingresa un título válido.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      $("#extx100").focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else if($("#ifgoodb").val()==""){
      $("#ifgoodb").focus()
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Ingresa precio venta por cantidad.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      $("#extx100").focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else if($("#ifgoodb_two").val()==""){
      $("#ifgoodb_two").focus()
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Ingresa precio venta por unidad.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      $("#extx100").focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else if($("#ifodmarc").val()==""){
      $("#ifodmarc").focus()
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Selecciona una marca.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      $("#extx100").focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else if($("#ifgoodc").val()==""){
      $("#ifgoodc").focus()
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Selecciona una categoría.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      $("#extx100").focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else if(CKEDITOR.instances['editor'].getData() == ''){
      $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">Ingresa una descripcion.</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
      let focusManager = new CKEDITOR.focusManager('editor');
      focusManager.focus();
      $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
      window.setTimeout(function(){
        $("#rem"+idl).addClass("close_alert_200");
        setTimeout(function(){
          $("#rem"+idl).remove();
        }, 500);
      }, 7000);
    }else{
      $("#blocknullfom1300").click();
      
    }
  })
/* update product end*/

  $(document).on("submit", "#form800goodlive", function (e){
    CKEDITOR.instances['editor'].updateElement();
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('titulo',$("#ifgooda").val());
    formData.set('precio',$("#ifgoodb").val());
    formData.set('precio_final',$("#ifgoodb_two").val());
    formData.set('marca',$("#ifodmarc").val());
    formData.set('listone',$("#ifgoodc").val());
    formData.set('listtwo',$("#ifgoodd").val());
    formData.append('listboxstrin',CKEDITOR.instances['editor'].getData());
    var optl=$(".optlistnull").attr("data-nullb");
    var idl = i++;
    $.ajax({
      type:'POST',
      url: list_urls()+list_action()+"publicar_producto",
      data:formData,
      cache:false,
      dataType: "json",
      contentType: false,
      processData: false,
      beforeSend: function(){
        $(".aphlistbuttonnextopembox").attr('disabled',"disabled");
        $("#process456").addClass('lds-ripple');
      },
      success: function(data){
        if(data.estado==="error"){
          window.setTimeout(function(){
            $(".aphlistbuttonnextopembox").removeAttr('disabled');
            $("#porsenrbozx").html('');
            $("#process456").removeClass('lds-ripple');
            $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">'+data.mensaje+'</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
            $("#dura800").focus();
            $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
            window.setTimeout(function(){
              $("#rem"+idl).addClass("close_alert_200");
              setTimeout(function(){
                $("#rem"+idl).remove();
              }, 500);
            }, 7000);
          }, 1000);
        }
        if(data.estado==="exito"){
          window.setTimeout(function(){
            location.href = list_urls()+"productos/completar/"+data.rel_item;
          }, 1000);
        }
      },
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            var myLabel = document.getElementById("porsenrbozx");
            var alcompletar_procesoc = document.getElementById("porsenrbozx");
            myLabel.innerHTML = percentComplete +"%";
            if(percentComplete == 100){
              alcompletar_procesoc.innerHTML = "Procesando...";
            }
          }
        }, false);
        return xhr;
      },
    });
  });


  $(document).on("submit", "#form800goodlive100", function (e){
    CKEDITOR.instances['editor'].updateElement();
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('titulo',$("#ifgooda").val());
    formData.set('precio',$("#ifgoodb").val());
    formData.set('precio_final',$("#ifgoodb_two").val());
    formData.set('marca',$("#ifodmarc").val());
    formData.set('listone',$("#ifgoodc").val());
    formData.set('listtwo',$("#ifgoodd").val());
    formData.set('listboxstrin',CKEDITOR.instances['editor'].getData());
    var optl=$(".optlistnull").attr("data-nullb");
    var idl = i++;
    $.ajax({
      url: list_urls()+list_action()+"update_listprod",
      type:'POST',
      dataType: "json",
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      beforeSend: function(){
        $(".aphlistbuttonnextopembox").attr('disabled',"disabled");
        $("#process456").addClass('lds-ripple');
      },
      success: function(data){
        if(data.estado==="error"){
          window.setTimeout(function(){
            $(".aphlistbuttonnextopembox").removeAttr('disabled');
            $("#porsenrbozx").html('');
            $("#process456").removeClass('lds-ripple');
            $(".mensaje100").html('<div id="rem'+idl+'" class="alerta_top advertencia_top"><p class="alerta_top100">'+data.mensaje+'</p><span id="close_alert_'+idl+'" class="close_alert_100">X</span></div>');
            $("#dura800").focus();
            $('#close_alert_'+idl).click(function(){$('#rem'+idl).remove();});
            window.setTimeout(function(){
              $("#rem"+idl).addClass("close_alert_200");
              setTimeout(function(){
                $("#rem"+idl).remove();
              }, 500);
            }, 7000);
          }, 1000);
        }
        if(data.estado==="exito"){
          window.setTimeout(function(){
            location.reload();
          }, 1000);
        }
      },
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt){
          if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            percentComplete = parseInt(percentComplete * 100);
            var myLabel = document.getElementById("porsenrbozx");
            var alcompletar_procesoc = document.getElementById("porsenrbozx");
            myLabel.innerHTML = percentComplete +"%";
            if(percentComplete == 100){
              alcompletar_procesoc.innerHTML = "Procesando...";
            }
          }
        }, false);
        return xhr;
      },
    });
  })

});

window.setTimeout(function(){
        $("#rem10000").addClass("close_alert_200");
        setTimeout(function(){
          $("#rem10000").remove();
        }, 500);
}, 7000);
$('.close_alert_10000block').on("click" , function(){
  $('#rem10000').remove();
});

// Verificar datos de archivos
$(document).on("change", "#imports_datas_archivos", function () {
  var files = $(this)[0].files[0];
  if (files) {
    $(".prev_names_acrchive").html(files.name)
    $(".process_data_archivos_acction").addClass("processar_data");
    
  }else{
    $(".prev_names_acrchive").html("Importar datos")
    $(".process_data_archivos_acction").removeClass("processar_data");
  }
});

$(document).on("click", ".process_data_archivos_acction", function () {
  var formData = new FormData();
  var datid = $(this).attr("data-conf");
  formData.set('conf',datid);
  formData.set('proveedor',$("#proveedor_cpl"+datid).val());
  formData.set('documento',$("#document"+datid).val());
  formData.set('sucursal',$("#sucursal"+datid).val());
  var files = $('#imports_datas_archivos')[0].files[0];
  formData.append('exelpage',files);

  $.ajax({
    url: list_urls()+list_action()+'procesarexel',
    type: 'post',
    data: formData,
    contentType: false,
    processData: false,
    //dataType: "json",
    success: function(data) {
        document.location.reload();
    }
  });
});


$(document).on("click", ".delete_button_in_stock_item", function(){
    let ittms=$(this).attr("data");
    $.ajax({
        type:"POST",
        data:{dat:ittms},
        url:list_urls()+list_action()+"delete_item_stock",
        success: function(datos){
          document.location.reload();
        }
    });
})


$(document).on("keyup", ".add_details_items_inputs", function(){
  let dar = $(this).val().length;
  if(dar > 0){
    $("#ifgoodc").val("");
    $(".in_day_ps").addClass("in_day_ps_true");
  }else{
    $(".in_day_ps").removeClass("in_day_ps_true");
  }
})

$(document).on("change", "#ifgoodc", function(){
  let darb = $(this).val();
  if(darb==""){
    $(".in_day_ps_b").removeClass("in_day_ps_true");
  }else{
    $(".in_day_ps_b").addClass("in_day_ps_true");
  }
})

$(document).on("click", ".add_details_items_buttons", function(){
  let item_d = $(this).attr("data");
  let ittms_c=$("#ifgoodc").val();
  let ittms_s=$("#ifgoodd").val();
  let ittms=$(".add_details_items_inputs").val();
    $.ajax({
        type:"POST",
        data:{dat:ittms,item:item_d,cat:ittms_c,sub:ittms_s},
        url:list_urls()+list_action()+"add_item_details",
        dataType: "json",
        success: function(datos){
          if(datos.tipo===1){
            alertexito(datos.message);
            document.location.reload();
          }
          if(datos.tipo===0){
            alertadvertencia(datos.message);
          }
          $("#ifgoodc").val("");
          $("#ifgoodd").val("");
          $(".in_day_ps").removeClass("in_day_ps_true");
          $(".add_details_items_inputs").val("");
          $(".add_details_items_inputs").focus();
        }
    });
})


/* para editar las caracteristicas */
$(document).on("keyup", ".add_details_items_inputs_upd", function(){
  let dac = $(this).attr("data");
  let dar = $(".add_details_items_inputs_upd"+dac).val().length;
  if(dar > 0){
    $("#ifgoodc"+dac).val("");
    $(".in_day_ps"+dac).addClass("in_day_ps_true");
  }else{
    $(".in_day_ps"+dac).removeClass("in_day_ps_true");
  }
  console.log(dar)
})


$(document).on("change", ".inptexboslistspublic_funct", function(){
  let dac_b = $(this).attr("data");
  let darb = $("#ifgoodc"+dac_b).val();
  if(darb==""){
    $(".in_day_ps_b"+dac_b).removeClass("in_day_ps_true");
  }else{
    $(".in_day_ps_b"+dac_b).addClass("in_day_ps_true");
  }

  $.ajax({
    type:'POST',
    url:list_urls()+list_action()+"function_bord",
    data:{"cats":darb},
    cache: false,
    success: function(msg){
      if(msg!==""){
        $("#ifgoodd"+dac_b).removeAttr("disabled")
          $("#ifgoodd"+dac_b).attr('required',"required")
          $("#ifgoodd"+dac_b).parent().css({"display":"block"})
        }else{
          $("#ifgoodd"+dac_b).attr('disabled',"disabled")
          $("#ifgoodd"+dac_b).removeAttr("required")
          $("#ifgoodd"+dac_b).parent().css({"display":"none"})
        }
        $("#ifgoodd"+dac_b).html(msg);
      }
    });
})

$(document).on("click", ".add_details_items_buttons_upd", function(){
  let ittms=$(this).attr("data");
  let ittms_c=$("#ifgoodc"+ittms).val();
  let ittms_s=$("#ifgoodd"+ittms).val();
  let ittms_nam=$(".add_details_items_inputs_upd"+ittms).val();
  $.ajax({
    type:"POST",
    data:{dat:ittms,dat_name:ittms_nam,cat:ittms_c,sub:ittms_s},
    url:list_urls()+list_action()+"update_type_names",
    dataType: "json",
    success: function(datos){
      console.log(datos)
      if(datos.play_data===0) {
        $(".listar_opciones_de_tipo_box"+ittms).html("");
      }
      if(datos.tipo===1){
        $(".label_data_types_detalle"+ittms).html(datos.values);
        alertexito(datos.message);
      }else{
        alertadvertencia(datos.message);
      }
      if(datos.options){
        $("#items_li_puv"+ittms).html(datos.options);
      }else{
        $("#items_li_puv"+ittms).html("");
      }
    }
  });
})
/* ----------------------------------- */

$(document).on("click", ".delete_button_types", function(){
  let items_del = $(this).attr("data");
  alerta_confirm_dialog("eliminar_titulo_tipo_de_opciones",items_del,false);
})

$(document).on("click", ".eliminar_titulo_tipo_de_opciones", function(){
  let items_del = $(this).attr("data");
    $.ajax({
        type:"POST",
        data:{dat:items_del},
        url:list_urls()+list_action()+"unl_item_details",
        success: function(datos){
          $("#alert_confirm_action_dialog"+items_del).remove();
            $(".add_details_items_buttons_notes").removeClass("update_types_names_butt");
            $(".add_details_items_buttons_notes").addClass("add_details_items_buttons");
            $(".add_details_items_buttons_notes").html("Agregar");
            $(".add_details_items_buttons_notes").removeAttr("data_up");
            $(".add_details_items_inputs").removeClass("update_check");
            $(".add_details_items_buttons_notes").removeAttr("data_up_name");
            $(".add_details_items_inputs").val("");
            $(".contentboxitemslistcreadertype"+items_del).slideUp();
            alertexito("Eliminado con exito.");
        }
    });
})


//// agregar  detalles a las opciones 

$(document).on("click", ".ad_det_it_b_upd_opts", function(){
  let typo_opcion = $(this).attr("data");
  let opcion_detalle=$(".ad_opt_lk"+typo_opcion).val();
  let opcion_items=$("#items_li_puv"+typo_opcion).val();
  let pric_option = $('input[name=price_data'+typo_opcion+']:checked').val();
    $.ajax({
        type:"POST",
        data:{type_option:typo_opcion,opcion_det:opcion_detalle,itemp:opcion_items,option_pr:pric_option},
        url:list_urls()+list_action()+"add_item_details_options_subs",
        dataType: "json",
        success: function(datos){
          if(datos.priv===4){
            $(".price_option_actives").removeClass("in_day_ps_true");
          }
          if(datos.tipo===1){
            $(".ad_opt_lk"+typo_opcion).val("");
            $("#items_li_puv"+typo_opcion).val("")
            alertexito(datos.message);
            $(".input_add_detalle_de_options_box"+typo_opcion).val("");
            $(".input_add_detalle_de_options_box_price"+typo_opcion).val("");
            document.location.reload();
          }
          if(datos.tipo===0){
            alertadvertencia(datos.message);
          }
          if(datos.tipo===2){
            alertadvertencia(datos.message);
            $(".input_add_detalle_de_options_box"+typo_opcion).focus();
          }
          if(datos.tipo===3){
            alertadvertencia(datos.message);
            $(".input_add_detalle_de_options_box_price"+typo_opcion).focus();
          }
        }
    });
})
/////update_item_details_options_subs

$(document).on("click", ".ad_det_it_b_upd_opts_update", function(){
  let typo_opcion = $(this).attr("data");
  let detail_item = $(this).attr("data_i");
  let opcion_detalle=$(".ad_opt_lk_up"+detail_item).val();
  let opcion_items=$("#items_li_puv"+detail_item).val();
  let pric_option = $('input[name=price_data'+detail_item+']:checked').val();
    $.ajax({
        type:"POST",
        data:{type_option:typo_opcion,opcion_det:opcion_detalle,itemp:opcion_items,option_pr:pric_option,dit:detail_item},
        url:list_urls()+list_action()+"update_item_details_options_subs",
        dataType: "json",
        success: function(datos){
          if(datos.priv===4){
            $(".price_option_actives").removeClass("in_day_ps_true");
          }
          if(datos.tipo===1){
            $("#items_li_puv"+detail_item).val("")
            alertexito(datos.message);
            $(".input_add_detalle_de_options_box"+detail_item).val("");
            $(".input_add_detalle_de_options_box_price"+detail_item).val("");
            document.location.reload();
          }
          if(datos.tipo===0){
            alertadvertencia(datos.message);
          }
          if(datos.tipo===2){
            alertadvertencia(datos.message);
            $(".input_add_detalle_de_options_box"+detail_item).focus();
          }
          if(datos.tipo===3){
            alertadvertencia(datos.message);
            $(".input_add_detalle_de_options_box_price"+detail_item).focus();
          }
        }
    });
})

$(document).on('click', ".button_display_opciones_delete", function(){
    let items_del = $(this).attr("data");
    let items_del_t = $(this).attr("data_dels");
    alerta_confirm_dialog("button_delete_opciones_de_items",items_del,items_del_t);
  })

$(document).on("click", ".button_delete_opciones_de_items", function(){
  let items_del = $(this).attr("data");
  let items_del_t = $(this).attr("data_dels");
    $.ajax({
        type:"POST",
        data:{dat:items_del},
        url:list_urls()+list_action()+"delete_opcion_details_lines",
        success: function(datos){
          console.log(datos)
            $(".box_options_inline"+items_del).slideUp();
            alertexito("Eliminado con exito.");
        }
    });
});


$(document).on("click", ".update_default_option", function(){
  let item_type = $(this).attr("data_p");
  let items_id = $(this).attr("data_s");
  $(".update_default_option"+item_type).html("Activar");
  $(".update_default_option"+item_type).addClass("button_display_opciones_principal_desactivado");
  $(".update_default_option"+item_type).removeClass("button_display_opciones_principal_active");
  $(this).addClass("button_display_opciones_principal_active")
  $(this).removeClass("button_display_opciones_principal_desactivado")
  $(this).html("Principal")
  $.ajax({
        type:"POST",
        data:{typs:item_type,opt_ops:items_id},
        url:list_urls()+list_action()+"update_option_default",
        success: function(datos){
        }
    });
})
