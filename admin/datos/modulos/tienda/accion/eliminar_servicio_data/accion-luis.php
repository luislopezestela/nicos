<?php 
if($_POST['dato']){
	$service = $_POST['dato'];
	$servicio = DatosAdmin::ver_servicio_id($service);

	/*imagenes*/
	$listdiapositivas = "../datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$servicio->id;
	if(file_exists($listdiapositivas)) {
		foreach(glob($listdiapositivas."/*.*") as $img){  
		 	unlink($img);
		}
		rmdir($listdiapositivas);
	}


	

	$img_one="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$servicio->icono;
	$img_two="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_ad_".$servicio->icono;
	$img_thre="../datos/modulos/".Luis::temass()."/source/imagenes/servicios"."/".$servicio->icono;

	if(file_exists($img_one)){unlink($img_one);}
	if(file_exists($img_two)){unlink($img_two);}
	if(file_exists($img_thre)){unlink($img_thre);}


	$dis = new DatosAdmin();
	$dis->id = $service;
	$dis->eliminar_servicio();

}
?>