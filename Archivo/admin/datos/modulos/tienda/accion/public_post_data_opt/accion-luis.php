<?php 
$dat = DatosAdmin::ver_servicio_id($_POST['dato']);
$d = new DatosAdmin();
$d->id = $_POST['dato'];
if($dat->activado==1){$d->activado = 0;}else{$d->activado = 1;}
$d->activar_servicio();
if ($dat->activado==1) {
	echo '<div class="boxoptionslistitems">Activar</div>';
}else{
    echo '<div class="boxoptionslistitems">Desactivar</div>';
}