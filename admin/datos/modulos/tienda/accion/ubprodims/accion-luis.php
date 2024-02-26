<?php
$base = Luis::basepage("base_page_admin");
$ims=DatosAdmin::imagenviewlist($_POST["infd"]);

$urlimagenes="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$ims->id_item."/".$ims->imagen;
$urlimagen="../datos/modulos/".Luis::temass()."/source/imagenes/items/".$ims->id_item."/thumb/".$ims->imagen;

$g = new DatosAdmin();
$g->id=$ims->id;
$g->eliminar_imagen_one_items();
/*tumps*/
if(is_file($urlimagen)) {
	unlink($urlimagen);
}
/*imagens*/
if(is_file($urlimagenes)) {
	unlink($urlimagenes);
}

echo $urlimagenes;