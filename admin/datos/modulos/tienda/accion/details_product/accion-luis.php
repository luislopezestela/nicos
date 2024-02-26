<?php
$dataitem=false; 
$venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);

if($_POST["dat"]==""){
	echo json_encode(array('estado' => 1, 'item_view' => false, 'mensaje' => "No se encontraron resultados"));
}else{

	if($venta_pendiente->entregar==1){
		$reservas=DatosAdmin::view_page_searchs_reservas($_POST["dat"],$venta_pendiente->cliente);
		if(count($reservas)>0){
			foreach($reservas as $yp){
					$dataitem.='<div class="item_prev_list_in_page_up item_prev_list_in_page_up_adds" barcode="'.$yp->barcode.'">';
					$dataitem.='<h3 class="title_item_prev">'.html_entity_decode($yp->nombre).'</h3>';
					$dataitem.='<span>Codigo: '.$yp->barcode.'</span>';
					$dataitem.='<span>Ram: '.$yp->ram.'</span>';
					$dataitem.='<span>HDD: '.$yp->hard_drive.'</span>';
					$dataitem.='<span>Drivetype: '.$yp->drivetype.'</span>';
					$dataitem.='<p>'.$yp->aditional_information.'</p>';
					$dataitem.='<p>'.$yp->other_information.'</p>';
					$dataitem.='<b>$'.$yp->precio.'</b>';
					$dataitem.='</div>';
			}
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => ""));
		}else{
			$dataitem.='<div class="item_prev_list_in_page_up">';
			$dataitem.='No se encontraron resultados';
			$dataitem.='</div>';
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => "No se encontraron resultados"));
		}
	}else{
		$prod=DatosAdmin::view_page_searchs($_POST["dat"]);
		if(count($prod)>0){
			foreach($prod as $yp){
					$dataitem.='<div class="item_prev_list_in_page_up item_prev_list_in_page_up_adds" barcode="'.$yp->barcode.'">';
					$dataitem.='<h3 class="title_item_prev">'.html_entity_decode($yp->nombre).'</h3>';
					$dataitem.='<span>Codigo: '.$yp->barcode.'</span>';
					$dataitem.='<span>Ram: '.$yp->ram.'</span>';
					$dataitem.='<span>HDD: '.$yp->hard_drive.'</span>';
					$dataitem.='<span>Drivetype: '.$yp->drivetype.'</span>';
					$dataitem.='<p>'.$yp->aditional_information.'</p>';
					$dataitem.='<p>'.$yp->other_information.'</p>';
					$dataitem.='<b>$'.$yp->precio.'</b>';
					$dataitem.='</div>';
			}
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => ""));
		}else{
			$dataitem.='<div class="item_prev_list_in_page_up">';
			$dataitem.='No se encontraron resultados';
			$dataitem.='</div>';
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => "No se encontraron resultados"));
		}
	}

	////
}

?>