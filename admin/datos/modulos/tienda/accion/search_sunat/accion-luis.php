<?php
if(isset($_SESSION['admin_id'])){
	$sunat = new ruc();
	if($_POST['data']) {
		$ruc = $_POST['data'];
		$buscarrucdni = $sunat->consulta($ruc);
		if($buscarrucdni->success == true) {
			//echo "Empresa: " . $buscarrucdni->result->razon_social . "\n";
			echo $buscarrucdni->json(NULL, true);
		}else{
			echo json_encode(array('tipo' => 0,'mensaje' => "Error"));	
		}
	}
}






