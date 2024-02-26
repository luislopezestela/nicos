<?php
$d = new DatosAdmin();
$d->id = $_POST['id'];
$d->eliminar_sucursal();
echo "Sucursal eliminado";