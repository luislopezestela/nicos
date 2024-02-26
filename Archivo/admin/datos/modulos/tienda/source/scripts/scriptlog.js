var urline=$("#ur_timeline").attr("data");
var doc = $("input[name='dni']");

$(document).ready(function(){
	$(document).on("submit", "#logboxinit", function(e){
		e.preventDefault();
		var dataToSend = $("#logboxinit").serialize();
		$.ajax({
			url:urline+list_action()+"login",
			type:"POST",
			data:dataToSend,
			//dataType:"json",
			success: function(data){
				console.log(data)
				if(data.activar){
					$(".border_pals_luis").html("<input type=\"text\" name=\"codd\" class=\"cajas_de_texto_acceder\" autocomplete=\"off\" placeholder=\"Codigo de verificacion.\">");
				}
				if(data.type){
					alertexito(data.mensaje)
					recargar(500)
				}else{
					alertadvertencia(data.mensaje)
				}
			}
		});
	});

	/// registrar usuario a
	$(document).on("submit", "#logboxinitregister", function(e){
		e.preventDefault();
		var dataToSend = $("#logboxinitregister").serialize();
		$.ajax({
			url:urline+list_action()+"luis_new_us_page",
			type:"POST",
			data:dataToSend,
			dataType:"json",
			success: function(data){
				if(data.type){
					alertexito(data.mensaje)
					recargar(700)
				}else{
					alertadvertencia(data.mensaje)
				}
			}
		});
	});

	
});


//////data document  
$(document).on("keyup", "input[name='dni']", function(){
	var datinp = doc.val().length;
	if(datinp > 7){
		$.ajax({
			url:urline+list_action()+"luis_consuls",
			type:"POST",
			data:{docs:doc.val()},
			dataType:"json",
			success: function(data){
				$("input[name='nombres']").val(data.nombres);
				$("input[name='apellido_paterno']").val(data.apellidoPaterno);
				$("input[name='apellido_materno']").val(data.apellidoMaterno);
			}
		});
	}
});


$(document).on("submit", "#create_new_sucursal_page", function(e){
	e.preventDefault();
	var dataToSend = $("#create_new_sucursal_page").serialize();
	$.ajax({
		url:urline+list_action()+"luis_consuls_address",
		type:"POST",
		data:dataToSend,
		dataType:"json",
		success: function(data){
			console.log(data)
			if(data.type){
				alertexito(data.mensaje)
				recargar(700)
			}else{
				alertadvertencia(data.mensaje)
			}
		}
	});
});