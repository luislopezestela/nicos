<?php
$base = Luis::basepage("base_page");
if(isset($_SESSION['admin_id'])){
	if($_POST["name"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_nombre_de_moneda"), 'cl' => "name_mon"));
	}elseif($_POST["moneda"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_la_moneda"), 'cl' => "moned_mon"));
	}elseif($_POST["simbolo"]==""){
		echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("escribe_simbolo_de_moneda"), 'cl' => "simb_mon"));
	}else{
		$mon = DatosAdmin::Mostrar_las_monedas_por_id($_POST['mos']);
		$moneda = new DatosAdmin();
		$moneda->nombre = htmlentities($_POST['name']);
		$moneda->moneda = $_POST["moneda"];
		$moneda->simbolo = $_POST['simbolo'];
		$moneda->id = $_POST['mos'];
		if($mon->icon){
			if(isset($_FILES['icon'])){
				$handle = new \Verot\Upload\Upload($_FILES['icon']);
				$img_one="../datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$mon->icon;
				if(file_exists($img_one)){unlink($img_one);}
				if($handle->uploaded){
					$imagen = new DatosAdmin();
					$handle->image_resize = true;
					$handle->image_x = 64;
					$handle->image_y = 64;
					$url="../datos/modulos/".Luis::temass()."/source/imagenes/divisas/";
					$handle->Process($url);
					if($handle->processed){
						$moneda->icon = $handle->file_dst_name;
						$moneda->editar_moneda();
						$url2=$base."datos/modulos/".Luis::temass()."/source/imagenes/divisas/";
						echo json_encode(array('tipo' => 1, 'mensaje' => Luis::lang("guardado"), 'cl' => false, 'img' => $url2.$moneda->icon));
					}else{
						$error = true;
						echo json_encode(array('tipo' => 0, 'mensaje' => $handle->error, 'cl' => false));
					}
				}
			}else{
				$moneda->editar_moneda_b();
				echo json_encode(array('tipo' => 1, 'mensaje' => Luis::lang("guardado"), 'cl' => false));
			}
			
		}elseif($_FILES==null){
			echo json_encode(array('tipo' => 0, 'mensaje' => Luis::lang("selecciona_un_icono"), 'cl' => false));
		}
		
		
	}
}
 ?>