
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    //if (charCode > 31 && (charCode < 48 || charCode > 57)) //sin decimales
    if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
        return false;
    return true;
}

$(document).on("keypress", ".monto_init_input_sty", function(e){
	return isNumberKey(e)
})


$(document).on("click", ".acctions_new_box_order", function(){
	let simbolo = $(".monto_init_input_simbolo").val();
	let monto = $(".monto_init_input_monto").val();
	$.ajax({
		url:list_urls()+list_action()+"finanza_add",
		type:"POST",
		data:{simbol:simbolo,mont:monto},
		//dataType:"json",
		success: function(data){
			console.log(data)
			if(data.type){
				alertexito(data.mensaje)
				recargar(600)
			}else{
				alertadvertencia(data.mensaje)
			}
		}
	});
})

