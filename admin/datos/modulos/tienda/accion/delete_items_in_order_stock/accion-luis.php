<?php
$total=0;
$itemview = DatosAdmin::porID_producto($_POST['dat']);
$items=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]);
$update_item = new DatosAdmin();
$update_item->id = $_POST['dat'];
$update_item->en_carrito = 0;
$update_item->update_item_in_order();
$datos_Stock_item=DatosAdmin::codes_items_stock_view_stocks($_POST['dat'],$_SESSION['admin_id'],1);
foreach($datos_Stock_item as $pl){
	$update_item->id_stock = $pl->id;
	$update_item->update_stock_data();
}
foreach($items as $it){
	$cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$it->id)->c;
	$total += $cantidad_items*$it->precio;
}
$totalpricelist=number_format($total,2,".",",");
$totalprecios=number_format($itemview->precio*$cantidad_items,2,".",",");
echo json_encode(array('estado' => true, 'mensaje' => "Eliminado con exito.", 'totalprice' => $totalprecios,'totalpriceorderslist' => $totalpricelist));
?>