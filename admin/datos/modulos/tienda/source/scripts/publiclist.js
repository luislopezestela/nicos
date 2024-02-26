var urline=$("#ur_timeline").attr("data");
$(document).ready(function(){
  var formData = new FormData();
  formData.append('intlinear',$(".hipboxmp").val());
  formData.append('nombre',$("#ifgooda").val());

  $(document).on("change", "#files", function () {
    $(".addnewimageluisboxus").removeClass("errorboxrequred")
    var files = this.files;
    var filesLength = files.length;
    var element;
    var supportedImages = ["image/jpeg", "image/png", "image/gif", "image/webp"];
    var seEncontraronElementoNoValidos = false;
    if(filesLength<=1 ) {
    for (var i = 0; i < files.length; i++) {
      var fileReader = new FileReader();
      element = files[i];
      fileReader.onload = (function(e) {
      var $divs = $(".addnewimageluisboxudimage").toArray().length;
      $(".coukbox").html($divs);
      if($divs>=1) {
        $(".addnewimageluisbotsccc").removeClass("adsfdg5");
        $(".addnewimageluisbotsccc").addClass("adsgdg5");
        $(".addnewimageluisboxus").removeClass("afsfdg5");
        $(".addnewimageluisboxus").addClass("afyfdg5");
      }

      if ($divs>1){
        $(".addnewimageluisbotsccc").attr('disabled', "disabled");
        $(".contentboxitemslistcread .infmaximgs").addClass("dihs")
      }

      });
      fileReader.readAsDataURL(element);
      if(supportedImages.indexOf(element.type) != -1) {
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
    console.log("hello world")
    formData.delete(id);
    $(parent).remove();
    var $divgs=$(".addnewimageluisboxudimage").length;
    $(".coukbox").html($divgs);
    if($divgs==0){
      $(".addnewimageluisbotsccc").removeClass("adsgdg5");
      $(".addnewimageluisbotsccc").addClass("adsfdg5");
      $(".addnewimageluisboxus").removeClass("afyfdg5");
      $(".addnewimageluisboxus").addClass("afsfdg5");
    }
    if($divgs<=1){
      $(".addnewimageluisbotsccc").removeAttr('disabled', "disabled");
      $(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
    }
    for(var pair of formData.entries()) {
    }
  });




  $(document).on("click", '.aphlistbuttonnextopembox', function(){
    var idl = i++;
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus()
      alertadvertencia("Ingresa un nombre válido.");
    }else{
      $("#blocknullfom12").click();
    }
});

$(".rols_int_disp").on( "click", function(){
  let datnull=$(this).attr("data-null");
  $fds=false;
  formData.append('imagen[]', datnull);
  $(this).parent(".addnewimageluisboxud").remove();
  var $divgs=$(".addnewimageluisboxudimage").length;
  $(".coukbox").html($divgs);
  if($divgs==0){
    $(".addnewimageluisbotsccc").removeClass("adsgdg5");
    $(".addnewimageluisbotsccc").addClass("adsfdg5");
    $(".addnewimageluisboxus").removeClass("afyfdg5");
    $(".addnewimageluisboxus").addClass("afsfdg5");
  }
  if($divgs<=1){
    $(".addnewimageluisbotsccc").removeAttr('disabled', "disabled");
    $(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
  }
});
/* update product */
$('.aphlistbuttonnextopemboxlist100').on("click", function(){
    var idl = i++;
    if($("#ifgooda").val()==""){
      $("#ifgooda").focus();
      alertadvertencia("Ingresa un título válido.");
    }else{
      $("#blocknullfom1300").click();
    }
  })
/* update product end*/

  $(document).on("submit", "#form800goodlive", function (e){
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('nombre',$("#ifgooda").val());
    var idl = i++;
    $.ajax({
      type:'POST',
      url: urline+list_action()+"publicar_carta",
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
            alertadvertencia(data.mensaje);
          }, 1000);
        }
        if(data.estado==="exito"){
          window.setTimeout(function(){
            location.href = urline+"carta";
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
    e.preventDefault();
    formData.set('intlinear',$(".hipboxmp").val());
    formData.set('nombre',$("#ifgooda").val());
    var idl = i++;
    $.ajax({
      url: urline+list_action()+"update_carta",
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
            window.location=urline+"carta/editar/"+data.dirb;
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

  $(document).on("change", ".list_carts_view", function(){
              let ind = $(this).val();
              $(this).val("");
              $.ajax({
                url:urline+list_action()+"input_lines",
                type:"POST",
                data:{index:ind},
                dataType:"json",
                success: function(data){
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
  req.open("GET",urline+list_action()+"input_lines_two&viewind="+ href, true);
  req.onreadystatechange = function(aEvt){
    if (req.readyState == 4) {
      if (req.status == 200){
        const response = JSON.parse(req.responseText);
        document.getElementsByClassName('date_view_item')[0].innerHTML = response.date;
        document.getElementsByClassName('name_view_item')[0].innerHTML = response.nombre;
        document.getElementsByClassName('view_image_prev')[0].innerHTML = response.img;
        document.getElementsByClassName('button_update_cart')[0].href = response.url;
        document.getElementsByClassName('button_option_carta_list')[0].setAttribute("data",response.cart_view_one);
        document.getElementsByClassName('untmsd4ss4listti_opciones')[0].innerHTML = response.cantidad+" Opciones";
        document.getElementsByClassName('categorias_view_carta')[0].innerHTML = response.options_carts;
        document.getElementsByClassName('cantidad_all_items_in_carta')[0].innerHTML = response.cantidad_items;
        document.getElementsByClassName('view_all_items_in_carta_url')[0].href = response.url_items;
      }else{
        document.getElementById("list_carts_view").innerHTML = "Error";
      }
    }
  };
  req.send(null);
  return true;
}


window.onload = function() {
  if (!supports_history_api()) { return; }
  window.setTimeout(function() {
    window.addEventListener("popstate", function(e) {
      var pathArray = window.location.pathname.split('/');
      swapPhoto(pathArray[5]);
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



$(document).on("click", ".confirm_delete_opcion_carta", function(){
  var date = $(this).attr("data");
  var date_x = $(this).attr("data-x");
  $.ajax({
    url: urline+list_action()+"delete_opcion_carta",
    type:'POST',
    dataType: "json",
    data:{datw:date,cart:date_x},
    cache:false,
    success: function(data){
      dapl=document.querySelector('[data-modal-name="option_carta_'+ date + '"]')
      dapl.classList.remove("is-modal-active");
      $(".view_carta_option_"+date).remove()
      if(data.tipo=="exito"){
        $(".untmsd4ss4listti_opciones").html(data.cantidad+" Opciones")
        alertexito(data.mensaje)
      }
    },
  })
})