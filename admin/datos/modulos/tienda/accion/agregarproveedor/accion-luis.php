<?php
if(!empty($_POST)){
$proveedors = new DatosAdmin();
$proveedors->nombre = htmlentities($_POST['nombre']);
$proveedors->ruc = $_POST['ruc'];
$proveedors->celular = $_POST['celular'];
$proveedors->direccion = $_POST['direccion'];
$proveedors->ukr=DatosAdmin::poner_guion(strip_tags($_POST["nombre"]));
$proveedors->agregar_proveedor();

echo "Proveedor agregado con exito";
}