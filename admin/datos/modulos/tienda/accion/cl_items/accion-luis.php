<?php
$p = DatosAdmin::porID_producto($_POST['ups_tr']);
$base = Luis::basepage("base_page_admin");
$ims=DatosAdmin::porProductoslista_imagenes($_POST["ups_tr"]);


/*Tumps*/
$direct_tump = "../datos/modulos/".Luis::temass()."/source/imagenes/items/".$p->id."/thumb";
if(file_exists($direct_tump)) {
foreach(glob($direct_tump."/*.*") as $img){  
 unlink($img);
}
rmdir($direct_tump);
}


$direct = "../datos/modulos/".Luis::temass()."/source/imagenes/items/".$p->id;
if(file_exists($direct)) {
foreach(glob($direct."/*.*") as $imgs){  
 unlink($imgs);   
}
rmdir($direct);
}



if(count($ims)>0){
$imagen = new DatosAdmin();
foreach ($ims as $m) {
$imagen->id=$m->id_item;
}
$imagen->eliminar_imagen_one_items();
}
$producto = new DatosAdmin();
$producto->id = $_POST['ups_tr'];
$producto->eliminar_producto();