<?php
if (isset($_POST["listtwo"])) {
  if($_POST["listtwo"]=="null"){
  	$listtwo="";
  }else{
  $listtwo=$_POST["listtwo"];
  }
}else{
  $listtwo="";
}
$idupdate=DatosAdmin::urlpersona_off($_POST["intlinear"]);
try{
$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
$publi=new DatosAdmin();
$publi->id=$idupdate;
$publi->titulo=htmlentities($_POST["titulo"]);
$publi->moneda_a=$moneda_principal->id;
$publi->precio=$_POST["precio"];
$publi->precio_final=$_POST["precio_final"];
$publi->id_categoria=$_POST["listone"];
$publi->id_subcategoria=$listtwo;
$publi->marca=$_POST["marca"];
$publi->descripcion=htmlentities($_POST['listboxstrin']);
$publi->ub=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
$publi->update_producto();
 
$todaslasimagenes=DatosAdmin::cantidad_imagenes($idupdate)->c;

if($todaslasimagenes>5) {
echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 5 fotos."));
}else{

if (isset($_FILES) && !empty($_FILES)) {
 $error = false;
 $files = array_filter($_FILES, function($item) {
        return $item["name"][0] != "";
  });

 foreach ($files as $file) {
  $handle = new \Verot\Upload\Upload($file);

  /*thumbails*/
    if ($handle->uploaded) {
    $imagen =  new DatosAdmin();
    $handle->image_resize = true;
    $handle->image_ratio_x = true;
    $handle->image_y = 300;
    $handle->image_convert = 'jpg';
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/items/$idupdate/thumb/";
    $handle->Process($url);
    if ($handle->processed) {
      $imagen->imagen = $handle->file_dst_name;
        $imagen->id_producto = $idupdate;
    } else {
    $error = true;
        echo 'Error: ' . $handle->error;
      }
    }

    /*thumbails end */

  if ($handle->uploaded) {
    $imagen =  new DatosAdmin();
    $handle->image_convert  =  'jpg';
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/items/$idupdate/";
    $handle->Process($url);
    if ($handle->processed) {
      $imagen->imagen = $handle->file_dst_name;
        $imagen->id_producto = $idupdate;
        $imagen->agrega_imagen_producto();
    } else {
    $error = true;
        echo 'Error: ' . $handle->error;
      }
    }

    unset($handle);
  }


if($idupdate){
$_SESSION["puhdr"] = 1;
echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito"));
}else{
echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}

}elseif($todaslasimagenes<1){
$_SESSION["puhdr"] = 1;
  echo json_encode(array('estado' => "exito", 'mensaje' => "Datos actualizados con exito."));
}else{
$_SESSION["puhdr"] = 1;
echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito"));
}

}
}catch(Exception $e){
echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}