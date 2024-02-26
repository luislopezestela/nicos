<?php
$base = Luis::basepage("base_page_admin");
$cad = DatosAdmin::getById_categoria($_POST["id_categoria"]);

$cat = new DatosAdmin();
$nameukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$verd=DatosAdmin::Verif_categoria($nameukr);
$verd2=DatosAdmin::Verif_sub_categoria($nameukr);

if($verd==null){
if ($verd2==null){
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$cat->nombre = htmlentities($_POST["nombre"]);
$cat->id_categoria = $_POST["id_categoria"];
$cat->codigo = $codigos;
$cat->ukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$cat->agregar_sub_categoria();

Nucleo::redir($base."categorias/".$cad->ukr);
}else{
$_SESSION["failexep"]=$_POST["nombre"];
Nucleo::redir($base."categorias/".$cad->ukr);
}
}else{
	$_SESSION["failexep"]=$_POST["nombre"];
	Nucleo::redir($base."categorias/".$cad->ukr);
}