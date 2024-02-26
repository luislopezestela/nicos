<?php
$dataitem=false; 
/***
 * 1. identificamos la venta $venta_web
 * 1. buscamos el producto en el stock $buscamos_el_producto_en_el_stock
 * 
 * 
 * 
 * */

$venta_web = DatosAdmin::visualizar_venta_realtime_en_la_web($_POST['venta']);

if($_POST["dat"]==""){
	echo json_encode(array('estado' => 1, 'item_view' => false, 'mensaje' => "No se encontraron resultados"));
}else{

	if($venta_web->estado_de_venta==7){
		$los_items_de_la_venta = DatosAdmin::listamos_los_items_de_la_venta_web($venta_web->id);
		foreach($los_items_de_la_venta as $item) {
			$dd = DatosAdmin::listamos_los_items_de_la_venta_web_type($venta_web->id);
			$dataitem.='<div class="item_prev_list_in_page_up item_prev_list_in_page_up_adds_web" barcode="">';
			$dataitem.='<h3 class="title_item_prev">'.html_entity_decode($item->nombre).'</h3>';
			$dataitem.=$item->id;
			$dataitem.='</div>';
		}


		$buscamos_el_producto_en_el_stock=DatosAdmin::visualizamos_el_produscto_desde_el_stock($_POST["dat"]);
		if(count($buscamos_el_producto_en_el_stock)>0){
			foreach($buscamos_el_producto_en_el_stock as $yp){
	
					$dataitem.='<div class="item_prev_list_in_page_up item_prev_list_in_page_up_adds_web" barcode="'.$yp->barcode.'">';
					$dataitem.='<h3 class="title_item_prev">'.html_entity_decode($yp->nombre).'</h3>';
					$dataitem.='<span>Codigo: '.$yp->barcode.'</span>';
					$dataitem.='<span>Ram: '.'</span>';
					$dataitem.='<span>HDD: '.$yp->hard_drive.'</span>';
					$dataitem.='<span>Drivetype: '.$yp->drivetype.'</span>';
					$dataitem.='<p>'.$yp->aditional_information.'</p>';
					$dataitem.='<p>'.$yp->other_information.'</p>';
					$dataitem.='<b>S/.'.$yp->precio.'</b>';
					$dataitem.='</div>';
				
					
			}
					
			
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => ""));
		}else{
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => "No se encontraron resultados"));
		}
	}else{
		///
	}

	////
}

/*
if($venta_desde_la_web->estado_de_venta==7){
		$venta_detalles_carrito = DatosAdmin::listar_detalles_ventas_pendientes_web($venta_desde_la_web->id);
		$entregar_venta_web=DatosAdmin::view_page_searchs_venta_en_la_web($_POST["dat"]);
		if(count($entregar_venta_web)>0){
			foreach($entregar_venta_web as $yp){
					$dataitem.='<div class="item_prev_list_in_page_up item_prev_list_in_page_up_adds" barcode="'.$yp->barcode.'">';
					$dataitem.='<h3 class="title_item_prev">'.html_entity_decode($yp->nombre).'</h3>';
					$dataitem.='<span>Codigo: '.$yp->barcode.'</span>';
					$dataitem.='<span>Ram: '.$yp->ram.'</span>';
					$dataitem.='<span>HDD: '.$yp->hard_drive.'</span>';
					$dataitem.='<span>Drivetype: '.$yp->drivetype.'</span>';
					$dataitem.='<p>'.$yp->aditional_information.'</p>';
					$dataitem.='<p>'.$yp->other_information.'</p>';
					$dataitem.='<b>S/.'.$yp->precio.'</b>';
					$dataitem.='</div>';
			}
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => ""));
		}else{
			$dataitem.='<div class="item_prev_list_in_page_up">';
			$dataitem.='No se encontraron resultados';
			$dataitem.='</div>';
			echo json_encode(array('estado' => 1, 'item_view' => $dataitem, 'mensaje' => "No se encontraron resultados"));
		}
	}*/



?>


