<?php
$atributos = Mostrar_Atributos_producto($wo['product']['id']);
$opciones_del_producto = lui_poner_en_lista_las_opciones($wo['product']['id']);

$comprapendiente = $db->where('estado_venta', 3)->where('id_del_vendedor', lui_Secure($wo['user']['user_id']))->where('completado', '2')->getOne(T_VENTAS);
$symbol = (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
$variantes_atributos = [];
$attributeOptions = [];

$atributos_productos = Mostrar_Atributos_producto($wo['product']['id']);
$identificador_unico_base = $comprapendiente['id'] . '_' . $wo['product']['id'];
?>

<?php if ($opciones_del_producto): ?>
    <?php foreach ($opciones_del_producto as $color => $valorcolor): ?>
        <?php
        $precio_de_atributos = 0;
        $existencia_atributes = false;
        $colires = false;
        $menu_option_atribute = '';
        $html_atributos_items_pos = '';
        $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color']);
        $variantes_atributos = [];
        $colorSeleccionado = $valorcolor['id_color'];

        foreach ($atributos as $wo['atributos_b']) {
            if ($wo['atributos_b']['nombre'] == 'Color') {
               $atributosseleccionados_pr['atributo_' . $wo['atributos_b']['id']] = [$colorSeleccionado];
               $variantes_atributos[$wo['atributos_b']['id']] = [$valorcolor['id_color']];
               $attributeOptions[] = $valorcolor['id_color'];
               $wo['id_ato'] = $wo['product']['id'];
               $wo['id_ato_col'] = $valorcolor['id_color'];
               $wo['isChecked'] = 'checked';
               $html_atributos_items_pos .= lui_LoadPage('pos/lista_atributos_pos_color');
            } else {
               $existencia_atributes = true;
               $menu_option_atribute = 'onclick="mostrarMenu(' . $wo['product']['id'] .$valorcolor['id_color']. ')"';
               $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos_b']['id']);
               $html_atributos_items_pos .= '<span>' . $wo['atributos_b']['nombre'] . '</span>';
               $html_atributos_items_pos .= '<div class="contenido_opciones_atriburts">';
               foreach ($atributos_opciones as $wo['opt_atributos']) {
                  $wo['isChecked'] = '';
        
                  if ($wo['opt_atributos']['active'] == 1) {
                     $wo['isChecked'] = 'checked';
                     $variantes_atributos[$wo['atributos_b']['id']][] = $wo['opt_atributos']['id'];
                     $attributeOptions[] = $wo['opt_atributos']['id'];
                     $atributosseleccionados_pr['atributo_' . $wo['atributos_b']['id']][] = $wo['opt_atributos']['id'];
                     $precio_de_atributos += $wo['opt_atributos']['precio_adicional'];
                  }
                 	$wo['id_ato'] = $wo['product']['id'];
		            $wo['id_ato_col'] = $valorcolor['id_color'];
		            $wo['id_ato_orde'] = $comprapendiente['id'];
                 	$html_atributos_items_pos .= lui_LoadPage('pos/lista_atributos_pos');
               }
               $html_atributos_items_pos .= '</div>';
            }
        }

        $identificador_unico = $identificador_unico_base;
        foreach ($variantes_atributos as $atributo => $opciones) {
            $identificador_unico .= '_' . implode('_', $opciones);
        }

        if (!empty($variantes_atributos)) {
            $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$wo['product']['id']} AND (estado = 1 OR estado = 2)";
            foreach ($variantes_atributos as $atributo => $opciones) {
                foreach ($opciones as $opcion) {
                    $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
                }
            }
            $cantidad_prod = $db->rawQueryOne($sql)['cantidad'];
            $cantidad_productos = ($cantidad_prod !== null) ? $cantidad_prod : 0;
        } else {
            if (!empty($valorcolor['id_color'])) {
                $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE color = {$valorcolor['id_color']} AND producto = {$wo['product']['id']} AND (estado = 1 OR estado = 2)";
                $productos_stock_disponibles = $db->rawQueryOne($sql)['cantidad'];
                $cantidad_productos = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
            } else {
                $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$wo['product']['id']} AND (estado = 1 OR estado = 2)";
                $productos_stock_disponibles = $db->rawQueryOne($sql)['cantidad'];
                $cantidad_productos = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
            }
        }

        $sku_colors_product = $db->where('id_producto', $wo['product']['id'])->where('id_color', $valorcolor['id_color'])->getOne('lui_opcion_de_colores_productos');
        $sku_producto_in_color = isset($sku_colors_product->sku) ? $sku_colors_product->sku : $wo['product']['sku'];
        $precio_subtotal_producto = !empty($sku_colors_product->precio_adicional) ? $sku_colors_product->precio_adicional + $wo['product']['price'] : $wo['product']['price'];
        $precio_tota_del_producto = $precio_de_atributos > 0 ? $precio_de_atributos + $precio_subtotal_producto : $precio_subtotal_producto;

        $color_nombre_atributo = $db->where('id_producto', $wo['product']['id'])->getOne('atributos');
        $wo['product']['imagen_vew'] = lui_GetProductImages_color($wo['product']['id'], $valorcolor['id_color']);
        $rutadeimage = $wo['product']['imagen_vew'][0]['image_mini'];
        $ch = curl_init($rutadeimage);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($existencia_atributes == false) {
        	$datos_atributos_lista = json_encode($atributosseleccionados_pr);
        	$accion_add_pos = "onclick='ChangeQtyapos_col_add(`".$identificador_unico."`,`".$wo['product']['id']."`,`".$valorcolor['id_color']."`, ".$datos_atributos_lista.")'";
        }else{
        	$accion_add_pos = "";
        }
        ?>



        <div <?php echo $colires ?> class="producto_pos_list producto_pos_list_<?php echo $wo['product']['id'] ?><?=$valorcolor['id_color'];?>" <?=$accion_add_pos;?> <?=$menu_option_atribute;?> data-colc="<?=$color_nombre_atributo['id'];?>" data-col="<?=$valorcolor['id_color'];?>" data-id="<?php echo $wo['product']['id'] ?>" style="cursor:pointer;user-select:none;">
            <?php if ($status == 200): ?>
                <img width="100" src="<?php echo $wo['product']['imagen_vew'][0]['image_mini']; ?>" alt="<?php echo $wo['product']['name']; ?>">
            <?php else: ?>
                <img width="100" src="<?php echo $wo['product']['imagen_vew'][0]['image_org']; ?>" alt="<?php echo $wo['product']['name']; ?>">
            <?php endif ?>
            <?php if ($existencia_atributes): ?>
               <span class="hover_lik_atr_pos close_hover_<?php echo $wo['product']['id']; ?><?=$valorcolor['id_color'];?>"></span>
               <div class="menu_atributos_productos menu_atributos_produ_<?php echo $wo['product']['id']; ?><?=$valorcolor['id_color'];?>" id="<?php echo $wo['product']['id'].$valorcolor['id_color']; ?>">
                 	<div class="menu_header">
                     <h2><?php echo $wo['product']['name']; ?></h2>
                     <button class="close_button close_button_<?php echo $wo['product']['id'].$valorcolor['id_color']; ?>"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="19.25 19.25 25.5 25.5" enable-background="new 0 0 64 64"><g><line fill="none" stroke="#536DFE" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="19.75" y1="44.25" x2="44.25" y2="19.75"><animate attributeName="stroke" values="#536DFE;#FF0000;#536DFE" dur="1s" repeatCount="indefinite"/></line></g><g><line fill="none" stroke="#536DFE" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="44.25" y1="44.25" x2="19.75" y2="19.75"><animate attributeName="stroke" values="#536DFE;#FF0000;#536DFE" dur="1s" repeatCount="indefinite"/></line></g></svg></button>
                 	</div>
                 	<div class="cantidad_opt_at_pos_lista">
	                	<span id="<?='precio_pos_produc_list_lista_'.$wo['product']['id'].'_'.$valorcolor['id_color'];?>" class="precio_at_pos">Precio: <strong class="precio_<?=$identificador_unico?>"><?=$symbol . ' ' . number_format($precio_tota_del_producto, 2, ".", "."); ?></strong></span>
	                	<span id="<?='stok_pos_produc_list_lista_'.$wo['product']['id'].'_'.$valorcolor['id_color'];?>">Stock: <strong class="stock_<?=$identificador_unico?>"><?=$cantidad_productos;?></strong></span>
	               </div>

                 <?php echo $html_atributos_items_pos; ?>
                 <div class="footer_pos_item_atribute">
                     <button class="agregar_button" onclick="ChangeQtyapos_col_add_atr('<?=$identificador_unico?>','<?=$wo['product']['id'] ?>', '<?=$valorcolor['id_color'];?>', enviarDatosSeleccionados('<?=$wo['product']['id'];?>','<?=$valorcolor['id_color'];?>'),Seleccionados_atributos('<?=$comprapendiente['id'];?>','<?=$wo['product']['id'];?>'))">Agregar</button>
                 </div>
               </div>
            <?php endif ?>
            <h2><?php echo $wo['product']['name']; ?></h2>
            <?php if (isset($buscar_el_color_por_id)): ?>
                <p class="color"><?=$color_nombre_atributo['nombre'];?>: <?=$wo['lang'][$buscar_el_color_por_id['lang_key']];?></p>
            <?php endif ?>
            <p class="model">Modelo: <?=$wo['product']['modelo']; ?></p>
            <p class="sku">SKU: <?=$sku_producto_in_color; ?></p>
            <p class="price">Precio: <?=$symbol . ' ' . number_format($precio_tota_del_producto, 2, ".", "."); ?></p>
            <p class="stock">Stock disponible: <span id="<?='stok_pos_produc_list_' . $identificador_unico;?>"><?=$cantidad_productos;?></span></p>
        </div>
    <?php endforeach ?>
<?php else: ?>
    <?php
    $precio_de_atributos = 0;
    $existencia_atributes = false;
    $menu_option_atribute = '';
    $html_atributos_items_pos = '';

    foreach ($atributos as $wo['atributos_b']) {
        if ($wo['atributos_b']['nombre'] == 'Color') {
            continue;
        }
        $existencia_atributes = true;
        $menu_option_atribute = 'onclick="mostrarMenu(' . $wo['product']['id'] . ')"';
        $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos_b']['id']);
        $html_atributos_items_pos .= '<span>' . $wo['atributos_b']['nombre'] . '</span>';
        $html_atributos_items_pos .= '<div class="contenido_opciones_atriburts">';
        foreach ($atributos_opciones as $wo['opt_atributos']) {
            $wo['isChecked'] = '';
            if ($wo['opt_atributos']['active'] == 1) {
                $wo['isChecked'] = 'checked';
                $variantes_atributos[$wo['atributos_b']['id']][] = $wo['opt_atributos']['id'];
                $attributeOptions[] = $wo['opt_atributos']['id'];
                $atributosseleccionados_pr['atributo_' . $wo['atributos_b']['id']][] = $wo['opt_atributos']['id'];
                $precio_de_atributos += $wo['opt_atributos']['precio_adicional'];
            }
            $wo['id_ato'] = $wo['product']['id'];
            $wo['id_ato_col'] = '';
            $wo['id_ato_orde'] = $comprapendiente['id'];
            $html_atributos_items_pos .= lui_LoadPage('pos/lista_atributos_pos');
        }
        $html_atributos_items_pos .= '</div>';
    }

    $identificador_unico = $identificador_unico_base;
    foreach ($variantes_atributos as $atributo => $opciones) {
        $identificador_unico .= '_' . implode('_', $opciones);
    }

    if (!empty($variantes_atributos)) {
        $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$wo['product']['id']} AND (estado = 1 OR estado = 2)";
        foreach ($variantes_atributos as $atributo => $opciones) {
            foreach ($opciones as $opcion) {
                $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
            }
        }
        $cantidad_prod = $db->rawQueryOne($sql)['cantidad'];
        $cantidad_productos = ($cantidad_prod !== null) ? $cantidad_prod : 0;
    } else {
        $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$wo['product']['id']} AND (estado = 1 OR estado = 2)";
        $productos_stock_disponibles = $db->rawQueryOne($sql)['cantidad'];
        $cantidad_productos = ($productos_stock_disponibles !== null) ? $productos_stock_disponibles : 0;
    }

    $precio_tota_del_producto = $precio_de_atributos > 0 ? $precio_de_atributos + $wo['product']['price'] : $wo['product']['price'];
    $rutadeimage = $wo['product']['images'][0]['image_mini'];
    $ch = curl_init($rutadeimage);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($existencia_atributes==false) {
    	    //$accion_add_pos = "onclick='ChangeQtyapos_col_add(`".$identificador_unico."`,`".$wo['product']['id']."`,`".$valorcolor['id_color']."`, ".$datos_atributos_lista.")'";
    	$seleeccion_sin_atr = "onclick='ChangeQtyapos(`".$identificador_unico."`,`".$wo['product']['id']."`,``)'";
    }else{
    	$seleeccion_sin_atr = '';
    }
   ?>
    <div class="producto_pos_list producto_pos_list_<?=$wo['product']['id']?>" <?=$seleeccion_sin_atr; ?> <?=$menu_option_atribute;?> data-col="" data-id="<?=$wo['product']['id']?>">
        <?php if ($status == 200): ?>
            <img width="100" src="<?php echo $wo['product']['images'][0]['image_mini']; ?>" alt="<?php echo $wo['product']['name']; ?>">
        <?php else: ?>
            <img width="100" src="<?php echo $wo['product']['images'][0]['image_org']; ?>" alt="<?php echo $wo['product']['name']; ?>">
        <?php endif ?>
        <?php if ($existencia_atributes): ?>
            <span class="hover_lik_atr_pos close_hover_<?=$wo['product']['id'];?>"></span>
            <div class="menu_atributos_productos menu_atributos_produ_<?=$wo['product']['id'];?>" id="<?=$wo['product']['id'];?>">
                <div class="menu_header">
                    <h2><?php echo $wo['product']['name']?></h2>
                    <button class="close_button close_button_<?=$wo['product']['id'];?>"><svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="19.25 19.25 25.5 25.5" enable-background="new 0 0 64 64"><g><line fill="none" stroke="#536DFE" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="19.75" y1="44.25" x2="44.25" y2="19.75"><animate attributeName="stroke" values="#536DFE;#FF0000;#536DFE" dur="1s" repeatCount="indefinite"/></line></g><g><line fill="none" stroke="#536DFE" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="44.25" y1="44.25" x2="19.75" y2="19.75"><animate attributeName="stroke" values="#536DFE;#FF0000;#536DFE" dur="1s" repeatCount="indefinite"/></line></g></svg></button>
                </div>
                <div class="cantidad_opt_at_pos_lista">
                	<span id="<?='precio_pos_produc_list_lista_'.$wo['product']['id'];?>" class="precio_at_pos">Precio: <strong class="precio_<?=$identificador_unico?>"><?=$symbol . ' ' . number_format($precio_tota_del_producto, 2, ".", "."); ?></strong></span>
                	<span id="<?='stok_pos_produc_list_lista_'.$wo['product']['id'];?>">Stock: <strong class="stock_<?=$identificador_unico?>"><?=$cantidad_productos;?></strong></span>
                </div>
                <?php echo $html_atributos_items_pos; ?>
                <div class="footer_pos_item_atribute">
                    <button class="agregar_button" onclick="ChangeQtyapos_col_add_atr('<?=$identificador_unico?>','<?=$wo['product']['id'] ?>', '', enviarDatosSeleccionados('<?=$wo['product']['id'];?>',''),Seleccionados_atributos('<?=$comprapendiente['id'];?>','<?=$wo['product']['id'];?>'))">Agregar</button>
                </div>
            </div>
        <?php endif ?>
        <h2><?php echo $wo['product']['name']?></h2>
        <p class="model">Modelo: <?=$wo['product']['modelo']; ?></p>
        <p class="sku">SKU: <?=$wo['product']['sku']; ?></p>
        <p class="price">Precio: <?=$symbol . ' ' . number_format($precio_tota_del_producto, 2, ".", "."); ?></p>
        <p class="stock">Stock disponible: <span id="<?='stok_pos_produc_list_' . $identificador_unico;?>"><?=$cantidad_productos;?></span></p>
    </div>
<?php endif ?>
