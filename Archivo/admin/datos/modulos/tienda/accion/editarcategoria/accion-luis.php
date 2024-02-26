<?php
$basepagina = Luis::basepage("base_page_admin");
$namesukr=DatosAdmin::poner_guion(strip_tags(htmlentities($_POST["nombre"])));
$categoria_d = DatosAdmin::getById_categoria($_POST['id']);
$ver=DatosAdmin::Verif_categoria($namesukr);
if ($ver==null or $namesukr==$categoria_d->ukr) {

 $categoria = new DatosAdmin();
 $categoria->id = $_POST["id"];
 $categoria->nombre = $_POST["nombre"];
 $categoria->ukr=$namesukr;
$handle = new \Verot\Upload\Upload($_FILES['logo']);

$image_a = "../datos/modulos/".Luis::temass()."/source/imagenes/categorias"."/".$categoria_d->logo;
$image_b = "../datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb"."/".$categoria_d->logo;
if(file_exists($image_a)){unlink($image_a);}
if(file_exists($image_b)){unlink($image_b);}

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
        $categoria->logo=$handle->file_dst_name;
    }else{
        $categoria->logo = $categoria_d->logo;
        $error = true;
        echo json_encode(array('estado' => "error", 'mensaje' => $handle->error));
    }
}




$categoria->editar_categoria();
Nucleo::redir($basepagina."categorias/".$namesukr."/update");
}else{
$_SESSION["failexep"]=$_POST["nombre"];
Nucleo::redir($basepagina."categorias/".$categoria_d->ukr."/update");
}