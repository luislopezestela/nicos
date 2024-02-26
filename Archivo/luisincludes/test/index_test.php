<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
date_default_timezone_set('America/Lima');


if(file_exists("datos/controlador/BaseDatos.php")){
	include "datos/controlador/BaseDatos.php";
	require_once('datos/controlador/init.php');
	
	include "datos/controlador/class.upload.php";
	include "datos/controlador/Functions.php";
	include "datos/controlador/Luis.php";
	include "datos/controlador/Layshane.php";
	include "datos/controlador/Accion.php";
	include "datos/controlador/Cookie.php";
	include "datos/controlador/Ejecutor.php";
	include "datos/controlador/Get.php";
	include "datos/controlador/IpLogger.php";
	include "datos/controlador/Modelo.php";
	include "datos/controlador/Modulo.php";
	include "datos/controlador/Nucleo.php";
	include "datos/controlador/Post.php";
	include "datos/controlador/Session.php";
	include "datos/controlador/Solicitud.php";
	include "datos/controlador/Visitas.php";
	include "datos/controlador/Vista.php";
	
	try{
		$luis = new Luis();
		if(Luis::temass()==""){
		}elseif(file_exists("datos/modulos/administrar")){
			$luis->loadModule("administrar");
		}
		
		if(mysqli_connect_errno()){
			exit();
		}
	}catch(Exception $e){
		if($e->getCode() == 1046){
		}elseif($e->getCode() == 1049){
			echo "Base de datos no existe";
		}elseif($e->getCode() == 1050){
			echo $e->getCode();
			echo "<br>";
			echo $e->getMessage();
		}else{
			echo $e->getCode();
			echo "<br>";
			echo $e->getMessage();
			echo "<br>";
			print_r($e->getTrace()[0]['args'][0]);
		}
		
		
	}
}else{
	include "datos/controlador/Layshane.php";
	$base_pg=BASE_URL_A;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Error</title>
		<link rel="shortcut icon" href="<?=$base_pg."datos/source/icons/shield.png";?>">
	</head>
	<body>
		<style type="text/css">
			.h1h{text-align:center;font-family:monospace;margin-top:56px;}
		</style>
		<h1 class="h1h">0100</h1>
	</body>
	</html>
	<?php
}






