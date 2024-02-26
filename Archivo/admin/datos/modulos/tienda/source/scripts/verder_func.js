$(document).on("click", ".recibir_button_but_on", function(){
	let compra_data = $(this).attr("data");
	$.ajax({
		type:"POST",
		url:list_urls()+list_action()+"aceptar_venta",
		dataType:"json",
		data:{compra:compra_data},
		success: function(data){
			if(data.estado=="exito"){
				alertexito(data.mensaje);
				window.location.reload();
			}
		}
	});
})


$(document).on("click", ".recibir_button_but_on_b", function(){
	let compra_data = $(this).attr("data");
	$.ajax({
		type:"POST",
		url:list_urls()+list_action()+"aceptar_venta",
		dataType:"json",
		data:{compra:compra_data},
		success: function(data){
			if(data.estado=="exito"){
				alertexito(data.mensaje);
				window.location = list_urls()+"ventas/preparar/"+compra_data;
			}
		}
	});
})
$(document).on("click", ".listo_para_entregar_button_but_on", function(){
	let compra_data = $(this).attr("data");
	window.location = list_urls()+"ventas/preparar/"+compra_data;
})

$(document).on("click", ".listo_entregar_button_but_on", function(){
	let compra_data = $(this).attr("data");
	window.location = list_urls()+"ventas/entregar/"+compra_data;
})

$(document).on("click", ".listo_entregar_button_but_detalles", function(){
	let compra_data = $(this).attr("data");
	window.location = list_urls()+"ventas/detalles_venta/"+compra_data;
})

