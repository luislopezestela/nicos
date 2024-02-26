<?php
if(isset($_SESSION['admin_id'])){
	if($_POST["name"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_nombre_de_moneda"), 'cl' => "name_mon"));
	}elseif($_POST["moneda"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_la_moneda"), 'cl' => "moned_mon"));
	}elseif($_POST["simbolo"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_simbolo_de_moneda"), 'cl' => "simb_mon"));
	}elseif($_FILES==null){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("selecciona_un_icono"), 'cl' => false));
	}else{
		$moneda = new DatosAdmin();
		$moneda->nombre = htmlentities($_POST['name']);
		$moneda->moneda = $_POST["moneda"];
		$moneda->simbolo = $_POST['simbolo'];
		$handle = new \Verot\Upload\Upload($_FILES['icon']);
		if($handle->uploaded){
			$imagen = new DatosAdmin();
			$handle->image_resize = true;
			$handle->image_x = 64;
			$handle->image_y = 64;
			$url="../datos/modulos/".Luis::temass()."/source/imagenes/divisas/";
			$handle->Process($url);
			if($handle->processed){
				$moneda->icon = $handle->file_dst_name;
				$moneda->agregar_moneda();
				echo json_encode(array('tipo' => 1, 'mensaje' => Luis::lang("guardado"), 'cl' => false));
			}else{
				$error = true;
				echo json_encode(array('tipo' => 0, 'mensaje' => $handle->error, 'cl' => false));
			}
		}
		
	}
}
 ?>