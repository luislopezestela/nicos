$(document).ready(function(){
	function StringluisRand(length) {
		var coderun = "";
		var cods = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for(var i = 0; i < length; i++)
			coderun += cods.charAt(Math.floor(Math.random() * cods.length));
		return coderun;
	}

	function vistaprevia(file, id){
		var datbass=$(".addnewimage_servicios").attr("data-got");
		var imagenencode = URL.createObjectURL(file);
		var img = $("<span class=\"addnewimageluisboxud\" id=\""+id+"\"><span class=\"addnewimageluisboxudremove\"><img src=\""+datbass+"datos/imagenes/icons/csacdjkclos.png\"></span><img class=\"addnewimageluisboxudimage svv\" src=\""+imagenencode+"\" title=\"Foto\"/></span>");
		$("#litimgecurrrent_ser").append(img);
	}

	var formData = new FormData();
	formData.append('titulo',$("#tituloslider").val());
	formData.append('idendi',$(".aphlistbuttonnextopenbox").attr("data"));

	$(document).on("change", "#files", function (e){
		$(".addnewimageluisboxusservicios").removeClass("errorboxrequred")
		var files = this.files;
	  	var filesLength = files.length;
	  	var element;
	  	var elementthow;
	  	var supportedImages = ["image/jpeg", "image/png", "image/gif", "image/webp"];
	  	var seEncontraronElementoNoValidos = false;
	  	if(filesLength<=1 ){
	  		for(var i = 0; i < files.length; i++){
	  			var id = StringluisRand(10);
	  			var reader = new FileReader();
	  			element = e.target.files[0];
	  			elementthow = files[i]
	  			reader.onload = (function(e) {
	  				var image = new Image();
	  				image.src = e.target.result;
	  				image.onload = function() {
	  					//switchImage(this);
	  				}
	  				var $divs = $(".addnewimageluisboxudimage").toArray().length;
	  				$(".coukbox").html($divs);
	  				if($divs>=1) {
	  					$(".addnewimage_servicios").removeClass("adsfdg5");
	  					$(".addnewimage_servicios").addClass("adsgdg5");
	  					$(".butto_servicios").addClass("adsaddslid");

	  					$(".addnewimageluisboxusservicios").removeClass("afsfdg5");
	  					$(".addnewimageluisboxusservicios").addClass("afyfdg5");
	  				}
	  				if ($divs>0){
	  					$(".addnewimage_servicios").attr('disabled', "disabled");
	  					$(".contentboxitemslistcread .infmaximgs").addClass("dihs")
	  				}
		  			
	  			});

	  			reader.readAsDataURL(elementthow);
	  			if(supportedImages.indexOf(element.type) != -1) {
		  			vistaprevia(element, id);
		  			formData.append(id, elementthow);
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
		if($divgs==0){
			$(".addnewimage_servicios").removeClass("adsgdg5");
			$(".addnewimage_servicios").addClass("adsfdg5");
			$(".butto_servicios").removeClass("adsaddslid");
			$(".addnewimageluisboxusservicios").removeClass("afyfdg5");
			$(".addnewimageluisboxusservicios").addClass("afsfdg5");
		}

		if($divgs<=1){
			$(".addnewimage_servicios").removeAttr('disabled', "disabled");
			$(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
		}
	});



	var averagediv = document.getElementById('averagecolor'),contenids = document.getElementById('litimgecurrrent_ser_ads'), averageimage = document.getElementsByClassName("svv");

	function getaverageColor(imagen){
		var r=0, g=0, b=0, count = 0, canvas, ctx, imageData, data, i;
		canvas = document.createElement('canvas');
		ctx = canvas.getContext("2d");
		canvas.width = imagen.width;
		canvas.height = imagen.height;
		ctx.drawImage(imagen, 0, 0);
		imageData = ctx.getImageData(0, 0, imagen.width, imagen.height);
		data = imageData.data;
		for(i = 0, n = data.length; i < n; i += 4) {
			++count;
			r += data[i];
			g += data[i+1];
			b += data[i+2];
		}
		r = ~~(r/count);
		g = ~~(g/count);
		b = ~~(b/count);
		return [r, g, b];
	}

	function rgbToHex(arr){
		return "#" + ((1 << 24) + (arr[0] << 16) + (arr[1] << 8) + arr[2]).toString(16).slice(1);
	}

	function uploadImage(e){
		var image = new Image();
		image.src = e.target.result;
		image.onload = function() {
			switchImage(this);
		}
	}

	function switchImage(image) {
		var averagecolor = getaverageColor(image);
		var color = rgbToHex(averagecolor);
		averageimage.src = image;
		contenids.style.backgroundColor = averagediv.value = color;
	}

	function vistaprevia_ads(file, id){
		var datbass=$(".addnewimage_servicios_ads").attr("data-got");
		var imagenencode = URL.createObjectURL(file);
		var img = $("<span class=\"addnewimageluisboxud_ads\" id=\""+id+"\"><span class=\"addnewimageluisboxudremove_ads\"><img src=\""+datbass+"datos/imagenes/icons/csacdjkclos.png\"></span><img class=\"addnewimageluisboxudimage_ads svv\" src=\""+imagenencode+"\" title=\"Foto\"/></span>");
		$("#litimgecurrrent_ser_ads").append(img);
	}


	$(document).on("change", "#files_services", function (e){
		$(".addnewimageluisboxusservicios_ads").removeClass("errorboxrequred")
		var files = this.files;
	  	var filesLength = files.length;
	  	var element;
	  	var elementthow;
	  	var supportedImages = ["image/jpeg", "image/png", "image/gif", "image/webp"];
	  	var seEncontraronElementoNoValidos = false;
	  	if(filesLength<=1 ){
	  		for(var i = 0; i < files.length; i++){
	  			var id = StringluisRand(10);
	  			var reader = new FileReader();
	  			element = e.target.files[0];
	  			elementthow = files[i]
	  			reader.onload = (function(e) {
	  				var image = new Image();
	  				image.src = e.target.result;
	  				image.onload = function() {
	  					switchImage(this);
	  				}
	  				var $divs = $(".addnewimageluisboxudimage_ads").toArray().length;
	  				$(".coukbox").html($divs);
	  				if($divs>=1) {
	  					$(".addnewimage_servicios_ads").removeClass("adsfdg5");
	  					$(".addnewimage_servicios_ads").addClass("adsgdg5");
	  					$(".butto_servicios").addClass("adsaddslid");

	  					$(".addnewimageluisboxusservicios_ads").removeClass("afsfdg5");
	  					$(".addnewimageluisboxusservicios_ads").addClass("afyfdg5");
	  				}
	  				if ($divs>0){
	  					$(".addnewimage_servicios_ads").attr('disabled', "disabled");
	  					$(".contentboxitemslistcread .infmaximgs").addClass("dihs")
	  				}
		  			
	  			});

	  			reader.readAsDataURL(elementthow);
	  			if(supportedImages.indexOf(element.type) != -1) {
		  			vistaprevia_ads(element, id);
		  			formData.append(id, elementthow);
		  		}else{
		  			seEncontraronElementoNoValidos = true;
		  		}
	  		}
	  	}
	});

	// Eliminar previsualizaciones
	$(document).on("click", ".addnewimageluisboxudremove_ads", function(e){
		var parent = $(this).parent();
		var id = $(parent).attr("id");
		formData.delete(id);
		$(parent).remove();
		var $divgs=$(".addnewimageluisboxudimage_ads").length;
		$(".coukbox").html($divgs);
		if($divgs==0){
			contenids.removeAttribute("style")
			averagediv.value = "";
			$(".addnewimage_servicios_ads").removeClass("adsgdg5");
			$(".addnewimage_servicios_ads").addClass("adsfdg5");
			$(".butto_servicios").removeClass("adsaddslid");
			$(".addnewimageluisboxusservicios_ads").removeClass("afyfdg5");
			$(".addnewimageluisboxusservicios_ads").addClass("afsfdg5");
		}

		if($divgs<=1){
			$(".addnewimage_servicios_ads").removeAttr('disabled', "disabled");
			$(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
		}
	});



	$(document).on("click", '.aphlistbuttonnextopembox_servicios', function(){
		if($("#tituloslider").val()==""){
			$("#tituloslider").focus();
			alertadvertencia("Ingresa un nombre válido.");
		}else{
			$("#blocknullfom12_slider").click();
		}
	});


	$(document).on("submit", "#new_slider_page", function (e){
		e.preventDefault();
		formData.set('titulo',$("#tituloslider").val());
		formData.set('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
		var optl=$(".optlistnull").attr("data-nullb");
	    var idl = i++;
	    $.ajax({
	      type:'POST',
	      url: list_urls()+list_action()+"publicar_servicio",
	      data:formData,
	      cache:false,
	      dataType: "json",
	      contentType: false,
	      processData: false,
	      beforeSend: function(){
	        $(".aphlistbuttonnextopembox_servicios").attr('disabled',"disabled");
	        $("#process456").addClass('lds-ripple');
	      },
	      success: function(data){
	        if(data.estado==="error"){
	          window.setTimeout(function(){
	            $(".aphlistbuttonnextopembox_servicios").removeAttr('disabled');
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
	});

	$('.slidepageopt').click(function(){
		var bap = $(this).attr('id');
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"slidepageopt",
			data:{dato:bap},
			success: function(data) {
				$('.slidepageopt'+bap).html(data);
				alertexito("Los cambios se guardaron con exito.");
			}
		});
	});


	///////updates pages 


	$(document).on("click", '.aphlistbuttonnextopembox_servicios_update', function(){
		if($("#tituloslider").val()==""){
			$("#tituloslider").focus();
			alertadvertencia("Ingresa un nombre válido.");
		}else{
			$("#blocknullfom12_slider_update").click();
		}
	});


	$(document).on("submit", "#update_slider_page", function (e){
		e.preventDefault();
		formData.set('titulo',$("#tituloslider").val());
		formData.set('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
		var optl=$(".optlistnull").attr("data-nullb");
	    var idl = i++;
	    $.ajax({
	      type:'POST',
	      url: list_urls()+list_action()+"editar_servicio",
	      data:formData,
	      cache:false,
	      dataType: "json",
	      contentType: false,
	      processData: false,
	      beforeSend: function(){
	        $(".aphlistbuttonnextopembox_servicios_update").attr('disabled',"disabled");
	        $("#process456").addClass('lds-ripple');
	      },
	      success: function(data){
	        if(data.estado==="error"){
	          window.setTimeout(function(){
	            $(".aphlistbuttonnextopembox_servicios_update").removeAttr('disabled');
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
	            window.location = list_urls()+"servicios/update/"+data.lks;
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


	/////eliminar servicios
	$('.diapositivas_eliminar').click(function(){
		var diapositiva = $(this).attr('data');
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"eliminar_diapositiva",
			data:{dato:diapositiva},
			success: function(data) {
				$('#diapositiva_s'+diapositiva).slideUp();
				alertexito("Eliminado.");
			}
		});
	});




	//////ads
	$(document).on("click", '.aphlistbuttonnextopembox_servicios_ads', function(){
		if($("#textpublix_data").val()==""){
			$("#textpublix_data").focus();
			alertadvertencia("Ingresa un texto.");
		}else{
			$("#new_service_page_ads").click();
		}
	});

	$(document).on("submit", "#new_service_page_ads_datas", function (e){
		e.preventDefault();
		formData.set('texto',$("#textpublix_data").val());
		formData.set('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
		formData.set('color',$("#averagecolor").val());
	    var idl = i++;
	    $.ajax({
	      type:'POST',
	      url: list_urls()+list_action()+"publicar_servicio_contenido",
	      data:formData,
	      cache:false,
	      dataType: "json",
	      contentType: false,
	      processData: false,
	      beforeSend: function(){
	        $(".aphlistbuttonnextopembox_servicios").attr('disabled',"disabled");
	        $("#process456").addClass('lds-ripple');
	      },
	      success: function(data){
	        if(data.estado==="error"){
	          window.setTimeout(function(){
	            $(".aphlistbuttonnextopembox_servicios").removeAttr('disabled');
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
	});

	/////eliminar servicios_ads_public_eliminar
	$('.servicios_ads_public_eliminar').click(function(){
		var servicio_public = $(this).attr('data');
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"eliminar_serv_post_public",
			data:{dato:servicio_public},
			success: function(data) {
				$('#service_s_ads'+servicio_public).slideUp();
				alertexito("Eliminado.");
			}
		});
	});

	/// funcion de cambio de publicacion visivilidad de publicacion  
	$('.public_post_data_opt').click(function(){
		var bap = $(this).attr('id');
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"public_post_data_opt",
			data:{dato:bap},
			success: function(data) {
				$('.public_post_data_opt'+bap).html(data);
				alertexito("Los cambios se guardaron con exito.");
			}
		});
	});

	$('.servicios_eliminar').click(function(){
		var servicio_public = $(this).attr('data');
		alerta_confirm_dialog("eliminar_servicios_list", servicio_public, false);
	});

	$(document).on("click", '.eliminar_servicios_list', function(){
		var servicio_public = $(this).attr('data');
		$.ajax({
			type: "POST",
			url: list_urls()+list_action()+"eliminar_servicio_data",
			data:{dato:servicio_public},
			success: function(data) {
				console.log(data)
				$("#alert_confirm_action_dialog"+servicio_public).remove();
				$('#servicios_lisps'+servicio_public).slideUp();
				alertexito("Eliminado.");
			}
		});
	});
	

});