<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
	$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}

try{
	$publi=new DatosAdmin();
	$publi->usuario=$_SESSION["admin_id"];
	$publi->nombre=htmlentities($_POST["titulo"]);
	$publi->texto=htmlentities($_POST['descripcion']);
	$publi->url=htmlentities($_POST['url']);
	$publi->boton=htmlentities($_POST['boton']);
	$publi->codigo=$codigos;
	$publi->fecha=date ('Y-m-d H:i:s');
	$publi->ub=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
	if(isset($_FILES) && !empty($_FILES)){
		if(count($_FILES)>1){
			echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 fotos."));
		}else{
			if($_POST['boton']=="sin_boton"){
				$s=$publi->publicar_diapositiva();
			}else{
				$s=$publi->publicar_diapositiva_b();
			}
			$error = false;
			$files = array();
			$files = array_filter($_FILES, function($item) {
				return $item["name"][0] != "";
			});

			foreach($files as $file){
				$handle = new \Verot\Upload\Upload($file);
				/*thumbails*/
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_ratio_crop  = "R";
					$handle->image_x = 760;
					$handle->image_y = 360;
					$handle->image_convert = 'jpg';
					$handle->file_name_body_pre = 'thumb_';
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$s[1]/";
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
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$s[1]/";
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
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/diapositiva/$s[1]/";
					$handle->Process($url);
					if($handle->processed){
						$imagen->imagen = $handle->file_dst_name;
						$imagen->id_diapositiva = $s[1];
						$imagen->fecha=date ('Y-m-d H:i:s');
						$imagen->agrega_imagen_diapositiva();
					}else{
						$error = true;
						echo 'Error: ' . $handle->error;
					}
				}
				unset($handle);
			}

			if($s[1]){
				echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito."));
			}else{
				echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
			}
		}
	}else{
		if($_POST['boton']=="sin_boton"){
			$s=$publi->publicar_diapositiva();
		}else{
			$s=$publi->publicar_diapositiva_b();
		}
		
		if($s[1]){
			echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito."));
		}else{
			echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
		}
	}
}catch(Exception $e){
	echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}
?>