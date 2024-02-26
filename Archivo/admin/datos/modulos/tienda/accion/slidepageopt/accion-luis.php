<?php 
$dat = DatosAdmin::diapositiva_detalle($_POST['dato']);
$d = new DatosAdmin();
$d->id = $_POST['dato'];
if($dat->activado==1){$d->activado = 0;}else{$d->activado = 1;}
$d->activardiapositiva();
if ($dat->activado==1) {
	echo '<div class="boxoptionslistitems">Activar</div>';
}else{
    echo '<div class="boxoptionslistitems">Desactivar</div>';
}