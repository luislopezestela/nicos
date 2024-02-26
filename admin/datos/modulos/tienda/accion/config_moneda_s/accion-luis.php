<?php
if(isset($_SESSION['admin_id'])){
	if(isset($_POST['moneda'])) {
		$mone = DatosAdmin::Mostrar_las_monedas_por_id($_POST['moneda']);
		$d = new DatosAdmin();
		$d->id = $_POST['moneda'];
		if($mone->estado==1){$d->estado = 0;}else{$d->estado = 1;}
		$d->activar_monedas();
		if ($mone->estado==1){
			echo json_encode(array('tipo' => 1, 'cla' => "le_en_activ", 'cl' => '<div class="boxoptionslistitems">'.Luis::lang("activar").'</div>'));
		}else{
			echo json_encode(array('tipo' => 0, 'cla' => "le_en_activ", 'cl' => '<div class="boxoptionslistitems">'.Luis::lang("desactivar").'</div>'));
		}
	}
}
