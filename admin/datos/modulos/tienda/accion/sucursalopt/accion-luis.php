<?php 
$dat = DatosAdmin::poridSucursal($_POST['id']);
$d = new DatosAdmin();
$d->id = $_POST['id'];
if($dat->estado==1){$d->estado = 0;}else{$d->estado = 1;}
$d->activarsucursal();
if ($dat->estado==1) {
	echo "Activar";
}else{
    echo "Desactivar";
}