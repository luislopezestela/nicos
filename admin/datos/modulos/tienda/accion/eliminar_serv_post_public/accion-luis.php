<?php 
if($_POST['dato']){
	$service = $_POST['dato'];
	$img_service_post = DatosAdmin::public_post_image_data($service);
	$listdiapositivas = "../datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$img_service_post->id_servicio."/".$img_service_post->imagen;
	if(file_exists($listdiapositivas)){unlink($listdiapositivas);}
	$dis = new DatosAdmin();
	$dis->id = $service;
	$dis->eliminar_list_service_post();

}
?>