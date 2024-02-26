<?php 
$d = new DatosAdmin();
$di = DatosAdmin::poridproveedor($_POST["id"]);
$d->id = $_POST['id'];
$d->eliminar_proveedor();
echo "Proveedor eliminado";