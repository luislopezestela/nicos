<?php
$total=0;
$cantidad_items=0;
$venta = new DatosAdmin();
$venta->barcode = $_POST['dat'];
$venta->en_carrito = 0;
$p =  DatosAdmin::view_page_searchs_two($_POST['dat']);
$items_stock_page=DatosAdmin::items_view_list_add_order_two_items($_SESSION['admin_id'],$p->id);
if($items_stock_page->en_carrito==1){
	$venta->add_item_in_order_page();
	$items=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]);
	foreach($items as $it){
		$cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$it->id)->c;
		$total += $cantidad_items*$it->precio;
	}
	$elimina_producto=false;
	if($cantidad_items==0){
		$view_items_stock_pages=DatosAdmin::items_view_list_add_order_one($_SESSION['admin_id'],$_POST['dat'],0);
		$venta->id_producto=$view_items_stock_pages->id_producto;
		$venta->add_order_item_lists_up();
		$elimina_producto=true;
	}
	$totalpricelist=number_format($total,2,".",",");
	$totalprecios=number_format($p->precio*$cantidad_items,2,".",",");
	echo json_encode(array('estado' => true,'cantidad' => $cantidad_items, 'order' => $p->id, 'itemcount' => $cantidad_items, 'totalprice' => $totalprecios,'totalpriceorderslist' => $totalpricelist, 'mensaje' => "Datos actualizados", 'delete' => $elimina_producto));
}