<?php
$base_pg=BASE_URL_A;
?>
<!DOCTYPE html>
<html>
<head>
	<title id="title_pages"><?=$lui['lang']['titulo'];?></title>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#2c3e50">
	<link rel="shortcut icon" href="<?=$base_pg."datos/source/icons/shield.png";?>">
	<link rel="stylesheet" type="text/css" href="<?=$base_pg."datos/modulos/instalar/source/style.css";?>">
	<script src="<?=$base_pg."admin/datos/source/scripts/jquery.min.js";?>"></script>
</head>
<?=Vista::load("index"); ?>
<script src="<?=$base_pg."datos/modulos/instalar/source/script.js";?>"></script>
</html>