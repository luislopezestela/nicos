<?php
$variantes_atributos = [];
$variantes_atributos_c = [];
$atributos = $db->objectbuilder()->where('id_imventario', $wo['product']['id_imventarios'])->get('imventario_atributos');
foreach($atributos as $atributo){
	$variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
	$variantes_atributos_c['atributo_'.$atributo->id_atributo][] = $atributo->id_atributo_opciones;
}
$identificador_unico = $wo['product']['id_productos'];
$lacompra = $db->where('estado_venta',5)->where('id_del_vendedor',lui_Secure($wo['user']['user_id']))->where('completado','2')->getOne(T_VENTAS);
if (!empty($variantes_atributos)){
	$atributos_producto_principal = [];
	foreach ($variantes_atributos as $atributo => $opciones){
        $nombre_atributo = $db->where('id', $atributo)->getOne('atributos')['nombre'];
        $valores_opciones_atributo = [];
        foreach ($opciones as $opcion){
        	if($nombre_atributo=='Color'){
        		$buscar_nombre_de_color = $db->where('id', $opcion)->getOne('lui_products_colores')['lang_key'];
        		$nombre_opcion_atributo = $wo['lang'][$buscar_nombre_de_color];
        	}else{
        		$nombre_opcion_atributo = $db->where('id', $opcion)->getOne('atributos_opciones')['nombre'];
        	}
        	$valores_opciones_atributo[] = $nombre_opcion_atributo;
        }
        $atributos_producto_principal[$nombre_atributo] = $valores_opciones_atributo;
    }
}
$opciones_del_producto = lui_poner_en_lista_las_opciones($wo['product']['id']);
?>
<?php if ($opciones_del_producto): ?>
	<script id="scriptd0_<?=$identificador_unico;?>" type="text/javascript">var atributos<?=$identificador_unico;?> = <?php echo json_encode($variantes_atributos_c); ?>;</script>
	<div class="product item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>">
        <div class="product-info">
            <p class="product-name"><?php echo $wo['product']['name']?></p>
            <?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
			<?php if (isset($atributos_inv)): ?>
				<?php if(!empty($variantes_atributos)): ?>
					<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
						<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
					<?php endforeach ?>
				<?php else: ?>
					<?php $color_producto_sin_atributos = $db->where('id', $wo['product']['color'])->getOne('lui_products_colores')['lang_key'];?>
					<span>Color: <?=$wo['lang'][$color_producto_sin_atributos]; ?></span>
				<?php endif ?>
			<?php endif ?>
            <p class="product-status"><?=convertirNumeroAFecha($wo['product']['garantia']);?></p>
        </div>
        <div class="product-quantity">
            <button class="decrement button_pos_inp value-button" onclick="decreaseValueMaxposcol<?=$identificador_unico;?>()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H5V11H19V13Z"></path></svg>
            </button>
            <span class="quantity-input box_compra_inputs" type="number" id="qty_<?=$identificador_unico;?>" name="cantidad"  min="1" max="<?=$wo['product']['stock_disponible'];?>"><?=$wo['product']['cantidad'] ?></span>
            <button class="increment button_pos_inp value-button" onclick="increaseValueMaxposcol<?=$identificador_unico;?>()" id="increment_<?=$identificador_unico;?>" <?=($wo['product']['stock_disponible']==0 ? 'disabled' : '');?>>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg>
            </button>
        </div>
        <div class="product-price">
            <span><?=$wo['product']['symbol'];?></span>
            <span><?=number_format($wo['product']['precio'], 2, ',', '.');?></span>
        </div>
        <span class="listos_items_compra_pos"><strong>Listo:</strong> <span id="items_prod_pos-<?php echo $wo['product']['id_productos']?>"><?=$wo['product']['cantidad_listos_pos']; ?></span></span>
    </div>

	<script id="scriptd1_<?=$identificador_unico;?>">
		function increaseValueMaxposcol<?=$identificador_unico;?>() {
		   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
		   value = isNaN(value) ? 0 : value;
		   value++;
		   document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
		   ChangeQtyapos_col('<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','<?=$wo['product']['color'];?>', atributos<?=$identificador_unico;?>);
		}

		function decreaseValueMaxposcol<?=$identificador_unico;?>() {
		   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
		   value = isNaN(value) ? 0 : value;
		   value < 1 ? value = 1 : '';
		   value--;
		   document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
		   ChangeQtybpos_col('<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','<?=$wo['product']['color'];?>', atributos<?=$identificador_unico;?>);
		}

	</script>
<?php else: ?>
	<script type="text/javascript">var atributos<?=$identificador_unico;?> = <?php echo json_encode($variantes_atributos_c); ?>;</script>
	<div class="product menu_item_compras_la item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>">
        <div class="product-info">
            <p class="product-name"><?php echo $wo['product']['name']?></p>
            <?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
			<?php if (isset($atributos_inv)): ?>
				<?php if(!empty($variantes_atributos)): ?>
					<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
						<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
					<?php endforeach ?>
				<?php else: ?>
				<?php endif ?>
			<?php endif ?>
            <p class="product-status"><?=convertirNumeroAFecha($wo['product']['garantia']);?></p>
        </div>
        <div class="product-quantity">
            
            <?php if (!$lacompra): ?>
            	<button class="decrement button_pos_inp value-button" onclick="decreaseValueMaxpos<?=$identificador_unico;?>()">
	                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H5V11H19V13Z"></path></svg>
	            </button>
            <?php endif ?>
            <span class="quantity-input box_compra_inputs" type="number" id="qty_<?=$identificador_unico;?>" name="cantidad" max="<?=$wo['product']['stock_disponible'];?>" min="1"><?=$wo['product']['cantidad'] ?></span>
            <?php if (!$lacompra): ?>
            	<button class="increment button_pos_inp value-button" onclick="increaseValueMaxpos<?=$identificador_unico;?>()" id="increment_<?=$identificador_unico;?>" <?=($wo['product']['stock_disponible']==0 ? 'disabled' : '');?>>
	                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg>
	            </button>
            <?php endif ?>
            
        </div>
        <div class="product-price">
            <span><?=$wo['product']['symbol'];?></span>
            <span><?=number_format($wo['product']['precio'], 2, ',', '.');?></span>
        </div>
        <span class="listos_items_compra_pos"><strong>Listo: </strong> <span id="items_prod_pos-<?php echo $wo['product']['id_productos']?>"><?=$wo['product']['cantidad_listos_pos']; ?></span></span>
    </div>
	<?php if (isset($atributos_inv)): ?>
		<?php if(!empty($variantes_atributos)): ?>
			<script>
				function increaseValueMaxpos<?=$identificador_unico;?>() {
				   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
				   value = isNaN(value) ? 0 : value;
				   value++;
				   document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
				   ChangeQtyapos_col('<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','', atributos<?=$identificador_unico;?>);
				}

				function decreaseValueMaxpos<?=$identificador_unico;?>() {
				   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
				   value = isNaN(value) ? 0 : value;
				   value < 1 ? value = 1 : '';
				   value--;
				   document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
				   ChangeQtybpos_col('<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','', atributos<?=$identificador_unico;?>);
				}

			</script>
		<?php else: ?>
			<script>
				function increaseValueMaxpos<?=$identificador_unico;?>() {
					var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
					value = isNaN(value) ? 0 : value;
					value++;
					document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
					ChangeQtyapos('<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','');
				}
				function decreaseValueMaxpos<?=$identificador_unico;?>() {
					var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').innerHTML, 10);
					value = isNaN(value) ? 0 : value;
					value < 1 ? value = 1 : '';
					value--;
					document.getElementById('qty_<?=$identificador_unico;?>').innerHTML = value;
					ChangeQtybpos('<?=$identificador_unico;?>','<?php echo $wo['product']['id'];?>','');
				}
			</script>
		<?php endif ?>
	<?php endif ?>
		
<?php endif ?>
