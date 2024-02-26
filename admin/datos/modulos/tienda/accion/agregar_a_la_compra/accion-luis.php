<?php
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$codigos = "";
$cnt=0;
$total = 0;
$valortotaldecompra = 0;

for($i=0;$i<11;$i++){
    $codigos .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
$cant_ventas=DatosAdmin::ventas_registrados_all();
if($cant_ventas >0){
	$cantidad_total_ventas=DatosAdmin::TotaldeVentas()->c;
	$numeroventa="N00".$cantidad_total_ventas+1;
}else{
	$numeroventa="N001";
}


$venta = new DatosAdmin();
if($_POST['newventa_init']=="new_order"){
	$venta->vendedor = $_SESSION['admin_id'];
	$venta->numero_venta=$numeroventa;
	$venta->barcode=$codigos.$numeroventa;
	if(isset($_POST["entregar"])) {
		$venta->entregar=1;
	}else{
		$venta->entregar=0;
	}
	$venta->nueva_venta();
	echo json_encode(array('estado'=> true));
}

if($_POST['newventa_init']=="documents"){
	$venta->vendedor = $_SESSION['admin_id'];
	$venta->documento = $_POST['documento'];
	$venta->actualiza_documento_venta();
	echo json_encode(array('estado'=> true));
}
if($_POST['newventa_init']=="add_cliente") {
	$venta->vendedor = $_SESSION['admin_id'];
	$venta->cliente = $_POST['dat'];
	$venta->actualiza_cliente_venta();
	echo json_encode(array('estado'=> true));
}
if($_POST['newventa_init']=="add_num_doc") {
	$venta->vendedor = $_SESSION['admin_id'];
	$venta->numero_doc = $_POST['dat'];
	$venta->actualiza_num_doc_venta();
	echo json_encode(array('estado'=> true));
}

if($_POST['newventa_init']=="add_metodo_order"){
	$metodo_pago_view = DatosAdmin::metodo_de_pago_por_id($_POST['dat']);
	$venta->vendedor = $_SESSION['admin_id'];
	$venta->metodo_pago = $_POST['dat'];
	$venta->actualiza_metodo_de_pago_venta();
	if($_POST['dat']==0){
		echo json_encode(array('estado'=> true, 'label' => "", 'vuelto' => 0, 'importante' => 0, 'visible' => 0));
	}else{
		echo json_encode(array('estado'=> true, 'label' => $metodo_pago_view->label, 'vuelto' => $metodo_pago_view->vuelto, 'importante' => $metodo_pago_view->importante, 'visible' => $metodo_pago_view->visible));
	}
	
}


if($_POST['newventa_init']=="add_items_in_order"){
	$producto_de_stock=DatosAdmin::buscar_el_item_en_estok($_SESSION['admin_id'],$_POST['dat']);
	$venta->id=$producto_de_stock->id_producto;
	$venta->barcode = $_POST['dat'];
	$venta->id_usuario = $_SESSION['admin_id'];
	$venta->agregar_producto_en_carrito();
	$venta->agregar_estok_en_carrito();

	$stock_agregado = DatosAdmin::contamos_stock_agregado($_SESSION['admin_id'],$venta->id);
	$cantidad_stock=0;
	$total=0;
	foreach ($stock_agregado as $sa) {
		$cantidad_stock += $sa->stock;
	}

	$items_productos=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]);
	foreach ($items_productos as $ipr) {
		$cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$ipr->id)->c;
		$total += $cantidad_items*$ipr->precio;
	}

	$ver_costo_total_de_compra = number_format($total,2,".",",");
	$visualizamos_producto = DatosAdmin::mostramos_el_producto_en_carrito($_SESSION['admin_id'],$venta->id);
	$product_item=null;
	$producto_en_tabla=false;
	$type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($visualizamos_producto->tipo);
	$header_table_items_viewers=tables_in_pages_items::Mostrar_tabla_in_page_head_table($type_items_view->id_tabla);
	if(count($stock_agregado)>1){
		$producto_en_tabla="";
		$movstock_tr=DatosAdmin::mostrar_productos_stock_lista_order_dos_tabla($venta->id,$_POST['dat']);
			$proveedor=DatosAdmin::poridproveedor($movstock_tr->proveedor);
			$docment=DatosAdmin::poriddocumento($movstock_tr->documento);
			$producto_en_tabla.='<tr id="item_on_code_list_order'.$movstock_tr->id.'">';
			$producto_en_tabla.='<td>';
			$producto_en_tabla.='<span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order" config_box="'.$movstock_tr->id_producto.'" data_config="'.$movstock_tr->id.'" data_conf="'.$movstock_tr->barcode.'">X</span>';
			$producto_en_tabla.='</td>';
			if($visualizamos_producto->tipo==3){
				$producto_en_tabla.='<td>'.$movstock_tr->barcode.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->make.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->model.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->series.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->coa.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->cpu.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->cpu_speed.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->ram.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->hard_drive.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->drivetype.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->aditional_information.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->other_information.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->screen_size.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->web_cam.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->ac_adapter.'</td>';
				$producto_en_tabla.='<td>'.$movstock_tr->stock.'</td>';
			}
			$producto_en_tabla.='</tr>';
	}else{
		
		$product_item.='<div class="items_list_views_order_list blockdisplayin" id="itemsviewscartorder'.$venta->id.'">';
		$product_item.='<div class="detail_producto_order_cart">';
		$product_item.='<h4 class="padbot">'.html_entity_decode($visualizamos_producto->nombre).'</h4>';
		$product_item.='<div class="peruvianprice">Precio: S/. '.number_format($visualizamos_producto->precio,2,".",",").'</div>';
		$product_item.='<span class="cantidad_items_view_pages">ITEMS: <b class="cantidad_items_view_pages_count_items'.$venta->id.'">'.$cantidad_stock."</b></span>";
		//nueva caja
		$product_item.='<div class="barcodes_items_view_in_page">';
		$product_item.='<span class="barcodes_items_view_in_page_button barcodes_items_view_in_page_buttons_two" data-modal-trigger="barcodes_items_view_in_page_button_action'.$venta->id.'">VER CODIGOS</span>';
		/// el modal
		$product_item.='<div class="modal barcodes_items_view_in_page_button_action'.$venta->id.'" data-modal-name="barcodes_items_view_in_page_button_action'.$venta->id.'" data-modal-dismiss="">';
		//dialogo
		$product_item.='<div class="modal__dialog">';
		$product_item.='<header class="modal__header">';
		$product_item.='<h3 class="modal__title name_items_titles">'.html_entity_decode($visualizamos_producto->nombre).'</h3>';
		$product_item.='<i class="modal__close closet_modal_listems_two" data="'.$venta->id.'" data-modal-dismiss="">X</i>';
		$product_item.='</header>';
		//// contenido de modal
		$product_item.='<div class="modal__content" id="40">';
		$product_item.='<label>Codigos</label>';
		////// tabla de datos
		$product_item.='<table class="table table_data_info_pages">';
		$product_item.='<thead class="header_table_items_lists">';
		$product_item.='<tr>';
		$product_item.='<th>Accion</th>';
		$contador=1;
		foreach ($header_table_items_viewers as $tbs => $ssf){
			if ($tbs=="id"){
			}elseif($tbs=="th0"){
			}elseif($tbs=="th1"){
			}elseif($tbs=='th2'){
			}elseif($ssf==null){
			}else{
				$product_item.='<th>'.$ssf.'</th>';
				$contador= $contador + 1;
			}
		}
		$product_item.='</tr>';
		$product_item.='</thead>';
		$product_item.='<tbody class="data_items_stock_controls">';
		$movstock=DatosAdmin::mostrar_productos_stock_lista_order($venta->id);
		foreach ($movstock as $m){
			$proveedor=DatosAdmin::poridproveedor($m->proveedor);
			$docment=DatosAdmin::poriddocumento($m->documento);
			$product_item.='<tr id="item_on_code_list_order'.$m->id.'">';
			$product_item.='<td>';
			$product_item.='<span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order" config_box="'.$m->id_producto.'" data_config="'.$m->id.'" data_conf="'.$m->barcode.'">X</span>';
			$product_item.='</td>';
			if($visualizamos_producto->tipo==3){
				$product_item.='<td>'.$m->barcode.'</td>';
				$product_item.='<td>'.$m->make.'</td>';
				$product_item.='<td>'.$m->model.'</td>';
				$product_item.='<td>'.$m->series.'</td>';
				$product_item.='<td>'.$m->coa.'</td>';
				$product_item.='<td>'.$m->cpu.'</td>';
				$product_item.='<td>'.$m->cpu_speed.'</td>';
				$product_item.='<td>'.$m->ram.'</td>';
				$product_item.='<td>'.$m->hard_drive.'</td>';
				$product_item.='<td>'.$m->drivetype.'</td>';
				$product_item.='<td>'.$m->aditional_information.'</td>';
				$product_item.='<td>'.$m->other_information.'</td>';
				$product_item.='<td>'.$m->screen_size.'</td>';
				$product_item.='<td>'.$m->web_cam.'</td>';
				$product_item.='<td>'.$m->ac_adapter.'</td>';
				$product_item.='<td>'.$m->stock.'</td>';
			}
			$product_item.='</tr>';
		}
		$product_item.='</tbody>';
		$product_item.='</table>';
		/// fin de tabla de datos
		$product_item.='</div>';
		///// fin de contenido de modal
		$product_item.='</div>';
		////fin de gialogo
		$product_item.='</div>';
		//finaliza modal
		$product_item.='</div>';
		//fin de caja
		$product_item.='</div>';
		$product_item.='<div class="close_cart_orders_list close_cart_orders_list_order">';
		$product_item.='<a class="boton_eliminar_producto_de_carrito" data_cart="'.$venta->id.'"> x </a>';
		$product_item.='</div>';
		$product_item.='</div>';
	}
	echo json_encode(array('estado' => "exito", 'cantidad_stock' => $cantidad_stock, 'order' => $venta->id,'product_data' => $product_item, 'costo_total_de_compra' => $ver_costo_total_de_compra, 'td_tabla' => $producto_en_tabla));
}
?>