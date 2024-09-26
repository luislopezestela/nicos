<?php
$variantes_atributos = [];
$variantes_atributos_c = [];
$atributos = $db->objectbuilder()->where('id_imventario', $wo['product']['id_imventarios'])->get('imventario_atributos');
foreach($atributos as $atributo){
	$variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
	$variantes_atributos_c['atributo_'.$atributo->id_atributo][] = $atributo->id_atributo_opciones;
}
$identificador_unico = $wo['product']['id_productos'];

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
	<script type="text/javascript">var atributos<?=$identificador_unico;?> = <?php echo json_encode($variantes_atributos_c); ?>;</script>
	<tr class="table-row table-row--chris menu_item_compras_la item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>" style="cursor:pointer;user-select:none;" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>">
			<td class="table-row__td">
				<div class="table-row--overdue_green"></div>
				<?php if (!empty($wo['product']['color'])): ?>
				 	<?php 
					$wo['product']['imagen_vew'] = lui_GetProductImages_color($wo['product']['id'],$wo['product']['color']);
					$rutadeimage = $wo['product']['imagen_vew'][0]['image_mini'];
					?>
					<?php $ch = curl_init($rutadeimage);
						curl_setopt($ch, CURLOPT_NOBODY, true);
						curl_exec($ch);
						$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						curl_close($ch);
					?>
					<?php if ($status == 200): ?>
						<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['imagen_vew'][0]['image_mini'];?>');"></div>
					<?php else: ?>
						<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['imagen_vew'][0]['image_org'];?>');"></div>
					<?php endif ?>
				<?php else: ?>
					<?php $rutadeimage = $wo['product']['images'][0]['image_mini']; ?>
					<?php $ch = curl_init($rutadeimage);
								curl_setopt($ch, CURLOPT_NOBODY, true);
								curl_exec($ch);
								$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
								curl_close($ch);
					?>
					<?php if ($status == 200): ?>
						<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_mini'];?>');"></div>
					<?php else: ?>
						<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
					<?php endif ?>
				<?php endif ?>
				

				
				<div class="table-row__info">
					<p class="table-row__name"><?php echo $wo['product']['name']?></p>
					<?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
					<?php if (isset($atributos_inv)): ?>
						<?php if(!empty($variantes_atributos)): ?>
							<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
								<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
							<?php endforeach ?>
						<?php else: ?>
							<?php $color_producto_sin_atributos = $db->where('id', $wo['product']['color'])->getOne('lui_products_colores')->lang_key;?>
							<span>Color: <?=$wo['lang'][$color_producto_sin_atributos]; ?></span>
						<?php endif ?>
					<?php endif ?>
					<p class="table-row__status"><?=convertirNumeroAFecha($wo['product']['garantia']);?></p>
				</div>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="BARCODE" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>

		    <td data-column="CANTIDAD" class="table-row__td" style="background:#0085fa0f;">
		    	<div class="precio_compra_invo_s">
					<div class="value-button" onclick="decreaseValueMax_col<?=$identificador_unico;?>()">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H5V11H19V13Z"></path></svg>
					</div>
					<input class="box_compra_inputs" style="width:calc(100% - 50px)" type="number" id="qty_<?=$identificador_unico;?>" name="cantidad" max="<?=$wo['product']['stock_disponible'];?>" min="1" onchange="ChangeQtyc_col(this,'<?=$wo['product']['id'];?>','<?=$wo['product']['color'];?>',atributos<?=$identificador_unico;?>)" value="<?=$wo['product']['cantidad'] ?>">
					<div class="value-button" onclick="increaseValueMax_col<?=$identificador_unico;?>()">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg>
					</div>
				</div>
		    </td>
		    <td data-column="PRECIO" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span><?=number_format($wo['product']['precio'], 2, ',', '.');?></span>
		    	</div>
		    </td>

		    <td data-column="SUBTOTAL" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span class="precio_compra_inputs_totalsub_<?=$identificador_unico;?>" data-id="<?=$wo['product']['id'];?>"><?=$wo['product']['subtotal_p'];?></span>
		    	</div>
		    </td>
		</tr>
		<script>
			function increaseValueMax_col<?=$identificador_unico;?>() {
			   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
			   value = isNaN(value) ? 0 : value;
			   value++;
			   document.getElementById('qty_<?=$identificador_unico;?>').value = value;
			   ChangeQtya_col('#qty_<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','<?=$wo['product']['color'];?>', atributos<?=$identificador_unico;?>);
			}

			function decreaseValueMax_col<?=$identificador_unico;?>() {
			   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
			   value = isNaN(value) ? 0 : value;
			   value < 1 ? value = 1 : '';
			   value--;
			   document.getElementById('qty_<?=$identificador_unico;?>').value = value;
			   ChangeQtyb_col('#qty_<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','<?=$wo['product']['color'];?>', atributos<?=$identificador_unico;?>);
			}

		</script>
<?php else: ?>
	<script type="text/javascript">var atributos<?=$identificador_unico;?> = <?php echo json_encode($variantes_atributos_c); ?>;</script>
	<tr class="table-row table-row--chris menu_item_compras_la item_dats_invoice" data-producto="<?php echo $wo['product']['id_productos']?>" id="item_dats_invoice-<?php echo $wo['product']['id_productos']?>" data-id="<?=$wo['product']['id']?>" style="cursor:pointer;user-select:none;">
			<td class="table-row__td">
				<div class="table-row--overdue_green"></div>
				<?php $rutadeimage = $wo['product']['images'][0]['image_mini']; ?>
				<?php $ch = curl_init($rutadeimage);
							curl_setopt($ch, CURLOPT_NOBODY, true);
							curl_exec($ch);
							$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
							curl_close($ch);
				?>
				<?php if ($status == 200): ?>
					<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_mini'];?>');"></div>
				<?php else: ?>
					<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
				<?php endif ?>
				<div class="table-row__info">
					<p class="table-row__name"><?php echo $wo['product']['name']?> </p>
					<?php $atributos_inv = $db->objectbuilder()->where('id_imventario', $wo['product']['inventario'])->get('imventario_atributos'); ?>
					<?php if (isset($atributos_inv)): ?>
						<?php if(!empty($variantes_atributos)): ?>
							<?php foreach($atributos_producto_principal as $atributo => $valores): ?>
								<span><?=$atributo.': '.implode(', ', $valores);?></span><br>
							<?php endforeach ?>
						<?php else: ?>
						<?php endif ?>
					<?php endif ?>
					<p class="table-row__status"><?=convertirNumeroAFecha($wo['product']['garantia']);?></p>
				</div>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="BARCODE" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>
		    <td data-column="CANTIDAD" class="table-row__td" style="background:#0085fa0f;">
		    	<div class="precio_compra_invo_s">
					<div class="value-button" onclick="decreaseValueMax<?=$identificador_unico;?>()">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H5V11H19V13Z"></path></svg>
					</div>
					<?php if (isset($atributos_inv)): ?>
						<?php if(!empty($variantes_atributos)): ?>
							<input class="box_compra_inputs" style="width:calc(100% - 50px)" type="number" id="qty_<?=$identificador_unico;?>" name="cantidad" max="<?=$wo['product']['stock_disponible'];?>" min="1" onchange="ChangeQtyc_col(this,'<?=$wo['product']['id'];?>','',atributos<?=$identificador_unico;?>)" value="<?=$wo['product']['cantidad'] ?>">
						<?php else: ?>
							<input class="box_compra_inputs" style="width:calc(100% - 50px)" type="number" id="qty_<?=$identificador_unico;?>" name="cantidad" max="<?=$wo['product']['stock_disponible'];?>" min="1" onchange="ChangeQtyc(this,'<?=$wo['product']['id'];?>','')" value="<?=$wo['product']['cantidad'] ?>">
						<?php endif ?>
					<?php endif ?>
					
					<div class="value-button" onclick="increaseValueMax<?=$identificador_unico;?>()">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg>
					</div>
				</div>
		    </td>
		    <td data-column="PRECIO" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span><?=number_format($wo['product']['precio'], 2, ',', '.');?></span>
		    	</div>
		    </td>

		    <td data-column="SUBTOTAL" class="table-row__td">
		    	<div class="precio_compra_invo_s">
		    		<span><?=$wo['product']['symbol'];?></span>
		    		<span class="precio_compra_inputs_totalsub_<?=$identificador_unico;?>" data-id="<?=$wo['product']['id'];?>"><?=$wo['product']['subtotal_p'];?></span>
		    	</div>
		    </td>
		</tr>
		<?php if (isset($atributos_inv)): ?>
			<?php if(!empty($variantes_atributos)): ?>
				<script>
					function increaseValueMax<?=$identificador_unico;?>() {
					   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
					   value = isNaN(value) ? 0 : value;
					   value++;
					   document.getElementById('qty_<?=$identificador_unico;?>').value = value;
					   ChangeQtya_col('#qty_<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','', atributos<?=$identificador_unico;?>);
					}

					function decreaseValueMax<?=$identificador_unico;?>() {
					   var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
					   value = isNaN(value) ? 0 : value;
					   value < 1 ? value = 1 : '';
					   value--;
					   document.getElementById('qty_<?=$identificador_unico;?>').value = value;
					   ChangeQtyb_col('#qty_<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','', atributos<?=$identificador_unico;?>);
					}

				</script>
			<?php else: ?>
				<script>
					function increaseValueMax<?=$identificador_unico;?>() {
						var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
						value = isNaN(value) ? 0 : value;
						value++;
						document.getElementById('qty_<?=$identificador_unico;?>').value = value;
						ChangeQtya('#qty_<?=$identificador_unico;?>','<?=$wo['product']['id'];?>','');
					}
					function decreaseValueMax<?=$identificador_unico;?>() {
						var value = parseInt(document.getElementById('qty_<?=$identificador_unico;?>').value, 10);
						value = isNaN(value) ? 0 : value;
						value < 1 ? value = 1 : '';
						value--;
						document.getElementById('qty_<?=$identificador_unico;?>').value = value;
						ChangeQtyb('#qty_<?=$identificador_unico;?>','<?php echo $wo['product']['id'];?>','');
					}
				</script>
			<?php endif ?>
		<?php endif ?>
		
<?php endif ?>
