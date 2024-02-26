<?php
$item = DatosAdmin::ver_el_item_de_la_orden_por_su_id($_POST['items']);
$var = new DatosAdmin();
$var->barcode = $item->barcode;
$var->elinar_seleccion_de_orden_stock();
$var->id = $item->id;
$var->delete_selection_order_prepare();
$faltan_procesar = DatosAdmin::contar_productos_que_faltan_preparar($item->codigo_item)->c;
echo json_encode(array('estado' => 1, 'mensaje' => "Se restauro con exito.", "cantidad" => $faltan_procesar));