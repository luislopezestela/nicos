<?php
if(!empty($_POST)){
$proveedors = new DatosAdmin();
$proveedors->id = $_POST['id'];
$proveedors->nombre = htmlentities($_POST['nombre']);
$proveedors->ruc = $_POST['ruc'];
$proveedors->celular = $_POST['celular'];
$proveedors->direccion = $_POST['direccion'];
$proveedors->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
$proveedors->update_proveedor();

echo "Actualizado con exito.";
}