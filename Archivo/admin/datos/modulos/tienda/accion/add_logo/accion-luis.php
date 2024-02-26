<?php 

if(isset($_FILES) && !empty($_FILES)){
	$logopaginaweb = Luis::dato("luis_logo")->valor;
	$handle = new \Verot\Upload\Upload($_FILES["l_image"]);
	if($handle->uploaded){
		$imagen = new DatosAdmin();
		$handle->image_resize = true;
		$handle->image_ratio_x = true;
		$handle->image_y = 80;
		$url="../datos/imagenes/pagina/";
		$handle->Process($url);
		if($handle->processed){
			$imagen->icono = $handle->file_dst_name;
			$imagen->cambio_logo_page();
		}else{
			echo json_encode(array('estado' => 'error', 'mensaje' => "Error: ".$handle->error));
		}
	}
	print_r($_FILES);
}else{
	echo json_encode(array('estado' => "alerta", 'mensaje' => Luis::lang("no_se_encontro_cambios")));
}
?>