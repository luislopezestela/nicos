<?php
if($f == 'product_compra_list_bdd') {

	$dataarray = array(
		'estado' => '0'
	);
		
	$db->insert('imventario', $dataarray);
	//header("Content-type: application/json");
    //echo json_encode($data);
    //exit();
}