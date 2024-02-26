<?php
$basepagina = Luis::basepage("base_page_admin");
$c_a = DatosAdmin::sub_categoria_getById($_POST['id']);
$namesukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$c_b = DatosAdmin::getById_categoria($c_a->categoria);
$verd=DatosAdmin::Verif_categoria($namesukr);
$ver=DatosAdmin::Verif_sub_categoria($namesukr);
if($verd==null){
if($ver==null or $namesukr==$c_a->ukr){
 $categoria = new DatosAdmin();
 $categoria->id = $_POST["id"];
 $categoria->nombre = $_POST["nombre"];
 $categoria->ukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
 $categoria->editar_sub_categoria();
 Nucleo::redir($basepagina."categorias/".$c_b->ukr."/".$categoria->ukr."/update");
}else{
$_SESSION["failexep"]=$_POST["nombre"];
Nucleo::redir($basepagina."categorias/".$c_b->ukr."/".$c_a->ukr."/update");
}
}else{
	$_SESSION["failexep"]=$_POST["nombre"];
	Nucleo::redir($basepagina."categorias/".$c_b->ukr."/".$c_a->ukr."/update");
}