<?php if($wo['loggedin'] == true):
$total_productos_grupo = 0;
$total_productos_lista = 0;
$total_productos_price = 0.00;
$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne("ventas");
if (!empty($comprapendiente)) {
	$total_productos_grupo = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','0')->getValue('imventario','COUNT(DISTINCT orden)');
	$total_productos_lista = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','0')->getValue('imventario','COUNT(*)');
	if ($total_productos_lista>0) {
		$total_productos_price = $db->where('id_comprobante_v',$comprapendiente->id)->where('estado','0')->getValue('imventario','SUM(precio)');
	}
}
$pagos_digitales = false;
?>

<div class="page-margin container_cart_layshane">
	<div class="div_container_lui_cart">
		<div class="container_cart_lists">
			<div class="panel panel-white ch_card ch_cart">
				<div class="ch_title">
					<?php if (!empty($comprapendiente)): ?>
						<?php if (!empty($comprapendiente->estado==0)): ?>
							<a href="<?php echo $wo['config']['site_url'].'/tienda';?>" data-ajax="?link1=tienda" class="back-to-shop">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> <?php echo $wo['lang']['back_to_shop'] ?>
							</a>
						<?php elseif(!empty($comprapendiente->estado==2)): ?>
							<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl('prev_venta_we',0)"  style="cursor:pointer;">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> Atras
							</a>
						<?php elseif(!empty($comprapendiente->estado==3)): ?>
							<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl('next_venta_we',0)" style="cursor:pointer;">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> Atras
							</a>
						<?php elseif(!empty($comprapendiente->estado==4)): ?>
							<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl('next_venta_web',0)" class="next_order_plcc" style="cursor:pointer;">
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> Atras
							</a>
						<?php endif ?>
					<?php else: ?>
						<a href="<?php echo $wo['config']['site_url'].'/tienda';?>" data-ajax="?link1=tienda" class="back-to-shop">
							<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> <?php echo $wo['lang']['back_to_shop'] ?>
						</a>
					<?php endif ?>
        	
					<div>
						<p><span class="total_items_order"><?php echo($total_productos_lista) ?></span> <?php echo $wo['lang']['items'] ?></p>
					</div>
       	 		</div>
				<div class="ch_prod_items_row">
					<?php if (!empty($comprapendiente)): ?>
						<?php ?>
						<?php $comprapendiente2 = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','2')->getOne("ventas"); ?>
						<?php $items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante_v',$comprapendiente->id)->where('estado','0')->where('tipo','venta')->get('imventario'); ?>
						
						<?php if ($total_productos_lista>0): ?>
							<div class="listar_productos_a_comprar">
			    				<div class="con_layshane_tbles" style="background-color:transparent;">
			    					<div class="container">
			    						<div class="row row--top-20">
			    							<div class="columna-12">
			    								<?php if (!empty($comprapendiente->estado==0)): ?>
				    								<div class="table-container">
				    									<table class="table" style="background-color:#F8F8F8;">
				    										<thead class="table__thead">
				    											<tr>
				    												<th class="table__th">Producto</th>
				    												<th class="table__th">Modelo</th>
				    												<th class="table__th">SKU</th>
				    												<th class="table__th">Cantidad</th>
				    												<th class="table__th">Precio</th>
				    												<th class="table__th">Sub Total</th>
				    											</tr>
				    										</thead>
				    										<tbody class="table__tbody contet_items_de_doc_compr">
					                							<?php $html = "";
					                							$productos_vistos = [];
					                							foreach ($items_compra as $value) {
																    $producto = lui_GetProduct($value->producto);
																    $producto_id = $producto['id'];
																    if (in_array($producto_id, $productos_vistos)) {
																        continue;
																    }
																    $variantes_color = [];
																    foreach ($items_compra as $item) {
																        if ($item->producto == $producto_id) {
																            $variantes_color[] = $item;
																        }
																    }

																    $variantes_atributos = [];
																    $atributos = $db->objectbuilder()->where('id_imventario', $value->id)->get('imventario_atributos');
																    foreach ($atributos as $atributo) {
																        $variantes_atributos[$atributo->id_atributo][] = $atributo->id_atributo_opciones;
																    }
																    $identificador_unico = $comprapendiente->id . '_' . $producto_id;
																    foreach ($variantes_atributos as $atributo => $opciones) {
																        $identificador_unico .= '_' . implode('_', $opciones);
																    }
																    if (in_array($identificador_unico, $productos_vistos)) {
																        continue;
																    }

																    $wo['product']['id'] = $producto['id'];
																    $wo['product']['id_productos'] =  $identificador_unico;
																    $wo['product']['id_imventarios'] =  $value->id;
																    $wo['product']['units'] = $producto['units'];
																    $wo['product']['images'] = $producto['images'];
																    $wo['product']['name'] = $producto['name'];
																    $wo['product']['modelo'] = $producto['modelo'];
																    $wo['product']['sku'] = $producto['sku'];
																    $wo['product']['comprap'] = $comprapendiente->id;
																    $wo['product']['inventario'] = $value->id;
																    $wo['product']['color'] = $value->color;
																    $wo['product']['precio'] = $value->precio;
																    $wo['product']['garantia'] = $value->garantia;

																	$cantidad_productos = 0;
																	if (!empty($variantes_atributos)) {
																	    $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante_v = {$comprapendiente->id}";
																	    foreach ($variantes_atributos as $atributo => $opciones) {
																	        foreach ($opciones as $opcion) {
																	            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
																	        }
																	    }
																	    $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
																	} else{
																	    $cantidad_productos = $db->where('id_comprobante_v', $comprapendiente->id)->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->getValue('imventario', 'COUNT(*)');
																	}

																	if (!empty($variantes_atributos)) {
																	    $sql = "SELECT SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = 'ingreso' THEN cantidad WHEN modo = 'salida' THEN -cantidad ELSE 0 END ELSE 0 END) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND estado = 1";
																	    $subqueries = [];
																	    foreach ($variantes_atributos as $atributo => $opciones) {
																	        foreach ($opciones as $opcion) {
																	            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
																	        }
																	    }
																	    $cantidad_prod = $db->rawQueryOne($sql)->cantidad;
																	    $productos_stock_disponible =	($cantidad_prod !== null) ? $cantidad_prod : 0;
																	} else{
																		if ($wo['product']['color']) {
																			$productos_stock_disponible = $db->where('estado', 1)
																			->where('color', $wo['product']['color'])
																			->where('producto', $producto['id'])
																			->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
																			$productos_stock_disponible = ($productos_stock_disponible !== null) ? $productos_stock_disponible : 0;
																		}else{
																			$productos_stock_disponible = $db->where('estado', 1)
																			->where('producto', $producto['id'])
																			->getValue('imventario', 'SUM(CASE WHEN anulado = 0 THEN CASE WHEN modo = "ingreso" THEN cantidad WHEN modo = "salida" THEN -cantidad ELSE 0 END ELSE 0 END)');
																			$productos_stock_disponible = ($productos_stock_disponible !== null) ? $productos_stock_disponible : 0;
																		}
																	}
																if (!empty($wo['currencies']) && !empty($wo['currencies'][$producto['currency']]) && $wo['currencies'][$producto['currency']]['text'] != $wo['config']['currency'] && !empty($wo['config']['exchange']) && !empty($wo['config']['exchange'][$wo['currencies'][$producto['currency']]['text']])) {
																    $wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
												             		// $wo['total'] += (($wo['product']['price'] / $wo['config']['exchange'][$wo['currencies'][$wo['product']['currency']]['text']]) * $wo['item']->units);
													            } else {
													            	$wo['product']['symbol'] = (!empty($wo['currencies'][$producto['currency']]['symbol'])) ? $wo['currencies'][$producto['currency']]['symbol'] : $producto['currency'];
													            	//$wo['total'] += ($wo['product']['price'] * $wo['item']->units);
													            }
												            	$wo['product']['subtotal_p'] = number_format($value->precio*$cantidad_productos, 2, ',', '.');
																    $wo['product']['cantidad'] = $cantidad_productos;
																    $wo['product']['stock_disponible'] = $productos_stock_disponible;
																    $html .= lui_LoadPage('checkout/items');
																    $productos_vistos[] = $identificador_unico;
																}
																echo $html;
																?>

					                						</tbody>
				    									</table>
				    								</div>
			    								<?php elseif (!empty($comprapendiente->estado==2)): ?>
			    									<div class="contendata_deliveredstore ">
														<div class="option_order_users_data">
															<div class="option_order_data">
																<input type="radio" id="boleta_view" name="order_options_comprobante" value="boleta" <?php if($wo['user']['doc_order']=="boleta"){echo('checked');}?>>
																<label class="label_selected_mod" for="boleta_view"><?php echo $wo['lang']['boleta']; ?></label>
															</div>
															<div class="option_order_data">
																<input type="radio" id="factura_view" name="order_options_comprobante" value="factura" <?php if($wo['user']['doc_order']=="factura"){echo('checked');}?>>
																<label class="label_selected_mod" for="factura_view"><?php echo $wo['lang']['invoice']; ?></label>
															</div>
														</div>

														<div class="content_data_boleta <?php if($wo['user']['doc_order']!="boleta"){echo('nodisplay_mode_order');}?>">
															<div class="panel-white ch_summary">
																<div class="sun_input_a">
																	<input id="dni" name="document_dni" type="text" class="form-control input-md_a" autocomplete="off" placeholder="DNI" value="<?=$wo['user']['comprobante_dni']?>" required="">
																	<label title="<?php echo $wo['lang']['boleta']; ?>" for="dni">DNI</label>
																</div>
															</div>
														</div>
														<div class="content_data_factura <?php if($wo['user']['doc_order']!="factura"){echo('nodisplay_mode_order');}?>">
															<div class="panel-white ch_summary">
																<div class="sun_input_a">
																	<input id="ruc" name="document_ruc" type="text" class="form-control input-md_a" autocomplete="off" placeholder="RUC" value="<?php echo($wo['user']['comprobante_ruc']) ?>" required="">
																	<label for="ruc" title="<?php echo $wo['lang']['invoice']; ?>">RUC</label>
																</div>
															</div>
														</div>
													</div>
												<?php elseif (!empty($comprapendiente->estado==3)): ?>
													<div class="contendata_deliveredstore ">
														<div class="option_order_users_data">
															<div class="option_order_data">
																<input type="radio" id="retiro_tienda" name="order_options_data" value="tienda" <?php if($wo['user']['opcion_de_compra']=="tienda"){echo('checked');}?> onchange="order_pl_addres_type(this)">
																<label class="label_selected_mod" for="retiro_tienda">Retiro en tienda</label>
															</div>

															<div class="option_order_data">
																<input type="radio" id="delivery_order" name="order_options_data" value="delivery" <?php if($wo['user']['opcion_de_compra']=="delivery"){echo('checked');}?> onchange="order_pl_addres_type(this)">
																<label class="label_selected_mod" for="delivery_order">Delivery</label>
															</div>

															<div class="option_order_data">
																<input type="radio" id="envio_order" name="order_options_data" value="envios" <?php if($wo['user']['opcion_de_compra']=="envios"){echo('checked');}?> onchange="order_pl_addres_type(this)">
																<label class="label_selected_mod" for="envio_order">Envios</label>
															</div>
														</div>
														<br>
														<hr>
														<br>
														<div class="content_store_data <?php if($wo['user']['opcion_de_compra']!="tienda"){echo('nodisplay_mode_order');}?>">
															<h4><?php echo $wo['lang']['sucursal_entrega'] ?></h4>
															<div class="panel panel-white ch_card ch_summary">
																<div class="checkout_alert"></div>
																<div class="list-unstyled mb-0 cart_chos_addrs">
																	<?php if (!empty($wo['sucursales'])) {
																		foreach ($wo['sucursales'] as $key => $sucursal) {  ?>
																			<label for="choose_adrs_<?php echo($sucursal->id) ?>">
																				<input type="radio" name="choose-sucursal" id="choose_adrs_<?php echo($sucursal->id) ?>" value="<?php echo($sucursal->id) ?>" class="payment_sucursal" <?php if($wo['user']['sucursal_entrega']==$sucursal->id){echo('checked');}?>>
																				<span class="radio-tile">
																					<p><b><?php echo($sucursal->nombre) ?></b>&nbsp;<?php echo($sucursal->phone) ?></p>
																					<p><?php echo($sucursal->pais) ?>, <?php echo($sucursal->ciudad) ?> - <?php echo($sucursal->direccion) ?></p>
																					<p><?php echo($sucursal->referencia) ?></p>
																				</span>
																			</label>
																			<?php  
																		} 
																	} ?>
																</div>
															</div>
														</div>
														<div class="content_delivery_data <?php if($wo['user']['opcion_de_compra']!="delivery"){echo('nodisplay_mode_order');}?>">
															<?php if (!empty($wo['addresses'])): ?>
																<h4><?php echo $wo['lang']['delivery_address'] ?></h4>
																<div class="panel panel-white ch_card ch_summary">
																	<div class="checkout_alert"></div>
																	<div class="list-unstyled mb-0 cart_chos_addrs">
																		<?php foreach ($wo['addresses'] as $key => $address){ ?>
																			<label for="choose_adrs_<?php echo($address->id) ?>">
																				<input type="radio" name="choose-address" id="choose_adrs_<?php echo($address->id) ?>" value="<?php echo($address->id) ?>" class="payment_address" <?php if($wo['user']['direccion_delivery']==$address->id){echo('checked');}?>>
																				<span class="radio-tile">
																					<p><b><?php echo($address->name) ?></b>&nbsp;<?php echo($address->phone) ?></p>
																					<p><?php echo($address->country) ?>, <?php echo($address->city) ?> - <?php echo($address->referencia) ?></p>
																				</span>
																			</label>
																		<?php } ?>
																	</div>
																</div>
															<?php endif ?><br>
															<hr>
															<?php if ($wo['user']['add_direccion']==0): ?>
																<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address')" class="btn btn-default button_layshane_green" style="transform:none;">Agregar direccion</a>
															<?php elseif ($wo['user']['add_direccion']==1): ?>
																<br>
																<h4><?php echo $wo['lang']['add_new_address'] ?></h4>
																<form class="form form-horizontal address_form" method="post" action="#">
																	<div class="panel panel-white ch_card ch_address">
																		<div class="modal_add_address_modal_alert"></div>
																		<div class="clear"></div>
																		<div class="sty_new_address">
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="name"><?php echo $wo['lang']['name']; ?></label>
																					<input id="name" name="name" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>" >
																				</div>
																			</div>
																			<div class="row" style="margin:0 -15px;">
																				<div class="col-md-6">
																					<div class="sun_input">
																						<label for="phone"><?php echo $wo['lang']['phone_number']; ?></label>
																						<input id="phone" name="phone" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
																					</div>
																				</div>
																				<div hidden>
																					<div hidden>
																						<input hidden id="country" name="country" type="text" class="form-control input-md" autocomplete="off" value="PERU">
																					</div>
																				</div>
																				<div class="col-md-6">
																					<div class="sun_input">
																						<label for="city"><?php echo $wo['lang']['city']; ?></label>
																						<input id="city" name="city" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['city']; ?>">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="address"><?php echo $wo['lang']['address']; ?></label>
																					<textarea id="address" class="form-control input-md" placeholder="<?php echo $wo['lang']['address']; ?>" name="address" autocomplete="off"></textarea>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="referencia"><?php echo $wo['lang']['referrals']; ?></label>
																					<textarea id="referencia" class="form-control input-md" placeholder="<?php echo $wo['lang']['referrals']; ?>" name="referencia"></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="clear"></div>
																		<button type="submit" class="btn btn-default button_layshane_green" style="transform:none;"><?php echo $wo['lang']['add']; ?></button>
																		<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address_n')" class="btn btn-default button_layshane_green" style="transform:none;background:#e70000;color:#fff;">Cerrar</a>
																		
																	</div>
																</form>
															<?php endif ?>
														</div>
														<div class="content_delivery_data <?php if($wo['user']['opcion_de_compra']!="envios"){echo('nodisplay_mode_order');}?>">
															<?php $direccion_envios = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('estado',0)->getOne('direcciones_envios'); ?>
															<?php if ($direccion_envios): ?>
																<p class="alert alert-success">Tienes un lugar que no completaste de agregar.</p>
															<?php else: ?>
																<?php if (!empty($wo['addresses_envios'])): ?>
																	<h4><?php echo $wo['lang']['delivery_address'] ?></h4>
																	<div class="panel panel-white ch_card ch_summary">
																		<div class="checkout_alert"></div>
																		<div class="list-unstyled mb-0 cart_chos_addrs">
																			<?php foreach ($wo['addresses_envios'] as $key => $address){ ?>
																				<label for="envios_choose_adrs_<?php echo($address->id) ?>">
																					<input type="radio" name="choose-address_envios" id="envios_choose_adrs_<?php echo($address->id) ?>" value="<?php echo($address->id) ?>" class="payment_address" <?php if($wo['user']['direccion_envio']==$address->id){echo('checked');}?>>
																					<span class="radio-tile">
																						<p><b><?php echo($address->nombre_completo) ?></b>&nbsp;<?php echo($address->dni) ?></p>
																						<p>Contacto:<?php echo($address->contacto) ?></p>
																						<p><?php echo($address->departamento) ?>, <?php echo($address->provincia) ?> - <?php echo($address->distrito) ?></p>

																						<p>TRANSPORTE: <?php echo($address->transporte) ?>, <?php echo($address->agencia) ?></p>
																						<p>Comentarios: <?php echo($address->comentarios) ?></p>
																					</span>
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																<?php else: ?>
																	<p class="alert alert-success">No tienes lugares de envios, agrega un lugar de envio para continuar.</p>
																<?php endif ?>
															<?php endif ?>

															<?php if ($wo['user']['add_direccion_envio']==0): ?>
																<?php if($wo['user']['opcion_de_compra']!="envios"): ?>
																	<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address_envio')" class="btn btn-default button_layshane_green" style="transform:none;">Agregar lugar</a>
																<?php else: ?>
																	<?php if (isset($direccion_envios)): ?>
																		<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address_envio')" class="btn btn-default button_layshane_green" style="transform:none;">Continuar agregando el lugar</a>
																	<?php else: ?>
																		<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address_envio')" class="btn btn-default button_layshane_green" style="transform:none;">Agregar lugar</a>
																	<?php endif ?>
																<?php endif ?>
															<?php elseif ($wo['user']['add_direccion_envio']==1): ?>
																<?php $direccion_envios = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('estado',0)->getOne('direcciones_envios'); ?>
																<br>
																<h4><b>Agregar el lugar para el envio y datos de la persona que recoge</b></h4>
																<form class="form form-horizontal address_form_envio" method="post" action="#">
																	<div class="panel panel-white ch_card ch_address">
																		<div class="modal_add_address_modal_alert"></div>
																		<div class="clear"></div>
																		<div class="sty_new_address">
																			<div class="" style="display:block;">
																				<label for="dni" style="display:block;width:100%;">DNI</label>
																				<?php if (isset($direccion_envios)): ?>
																					<input style="display:block;width: auto;" id="dni" name="dni" type="text" class="form-control input-md" autocomplete="off" placeholder="DNI" value="<?=$direccion_envios->dni;?>">
																				<?php else: ?>
																					<input style="display:block;width: auto;" id="dni" name="dni" type="text" class="form-control input-md" autocomplete="off" placeholder="DNI" value="">
																				<?php endif ?>
																			</div>
																			<p class="alert alert-warning">El DNI y nombres es de la persona que recogera el producto en la empresa de transporte.</p>
																			<?php if (isset($direccion_envios)): ?>
																			<hr>

																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="name">Nombres y apellidos completos</label>
																					<input id="name" name="nombres" type="text" class="form-control input-md" autocomplete="off" placeholder="Nombres y apellidos completos" value="<?=$direccion_envios->nombre_completo;?>">
																				</div>
																			</div>

																			<div class="row" >
																				<div class="columna-4">
																					<div class="sun_input">
																						<label for="departamento">Departamento</label>
																						<input id="departamento" name="departamento" type="text" class="form-control input-md" autocomplete="off" placeholder="Departamento" value="<?=$direccion_envios->departamento;?>">
																					</div>
																				</div>
																				<div class="columna-4">
																					<div class="sun_input">
																						<label for="provincia">Provincia</label>
																						<input id="provincia" name="provincia" type="text" class="form-control input-md" autocomplete="off" placeholder="Provincia" value="<?=$direccion_envios->provincia;?>">
																					</div>
																				</div>
																				<div class="columna-4">
																					<div class="sun_input">
																						<label for="distrito">Distrito</label>
																						<input id="distrito" name="distrito" type="text" class="form-control input-md" autocomplete="off" placeholder="Distrito" value="<?=$direccion_envios->distrito;?>">
																					</div>
																				</div>
																			</div>
																			<div class="columna-4">
																				<div class="sun_input">
																					<label for="contacto">Contacto</label>
																					<input id="contacto" name="contacto" type="text" class="form-control input-md" autocomplete="off" placeholder="Numero de contacto" value="<?=$direccion_envios->contacto;?>">
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="transporte">Nombre de la empresa de transporte</label>
																					<textarea id="transporte" class="form-control input-md" placeholder="Empresa de transporte" name="transporte" autocomplete="off"><?=$direccion_envios->transporte;?></textarea>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="agencia">Agencia de la empresa de transporte (Direccion agencia)</label>
																					<textarea id="agencia" class="form-control input-md" placeholder="Empresa de transporte" name="agencia" autocomplete="off"><?=$direccion_envios->agencia;?></textarea>
																				</div>
																			</div>
																			<div class="col-md-12">
																				<div class="sun_input">
																					<label for="comentarios">Comentarios</label>
																					<textarea id="comentarios" class="form-control input-md" placeholder="Comentarios" name="comentarios"><?=$direccion_envios->comentarios;?></textarea>
																				</div>
																			</div>
																			<?php endif ?>
																		</div>
																		<div class="clear"></div>
																		<?php if (isset($direccion_envios)): ?>
																			<button type="submit" class="btn btn-default button_layshane_green" style="transform:none;"><?php echo $wo['lang']['add']; ?></button>
																		<?php else: ?>
																			<button type="submit" class="btn btn-default button_layshane_green" style="transform:none;">Continuar</button>
																		<?php endif ?>
																		<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" onclick="order_pl_add('add_venta_address_envio_n')" class="btn btn-default button_layshane_green" style="transform:none;background:#e70000;color:#fff;">Cerrar</a>
																		
																	</div>
																</form>
															<?php endif ?>
														</div>
													</div>
												<?php elseif(!empty($comprapendiente->estado==4)): ?>
													<span>Realizar pago:</span>
													<div class="modos_de_pago_container_buttons">
														<?php if ($wo['user']['opcion_de_compra']=='tienda'): ?>
															<div class="lista_modo_pago">
																<input type="radio" id="modo_pago_1" name="modo_pago" value="1" <?=$wo['user']['mode_pay']==1 ? 'checked' : false ?>>
																<label for="modo_pago_1">
																	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
																<h6>En Tienda</h6>
																</label>
															</div>
														<?php endif ?>
														
														<div class="lista_modo_pago">
															<input type="radio" id="modo_pago_2" name="modo_pago" value="2" <?=$wo['user']['mode_pay']==2 ? 'checked' : false ?>>
															<label for="modo_pago_2">
																<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-transfer-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 21v-6" /><path d="M20 6l-3 -3l-3 3" /><path d="M17 3v18" /><path d="M10 18l-3 3l-3 -3" /><path d="M7 3v2" /><path d="M7 9v2" /></svg>
																<h6>Transferencia / Deposito</h6>
															</label>
														</div>
														<?php if ($pagos_digitales): ?>
															<div class="lista_modo_pago">
																<input type="radio" id="modo_pago_3" name="modo_pago" value="3" <?=$wo['user']['mode_pay']==3 ? 'checked' : false ?>>
																<label for="modo_pago_3">
																	<img width="24" height="24" src="<?=$wo['config']['theme_url'].'/icons/logo-yape.png';?>">
																	<h6>Yape pago</h6>
																</label>
															</div>
															<div class="lista_modo_pago">
																<input type="radio" id="modo_pago_4" name="modo_pago" value="4" <?=$wo['user']['mode_pay']==4 ? 'checked' : false ?>>
																<label for="modo_pago_4">
																	<img style="height:auto;" width="60" src="<?=$wo['config']['theme_url'].'/icons/cuotealo.png';?>">
																	<h6>Cuotealo BCP</h6>
																</label>
															</div>
															<div class="lista_modo_pago">
																<input type="radio" id="modo_pago_5" name="modo_pago" value="5" <?=$wo['user']['mode_pay']==5 ? 'checked' : false ?>>
																<label for="modo_pago_5">
																	<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 10v6a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-6h20zm-14.99 4h-.01a1 1 0 1 0 .01 2a1 1 0 0 0 0 -2zm5.99 0h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0 -2zm5 -10a4 4 0 0 1 4 4h-20a4 4 0 0 1 4 -4h12z" stroke-width="0" fill="currentColor" /></svg>
																	<h6>Tarjeta debito / credito</h6>
																</label>
															</div>
														<?php endif ?>
													</div>
													<?php if ($wo['user']['mode_pay']==1): ?>
														<style type="text/css">
															.contenido_pagos_orden{
																display:flex;
																flex-wrap:wrap;
																gap:1rem;
																border-radius:8px;
																margin:20px auto 10px auto;
																padding:20px;
																flex-direction:column;
																justify-content:center;
																align-items:center;
																user-select:none;
																box-shadow:#333 inset 0px 0px 9px -2px;
																text-transform:uppercase;
																color: #000;
																--s: 37px;
																--c: rgba(0, 0, 0, 0), rgba(40, 40, 40, 0.03) 0.5deg 119.5deg, rgba(0, 0, 0, 0) 120deg;
																--g1: conic-gradient(from 60deg at 56.25% calc(425% / 6), var(--c));
																--g2: conic-gradient(from 180deg at 43.75% calc(425% / 6), var(--c));
																--g3: conic-gradient(from -60deg at 50% calc(175% / 12), var(--c));
																background: var(--g1), var(--g1) var(--s) calc(1.73 * var(--s)), var(--g2),
																            var(--g2) var(--s) calc(1.73 * var(--s)), var(--g3) var(--s) 0,
																            var(--g3) 0 calc(1.73 * var(--s)) rgba(30, 30, 30, 0.08); /* Color de fondo con transparencia */
																background-size: calc(2 * var(--s)) calc(3.46 * var(--s));


															}
															.titulo_end_ord{
																font-size:15px;
																flex-basis: 1;
																font-weight:bold;
																margin: 10px auto;
															}
															.contenido_pagos_orden p{padding:10px 0;display:block;text-align:center;white-space:pre-wrap;}
														</style>

														<div class="contenido_pagos_orden">
															<h1 class="titulo_end_ord">Duracion de compra en reserva.</h1>
															<h2><?=$wo['config']['reserva_duracion_compra'].' HR';?></h2>
															<p>Despues de finalizar su compra, si no completa su compra en tienda, su compra se eliminara al completar el tiempo mencionado.</p>
														</div>
													<?php endif ?>
			    								<?php endif ?>

			    								<?php if (!empty($_SESSION['messages_carito'])): ?>
			    									<div class="alerta_o_noticias alert alert-danger bg-danger"><?=$_SESSION['messages_carito'];?></div>
			    								<?php endif ?>
				    							<br>
			    								<?php
			    								$wo['subtotal']       = number_format($total_productos_price / (1.18), '2','.','');
													$wo['igv']         = number_format($wo['subtotal'] * 0.18, '2','.','');
													$wo['total']       = number_format($total_productos_price, '2','.',''); 
			    								?>
			    								<?php 
													$productos_vistos_moneda = [];
													foreach ($items_compra as $moneda) {
													    $la_monedas_de_products = $moneda->currency;
													    if (!in_array($la_monedas_de_products, $productos_vistos_moneda)) {
													       $productos_vistos_moneda[] = $la_monedas_de_products; 
													    }
													}
				    								$wo['subtotal_dos'] = 0;
				    								$wo['total_dos'] = 0;
				    								$wo['igv_dos'] = 0;
			    								?>
			    								<style type="text/css">
			    									.contenido_de_pagos{
			    										display:grid;
			    										grid-template-columns:repeat(auto-fit, minmax(min(200px, 100%), 1fr));
			    										width:100%;
			    										gap:1rem;
			    										border-top:2px solid #00000091;
			    										margin:15px 0;
			    										padding-top:15px;
			    									}
			    									.cuentas_a_pagar{
			    										border-radius:7px;
			    										background:#ffffffde;
			    									}
			    								</style>
		    									<?php if(!empty($comprapendiente->estado==4)): ?>
													<div class="contenido_de_pagos">
														<?php foreach ($productos_vistos_moneda as $moneds):
															$indexdefault_currency = array_search($moneds, array_column($wo['currencies'], 'text')); ?>
															<?php $total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','COUNT(*)');
															if ($total_productos_lista_uno>0) {
																$total_productos_price_dos = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','SUM(precio)');
																
																$wo['subtotal_dos'] = number_format($total_productos_price_dos / (1.18), '2','.','');
																$wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
																$wo['total_dos']    = number_format($total_productos_price_dos, '2','.',''); 
															} ?>
															<div class="cuentas_a_pagar">
																<div class="div_subs_contn">
																	<span><?php echo $wo['lang']['subtotal'] ?></span>
																	<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?php echo $wo['subtotal_dos']; ?></span>
																</div>
																<div class="div_subs_contn">
																	<span><?php echo $wo['lang']['igv'] ?></span>
																	<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?php echo $wo['igv_dos']; ?></span>
																</div>
																<div class="div_subs_contn">
																	<span><?php echo $wo['lang']['total'] ?></span>
																	<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?=$wo['total_dos'];?></span>
																</div>
															</div>
														<?php endforeach ?>
													</div>
												<?php endif ?>
													
			    								<div class="contenido_ct_footer_document_order">
			    									<div class="footer_document_order">
			    										<div class="footer_document_order_li">
			    											<span class="head_doc_li">Items:</span>
			    											<span class="head_doc_co" id="items_st_total"><?=$total_productos_grupo;?></span>
			    										</div>
			    										<div class="footer_document_order_li">
			    											<span class="head_doc_li">Cantidad:</span>
			    											<span class="head_doc_co" id="cantidad_st_total"><?=$total_productos_lista;?></span>
			    										</div>
			    										<br>
			    									</div>


			    									<div class="footer_document_orderb">
			    										<?php foreach ($productos_vistos_moneda as $moneds): ?>
			    											<?php $total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','COUNT(*)');
																if ($total_productos_lista_uno>0) {
																	$total_productos_price_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','SUM(precio)');
																	$wo['total_uno']       = number_format($total_productos_price_uno, '2','.',''); 
																} ?>
																<?php echo numeroATexto($wo['total_uno'],$moneds); ?>
																<br>
															<?php endforeach ?>
			    									</div>
			    								</div>

			    								<div class="ch_total_price" style="margin:0 -15px;width:auto;">
	    											<?php if(empty($comprapendiente->estado==4)): ?>
		    											<?php foreach ($productos_vistos_moneda as $moneds):
															$indexdefault_currency = array_search($moneds, array_column($wo['currencies'], 'text')); ?>
															<?php $total_productos_lista_uno = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','COUNT(*)');
															if ($total_productos_lista_uno>0) {
																$total_productos_price_dos = $db->where('id_comprobante_v',$comprapendiente->id)->where('currency',$moneds)->where('estado','0')->getValue('imventario','SUM(precio)');
																
																$wo['subtotal_dos'] = number_format($total_productos_price_dos / (1.18), '2','.','');
																$wo['igv_dos']          = number_format($wo['subtotal_dos'] * 0.18, '2','.','');
																$wo['total_dos']    = number_format($total_productos_price_dos, '2','.',''); 
															} ?>

															<div class="div_subs_contn">
																<span><?php echo $wo['lang']['subtotal'] ?></span>
																<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?php echo $wo['subtotal_dos']; ?></span>
															</div>
															<div class="div_subs_contn">
																<span><?php echo $wo['lang']['igv'] ?></span>
																<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?php echo $wo['igv_dos']; ?></span>
															</div>
															<div class="div_subs_contn">
																<span><?php echo $wo['lang']['total'] ?></span>
																<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $moneds;?> <?=$wo['total_dos'];?></span>
															</div>
															<hr>
														<?php endforeach ?>
													<?php endif ?>
													<?php //if (isset(obtener_ultimo_tc()['result'])): ?>
														<?php  //echo(obtener_ultimo_tc()['result']["venta"]);?>
													<?php //endif ?>

													<?php echo date('Y-m-d') ?><br>

													<div class="div_subs_contn" style="width:100%;">
														<div class="bt_conain_sty">
															<?php if (!empty($comprapendiente->estado==0)): ?>
																<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" class="btncompletecompra next_order_pl" onclick="order_pl('next_venta_we',1)">
																	<span class="default">Continuar</span>
																</a>
															<?php elseif(!empty($comprapendiente->estado==2)): ?>
																<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" class="btncompletecompra next_order_plc" onclick="order_pl('next_venta_web',1)">
																	<span class="default">Continuar</span>
																</a>
															<?php elseif (!empty($comprapendiente->estado==3)): ?>
																<a href="<?php echo $wo['config']['site_url'].'/checkout';?>" data-ajax="?link1=checkout" class="btncompletecompra next_order_plcc" onclick="order_pl('next_venta_web_c',1)">
																	<span class="default">Continuar</span>
																</a>
															<?php elseif (!empty($comprapendiente->estado==4)): ?>
																<?php if ($wo['user']['mode_pay']==0): ?>
																<?php else: ?>
					    											<button class="btncompletecompra endcompra_pcl" data="<?=$comprapendiente->id;?>" onclick="order_pl_end(this)">
					    												<span class="default">Completar compra</span>
						    											<span class="success">Finalizado
						    												<svg viewbox="0 0 12 10">
						    													<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
						    												</svg>
						    											</span>
						    											<div class="box"></div>
						    											<div class="drone">
						    												<svg class="wing left">
						    													<use xlink:href="#droneWing"></use>
						    												</svg>
																		    <svg class="wing right">
																		      <use xlink:href="#droneWing"></use>
																		    </svg>
																		    <svg class="body">
																		      <use xlink:href="#droneBody"></use>
																		    </svg>
																		    <svg class="grab">
																		      <use xlink:href="#droneGrab"></use>
																		    </svg>
																		  </div>
																	</button>
																	
																	<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
																	  <symbol id="droneBody" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 14" fill="currentColor" stroke="none">
																	    <path d="M38,0.5 C38,0.223857625 38.2238576,5.07265313e-17 38.5,0 C38.7761424,-5.07265313e-17 39,0.223857625 39,0.5 L39,4 C39.5522847,4 40,4.44771525 40,5 L40,6 L40.5,6 C41.3284271,6 42,6.67157288 42,7.5 C42,8.32842712 41.3284271,9 40.5,9 L30,9 L30,9.86761924 C30,10.5701449 29.6314023,11.2211586 29.0289915,11.5826051 L25.4750236,13.7149859 C25.1641928,13.9014843 24.80852,14 24.4460321,14 L17.5539679,14 C17.19148,14 16.8358072,13.9014843 16.5249764,13.7149859 L12.9710085,11.5826051 C12.3685977,11.2211586 12,10.5701449 12,9.86761924 L12,9 L1.5,9 C0.671572875,9 1.01453063e-16,8.32842712 0,7.5 C-1.01453063e-16,6.67157288 0.671572875,6 1.5,6 L2,6 L2,5 C2,4.44771525 2.44771525,4 3,4 L3,0.5 C3,0.223857625 3.22385763,5.07265313e-17 3.5,0 C3.77614237,-5.07265313e-17 4,0.223857625 4,0.5 L4,4 C4.55228475,4 5,4.44771525 5,5 L5,6 L12.005,6 L12.0064818,5.97128221 C12.0580908,5.33141252 12.414937,4.75103782 12.9710085,4.41739491 L16.5249764,2.28501415 C16.8358072,2.09851567 17.19148,2 17.5539679,2 L24.4460321,2 C24.80852,2 25.1641928,2.09851567 25.4750236,2.28501415 L29.0289915,4.41739491 C29.5934099,4.75604592 29.952577,5.34889137 29.9956355,6.0001358 L37,6 L37,5 C37,4.44771525 37.4477153,4 38,4 L38,0.5 Z"></path>
																	  </symbol>
																	  <symbol id="droneGrab" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 14" fill="none" stroke="currentColor">
																	    <path d="M5,13 L1,13 C1,7.66666667 3.33333333,3.66666667 8,1 L17.996238,1 C22.6654127,3 25,7 25,13 L21.0005587,13" stroke-width="2" stroke-linecap="round"></path>
																	  </symbol>
																	  <symbol id="droneWing" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 2" fill="currentColor" stroke="none">
																	    <path d="M13,2 C12.4477153,2 12,1.55228475 12,1 C12,0.44771525 12.4477153,0 13,0 C13.5522847,0 21,0.44771525 21,1 C21,1.55228475 13.5522847,2 13,2 Z"></path>
																	    <path d="M8,2 C7.44771525,2 0,1.55228475 0,1 C0,0.44771525 7.44771525,0 8,0 C8.55228475,0 9,0.44771525 9,1 C9,1.55228475 8.55228475,2 8,2 Z"></path>
																	  </symbol>
																	</svg>
																<?php endif ?>
															<?php endif ?>
			    										</div>
													</div>
												</div>
			    							</div>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
		    			<?php endif ?>
					<?php elseif(!empty($comprapendiente2)): ?>
					  	
					<?php else: ?>
						<div class="carrito_null_layshane">
							<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="200" height="300" viewBox="0 0 896 747.97143" xmlns:xlink="http://www.w3.org/1999/xlink"><title><?=$wo['lang']['no_items_found'];?></title><path d="M193.634,788.75225c12.42842,23.049,38.806,32.9435,38.806,32.9435s6.22712-27.47543-6.2013-50.52448-38.806-32.9435-38.806-32.9435S181.20559,765.7032,193.634,788.75225Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><path d="M202.17653,781.16927c22.43841,13.49969,31.08016,40.3138,31.08016,40.3138s-27.73812,4.92679-50.17653-8.57291S152,772.59636,152,772.59636,179.73811,767.66958,202.17653,781.16927Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><rect x="413.2485" y="35.90779" width="140" height="2" fill="#f2f2f2"/><rect x="513.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="452.2485" y="37.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="484.2485" y="131.90779" width="140" height="2" fill="#f2f2f2"/><rect x="522.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="583.2485" y="113.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="670.2485" y="176.90779" width="140" height="2" fill="#f2f2f2"/><rect x="708.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="769.2485" y="158.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="656.2485" y="640.90779" width="140" height="2" fill="#f2f2f2"/><rect x="694.2485" y="622.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="755.2485" y="622.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="417.2485" y="319.90779" width="140" height="2" fill="#f2f2f2"/><rect x="455.2485" y="301.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="516.2485" y="301.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="461.2485" y="560.90779" width="140" height="2" fill="#f2f2f2"/><rect x="499.2485" y="542.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="560.2485" y="542.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="685.2485" y="487.90779" width="140" height="2" fill="#f2f2f2"/><rect x="723.2485" y="469.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="784.2485" y="469.90779" width="2" height="18.5" fill="#f2f2f2"/><polygon points="362.06 702.184 125.274 702.184 125.274 700.481 360.356 700.481 360.356 617.861 145.18 617.861 134.727 596.084 136.263 595.347 146.252 616.157 362.06 616.157 362.06 702.184" fill="#3e82ee"/><circle cx="156.78851" cy="726.03301" r="17.88673" fill="var(--boton-fondo)"/><circle cx="333.10053" cy="726.03301" r="17.88673" fill="var(--boton-fondo)"/><circle cx="540.92726" cy="346.153" r="11.07274" fill="var(--boton-fondo)"/><path d="M539.38538,665.76747H273.23673L215.64844,477.531H598.69256l-.34852,1.10753Zm-264.8885-1.7035H538.136l58.23417-184.82951H217.95082Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><polygon points="366.61 579.958 132.842 579.958 82.26 413.015 418.701 413.015 418.395 413.998 366.61 579.958" fill="#f2f2f2"/><polygon points="451.465 384.7 449.818 384.263 461.059 341.894 526.448 341.894 526.448 343.598 462.37 343.598 451.465 384.7" fill="#3e82ee"/><rect x="82.2584" y="458.58385" width="345.2931" height="1.7035" fill="#3e82ee"/><rect x="101.45894" y="521.34377" width="306.31852" height="1.7035" fill="#3e82ee"/><rect x="254.31376" y="402.36843" width="1.7035" height="186.53301" fill="#3e82ee"/><rect x="385.55745" y="570.79732" width="186.92877" height="1.70379" transform="translate(-274.73922 936.23495) rotate(-86.24919)" fill="#3e82ee"/><rect x="334.45728" y="478.18483" width="1.70379" height="186.92877" transform="translate(-188.46866 -52.99638) rotate(-3.729)" fill="#3e82ee"/><rect y="745" width="896" height="2" fill="#3e82ee"/><path d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M747.41068,137.89028s14.61842,41.60627,5.62246,48.00724S783.39448,244.573,783.39448,244.573l47.22874-12.80193-25.86336-43.73993s-3.37348-43.73992-3.37348-50.14089S747.41068,137.89028,747.41068,137.89028Z" transform="translate(-152 -76.01429)" opacity="0.1"/><path d="M722.87364,434.46832s-4.26731,53.34138,0,81.07889,10.66828,104.5491,10.66828,104.5491,0,145.08854,23.4702,147.22219,40.53945,4.26731,42.6731-4.26731-10.66827-12.80193-4.26731-17.06924,8.53462-19.20289,0-36.27213,0-189.8953,0-189.8953l40.53945,108.81641s4.26731,89.61351,8.53462,102.41544-4.26731,36.27213,10.66827,38.40579,32.00483-10.66828,40.53945-14.93559-12.80193-4.26731-8.53462-6.401,17.06924-8.53462,12.80193-10.66828-8.53462-104.54909-8.53462-104.54909S879.69728,414.1986,864.7617,405.664s-24.537,6.16576-24.537,6.16576Z" transform="translate(-152 -76.01429)" fill="#2b2b2b"/><path d="M761.27943,758.78388v17.06924s-19.20289,46.39942,0,46.39942,34.13848,4.8083,34.13848-1.59266V763.05119Z" transform="translate(-152 -76.01429)" fill="black"/><path d="M887.16508,758.75358v17.06924s19.20289,46.39941,0,46.39941-34.13848,4.80831-34.13848-1.59266V763.02089Z" transform="translate(-152 -76.01429)" fill="black"/><circle cx="625.28185" cy="54.4082" r="38.40579" fill="darksalmon"/><path d="M765.54674,201.89993s10.66828,32.00482,27.73752,25.60386l17.06924-6.401L840.22467,425.9337s-23.47021,34.13848-57.60869,12.80193S765.54674,201.89993,765.54674,201.89993Z" transform="translate(-152 -76.01429)" fill="#3e82ee"/><path d="M795.41791,195.499l9.60145-20.26972s56.54186,26.67069,65.07648,35.20531,8.53462,21.33655,8.53462,21.33655l-14.93559,53.34137s4.26731,117.351,4.26731,121.61834,14.93559,27.73751,4.26731,19.20289-12.80193-17.06924-21.33655-4.26731-27.73751,27.73752-27.73751,27.73752Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M870.09584,349.12212l-6.401,59.74234s-38.40579,34.13848-29.87117,36.27214,12.80193-6.401,12.80193-6.401,14.93559,14.93559,23.47021,6.401S899.967,355.52309,899.967,355.52309Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M778.1,76.14416c-8.51412-.30437-17.62549-.45493-24.80406,4.13321a36.31263,36.31263,0,0,0-8.5723,8.39153c-6.99153,8.83846-13.03253,19.95926-10.43553,30.92537l3.01633-1.1764a19.75086,19.75086,0,0,1-1.90515,8.46261c.42475-1.2351,1.84722.76151,1.4664,2.01085L733.543,139.792c5.46207-2.00239,12.25661,2.05189,13.08819,7.80969.37974-12.66123,1.6932-27.17965,11.964-34.59331,5.17951-3.73868,11.73465-4.88,18.04162-5.8935,5.81832-.935,11.91781-1.82659,17.49077.08886s10.31871,7.615,9.0553,13.37093c2.56964-.88518,5.44356.90566,6.71347,3.30856s1.33662,5.2375,1.37484,7.95506c2.73911,1.93583,5.85632-1.9082,6.97263-5.07112,2.62033-7.42434,4.94941-15.32739,3.53783-23.073s-7.72325-15.14773-15.59638-15.174a5.46676,5.46676,0,0,0,1.42176-3.84874l-6.48928-.5483a7.1723,7.1723,0,0,0,4.28575-2.25954C802.7981,84.73052,782.31323,76.29477,778.1,76.14416Z" transform="translate(-152 -76.01429)" fill="black"/><path d="M776.215,189.098s-17.36929-17.02085-23.62023-15.97822S737.80923,189.098,737.80923,189.098s-51.20772,17.06924-49.07407,34.13848S714.339,323.51826,714.339,323.51826s19.2029,100.28179,2.13366,110.95006,81.07889,38.40579,83.21254,25.60386,6.401-140.82123,0-160.02412S776.215,189.098,776.215,189.098Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M850.89294,223.23648h26.38265S895.6997,304.31537,897.83335,312.85s6.401,49.07406,4.26731,49.07406-44.80675-8.53462-44.80675-2.13365Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><path d="M850,424.01429H749c-9.85608-45.34-10.67957-89.14649,0-131H850C833.70081,334.115,832.68225,377.62137,850,424.01429Z" transform="translate(-152 -76.01429)" fill="#f2f2f2"/><path d="M707.93806,368.325,737.80923,381.127s57.60868,8.53462,57.60868-14.93559-57.60868-10.66827-57.60868-10.66827L718.60505,349.383Z" transform="translate(-152 -76.01429)" fill="darksalmon"/><path d="M714.339,210.43455l-25.60386,6.401L669.53227,329.91923s-6.401,29.87117,4.26731,32.00482S714.339,381.127,714.339,381.127s4.26731-32.00483,12.80193-32.00483L705.8044,332.05288,718.60633,257.375Z" transform="translate(-152 -76.01429)" fill="var(--boton-fondo)"/><rect x="60.2485" y="352.90779" width="140" height="2" fill="#f2f2f2"/><rect x="98.2485" y="334.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="159.2485" y="334.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="109.2485" y="56.90779" width="140" height="2" fill="#f2f2f2"/><rect x="209.2485" y="58.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="148.2485" y="58.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="250.2485" y="253.90779" width="140" height="2" fill="#f2f2f2"/><rect x="350.2485" y="255.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="289.2485" y="255.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="12.2485" y="252.90779" width="140" height="2" fill="#f2f2f2"/><rect x="112.2485" y="254.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="51.2485" y="254.40779" width="2" height="18.5" fill="#f2f2f2"/><rect x="180.2485" y="152.90779" width="140" height="2" fill="#f2f2f2"/><rect x="218.2485" y="134.90779" width="2" height="18.5" fill="#f2f2f2"/><rect x="279.2485" y="134.90779" width="2" height="18.5" fill="#f2f2f2"/></svg>
							<p><?=$wo['lang']['no_items_found'];?></p>
						</div>
					<?php endif ?>
				</div>
				<div class="pay_order_layshane"></div>
			</div>
		</div>
	</div>
</div>
<script>
function loadpay(numsdd){
	$(".pay_order_layshane").load(Wo_Ajax_Requests_File() + '?f=order_opcion&s=pays_vie&tols='+<?=$wo['total'];?>);
}

$(document).ready(function() {
//loadpay()
	$(document).on('click','#boleta_view', function(){
		$('.content_data_factura').addClass('nodisplay_mode_order');
		$('.content_data_boleta').removeClass('nodisplay_mode_order');
	})

	$(document).on('click','#factura_view', function(){
		$('.content_data_boleta').addClass('nodisplay_mode_order');
		$('.content_data_factura').removeClass('nodisplay_mode_order');
	})

	$('input[name="order_options_comprobante"]').change(function(){
		var selected_doc = $(this).val();
		if (selected_doc=='boleta') {
			$('input[name="document_ruc"]').val('');
		}else if(selected_doc=='factura'){
			$('input[name="document_dni"]').val('');
		}

		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document&hash=' + $('.main_session').val(),
			data: {comprobante:selected_doc},
			type: 'POST',
			success: function (data) {
				//loadpay()
			}
		})
	});

	$('input[name="document_dni"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_dni&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
				console.log(data)
				//loadpay()
			}
		})
	});



	$('input[name="document_ruc"]').keyup(function(){
		var nums = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=document_ruc&hash=' + $('.main_session').val(),
			data: {number:nums},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="choose-sucursal"]').change(function(){
		var suc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=sucursalesdata&hash=' + $('.main_session').val(),
			data: {sucursal:suc},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="modo_pago"]').change(function(){
		var pag = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=mode_pay&hash=' + $('.main_session').val(),
			data: {pay_mod:pag},
			type: 'POST',
			success: function (data) {
				LoadCheckout();
			}
		})
	});

	$('input[name="choose-address"]').change(function(){
		var direc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=direccionesdata&hash=' + $('.main_session').val(),
			data: {direccion:direc},
			type: 'POST',
			success: function (data) {
			}
		})
	});

	$('input[name="choose-address_envios"]').change(function(){
		var direc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=direccionesdata_envios&hash=' + $('.main_session').val(),
			data: {direccion:direc},
			type: 'POST',
			success: function (data) {
			}
		})
	});



  var options = {
    url: Wo_Ajax_Requests_File() + '?f=address&s=add&hash=' + $('.main_session').val(),
      beforeSubmit:  function () {
        $('.modal_add_address_modal_alert').empty();
        $("#add_address_modal").find('.btn-mat').attr('disabled', 'true');
        $("#add_address_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
      },
      success: function (data) {
      	console.log(data)
        $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
        $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
        if (data.status == 200) {
            order_pl_add('add_venta_address_n')
            LoadCheckout();
        } else {
          $('.modal_add_address_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
          data.message
          +'</div>');
        }
      }
  };
  $('.address_form').ajaxForm(options);

  var options = {
      url: Wo_Ajax_Requests_File() + '?f=comprar_producto_b&s=add_address_envios&hash=' + $('.main_session').val(),
        success: function (data) {
        	console.log(data)
          if (data.status == 200) {
              order_pl_add('add_venta_address_envio_n')
          }
          LoadCheckout();
        }
    };
    $('.address_form_envio').ajaxForm(options);

});
    <?php if ($wo['topup'] == 'show') { ?>
    var check_wallet = setInterval(function(){
        $.post(Wo_Ajax_Requests_File() + '?f=products&s=check_wallet&hash=' + $('.main_session').val(), function(data, textStatus, xhr) {
            if (data.status == 200) {
                if (data.topup == 'hide') {
                    $('.wallet_alert').remove();
                    $('.buy_button').removeAttr('disabled');
                    clearInterval(check_wallet);
                }
            }
        });
     }, 3000);
    <?php } ?>
</script>
<div id="pay_modal_wallet">
      <div class="modal fade wow_mat_pops" id="pay-go-pro" role="dialog" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="wow_pops_head">
              <svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
              <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path></svg> <?php echo $wo['lang']['pay_from_wallet'] ?></h4>
            </div>
            <div class="modal-body">
              <div class="pay_modal_wallet_alert"></div>
              <h4 class="pay_modal_wallet_text"></h4>
            </div>
            <div class="clear"></div>
            <div class="modal-footer">
              <div class="ball-pulse"><div></div><div></div><div></div></div>
              <button type="button" class="btn btn-main" id="pay_modal_wallet_btn"><?php echo $wo['lang']['pay']; ?></button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="delete-address" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box wow_mat_mdl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
          <h4 class="modal-title"><?php echo $wo['lang']['delete_your_address'] ?></h4>
        </div>
        <div class="modal-body">
          <?php echo $wo['lang']['are_you_delete_your_address']; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal"><?php echo $wo['lang']['delete']; ?></button>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade ch_payment_box" id="buy_product_modal" tabindex="-1" role="dialog" aria-labelledby="buy_product" aria-hidden="true" data-id="0">
    <div class="modal-dialog modal-md mat_box" role="document">
      <div class="modal-content">
        <div class="ch_payment_head">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>
          <h4><?php echo $wo['lang']['payment_alert']; ?></h4>
        </div>
        <div class="modal-body">
          <div class="modal_product_pay_alert"></div>
          <?php echo $wo['lang']['purchase_the_items']; ?>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="product_id" autocomplete="off">
          <input type="hidden" id="product_price" autocomplete="off">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $wo['lang']['cancel']; ?></button>
          <button type="button" class="btn btn-main btn-mat"><?php echo $wo['lang']['pay']; ?></button>
        </div>
      </div>
    </div>
    </div>
<?php else: ?>
	<style type="text/css">
		.empty_cart_order_user_not{
			display:flex;
			justify-content:center;
			align-self:center;
			min-height:calc(100vh - 280px);
			align-items:center;
			user-select:none;
			flex-direction:column;
		}
		.empty_cart_order_user_not svg{display:block;margin-bottom:20px;}
		.empty_cart_order_user_not div{display:block;}
		.empty_cart_order_user_not a{
			margin:10px auto;border:1px solid #ccc;border-radius:6px;padding:10px;
		}
	</style>
	<div class="empty_cart_order_user_not"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg><div>Inicia session para ver tus compras.</div>
	<a class="dec main" href="<?=lui_SeoLink('index.php?link1=acceder');?>" data-ajax="?link1=acceder"><?php echo $wo['lang']['login']?></a>
</div>
<?php endif ?>