var urline=$("#ur_timeline").attr("data");
function divclass_caracter($id,$conten){
  var div = '<div id="'+$id+'" class="caract_lit_items_caracterist_inlin caract_lit_items contentboxitemslist">'
          + '<div class="detaillsboxlists">'
          + '<div class="tluisboxunli title_name_tct_caracterist_item_'+$id+'">'+$conten+'</div>'
          + '</div>'
          + '<div class="opcionesblocklist opcionesblocklist1000boxlist">'
          + '<a class="opcionesblocklist100 opcionesblocklist1000" href="javascript:void(0)">'
          + '<span class="opcionesblocklistoption opcionesblocklistoption100">'
          + '<i class="opcionesblocklistoption200 opcionesblocklistoption300">•••</i>'
          + '</span>'
          + '</a>'
          + '<div class="boxoptionslistlines">'
          + '<div class="makposdind"></div>'
          + '<div class="boxoptionslistitems option_carta_functions_update" data="'+$id+'" data-modal-trigger="option_carta_update_'+$id+'">Editar</div>'

          + '<div class="modal closet_modal_listems" data="'+$id+'" data-modal-name="option_carta_update_'+$id+'" data-modal-dismiss closet_modal="'+$id+'">'
          
          + '<div class="modal__dialog">'
          + '<header class="modal__header">'
          + '<h3 class="modal__title">Editar caracteristica.</h3>'
          + '<i class="modal__close" data-modal-dismiss >X</i>'
          + '</header>'

          + '<div class="modal__content">'
          + '<input class="input_update_modal class_name_ini_add_caracteristic_update_'+$id+'" type="text" placeholder="Nombre" value="'+$conten+'">'
          + '<span class="button_update_modal class_btn_ini_add_caracteristic_update" data="'+$id+'" data-x="'+$id+'">Editar</span>'
          + '</div>'
          + '</div>'
          + '</div>'

          + '<div class="boxoptionslistitems option_carta_functions" data-modal-trigger="option_carta_'+$id+'" data="'+$id+'">Eliminar</div>'
          + '<div class="modal" data-modal-name="option_carta_'+$id+'" data-modal-dismiss>'
          + '<div class="modal__dialog">'
          + '<header class="modal__header">'
          + '<h3 class="modal__title">Eliminar</h3>'
          + '<p>'+$conten+'</p>'
          + '<i class="modal__close" data-modal-dismiss>X</i>'
          + '</header>'
          + '<div class="modal__content">'
          + '<div class="case_delete_view">'
          + '<span class="option_delete_views option_confirm confirm_delete_caracteristic_item" data="'+$id+'">Eliminar</span>'
          + '<span class="option_delete_views option_cancel" data-modal-dismiss>Cancelar</span>'
          + '</div>'
          + '</div>'
          + ''
          + '</div>'
          + '</div>'
          + ''
          + '</div>'
          + '</div>'
          + '</div>';
          return div;
}
$(document).ready(function(){
  var formData = new FormData();
  formData.append('intlinear',$(".hipboxmp").val());
  formData.append('nombre',$("#ifgooda").val());
  formData.append('carta',$("#ifgooda").attr("data"));
  formData.append('precio',$("#ifgoodb").val());
  formData.append('listone',$("#ifgoodc").val());

  $(document).on("change", "#files", function () {
    $(".addnewimageluisboxus").removeClass("errorboxrequred")
    var files = this.files;
    var filesLength = files.length;
    var element;
    var supportedImages = ["image/jpeg", "image/png", "image/gif"];
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
for (var pair of formData.entries()) {
        console.log(pair); 
      }
  });

  $(document).on("click", ".class_btn_ini_add_caracteristic", function(e){
    var inp_line = $(".class_name_ini_add_caracteristic").val();
    if(inp_line===""){
      alertadvertencia("Escribe un nombre");
    }else{
      dapl=document.querySelector('[data-modal-name="add_new_carateristica_in_item_place"]')
      dapl.classList.remove("is-modal-active");
 
        var ids = StringluisRand(12);
        var hello = {
          id: ids,
          nombre: inp_line
        };
        var myArray = [hello];
        formData.append('caracteristica[]', JSON.stringify(myArray[0]));
        $(".list_items_view_content_caracteristics").append(divclass_caracter(ids,inp_line))
        $(".class_name_ini_add_caracteristic").val("")

        for (var pair of formData.entries()) {
          console.log(pair);
        }

    }
  })

  $(document).on("click", ".confirm_delete_caracteristic_item", function(e){
    var itemsvar = $(this).attr("data")
      formData.delete(itemsvar);
      $("#"+itemsvar).remove();
  })

  $(document).on("click", ".class_btn_ini_add_caracteristic_update", function(e){
    var itemsvar = $(this).attr("data")
    var contentext = $(".class_name_ini_add_caracteristic_update_"+itemsvar).val()
     // formData.set(itemsvar,contentext);
     for (var opc of formData.getAll("caracteristica[]")) {
      var opl = JSON.parse(opc);
      if (opl.id===itemsvar) {
      var hello = {
          id: itemsvar,
          nombre: contentext
        };
        var myArray = [hello];
        formData.set('caracteristica[]', JSON.stringify(myArray[0]));

        console.log(opl.id);
        }
      }

       


      $(".title_name_tct_caracterist_item_"+itemsvar).html(contentext);
      dapl=document.querySelector('[data-modal-name="option_carta_update_'+itemsvar+'"]')
      dapl.classList.remove("is-modal-active");
       

      for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
      }
  })

  
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
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
      }
  });


  $(document).on("click", '.aphlistbuttonnextopembox', function(){
    var idl = i++;
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus()
      alertadvertencia("Ingresa un nombre válido.");
    }else if($("#ifgoodb").val()==""){
      $("#ifgoodb").focus()
      alertadvertencia("Ingresa un precio.");
    }else{
      $(".blocknullfom12_items_cart").click();
    }
});

$(".rols_int_disp").on( "click", function(){
  let datnull=$(this).attr("data-null");
  $fds=false;
  formData.append('imagen[]', datnull);
  $(this).parent(".addnewimageluisboxud").remove();
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
  for (var pair of formData.entries()) {
        console.log(pair); 
      }
});
/* update product */
$('.btn_update_item_list_cart_option').on("click", function(){
    var idl = i++;
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus();
      alertadvertencia("Ingresa un título válido.");
    }else if($("#ifgoodb").val()==""){
      $("#ifgoodb").focus()
      alertadvertencia("Ingresa un precio.");
    }else{
      $("#update_item_list_cart_option").click();
    }
  })
/* update product end*/
  $(document).on("submit", "#form800goodlive_item_cart", function (e){
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('nombre',$("#ifgooda").val());
    formData.set('carta',$("#ifgooda").attr("data"));
    formData.set('precio',$("#ifgoodb").val());
    formData.set('listone',$("#ifgoodc").val());
    var idl = i++;
    $.ajax({
      type:'POST',
      url: urline+list_action()+"publicar_item_carta",
      data:formData,
      cache:false,
     // dataType: "json",
      contentType: false,
      processData: false,
      beforeSend: function(){
        $(".aphlistbuttonnextopembox").attr('disabled',"disabled");
        $("#process456").addClass('lds-ripple');
      },
      success: function(data){
        console.log(data)
        if(data.estado==="error"){
          window.setTimeout(function(){
            $(".aphlistbuttonnextopembox").removeAttr('disabled');
            $("#porsenrbozx").html('');
            $("#process456").removeClass('lds-ripple');
            alertadvertencia(data.mensaje);
          }, 1000);
        }
        if(data.estado==="exito"){
          window.setTimeout(function(){
            location.href = urline+"carta/view/"+data.url;
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


  $(document).on("submit", "#form800goodlive_item_cart_update_list", function (e){
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('nombre',$("#ifgooda").val());
    formData.set('carta',$("#ifgooda").attr("data"));
    formData.set('precio',$("#ifgoodb").val());
    formData.set('listone',$("#ifgoodc").val());
    var idl = i++;
    $.ajax({
      url: urline+list_action()+"update_list_item_cat",
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
            window.location=urline+"carta/editar_item/"+data.dirb;
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

function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}

  $(document).on("change", ".list_carts_view", function(){
              let ind = $(this).val();
              $(this).val("");
              $.ajax({
                url:urline+list_action()+"view_cartas_list_in_page",
                type:"POST",
                data:{index:ind},
                dataType:"json",
                success: function(data){
                   var pathArray =window.location.pathname.lastIndexOf("/");
                  if(data.type){
                    if (swapPhoto(data.url)) {
                      history.pushState(null, null, data.url, null);
                    }
                    alertexito(data.mensaje)
                  }else{
                    alertadvertencia(data.mensaje)
                  }
                }
              });
            })
});

function supports_history_api() {
  return !!(window.history && history.pushState);
}

function swapPhoto(href) {
  var req = new XMLHttpRequest();
  function getUrlu(){
     var actual = window.location+'';
     var split = actual.split("/");
     var id = split[split.length-2];
     return id
   }
  req.open("GET",urline+list_action()+"view_cartas_list_option_in_page&viewind="+href+"&ph="+getUrlu(), true);
  req.onreadystatechange = function(aEvt){
    if (req.readyState == 4) {
      if (req.status == 200){
        const response = JSON.parse(req.responseText);
        document.getElementsByClassName('name_option_list_option_page')[0].innerHTML = response.nombre;
        document.getElementsByClassName('mount_option_list_items')[0].innerHTML = response.cantidad;
        document.getElementsByClassName('items_carta_in_options_list')[0].innerHTML = response.items_option;
      }else{
        document.getElementById("list_carts_view").innerHTML = "Error";
      }
    }
  };
  req.send(null);
  return true;
}


window.onload = function() {
  function getUrl(){
     var actual = window.location+'';
     var split = actual.split("/");
     var id = split[split.length-1];
     return id
}
  if (!supports_history_api()) { return; }
  window.setTimeout(function() {
    window.addEventListener("popstate", function(e){
      swapPhoto(getUrl());
    }, false);
  }, 1);
}


$(document).on("click", ".button_option_carta_list", function(){
  let dat = $(this).attr("data");
  let ops = $(".name_option_carta").val();
  $.ajax({
    url:urline+list_action()+"add_new_option_cart",
    type:"POST",
    data:{ind:dat,nom:ops},
    dataType:"json",
    success: function(data){
      if(data.type){
        $(".categorias_view_carta").prepend(data.opcion);
        dapl=document.querySelector('[data-modal-name="option_carta_one"]')
        dapl.classList.remove("is-modal-active");
        $(".name_option_carta").val("");
        $(".untmsd4ss4listti_opciones").html(data.cantidad+" Opciones")
        alertexito(data.mensaje)
      }else{
        alertadvertencia(data.mensaje)
      }
    }
  });
})

$(document).on("click", ".button_option_carta_list_update", function(){
  let dat = $(this).attr("data");
  let datX = $(this).attr("data-x");
  let ops = $(".name_option_carta_update_"+dat).val();
  $.ajax({
    url:urline+list_action()+"update_new_option_cart",
    type:"POST",
    data:{ind:dat,indx:datX,nom:ops},
    dataType:"json",
    success: function(data){
      if(data.type){
        dapl=document.querySelector('[data-modal-name="option_carta_update_'+dat+'"]')
        dapl.classList.remove("is-modal-active");
        $(".name_list_option"+dat).html(data.names);
        alertexito(data.mensaje)
      }else{
        alertadvertencia(data.mensaje)
      }
    }
  });
})



$(document).on("click", ".confirm_delete_opcion_item_carta", function(){
  var date = $(this).attr("data");
  var date_x = $(this).attr("data-x");
  function getUrl_one(){
     var actual = window.location+'';
     var split = actual.split("/");
     var id = split[split.length-1];
     return id
   }
  $.ajax({
    url: urline+list_action()+"delete_opcion_item_carta",
    type:'POST',
    dataType: "json",
    data:{datw:date,cart:date_x,umd:getUrl_one()},
    cache:false,
    success: function(data){
      dapl=document.querySelector('[data-modal-name="option_carta_'+ date + '"]')
      dapl.classList.remove("is-modal-active");
      $(".view_carta_option_"+date).remove()
      if(data.tipo=="exito"){
        $(".mount_option_list_items").html(data.cantidad)
        alertexito(data.mensaje)
      }
    },
  })
})