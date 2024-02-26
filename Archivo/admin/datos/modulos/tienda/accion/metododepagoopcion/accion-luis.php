<?php 
$dat = DatosAdmin::metododepago_porelId($_POST['id']);
$d = new DatosAdmin();
$d->id = $_POST['id'];
if($dat->activado==1){$d->activado = 0;}else{$d->activado = 1;}
$d->activar_metodo_de_pago();
if($dat->activado==1){
	echo json_encode(array('data_one' => "Activar", 'data_two' => "Desactivado"));
}else{
	echo json_encode(array('data_one' => "Desactivar", 'data_two' => "Activado"));
}
?>