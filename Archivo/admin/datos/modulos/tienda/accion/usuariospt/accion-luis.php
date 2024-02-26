<?php 
$dat = DatosUsuario::porId($_POST['id']);
$d = new DatosUsuario();
$d->id = $_POST['id'];
if($dat->esta_activado==1){$d->esta_activado = 0;}else{$d->esta_activado = 1;}
$d->activarusuario();
if ($dat->esta_activado==1) {
	echo '<div class="boxoptionslistitems">Activar</div>';
}else{
    echo '<div class="boxoptionslistitems">Desactivar</div>';
}