$(document).ready(function(){
	function StringluisRand(length) {
		var coderun = "";
		var cods = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		for(var i = 0; i < length; i++)
			coderun += cods.charAt(Math.floor(Math.random() * cods.length));
		return coderun;
	}

	function vistaprevia(file, id){
		var datbass=$(".addnewimage_slide").attr("data-got");
		var imagenencode = URL.createObjectURL(file);
		var img = $("<span class=\"addnewimageluisboxud\" id=\""+id+"\"><span class=\"addnewimageluisboxudremove\"><img src=\""+datbass+"datos/imagenes/icons/csacdjkclos.png\"></span><img class=\"addnewimageluisboxudimage svv\" src=\""+imagenencode+"\" title=\"Foto\"/></span>");
		$("#litimgecurrrent").append(img);
	}

	var averagediv = document.getElementById('averagecolor'),contenids = document.getElementById('litimgecurrrent'), averageimage = document.getElementsByClassName("svv");

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

	var formData = new FormData();
	formData.append('titulo',$("#tituloslider").val());
	formData.append('descripcion',$("#descripcion_slider").val());
	formData.append('url',$("#ulrslider").val());
	formData.append('boton',$("#buttonslider").val());
	formData.append('color',$("#averagecolor").val());
	formData.append('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
	$(document).on("change", "#files", function (e){
		$(".addnewimageluisboxusslide").removeClass("errorboxrequred")
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
	  				var $divs = $(".addnewimageluisboxudimage").toArray().length;
	  				$(".coukbox").html($divs);
	  				if($divs>=1) {
	  					$(".addnewimage_slide").removeClass("adsfdg5");
	  					$(".addnewimage_slide").addClass("adsgdg5");
	  					$(".butto_slide").addClass("adsaddslid");

	  					$(".addnewimageluisboxusslide").removeClass("afsfdg5");
	  					$(".addnewimageluisboxusslide").addClass("afyfdg5");
	  				}
	  				if ($divs>0){
	  					$(".addnewimage_slide").attr('disabled', "disabled");
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
			contenids.removeAttribute("style")
			averagediv.value = "";
			$(".addnewimage_slide").removeClass("adsgdg5");
			$(".addnewimage_slide").addClass("adsfdg5");
			$(".butto_slide").removeClass("adsaddslid");
			$(".addnewimageluisboxusslide").removeClass("afyfdg5");
			$(".addnewimageluisboxusslide").addClass("afsfdg5");
		}

		if($divgs<=1){
			$(".addnewimage_slide").removeAttr('disabled', "disabled");
			$(".contentboxitemslistcread .infmaximgs").removeClass("dihs")
		}
	});

	$(document).on("click", '.aphlistbuttonnextopembox_slider', function(){
		if($("#tituloslider").val()==""){
			$("#tituloslider").focus();
			alertadvertencia("Ingresa un título válido.");
		}else if($("#descripcion_slider").val()==""){
			$("#descripcion_slider").focus()
			alertadvertencia("Ingresa descripcion.");
		}else if($("#ulrslider").val()==""){
			$("#ulrslider").focus()
			alertadvertencia("Ingresa url.");
		}else if($("#buttonslider").val()==""){
			$("#buttonslider").focus()
			alertadvertencia("Ingresa nombre del boton.");
		}else{
			$("#blocknullfom12_slider").click();
		}
	});


	$(document).on("submit", "#new_slider_page", function (e){
		e.preventDefault();
		formData.set('titulo',$("#tituloslider").val());
		formData.set('descripcion',$("#descripcion_slider").val());
		formData.set('url',$("#ulrslider").val());
		formData.set('boton',$("#buttonslider").val());
		formData.set('color',$("#averagecolor").val());
		formData.set('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
		var optl=$(".optlistnull").attr("data-nullb");
	    var idl = i++;
	    $.ajax({
	      type:'POST',
	      url: list_urls()+list_action()+"publicar_slider",
	      data:formData,
	      cache:false,
	      dataType: "json",
	      contentType: false,
	      processData: false,
	      beforeSend: function(){
	        $(".aphlistbuttonnextopembox_slider").attr('disabled',"disabled");
	        $("#process456").addClass('lds-ripple');
	      },
	      success: function(data){
	        if(data.estado==="error"){
	          window.setTimeout(function(){
	            $(".aphlistbuttonnextopembox_slider").removeAttr('disabled');
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


	$(document).on("click", '.aphlistbuttonnextopembox_slider_update', function(){
		if($("#tituloslider").val()==""){
			$("#tituloslider").focus();
			alertadvertencia("Ingresa un título válido.");
		}else if($("#descripcion_slider").val()==""){
			$("#descripcion_slider").focus()
			alertadvertencia("Ingresa descripcion.");
		}else if($("#ulrslider").val()==""){
			$("#ulrslider").focus()
			alertadvertencia("Ingresa url.");
		}else if($("#buttonslider").val()==""){
			$("#buttonslider").focus()
			alertadvertencia("Ingresa nombre del boton.");
		}else{
			$("#blocknullfom12_slider_update").click();
		}
	});


	$(document).on("submit", "#update_slider_page", function (e){
		e.preventDefault();
		formData.set('titulo',$("#tituloslider").val());
		formData.set('descripcion',$("#descripcion_slider").val());
		formData.set('url',$("#ulrslider").val());
		formData.set('boton',$("#buttonslider").val());
		formData.set('color',$("#averagecolor").val());
		formData.set('idendi',$(".aphlistbuttonnextopenbox").attr("data"));
		var optl=$(".optlistnull").attr("data-nullb");
	    var idl = i++;
	    $.ajax({
	      type:'POST',
	      url: list_urls()+list_action()+"editar_slider",
	      data:formData,
	      cache:false,
	      dataType: "json",
	      contentType: false,
	      processData: false,
	      beforeSend: function(){
	        $(".aphlistbuttonnextopembox_slider").attr('disabled',"disabled");
	        $("#process456").addClass('lds-ripple');
	      },
	      success: function(data){
	        if(data.estado==="error"){
	          window.setTimeout(function(){
	            $(".aphlistbuttonnextopembox_slider").removeAttr('disabled');
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


	/////eliminar diapositiva
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


});