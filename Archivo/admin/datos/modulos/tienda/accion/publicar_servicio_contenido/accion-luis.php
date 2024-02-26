<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
	$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}

try{
	$usuario = DatosUsuario::porId($_SESSION["admin_id"]);
	$publi=new DatosAdmin();
	$publi->id_servicio = $_POST['idendi'];
	$publi->usuario=$usuario->id;
	$publi->sucursal = $usuario->sucursal;
	$publi->texto=htmlentities($_POST['texto']);
	$publi->fecha=date ('Y-m-d H:i:s');
	$publi->url=$_POST["idendi"].$codigos."public";
	$publi->color = $_POST['color'];
	if(isset($_FILES) && !empty($_FILES)){
		if(count($_FILES)>1){
			echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 1 fotos."));
		}else{
			$error = false;
			$files = array();
			$files = array_filter($_FILES, function($item) {
				return $item["name"][0] != "";
			});

			foreach($files as $file){
				$handle = new \Verot\Upload\Upload($file);
				/*thumbails end thumb_view_*/
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_ratio_fill = true;
					$handle->image_x = 820;
					$handle->image_ratio_y = true;
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/servicios/publics/".$_POST['idendi'];
					$handle->Process($url);
					if($handle->processed){
						$publi->imagen = $handle->file_dst_name;
						$publi->fecha=date ('Y-m-d H:i:s');
						$publi->publicar_servicios_post_b();
					}else{
						$error = true;
						echo 'Error: ' . $handle->error;
					}
				}
				unset($handle);
			}
			echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito."));
			
		}
	}else{
		$publi->publicar_servicios_post_a();
		echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito."));
	}
}catch(Exception $e){
	echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}
?>