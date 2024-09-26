<?php if (!empty($wo['product']['images'][0]['id_color'])): ?>
   <?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
   <?php if(isset($color_id['id_color'])!=0): ?>
      <?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
      <?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
      <?php $el_color_b = '&opcion='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
   <?php else: ?>
      <?php $el_color = ''; ?>
      <?php $el_color_b = ''; ?>
   <?php endif ?>
<?php else: ?>
   <?php $el_color = ''; ?>
   <?php $el_color_b = ''; ?>
<?php endif ?>
<?php $atributos = Mostrar_Atributos_producto($wo['product']['id']); ?>
<?php $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['product']['id']) ?>

<?php if ($opciones_del_producto): ?>
	<?php foreach ($opciones_del_producto as $color => $valorcolor): $seleccionadocoloor='';?>
		<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
		<?php $existencia_atributes = false; foreach ($atributos as $wo['atributos_b']): ?>
			<?php if($wo['atributos_b']['nombre']=='Color'): ?>
			<?php else: ?>
				<?php $existencia_atributes = true; ?>
			<?php endif ?>
		<?php endforeach ?>
		<?php $color_nombre_atributo = $db->where('id_producto', $wo['product']['id'])->getOne('atributos')?>
		<tr class="table-row table-row--chris item_dats-<?php echo $wo['product']['id']?> <?php echo ($existencia_atributes==true ? 'menu-link_us_add': 'menu-link_us_add_b'); ?>" id="item_dats-<?php echo $wo['product']['id']?>" data-colc="<?=$color_nombre_atributo['id'];?>" data-col="<?=$valorcolor['id_color'];?>" data-id="<?php echo $wo['product']['id']?>" style="cursor:pointer;user-select:none;">
			<td class="table-row__td">
				<div class="table-row--overdue_gris"></div>
				<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
				<div class="table-row__info">
					<p></p>
					<p class="table-row__name"><?php echo $wo['product']['name']?></p>
					<?php if(isset($buscar_el_color_por_id)): ?>
						<span><?=$color_nombre_atributo['nombre'];?>: <?=$wo['lang'][$buscar_el_color_por_id['lang_key']];?></span>
					<?php endif ?>
				</div>
				<?php if($existencia_atributes==true): ?>
					<div class="placeholder_atri" style="display:none;"></div>
					<div class="cont_atributes_listas_compras submenu_add_irtd" style="display:none;">
						<div class="main_closed_view_more_items_orrder">
							<span class="closed_view_more_items_orrder btn-mat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg></span>
						</div>
						<form class="form_producto" data-producto-id="<?php echo $wo['product']['id']; ?>" style="width:100%;">
							<input type="hidden" hidden name="producto" value="<?php echo $wo['product']['id']; ?>">
							<input type="hidden" hidden name="color" value="<?=$valorcolor['id_color'];?>">

							<div class="header_title_viewas_more_items" style="display:block;width:100%;text-align:center;"><span><?php echo $wo['product']['name']?></span></div>
						    	<?php foreach ($atributos as $wo['atributos']): ?>
						    		<?php if($wo['atributos']['nombre']=='Color'): ?>
						    			<?php if (isset($buscar_el_color_por_id)): ?>
						    				<p style="font-size:18px;padding:10px;" class="table-row__policy cont_atributes_listas_compras_title"><?=$wo['atributos']['nombre']; ?> <?=$wo['lang'][$buscar_el_color_por_id['lang_key']];?></p>
						    			<?php endif ?>
						    			<input type="hidden" hidden name="atributo_<?=$wo['atributos']['id'];?>[]" value="<?=$valorcolor['id_color'];?>" checked>
						    		<?php else: $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos']['id']);?>

						    			<div class="atributes_listas_compras">
						    				<span class="cont_ats_title"><?=$wo['atributos']['nombre']; ?></span>
						    				<?php foreach ($atributos_opciones as $wo['opt_atributos']): ?>
						    					<div class="lista_de_opciones_de_atributes">
													<input type="radio" name="atributo_<?=$wo['atributos']['id'];?>[]" id="atr_opt_list<?=$wo['opt_atributos']['id'].$valorcolor['id_color'];?>" <?=$wo['opt_atributos']['active'] ? 'checked' : ''; ?> value="<?=$wo['opt_atributos']['id'];?>" data="hola">
													<label for="atr_opt_list<?=$wo['opt_atributos']['id'].$valorcolor['id_color'];?>">
														<div class="radio-circle"></div>
														<span class="radio-text"><?=$wo['opt_atributos']['nombre'];?></span>
													</label>
												</div>
											<?php endforeach ?>
										</div>
						    		<?php endif ?>
						    	<?php endforeach ?>
						    <div style="display:flex;justify-content:center;width:100%;">
						    	<input class="btn button22 agregar_datos_compra_vr" data-id="<?=$wo['product']['id'] ?>" type="submit" role="button" value="Agregar">
						    </div>
					    </form>
				    </div>
			    <?php endif ?>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="SKU" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>
		</tr>
	<?php endforeach ?>
<?php else: ?>
	<?php $existencia_atributes = false; foreach ($atributos as $wo['atributos_b']): ?>
		<?php if($wo['atributos_b']['nombre']=='Color'): ?>
		<?php else: ?>
			<?php $existencia_atributes = true; ?>
		<?php endif ?>
	<?php endforeach ?>
	<tr class="table-row table-row--chris item_dats-<?php echo $wo['product']['id']?> <?php echo ($existencia_atributes==true ? 'menu-link_us_add': 'add_product_compra_list'); ?> " id="item_dats-<?php echo $wo['product']['id']?>" data-col="" data-id="<?php echo $wo['product']['id']?>" style="cursor:pointer;user-select:none;">
			<td class="table-row__td">
				<div class="table-row--overdue_gris"></div>
				<div class="table-row__img" style="background-image: url('<?php echo $wo['product']['images'][0]['image_org'];?>');"></div>
				<div class="table-row__info">
					<p class="table-row__name"><?php echo $wo['product']['name']?></p>
				</div>
				<?php if($existencia_atributes==true): ?>
					<div class="placeholder_atri" style="display:none;"></div>
					<div class="cont_atributes_listas_compras submenu_add_irtd" style="display:none;">
						<div class="main_closed_view_more_items_orrder">
							<span class="closed_view_more_items_orrder btn-mat"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg></span>
						</div>
						<form class="form_productos" data-producto-id="<?php echo $wo['product']['id']; ?>" style="width:100%;">
							<input type="hidden" hidden name="producto" value="<?php echo $wo['product']['id']; ?>">
							<div class="header_title_viewas_more_items" style="display:block;width:100%;text-align:center;"><span><?php echo $wo['product']['name']?></span></div>
						    	<?php foreach ($atributos as $wo['atributos']): ?>
						    		<?php if($wo['atributos']['nombre']=='Color'): ?>
						    		<?php else: $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos']['id']);?>
						    			<div class="atributes_listas_compras">
						    				<span class="cont_ats_title"><?=$wo['atributos']['nombre']; ?></span>
						    				<?php foreach ($atributos_opciones as $wo['opt_atributos']): ?>
						    					<div class="lista_de_opciones_de_atributes">
													<input type="radio" name="atributo_<?=$wo['atributos']['id'];?>[]" id="atr_opt_list<?=$wo['opt_atributos']['id'];?>" <?=$wo['opt_atributos']['active'] ? 'checked' : ''; ?> value="<?=$wo['opt_atributos']['id'];?>" data="hola">
													<label for="atr_opt_list<?=$wo['opt_atributos']['id'];?>">
														<div class="radio-circle"></div>
														<span class="radio-text"><?=$wo['opt_atributos']['nombre'];?></span>
													</label>
												</div>
											<?php endforeach ?>
										</div>
						    		<?php endif ?>
						    	<?php endforeach ?>
						    <div style="display:flex;justify-content:center;width:100%;flex-wrap:wrap;margin-top:40px;">
						    	<br>
						    	<input class="btn button22 agregar_datos_compra_vr" data-id="<?=$wo['product']['id'] ?>" type="submit" role="button" value="Agregar">
						    </div>
					    </form>
				    </div>
			    <?php endif ?>
			</td>
			<td data-column="MODELO" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['modelo']; ?></p>
		        </div>                
		    </td>
			<td data-column="SKU" class="table-row__td">
				<div class="">
		            <p class="table-row__policy"><?=$wo['product']['sku']; ?></p>
		        </div>                
		    </td>
		</tr>
<?php endif ?>
