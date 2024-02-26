<?php
$total = 0;
$valortotaldecompra = 0;
$estructura='';
$preparar = new DatosAdmin();

if($_POST['newventa_init']=="documents"){
	$preparar->venta = $_POST['venta'];
	$preparar->documento = $_POST['documento'];
	$preparar->preparar_actualiza_documento_venta();
	$documento_por_id = DatosAdmin::poriddocumento($_POST['documento']);
	$la_venta_actual = DatosAdmin::visualizar_venta_realtime_en_la_web_preparar($preparar->venta);
	$el_cliente = DatosAdmin::por_el_id_cliente($la_venta_actual->cliente);
	echo json_encode(array('estado'=> true, 'documento' => $preparar->documento,'ruc' => $el_cliente->ruc));
}


if($_POST['newventa_init']=="add_items_in_order"){
	$total=0;
	$ver_stock = DatosAdmin::ver_el_stock_del_item_por_barcode($_POST['barcode']);
	$proveedor=DatosAdmin::poridproveedor($ver_stock->proveedor);
	$estructura.='<tr id="item_on_code_list_order'.$ver_stock->id.'">';
	$estructura.='<td>';
	$estructura.='<span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order" data_config="'.$ver_stock->id.'">X</span>';
	$estructura.='</td>';
	$estructura.='<td>'.$ver_stock->barcode.'</td>';
	$estructura.='<td>'.html_entity_decode($proveedor->nombre).'</td>';
	$estructura.='<td>'.$ver_stock->series.'</td>';
	$estructura.='</tr>';
	$preparar->id = $ver_stock->id;
	$preparar->orden_preparado_esta_listo_actualizar_lista();
	echo json_encode(array('data_html' => $estructura,'estado'=> 1));
}