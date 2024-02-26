<?php
try{
	$dataid=$_POST['idendi'];
	$publi=new DatosAdmin();
	$publi->usuario=$_SESSION["admin_id"];
	$publi->nombre=htmlentities($_POST["titulo"]);
	$publi->texto=htmlentities($_POST['descripcion']);
	$publi->url=htmlentities($_POST['url']);
	$publi->boton=htmlentities($_POST['boton']);
	$publi->fecha=date ('Y-m-d H:i:s');
	$publi->ub=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
	$publi->id = $dataid;
	if(isset($_FILES) && !empty($_FILES)){
		if(count($_FILES)>1){
			echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 fotos."));
		}else{
			if($_POST['boton']=="sin_boton"){
				$publi->editar_diapositiva();
			}else{
				$publi->editar_diapositiva_b();
			}
			$error = false;
			$files = array();
			$files = array_filter($_FILES, function($item) {
				return $item["name"][0] != "";
			});

			foreach($files as $file){
				$handle = new \Verot\Upload\Upload($file);
				$img_slide = DatosAdmin::diapositiva_image($dataid);
				$img_one="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/thumb_".$img_slide->imagen;
				$img_two="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/thumb_view_".$img_slide->imagen;
				$img_thre="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/".$img_slide->imagen;
				if(file_exists($img_one)){unlink($img_one);}
				if(file_exists($img_two)){unlink($img_two);}
				if(file_exists($img_thre)){unlink($img_thre);}
				/*thumbails*/
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_ratio_crop  = "R";
					$handle->image_x = 760;
					$handle->image_y = 360;
					$handle->image_convert = 'jpg';
					$handle->file_name_body_pre = 'thumb_';
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/";
					$handle->Process($url);
				}

 
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_ratio_fill = 'R';
					$handle->image_x = 861;
					$handle->image_y = 256;
					$handle->image_background_color = $_POST['color'];
					$handle->file_name_body_pre = 'thumb_view_';
					$handle->image_convert = 'jpg';
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/";
					$handle->Process($url);
				}

				/*thumbails end thumb_view_*/
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_ratio_fill = 'R';
					$handle->image_x = 1920;
					$handle->image_y = 568;
					$handle->image_background_color = $_POST['color'];
					$handle->image_convert = 'jpg';
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$dataid/";
					$handle->Process($url);
					if($handle->processed){
						$imagen->imagen = $handle->file_dst_name;
						$imagen->id_diapositiva = $dataid;
						$imagen->fecha=date ('Y-m-d H:i:s');
						$imagen->editar_imagen_diapositiva();
					}else{
						$error = true;
						echo 'Error: ' . $handle->error;
					}
				}
				unset($handle);
			}

			echo json_encode(array('estado' => "exito", 'mensaje' => "Actualizado."));
		}
	}else{
		if($_POST['boton']=="sin_boton"){
			$publi->editar_diapositiva();
		}else{
			$publi->editar_diapositiva_b();
		}
		
		echo json_encode(array('estado' => "exito", 'mensaje' => "Actualizado."));
	}
}catch(Exception $e){
	echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}
?>