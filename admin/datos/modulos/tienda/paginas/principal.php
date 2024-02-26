<?php
ob_start();
Layshane::server_name("admin");
$logopagina = Luis::page_conf("header")->logo_img;
if(isset($_GET["paginas"])){
	$urb=explode("/", $_GET["paginas"]);
	if(isset($urb[1])){$urb1=$urb[1];}else{$urb1=false;}
	if(isset($urb[2])){$urb2=$urb[2];}else{$urb2=false;}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title><?=Luis::head_init("title");?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="title" content="<?=Luis::head_init("title");?>">
	<meta name="theme-color" content="<?=Luis::head_init("primarycolor");?>">
	<link rel="shortcut icon" href="<?=BASE_URL_B."datos/imagenes/logo.png";?>">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL_B."datos/source/estilos/estilosad.css";?>">
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL_B."datos/source/estilos/csnots.css";?>">
	<?php if(isset($_SESSION["admin_id"])):?>
		<link rel="stylesheet" type="text/css" href="<?=BASE_URL_B."datos/modulos/".Luis::temass()."/source/estilos/estilos.css";?>">
	<?php endif ?>
	<?=Luis::styles();?>
	<script src="<?=BASE_URL_B."datos/source/scripts/jquery.min.js";?>"></script>
	<script src="<?=BASE_URL_B."datos/source/scripts/pages.js";?>"></script>
	<?php if (isset($_GET["paginas"])): ?>
		<?php if($_GET["paginas"]=="sucursales/".$urb1 or $_GET["paginas"]=="sucursales/".$urb1."/".$urb2): ?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzVClbbKRZ2Id-N8Xr-Sws5Z32NpVB-JY"></script>
			<script src="<?=BASE_URL_B."datos/source/scripts/maps.js";?>"></script>
		<?php endif ?>
	<?php endif ?>
	
</head>
<body id="bod">
	<div class="mensaje100"></div>
	<div id="process456" class="lds-rippledef"><div></div><div></div> <div id="porsenrbozx"></div></div>
	<div id="ur_timeline" data="<?=BASE_URL_B;?>"></div>
	<?=DatosAdmin::page_timeline_view();?>
	<?php if(isset($_SESSION['adios_user'])): ?>
	<p class="message_session_unsed">Session finalizado.</p>
	<?php unset($_SESSION['adios_user']); else: ?>
	<?php endif ?>
	<?=Luis::scripts_footer();?>
	<?php if(isset($_SESSION["admin_id"])):?>
	<script type='text/javascript' src="<?=BASE_URL_B."datos/modulos/".Luis::temass()."/source/scripts/pagehom.js";?>"></script>
	<?php endif ?>
</body>
</html>
<?php
ob_end_flush();
?>