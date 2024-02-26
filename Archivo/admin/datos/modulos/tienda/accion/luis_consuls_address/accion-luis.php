<?php
$name = $_POST['nombre'];
$address = $_POST['address'];
$referer = $_POST['referencia'];
$lat = $_POST['lati'];
$long = $_POST['longi'];


$dat = new DatosAdmin();
$dat->nombre = $name;
$dat->direccion = $address;
$dat->referencia = $referer;
$dat->latitud = $lat;
$dat->longitud = $long;
$dat->zoom = "14";
$dat->guardar_sucursal_nuevo();
echo json_encode(array('type' => 1, 'mensaje' => "listo"));