<?php
$servicio = DatosAdmin::ver_servicio_id($_POST['idendi']);
$urldata=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
$servi = DatosAdmin::serv_view($urldata);
if(!$servi or $servicio->url == $urldata){
	try{
		$publi=new DatosAdmin();
		$publi->usuario=$_SESSION["admin_id"];
		$publi->nombre=htmlentities($_POST["titulo"]);
		$publi->url=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
		$publi->id = $servicio->id;
		if(isset($_FILES) && !empty($_FILES)){
			if(count($_FILES)>1){
				echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 iconos."));
			}else{
				$error = false;
				$files = array();
				$files = array_filter($_FILES, function($item) {
					return $item["name"][0] != "";
				});

				foreach($files as $file){
					$handle = new \Verot\Upload\Upload($file);
					$img_one="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_".$servicio->icono;
					$img_two="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/thumb_ad_".$servicio->icono;
					$img_thre="../datos/modulos/".Luis::temass()."/source/imagenes/servicios"."/".$servicio->icono;

					if(file_exists($img_one)){unlink($img_one);}
					if(file_exists($img_two)){unlink($img_two);}
					if(file_exists($img_thre)){unlink($img_thre);}
					/*thumbails*/
					if($handle->uploaded){
						$imagen = new DatosAdmin();
						$handle->image_resize = true;
						$handle->image_x = 60;
						$handle->image_y = 60;
						$handle->file_name_body_pre = 'thumb_';
						$url="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/";
						$handle->Process($url);
					}

					if($handle->uploaded){
						$imagen = new DatosAdmin();
						$handle->image_resize = true;
						$handle->image_x = 150;
						$handle->image_y = 150;
						$handle->file_name_body_pre = 'thumb_ad_';
						$url="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/";
						$handle->Process($url);
					}

					/*thumbails end thumb_view_*/
					if($handle->uploaded){
						$imagen = new DatosAdmin();
						$handle->image_resize = true;
						$handle->image_x = 417;
						$handle->image_y = 417;
						$url="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/";
						$handle->Process($url);
						if($handle->processed){
							$publi->icono = $handle->file_dst_name;
							$publi->editar_servicios();
						}else{
							$error = true;
							echo 'Error: ' . $handle->error;
						}
					}
					unset($handle);
				}
				echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'lks' => $urldata));
			}
		}else{
			if($servicio->icono){
				$publi->editar_servicios_fals();
				echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'lks' => $urldata));
			}else{
				echo json_encode(array('estado' => "error", 'mensaje' => "Selecciona un icono"));
			}
			
		}
		
	}catch(Exception $e){
		echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
	}
}else{
	echo json_encode(array('estado' => "error", 'mensaje' => "El servicio ya existe"));
}
?>