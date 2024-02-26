<?php
$usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
for($i=0;$i<11;$i++){$codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];}

$numbers_code ="ABCDEFGHIJKLMNOPQRSTUVWYZ1234567890";
$barcodes = "";
for($i=0;$i<8;$i++){$barcodes .= $numbers_code[rand(0,strlen($numbers_code)-1)];}

if (isset($_POST["listtwo"])) {
  if($_POST["listtwo"]=="null"){
    $listtwo="";
  }else{
  $listtwo=$_POST["listtwo"];
  }
}else{
  $listtwo="";
}
try{
$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
$publi=new DatosAdmin();
$publi->id_persona=$_SESSION["admin_id"];
$publi->titulo=htmlentities($_POST["titulo"]);
$publi->moneda_a=$moneda_principal->id;
$publi->precio=$_POST["precio"];
$publi->precio_final=$_POST["precio_final"];
$publi->marca=$_POST["marca"];
$publi->sucursal=$usuario->sucursal;
$publi->id_categoria=$_POST["listone"];
$publi->id_subcategoria=$listtwo;
$publi->descripcion=htmlentities($_POST['listboxstrin']);
$publi->codigo=$codigos;
$publi->barcode="L-".$barcodes;
$publi->fecha=date ('Y-m-d H:i:s');
$publi->ub=DatosAdmin::poner_guion(strip_tags($_POST["titulo"]));
if (isset($_FILES) && !empty($_FILES)) {
if(count($_FILES)>5){
  echo json_encode(array('estado' => "error", 'mensaje' => "Puedes seleccionar un máximo de 5 fotos."));
}else{
$s=$publi->publicar_producto();

 $error = false;
 $files = array();
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
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/items/$s[1]/thumb/";
    $handle->Process($url);
    if ($handle->processed) {
    	$imagen->imagen = $handle->file_dst_name;
        $imagen->id_producto = $s[1];
    //    $imagen->agrega_foto();
    } else {
	  $error = true;
        echo 'Error: ' . $handle->error;
      }
    }

    /*thumbails end */

  if ($handle->uploaded) {
  	$imagen =  new DatosAdmin();
    $handle->image_convert  =  'jpg';
    $url="../datos/modulos/".Luis::temass()."/source/imagenes/items/$s[1]/";
    $handle->Process($url);
    if ($handle->processed) {
    	$imagen->imagen = $handle->file_dst_name;
        $imagen->id_producto = $s[1];
        $imagen->agrega_imagen_producto();
    } else {
	  $error = true;
        echo 'Error: ' . $handle->error;
      }
    }

    unset($handle);
  }


if($s[1]){
$_SESSION["puhdr"] = 1;
$elitem_complet_detall = DatosAdmin::urlpersona($s[1]);
echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'rel_item' => $elitem_complet_detall));
}else{
echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}

}
}else{
  $s=$publi->publicar_producto();
  if($s[1]){
    $elitem_complet_detall = DatosAdmin::urlpersona($s[1]);
    $_SESSION["puhdr"] = 1;
    echo json_encode(array('estado' => "exito", 'mensaje' => "Publicacion con exito.", 'rel_item' => $elitem_complet_detall));
  }else{
    echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
  }
}
}catch(Exception $e){
echo json_encode(array('estado' => "error", 'mensaje' => "Error"));
}