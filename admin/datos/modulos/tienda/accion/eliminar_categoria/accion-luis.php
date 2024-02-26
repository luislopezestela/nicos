<?php 
$categorias = new DatosAdmin();
$categorias->id = $_POST['id'];
$categoria_d = DatosAdmin::getById_categoria($_POST['id']);
$productos = DatosAdmin::producto_categoria($_POST['id']);
$lod = "../datos/modulos/".Luis::temass()."/source/imagenes/categorias/thumb/".$categoria_d->logo;
if (is_file($lod)) {
    if (file_exists($lod)){
        unlink($lod);
    }
}

$lod2 = "../datos/modulos/".Luis::temass()."/source/imagenes/categorias/".$categoria_d->logo;
if (is_file($lod2)) {
	if (file_exists($lod2)){
		unlink($lod2);
	}
}


foreach ($productos as $producto){
    $datt = "../datos/modulos/".Luis::temass()."/source/imagenes/items/".$producto->id."/thumb";
    foreach(glob($datt."/*.*") as $imgs){  
        unlink($imgs);   
    }
    rmdir($datt);

    $dat = "../datos/modulos/".Luis::temass()."/source/imagenes/items/".$producto->id;
    foreach(glob($dat."/*.*") as $img){  
        unlink($img);   
    }
    rmdir($dat);
}
$categorias->eliminar_categoria();