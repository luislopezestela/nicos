<?php
$basepagina = Luis::basepage("base_page_admin");
$cat = new DatosAdmin();
$namesukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$ver=DatosAdmin::Verif_categoria($namesukr);
$verd2=DatosAdmin::Verif_sub_categoria($namesukr);

if ($verd2==null){
if ($ver==null) {
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];}
$cat->nombre = htmlentities($_POST["nombre"]);
$cat->codigo = $codigos;
$cat->ukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$handle = new \Verot\Upload\Upload($_FILES['logo']);

if($handle->uploaded){
	$handle->image_resize = true;
    $handle->image_x = 250;
    $handle->image_y = 250;
    $handle->image_convert = 'jpeg';
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb/";
    $handle->Process($url);
}

if($handle->uploaded){
    $handle->image_convert = 'jpeg';
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/categorias/";
    $handle->Process($url);
    if($handle->processed){
    	$cat->logo=$handle->file_dst_name;
    }else{
    	$error = true;
    	echo json_encode(array('estado' => "error", 'mensaje' => $handle->error));
    }
}
/*thumbails end */
unset($handle);

$cat->agregar_categoria();
}else{
$_SESSION["failexep"]=$_POST["nombre"];
}
}else{
$_SESSION["failexep"]=$_POST["nombre"];
}
Nucleo::redir($basepagina."categorias");