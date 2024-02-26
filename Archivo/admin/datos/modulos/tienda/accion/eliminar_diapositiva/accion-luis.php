<?php 
if($_POST['dato']){
	$diapositiva_id = $_POST['dato'];
	
	/*imagenes*/
	$listdiapositivas = "../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/".$diapositiva_id;
	if(file_exists($listdiapositivas)) {
		foreach(glob($listdiapositivas."/*.*") as $img){  
		 	unlink($img);
		}
		rmdir($listdiapositivas);
	}

	$dis = new DatosAdmin();
	$dis->id = $diapositiva_id;
	$dis->eliminar_diapositiva();



}
?>