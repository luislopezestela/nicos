<?php
if(isset($_SESSION['admin_id'])){
	$mone = new DatosAdmin();
	$mone->id = $_POST['moneda'];
	$mon = DatosAdmin::Mostrar_las_monedas_por_id($_POST['moneda']);
	$img_one="../datos/modulos/".Luis::temass()."/source/imagenes/divisas/".$mon->icon;
	if(file_exists($img_one)){unlink($img_one);}
	$mone->eliminar_moneda();
}
