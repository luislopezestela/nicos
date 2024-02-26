var urline=$("#ur_timeline").attr("data");
$(document).on("click", ".confirm_delete_carta", function(){
	var date = $(this).attr("data");
	$.ajax({
		url: urline+list_action()+"delete_carta",
		type:'POST',
		dataType: "json",
		data:{datw:date},
		cache:false,
		success: function(data){
			dapl=document.querySelector('[data-modal-name="option_carta_'+ date + '"]')
			dapl.classList.remove("is-modal-active");
			$(".view_carta_"+date).remove()
			if(data.tipo=="exito"){
				$(".untmsd4ss4listti").html(data.cantidad+" Publicaciones")
				alertexito(data.mensaje)
			}
		},
	})
})