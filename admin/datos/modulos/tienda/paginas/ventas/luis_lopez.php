<?php
$usuario=DatosUsuario::poriUsuario($_SESSION["admin_id"]);
$base = Luis::basepage("base_page_admin");
$namepage =  Luis::dato("luis_nombre")->valor;
$metodopago=DatosAdmin::MostrarMetododepago();
$moneda_principal = DatosAdmin::mostrar_la_moneda_principal();
if($moneda_principal){
	$moneda_principal_view=$moneda_principal->simbolo;
}else{
	$moneda_principal_view=false; 
}
if(isset($_SESSION["admin_id"])){
	$documentos=DatosAdmin::mostrardocumentos();
	?>
	<section class="vista_preb_page">
      <ol class="box_visw">
        <li><a href="<?=$base;?>"><?=Luis::lang("inicio");?></a></li>
        <li><a><?=Luis::lang("tienda");?></a></li>
        <li class="active"><?=Luis::lang("vender");?></li>
      </ol>
    </section>
    <?php
    if(isset($_GET["paginas"])){
    	$urb = explode("/", $_GET["paginas"]);
		if(count($urb)>4){
			header('location:'.$base.'ventas/vender');
		}else{
			if(isset($urb[2])){
				if(isset($urb[1])){
					if($urb[1]==="view"){
						if($urb[2]==$urb[2]){
							echo "vista";
						}else{
							header("location:".$base."ventas");
						}
					}elseif($urb[1]==="ventas_en_linea"){
						if($urb[2]==$urb[2]){
							?>
							<?php if($urb[2]==="pendientes"):
								$listar_ventas_pendientes_web = DatosAdmin::listar_cantidad_de_ventas_pendientes_web();
								?>
								<div class="contenido">
									<h3 class="new_venta">Ventas pendientes.</h3>
									<p class="descripcion_page_ventas">Ventas  pendientes en la web.</p>

									<?php foreach ($listar_ventas_pendientes_web as $ven_p):
										$total=0;
										$tipos_de_pago_por_id = DatosAdmin::metododepago_porelId($ven_p->metodo_pago);
										$cliente_por_id = DatosPagina::persona($ven_p->cliente);
										$detalles_de_venta = DatosAdmin::listar_detalles_ventas_pendientes_web($ven_p->id);?>
										<div class="venta_listar_por_sty <?="venta_en_lista_pr".$ven_p->id;?>">
											<div class="header_list_order_p_sty">
												<span class="title_star_order"><?=Functions::fechasluislopes($ven_p->fecha);?> - <?=Functions::horasluislopes($ven_p->fecha);?></span>
												<span class="title_ends_order">Retiro en tienda</span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Metodo de pago</span>
												<span class="name_conten_ends_order"><?=$tipos_de_pago_por_id->nombre;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Numero de venta</span>
												<span class="name_conten_ends_order"><?=$ven_p->numero_venta;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Cliente</span>
												<span class="name_conten_ends_order"><?=$cliente_por_id->nombreCompleto();?></span>
											</div>

											<div class="listar_items_order_list_sty">
												<?php foreach ($detalles_de_venta as $d_v):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($d_v->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v->codigo);
													?>
													<div class="items_detail_list_order_p_sty">
														<span class="items_detail_name_star_order"><?=html_entity_decode($item_view_in_order->nombre);?></span>
														<span class="items_detail_name_star_order items_detail_name_conten_ends_order_ins_head_b">
														<?php foreach ($item_option_type_view as $v_iop): ?>
															<?php if($v_iop->id_opcion_sub): ?>
																<div class="items_detail_name_conten_ends_order_ins_head">
																	<?php $view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
																		$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type); ?>
																	<?php if($v_iop->type==2): ?>
																		<?php $cat_b = DatosAdmin::sub_categoria_getById($view_data_sub_one_details->cat_act); ?>
																		<span class="items_detail_name_star_order_ins"><?=html_entity_decode($cat_b->nombre.": ");?></span>
																	<?php elseif($v_iop->type==1): ?>
																		<?php $cat_a = DatosAdmin::getById_categoria($view_data_sub_one_details->cat_act); ?>
																		<span class="items_detail_name_star_order_ins"><?=html_entity_decode($cat_a->nombre.": ");?></span>
																	<?php elseif($v_iop->type==0): ?>
																		<span class="items_detail_name_star_order_ins"><?=html_entity_decode($view_type_options_details->nombre.": ");?></span>
																	<?php endif ?>
																	<span class="items_detail_name_conten_ends_order_ins">
																		<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																	</span>
																</div>
																<?php if($view_data_sub_one_details->precio==1):
																	$open_producto = DatosAdmin::porID_producto($view_data_sub_one_details->item_k);
																	$volrtotal_precios+=$open_producto->precio_final;
																	?>
																<?php else: ?>
																	<?php $volrtotal_precios+=0; ?>
																<?php endif ?>
															<?php else: ?>
																<?php $volrtotal_precios+=0; ?>
															<?php endif ?>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														</span>
														<span class="items_detail_name_conten_ends_order"><?="Cant.".$d_v->cantidad;?> ---  <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></span>
														<br>
													</div>
													<?php $total += $d_v->cantidad*$precio_nuevo_suma; ?>
												<?php endforeach ?>
											</div>

											<div class="body_list_order_p_sty">
												<span class="name_star_order">Total</span>
												<span class="name_conten_ends_order"><?="S/.".number_format($total,2,".",",");?></span>
											</div>
											<div class="butt_luis_one">
												<span class="recibir_button_but_on" data="<?=$ven_p->id;?>"><?=Luis::lang("recibir");?></span>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							<?php elseif($urb[2]==="recibidos"):
								$listar_ventas_pendientes_web = DatosAdmin::listar_cantidad_de_ventas_recibidos_web();
								?>
								<div class="contenido">
									<h3 class="new_venta"><?=Luis::lang("ventas_recibidos");?>.</h3>
									<p class="descripcion_page_ventas"><?=Luis::lang("ventas_recibidos_por_el_vendedor");?></p>

									<?php foreach ($listar_ventas_pendientes_web as $ven_p):
										$total=0;
										$tipos_de_pago_por_id = DatosAdmin::metododepago_porelId($ven_p->metodo_pago);
										$cliente_por_id = DatosPagina::persona($ven_p->cliente);
										$detalles_de_venta = DatosAdmin::listar_detalles_ventas_pendientes_web($ven_p->id);?>
										<div class="venta_listar_por_sty <?="venta_en_lista_pr".$ven_p->id;?>">
											<div class="header_list_order_p_sty">
												<span class="title_star_order"><?=Functions::fechasluislopes($ven_p->fecha);?> - <?=Functions::horasluislopes($ven_p->fecha);?></span>
												<span class="title_ends_order">Retiro en tienda</span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Metodo de pago</span>
												<span class="name_conten_ends_order"><?=$tipos_de_pago_por_id->nombre;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Numero de venta</span>
												<span class="name_conten_ends_order"><?=$ven_p->numero_venta;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Cliente</span>
												<span class="name_conten_ends_order"><?=$cliente_por_id->nombreCompleto();?></span>
											</div>

											<div class="listar_items_order_list_sty">
												<?php foreach ($detalles_de_venta as $d_v):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($d_v->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v->codigo);
													?>
													<div class="items_detail_list_order_p_sty">
														<span class="items_detail_name_star_order"><?=html_entity_decode($item_view_in_order->nombre);?></span>
														<span class="items_detail_name_star_order items_detail_name_conten_ends_order_ins_head_b">
														<?php foreach ($item_option_type_view as $v_iop):
															$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
															$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
															$volrtotal_precios+=$view_data_sub_one_details->precio;?>
															<div class="items_detail_name_conten_ends_order_ins_head">
																<span class="items_detail_name_star_order_ins">
																	<?=html_entity_decode($view_type_options_details->nombre.": ");?>		
																</span>
																<span class="items_detail_name_conten_ends_order_ins">
																	<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																</span>
															</div>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														</span>
														<span class="items_detail_name_conten_ends_order"><?="Cant.".$d_v->cantidad;?> ---  <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></span>
													</div>
													<?php $total += $d_v->cantidad*$precio_nuevo_suma; ?>
												<?php endforeach ?>
											</div>

											<div class="body_list_order_p_sty">
												<span class="name_star_order">Total</span>
												<span class="name_conten_ends_order"><?="S/.".number_format($total,2,".",",");?></span>
											</div>
											<div class="butt_luis_one">
												<span class="listo_para_entregar_button_but_on" data="<?=$ven_p->id;?>"><?=Luis::lang("preparar_compra");?></span>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							<?php elseif($urb[2]==="listos"):
								$listar_ventas_pendientes_web = DatosAdmin::listar_cantidad_de_ventas_listos_web();
								?>
								<div class="contenido">
									<h3 class="new_venta"><?=Luis::lang("ventas_listos");?>.</h3>
									<p class="descripcion_page_ventas"><?=Luis::lang("ventas_listos_para_entregar_al_cliente");?></p>

									<?php foreach ($listar_ventas_pendientes_web as $ven_p):
										$total=0;
										$tipos_de_pago_por_id = DatosAdmin::metododepago_porelId($ven_p->metodo_pago);
										$cliente_por_id = DatosPagina::persona($ven_p->cliente);
										$detalles_de_venta = DatosAdmin::listar_detalles_ventas_pendientes_web($ven_p->id);?>
										<div class="venta_listar_por_sty <?="venta_en_lista_pr".$ven_p->id;?>">
											<div class="header_list_order_p_sty">
												<span class="title_star_order"><?=Functions::fechasluislopes($ven_p->fecha);?> - <?=Functions::horasluislopes($ven_p->fecha);?></span>
												<span class="title_ends_order">Retiro en tienda</span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Metodo de pago</span>
												<span class="name_conten_ends_order"><?=$tipos_de_pago_por_id->nombre;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Numero de venta</span>
												<span class="name_conten_ends_order"><?=$ven_p->numero_venta;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Cliente</span>
												<span class="name_conten_ends_order"><?=$cliente_por_id->nombreCompleto();?></span>
											</div>

											<div class="listar_items_order_list_sty">
												<?php foreach ($detalles_de_venta as $d_v):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($d_v->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v->codigo);
													?>
													<div class="items_detail_list_order_p_sty">
														<span class="items_detail_name_star_order"><?=html_entity_decode($item_view_in_order->nombre);?></span>
														<span class="items_detail_name_star_order items_detail_name_conten_ends_order_ins_head_b">
														<?php foreach ($item_option_type_view as $v_iop):
															$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
															$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
															$volrtotal_precios+=$view_data_sub_one_details->precio;?>
															<div class="items_detail_name_conten_ends_order_ins_head">
																<span class="items_detail_name_star_order_ins">
																	<?=html_entity_decode($view_type_options_details->nombre.": ");?>		
																</span>
																<span class="items_detail_name_conten_ends_order_ins">
																	<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																</span>
															</div>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														</span>
														<span class="items_detail_name_conten_ends_order"><?="Cant.".$d_v->cantidad;?> ---  <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></span>
													</div>
													<?php $total += $d_v->cantidad*$precio_nuevo_suma; ?>
												<?php endforeach ?>
											</div>

											<div class="body_list_order_p_sty">
												<span class="name_star_order">Total</span>
												<span class="name_conten_ends_order"><?="S/.".number_format($total,2,".",",");?></span>
											</div>
											<div class="butt_luis_one">
												<span class="listo_entregar_button_but_on" data="<?=$ven_p->id;?>"><?=Luis::lang("Entregar");?></span>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							<?php elseif($urb[2]==="entregado_al_cliente"):
								$listar_ventas_pendientes_web = DatosAdmin::listar_cantidad_de_ventas_entregados_web();
								?>
								<div class="contenido">
									<h3 class="new_venta"><?=Luis::lang("ventas_entregados");?>.</h3>
									<p class="descripcion_page_ventas"><?=Luis::lang("ventas_entregados_al_cliente");?></p>

									<?php foreach ($listar_ventas_pendientes_web as $ven_p):
										$total=0;
										$tipos_de_pago_por_id = DatosAdmin::metododepago_porelId($ven_p->metodo_pago);
										$cliente_por_id = DatosPagina::persona($ven_p->cliente);
										$detalles_de_venta = DatosAdmin::listar_detalles_ventas_pendientes_web($ven_p->id);?>
										<div class="venta_listar_por_sty <?="venta_en_lista_pr".$ven_p->id;?>">
											<div class="header_list_order_p_sty">
												<span class="title_star_order"><?=Functions::fechasluislopes($ven_p->fecha);?> - <?=Functions::horasluislopes($ven_p->fecha);?></span>
												<span class="title_ends_order">Retiro en tienda</span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Metodo de pago</span>
												<span class="name_conten_ends_order"><?=$tipos_de_pago_por_id->nombre;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Numero de venta</span>
												<span class="name_conten_ends_order"><?=$ven_p->numero_venta;?></span>
											</div>
											<div class="body_list_order_p_sty">
												<span class="name_star_order">Cliente</span>
												<span class="name_conten_ends_order"><?=$cliente_por_id->nombreCompleto();?></span>
											</div>

											<div class="listar_items_order_list_sty">
												<?php foreach ($detalles_de_venta as $d_v):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($d_v->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($d_v->codigo);
													?>
													<div class="items_detail_list_order_p_sty">
														<span class="items_detail_name_star_order"><?=html_entity_decode($item_view_in_order->nombre);?></span>
														<span class="items_detail_name_star_order items_detail_name_conten_ends_order_ins_head_b">
														<?php foreach ($item_option_type_view as $v_iop):
															$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
															$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
															$volrtotal_precios+=$view_data_sub_one_details->precio;?>
															<div class="items_detail_name_conten_ends_order_ins_head">
																<span class="items_detail_name_star_order_ins">
																	<?=html_entity_decode($view_type_options_details->nombre.": ");?>		
																</span>
																<span class="items_detail_name_conten_ends_order_ins">
																	<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																</span>
															</div>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														</span>
														<span class="items_detail_name_conten_ends_order"><?="Cant.".$d_v->cantidad;?> ---  <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></span>
													</div>
													<?php $total += $d_v->cantidad*$precio_nuevo_suma; ?>
												<?php endforeach ?>
											</div>

											<div class="body_list_order_p_sty">
												<span class="name_star_order">Total</span>
												<span class="name_conten_ends_order"><?="S/.".number_format($total,2,".",",");?></span>
											</div>
											<div class="butt_luis_one">
												<span class="listo_entregar_button_but_detalles" data="<?=$ven_p->id;?>"><?=Luis::lang("Detalles");?></span>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							<?php endif ?>
							<?php
						}else{
							header("location:".$base."ventas");
						}
					}elseif($urb[1]==="preparar"){
						$total=0;
						///// una venta de la pagina web
						if($urb[2]==$urb[2]){
							$ver_lacompra_id = DatosAdmin::verifica_la_venta_para_entregar_actualiza_preparar($urb[2]);
							if($urb[2]===$ver_lacompra_id->id){
								// aqui todas las funciones para realizar la entrega de la compra
								$selex_document_page=false;
								$cant_ventas = DatosAdmin::ventas_registrados_en_la_web_preparar($ver_lacompra_id->id);
								$venta_pendiente = DatosAdmin::visualizar_venta_realtime_en_la_web_preparar($ver_lacompra_id->id);
								?>
								<div class="contenido">
									<h3 class="new_venta"><?=Luis::lang("preparar_venta");?></h3>
									<?php if($cant_ventas): ?>
										<div class="numero_de_venta"><?=$venta_pendiente->numero_venta;?></div>

										<?php if (isset($venta_pendiente->documento)): ?>
											<?php $name_documentss=DatosAdmin::documento_por_id($venta_pendiente->documento);
											$name_documents=$name_documentss->nombre;?>
										<?php else: ?>
											<?php $name_documents="DOCUMENTO";?>
										<?php endif ?>

										<div class="punto_ventas_controls_preparar">
											<div class="opciones_venta_one">
												
												<?php $cliente_view_pages=false;
												if($venta_pendiente->cliente):
													$cliente_view_page=DatosAdmin::por_el_id_cliente($venta_pendiente->cliente);
													$cliente_view_pages=$cliente_view_page->nombre." ".$cliente_view_page->apellido_paterno;
												endif ?>
												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("cliente");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_pages;?></span>
												</div>

												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("documento");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->dni;?></span>
												</div>
												<div class="document_requerid_factura">
													<?php if($venta_pendiente->documento==4): ?>
														<div class="order_current_for_client_data_order_sty">
															<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("ruc");?>:</label>
															<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->ruc;?></span>
														</div>
													<?php endif ?>
												</div>


												<select id="select_document_store_shop_client" data="<?=$venta_pendiente->id;?>" class="options_selects select_document_store_shop_client">
													<option value="null">Documento</option>
													<?php foreach($documentos as $doc): ?>
														<?php if($venta_pendiente->documento==$doc->id): ?>
															<?=$selex_document_page="selected"; ?>
														<?php else: ?>
															<?=$selex_document_page=false; ?>
														<?php endif ?>
														<option value="<?=$doc->id;?>" data="<?=html_entity_decode($doc->nombre);?>" <?=$selex_document_page;?>><?=html_entity_decode($doc->nombre);?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<!-- items ventas controls -->
										<div class="punto_ventas_controls compra_view_storeds">
											<?php $items = DatosAdmin::listar_detalles_ventas_pendientes_web($venta_pendiente->id);?>
											<div class="cart_content_list_items_orders_tbn addeds_orders_items">
												<?php foreach ($items as $it):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($it->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($it->codigo);?>
												
												<div class="items_list_views_order_list blockdisplayin" id="<?="itemsviewscartorder".$it->id;?>">
													<div class="detail_producto_order_cart">
														<h4 class="padbot"><?=html_entity_decode($item_view_in_order->nombre);?></h4>
														<?php foreach ($item_option_type_view as $v_iop):
															$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
															$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
															$volrtotal_precios+=$view_data_sub_one_details->precio;?>
															<div class="items_detail_name_conten_ends_order_ins_head">
																<span class="preparar_items_detail_name_star_order_ins">
																	<?=html_entity_decode($view_type_options_details->nombre.": ");?>		
																</span>
																<span class="preparar_items_detail_name_conten_ends_order_ins">
																	<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																</span>
															</div>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														<div class="peruvianprice">PRECIO UNIDAD: <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></div>
														<span class="cantidad_items_view_pages ">CANTIDAD: <b class="cantidad_items_view_pages_count_items<?=$item_view_in_order->id;?>"><?=$it->cantidad;?></b></span>
														<br>
														<div class="peruvianprice">SUB TOTAL: <?="S/.".number_format($precio_nuevo_suma*$it->cantidad,2,".",",");?></div>
											    		<div class="barcodes_items_view_in_page">
											    			<?php $cantidad_para_preparar = DatosAdmin::contar_productos_que_faltan_preparar($it->codigo)->c; ?>
											    			<span class="barcodes_items_view_in_page_button" data-modal-trigger="barcodes_items_view_in_page_button_action<?=$it->id;?>">PREPARAR <span class="sty_number_prepared_order acs_number_prepared_order<?=$it->id;?>"><?=$cantidad_para_preparar;?></span></span>
											    			<div class="modal" data-modal-name="barcodes_items_view_in_page_button_action<?=$it->id;?>" data-modal-dismiss="">
											    				<div class="modal__dialog">
											    					<header class="modal__header">
											    						<h3 class="modal__title name_items_titles"><?=html_entity_decode($item_view_in_order->nombre);?></h3>
											    						<i class="modal__close" data-modal-dismiss="">X</i>
											    					</header>
											    					<div class="modal__content" id="<?=$it->id;?>">
											    						<div class="panel_tabla">
												    						<table class="table table_data_info_pages" id="<?=$it->id;?>">
												    							<thead class="header_table_items_lists">
												    								<tr>
												    									<th class="class_one_head_on_list_order_styl">Accion</th>
												    									<th>BARCODE</th>
												    									<th>PROVEEDOR</th>
												    								</tr>
												    							</thead>
												    							<tbody class="data_items_stock_controls data_items_stock_controls<?=$it->id;?>">
												    								<?php $movstock=DatosAdmin::preparar_mostrar_productos_en_la_orden_item($it->codigo); ?>
												    								<?php foreach ($movstock as $m):
												    									$stock_lista_m = DatosAdmin::ver_el_stock_del_item_por_barcode_en_lista($m->barcode);
												    									if($stock_lista_m){
												    										$provee=DatosAdmin::poridproveedor($stock_lista_m->proveedor);
												    										$nombre_proveedor=html_entity_decode($provee->nombre);
												    									}else{
												    										$nombre_proveedor="-";
												    									}?>
												    									<tr id="item_on_code_list_order<?=$m->id;?>">
												    										<td><span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order_ac" data="<?=$m->id;?>" data-ac="<?=$it->id;?>">Eliminar</span></td>
												    										<td><input class="barcode_items_style_pah_input_modal inpt_ac_barcode_limit inpt_ac_barcode_limit<?=$m->id;?>" data="<?=$m->id;?>" data-ac="<?=$it->id;?>" type="text" placeholder="BARCODE" value="<?=$m->barcode;?>"></td>
												    										<td><span class="text_data_style_modal_prov <?="text_data_modal_prov".$m->id;?>"><?=$nombre_proveedor;?></span></td>
												    									</tr>
												    								<?php endforeach ?>
												    							</tbody>
												    						</table>
											    						</div>
											    					</div>
											    				</div>
											    			</div>
											    		</div>
													</div>

													<div class="close_cart_orders_list close_cart_orders_list_order">
											    		<a class="boton_eliminar_producto_de_carrito" data_cart="<?=$it->id;?>">x</a>
											    	</div>
												</div>
												<?php $total += $it->cantidad*$precio_nuevo_suma; ?>
												<?php  endforeach ?>
											</div>

											<div class="page_order_datails_resume">
												<div class="content_code_list_view_order_head">
											    	<label>Metodo de pago</label>
											    	<?php $metodo_de_pago_view=DatosAdmin::metododepago_porelId($venta_pendiente->metodo_pago);?>
											    	<span class="metod_pago_sty_prepare"><?=html_entity_decode($metodo_de_pago_view->nombre);?></span>
											   	</div>
											   	<div class="content_code_list_view_order">
											   		<span class="totalprecio pricetotalboxcarts order_total_count_items">
											   			<span class="label_price_mount">Total:</span>
											   			S/. <span class="mount_order_client_litingff"><?php echo number_format($total,2,".",","); ?></span>
											   		</span>
											   		<span class="order_process_page ac_process_order_listo" data="<?=$venta_pendiente->id;?>">Venta esta listo</span>
											    	<span class="order_delete_page "data="<?=$venta_pendiente->id;?>">Anular venta</span>
											    </div>
											</div>
										</div>
									<?php endif ?>
									<!-- fin de ventas -->
								</div>
								<?php
								//*** y aqui  termina todas las funciones de la entrega de la compra.
							}else{
								header("location:".$base."ventas");
							}
						}else{
							header("location:".$base."ventas");
						}
						////**
					}elseif($urb[1]==="entregar"){
						$total=0;
						///// una venta de la pagina web
						if($urb[2]==$urb[2]){
							$ver_lacompra_id = DatosAdmin::verifica_la_venta_para_entregar_actualiza($urb[2]);
							if($urb[2]===$ver_lacompra_id->id){
								// aqui todas las funciones para realizar la entrega de la compra
								$selex_document_page=false;
								$cant_ventas = DatosAdmin::ventas_registrados_en_la_web_entregar($ver_lacompra_id->id);
								$venta_pendiente = DatosAdmin::visualizar_venta_realtime_en_la_web_entregar($ver_lacompra_id->id);
								?>
								<div class="contenido">
									<h3 class="new_venta"><?=Luis::lang("entregar_venta");?></h3>
									<?php if($cant_ventas): ?>
										<div class="numero_de_venta"><?=$venta_pendiente->numero_venta;?></div>

										<?php if (isset($venta_pendiente->documento)): ?>
											<?php $name_documentss=DatosAdmin::documento_por_id($venta_pendiente->documento);
											$name_documents=$name_documentss->nombre;?>
										<?php else: ?>
											<?php $name_documents="DOCUMENTO";?>
										<?php endif ?>

										<div class="punto_ventas_controls_preparar">
											<div class="opciones_venta_one">
												
												<?php $cliente_view_pages=false;
												if($venta_pendiente->cliente):
													$cliente_view_page=DatosAdmin::por_el_id_cliente($venta_pendiente->cliente);
													$cliente_view_pages=$cliente_view_page->nombre." ".$cliente_view_page->apellido_paterno;
												endif ?>
												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("cliente");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_pages;?></span>
												</div>

												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("documento");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->dni;?></span>
												</div>
												<div class="document_requerid_factura">
													<?php if($venta_pendiente->documento==4): ?>
														<div class="order_current_for_client_data_order_sty">
															<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("ruc");?>:</label>
															<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->ruc;?></span>
														</div>
													<?php endif ?>
												</div>


												<select id="select_document_store_shop_client" data="<?=$venta_pendiente->id;?>" class="options_selects select_document_store_shop_client">
													<option value="null">Documento</option>
													<?php foreach($documentos as $doc): ?>
														<?php if($venta_pendiente->documento==$doc->id): ?>
															<?=$selex_document_page="selected"; ?>
														<?php else: ?>
															<?=$selex_document_page=false; ?>
														<?php endif ?>
														<option value="<?=$doc->id;?>" data="<?=html_entity_decode($doc->nombre);?>" <?=$selex_document_page;?>><?=html_entity_decode($doc->nombre);?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<!-- items ventas controls -->
										<div class="punto_ventas_controls compra_view_storeds">
											<?php $items = DatosAdmin::listar_detalles_ventas_pendientes_web($venta_pendiente->id);?>
											<div class="cart_content_list_items_orders_tbn addeds_orders_items">
												<?php foreach ($items as $it):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($it->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($it->codigo);?>
												
												<div class="items_list_views_order_list blockdisplayin" id="<?="itemsviewscartorder".$it->id;?>">
													<div class="detail_producto_order_cart">
														<h4 class="padbot"><?=html_entity_decode($item_view_in_order->nombre);?></h4>
														<?php foreach ($item_option_type_view as $v_iop):
															$view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
															$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type);
															$volrtotal_precios+=$view_data_sub_one_details->precio;?>
															<div class="items_detail_name_conten_ends_order_ins_head">
																<span class="preparar_items_detail_name_star_order_ins">
																	<?=html_entity_decode($view_type_options_details->nombre.": ");?>		
																</span>
																<span class="preparar_items_detail_name_conten_ends_order_ins">
																	<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																</span>
															</div>
														<?php endforeach ?>
														<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios; ?>
														<div class="peruvianprice">PRECIO UNIDAD: <?="S/.".number_format($precio_nuevo_suma,2,".",",");?></div>
														<span class="cantidad_items_view_pages ">CANTIDAD: <b class="cantidad_items_view_pages_count_items<?=$item_view_in_order->id;?>"><?=$it->cantidad;?></b></span>
														<br>
														<div class="peruvianprice">SUB TOTAL: <?="S/.".number_format($precio_nuevo_suma*$it->cantidad,2,".",",");?></div>
											    		<div class="barcodes_items_view_in_page">
											    			<?php $cantidad_para_preparar = DatosAdmin::contar_productos_que_faltan_preparar($it->codigo)->c; ?>
											    			<span class="barcodes_items_view_in_page_button" data-modal-trigger="barcodes_items_view_in_page_button_action<?=$it->id;?>">PREPARAR <span class="sty_number_prepared_order acs_number_prepared_order<?=$it->id;?>"><?=$cantidad_para_preparar;?></span></span>
											    			<div class="modal" data-modal-name="barcodes_items_view_in_page_button_action<?=$it->id;?>" data-modal-dismiss="">
											    				<div class="modal__dialog">
											    					<header class="modal__header">
											    						<h3 class="modal__title name_items_titles"><?=html_entity_decode($item_view_in_order->nombre);?></h3>
											    						<i class="modal__close" data-modal-dismiss="">X</i>
											    					</header>
											    					<div class="modal__content" id="<?=$it->id;?>">
											    						<?php $type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($item_view_in_order->tipo);?>
											    						<div class="panel_tabla">
												    						<table class="table table_data_info_pages" id="<?=$it->id;?>">
												    							<thead class="header_table_items_lists">
												    								<?php $header_table_items_viewers=tables_in_pages_items::Mostrar_tabla_in_page_head_table($type_items_view->id_tabla);?>
												    								<tr>
												    									<th class="class_one_head_on_list_order_styl">Accion</th>
												    									<th>BARCODE</th>
												    									<th>PROVEEDOR</th>
												    								</tr>
												    							</thead>
												    							<tbody class="data_items_stock_controls data_items_stock_controls<?=$it->id;?>">
												    								<?php $movstock=DatosAdmin::preparar_mostrar_productos_en_la_orden_item($it->codigo); ?>
												    								<?php foreach ($movstock as $m):
												    									$stock_lista_m = DatosAdmin::ver_el_stock_del_item_por_barcode_en_lista($m->barcode);
												    									if($stock_lista_m){
												    										$provee=DatosAdmin::poridproveedor($stock_lista_m->proveedor);
												    										$nombre_proveedor=html_entity_decode($provee->nombre);
												    									}else{
												    										$nombre_proveedor="-";
												    									}?>
												    									<tr id="item_on_code_list_order<?=$m->id;?>">
												    										<td><span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order_ac" data="<?=$m->id;?>" data-ac="<?=$it->id;?>">Eliminar</span></td>
												    										<td><input class="barcode_items_style_pah_input_modal inpt_ac_barcode_limit inpt_ac_barcode_limit<?=$m->id;?>" data="<?=$m->id;?>" data-ac="<?=$it->id;?>" type="text" placeholder="BARCODE" value="<?=$m->barcode;?>"></td>
												    										<td><span class="text_data_style_modal_prov <?="text_data_modal_prov".$m->id;?>"><?=$nombre_proveedor;?></span></td>
												    									</tr>
												    								<?php endforeach ?>
												    							</tbody>
												    						</table>
											    						</div>
											    					</div>
											    				</div>
											    			</div>
											    		</div>
													</div>

													<div class="close_cart_orders_list close_cart_orders_list_order">
											    		<a class="boton_eliminar_producto_de_carrito" data_cart="<?=$it->id;?>">x</a>
											    	</div>
												</div>
												<?php $total += $it->cantidad*$precio_nuevo_suma; ?>
												<?php  endforeach ?>
											</div>

											<div class="page_order_datails_resume">
												<div class="content_code_list_view_order_head">
											    	<label>Metodo de pago</label>
											    	<?php $metodo_de_pago_view=DatosAdmin::metododepago_porelId($venta_pendiente->metodo_pago);?>
											    	<span class="metod_pago_sty_prepare"><?=html_entity_decode($metodo_de_pago_view->nombre);?></span>
											   	</div>
											   	<div class="content_code_list_view_order">
											   		<span class="totalprecio pricetotalboxcarts order_total_count_items">
											   			<span class="label_price_mount">Total:</span>
											   			S/. <span class="mount_order_client_litingff"><?php echo number_format($total,2,".",","); ?></span>
											   		</span>
											   		<span class="order_process_page ac_process_order_listo_entregar" data="<?=$venta_pendiente->id;?>">Entregar</span>
											    	<span class="order_delete_page "data="<?=$venta_pendiente->id;?>">Anular venta</span>
											    </div>
											</div>
										</div>
									<?php endif ?>
									<!-- fin de ventas -->
								</div>
								<?php
								//*** y aqui  termina todas las funciones de la entrega de la compra.
							}else{
								header("location:".$base."ventas");
							}
						}else{
							header("location:".$base."ventas");
						}
						////**
						////***** finaliza la entrega de la venta por web
					}elseif($urb[1]==="detalles_venta"){
						$total=0;
						if($urb[2]==$urb[2]){
							$ver_lacompra_id = DatosAdmin::verifica_detalles_venta_actualizado($urb[2]);
							if($urb[2]===$ver_lacompra_id->id){
								$selex_document_page=false;
								$cant_ventas = DatosAdmin::ventas_registrados_en_la_web_detalles_venta($ver_lacompra_id->id);
								$venta_pendiente = DatosAdmin::visualizar_venta_realtime_en_la_web_detalles_venta($ver_lacompra_id->id);
								?>
								<div class="contenido">
									<?php if($cant_ventas): ?>
										<div class="numero_de_venta">
											<?=$venta_pendiente->numero_venta;?>
										</div>

										<div class="punto_ventas_controls_preparar">
											<div class="opciones_venta_one">
												<?php $cliente_view_pages=false;
												if($venta_pendiente->cliente):
													$cliente_view_page=DatosAdmin::por_el_id_cliente($venta_pendiente->cliente);
													$cliente_view_pages=$cliente_view_page->nombre." ".$cliente_view_page->apellido_paterno;
												endif ?>
												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("cliente");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_pages;?></span>
												</div>

												<div class="order_current_for_client_data_order_sty">
													<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("documento");?>:</label>
													<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->dni;?></span>
												</div>
												<div class="document_requerid_factura">
													<?php if($venta_pendiente->documento==4): ?>
														<div class="order_current_for_client_data_order_sty">
															<label class="order_current_for_client_data_order_sty_label"><?=Luis::lang("ruc");?>:</label>
															<span class="order_current_for_client_data_order_sty_text"><?=$cliente_view_page->ruc;?></span>
														</div>
													<?php endif ?>
												</div>
											</div>

											<div class="opciones_venta_one_dovc">
												<?php foreach($documentos as $doc): ?>
													<?php if($venta_pendiente->documento==$doc->id): ?>
														<label class="order_current_for_label_doc_name"><?=$selex_document_page=html_entity_decode($doc->nombre); ?></label>
													<?php else: ?>
														<?=$selex_document_page=false; ?>
													<?php endif ?>
												<?php endforeach ?>
											</div>
										</div>
										<!-- items ventas controls -->
										<div class="punto_ventas_controls compra_view_storeds">
											<?php $items = DatosAdmin::listar_detalles_ventas_pendientes_web($venta_pendiente->id);?>
											<div class="cart_content_list_items_orders_tbn addeds_orders_items">
												<?php foreach ($items as $it):
													$volrtotal_precios=0;
													$item_view_in_order = DatosAdmin::itemview_productos($it->id_item);
													$item_option_type_view = DatosAdmin::listar_detalles_ventas_pendientes_web_sub($it->codigo);?>
													<div class="items_list_views_order_list blockdisplayin" id="<?="itemsviewscartorder".$it->id;?>">
														<div class="detail_producto_order_cart">
															<h4 class="padbot"><?=html_entity_decode($item_view_in_order->nombre);?></h4>
															<?php foreach ($item_option_type_view as $v_iop):?>
																<?php if($v_iop->id_opcion_sub): ?>
																	<div class="items_detail_name_conten_ends_order_ins_head">
																		<?php $view_data_sub_one_details = DatosAdmin::view_iten_in_pages_por_id($v_iop->id_opcion_sub);
																			$view_type_options_details = DatosAdmin::ver_opciones_type_por_id($view_data_sub_one_details->id_opciones_type); ?>
																		<?php if($v_iop->type==2): ?>
																			<?php $cat_b = DatosAdmin::sub_categoria_getById($view_data_sub_one_details->cat_act); ?>
																			<span class="items_detail_name_star_order_ins"><?=html_entity_decode($cat_b->nombre.": ");?></span>
																		<?php elseif($v_iop->type==1): ?>
																			<?php $cat_a = DatosAdmin::getById_categoria($view_data_sub_one_details->cat_act); ?>
																			<span class="items_detail_name_star_order_ins"><?=html_entity_decode($cat_a->nombre.": ");?></span>
																		<?php elseif($v_iop->type==0): ?>
																			<span class="items_detail_name_star_order_ins"><?=html_entity_decode($view_type_options_details->nombre.": ");?></span>
																		<?php endif ?>
																		<span class="items_detail_name_conten_ends_order_ins">
																			<?=html_entity_decode($view_data_sub_one_details->nombre);?>		
																		</span>
																	</div>
																	<?php if($view_data_sub_one_details->precio==1):
																		$open_producto = DatosAdmin::porID_producto($view_data_sub_one_details->item_k);
																		$volrtotal_precios+=$open_producto->precio_final;
																		?>
																	<?php else: ?>
																		<?php $volrtotal_precios+=0; ?>
																	<?php endif ?>
																<?php else: ?>
																	<?php $volrtotal_precios+=0; ?>
																<?php endif ?>
															<?php endforeach ?>
															<?php $precio_nuevo_suma=$item_view_in_order->precio_final+$volrtotal_precios;
															if($item_view_in_order->moneda_a){
																$moneda_por_id_a=DatosAdmin::Mostrar_las_monedas_por_id($item_view_in_order->moneda_a)->simbolo;
															}else{
																$moneda_por_id_a=false; 
															} ?>
															<div class="peruvianprice"><?=Luis::lang("precio");?>: <?=$moneda_por_id_a.".".number_format($precio_nuevo_suma,2,".",",");?></div>
															<span class="cantidad_items_view_pages "><?=Luis::lang("cantidad");?>: <b class="cantidad_items_view_pages_count_items<?=$item_view_in_order->id;?>"><?=$it->cantidad;?></b></span>
															<br>
															<div class="peruvianprice"><?=Luis::lang("total");?>: <?=$moneda_principal_view.".".number_format($precio_nuevo_suma*$it->cantidad,2,".",",");?></div>
												    		<div class="barcodes_items_view_in_page">
												    			<?php $cantidad_para_preparar = DatosAdmin::contar_productos_que_faltan_preparar($it->codigo)->c; ?>
												    		</div>
														</div>
													</div>
													<?php $total += $it->cantidad*$precio_nuevo_suma; ?>
												<?php  endforeach ?>
											</div>

											<div class="page_order_datails_resume">
												<div class="content_code_list_view_order_head">
											    <label><?=Luis::lang("metodo_de_pago");?></label>
											    <?php $metodo_de_pago_view=DatosAdmin::metododepago_porelId($venta_pendiente->metodo_pago);?>
											    <span class="metod_pago_sty_prepare"><?=html_entity_decode($metodo_de_pago_view->nombre);?></span>
											  
											  
											    <label><?=Luis::lang("estado_de_venta");?></label>
											    <?php $ver_estado_de_venta = DatosAdmin::Ver_estado_de_venta_por_id($venta_pendiente->estado_de_venta); ?>
											    <span class="metod_pago_sty_prepare"><?=html_entity_decode($ver_estado_de_venta->nombre);?></span>
											  </div>
											  <div class="content_code_list_view_order">
											   	<span class="totalprecio pricetotalboxcarts order_total_count_items">
											   		<span class="label_price_mount"><?=Luis::lang("total");?>:</span>
											   		<?=$moneda_principal_view;?>. <span class="mount_order_client_litingff"><?php echo number_format($total,2,".",","); ?></span>
											   	</span>

											   	<div class="butt_luis_one">
											   		<?php if($venta_pendiente->estado_de_venta==5): ?>
											   			<span class="recibir_button_but_on" data="<?=$venta_pendiente->id;?>"><?=Luis::lang("recibir");?></span>
											   			<span class="recibir_button_but_on_b" data="<?=$venta_pendiente->id;?>"><?=Luis::lang("recibir_y_preparar");?></span>
											   		<?php elseif($venta_pendiente->estado_de_venta==6): ?>
											   			<span class="listo_para_entregar_button_but_on" data="<?=$venta_pendiente->id;?>"><?=Luis::lang("preparar");?></span>
											   		<?php endif ?>
														
													</div>
											  </div>
											</div>
										</div>
									<?php endif ?>
									<!-- fin de ventas -->
								</div>
								<?php
								//*** y aqui  termina todas las funciones de la entrega de la compra.
							}else{
								//header("location:".$base."ventas");
							}
						}else{
							//header("location:".$base."ventas");
						}
						////**
						////***** finaliza la entrega de la venta por web
					}else{
						header('location:'.$base.'ventas');
					}
				}
			}elseif(isset($urb[1])){
				if(isset($urb[1])==$urb[1]){
					if($urb[1]==="vender"){
						$selex_document_page=false;
						?>
						<?php $cant_ventas = DatosAdmin::ventas_registrados($_SESSION['admin_id']);
						$cant_ventas_entregar = DatosAdmin::ventas_registrados_entregar($_SESSION['admin_id']);
						$venta_pendiente = DatosAdmin::visualizar_venta_realtime($_SESSION['admin_id']);
						?>
						<div class="contenido">
							<?php if ($cant_ventas): ?>
								<?php if($venta_pendiente->entregar==1): ?>
									<h3 class="new_venta"><?=Luis::lang("entregar_venta");?></h3>
								<?php else: ?>
									<h3 class="new_venta"><?=Luis::lang("venta");?>.</h3>
								<?php endif ?>
							<?php else: ?>
								<h3 class="new_venta"><?=Luis::lang("venta");?>.</h3>
							<?php endif ?>
							<?php if ($cant_ventas): ?>
								<?php $cantidad_total_ventas=DatosAdmin::TotaldeVentas()->c; ?>
								<div class="numero_de_venta"><?=$venta_pendiente->numero_venta;?></div>

								<?php if (isset($venta_pendiente->documento)): ?>
									<?php $name_documentss=DatosAdmin::documento_por_id($venta_pendiente->documento);
									$name_documents=$name_documentss->nombre;?>
								<?php else: ?>
									<?php $name_documents="DOCUMENTO";?>
								<?php endif ?>

								<div class="punto_ventas_controls">
									<div class="opciones_venta_one">
										
										<?php $cliente_view_pages=false;
										if($venta_pendiente->cliente):
											$cliente_view_page=DatosAdmin::por_el_id_cliente($venta_pendiente->cliente);
											$cliente_view_pages=$cliente_view_page->nombre." ".$cliente_view_page->apellido_paterno;
										endif ?>
										<input id="view_clients_stored" class="options_selects view_clients_stored board " name="cliente" placeholder="DNI, NOMBRE, APELLIDOS" data="" value="<?=$cliente_view_pages;?>">

										<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
										<?php else: ?>
											<select id="select_document_store_shop_client" class="options_selects select_document_store_shop_client">
												<option value="null">Documento</option>
												<?php foreach($documentos as $doc): ?>
													<?php if($venta_pendiente->documento==$doc->id): ?>
														<?=$selex_document_page="selected"; ?>
													<?php else: ?>
														<?=$selex_document_page=false; ?>
													<?php endif ?>
													<option value="<?=$doc->id;?>" data="<?=html_entity_decode($doc->nombre);?>" <?=$selex_document_page;?>><?=html_entity_decode($doc->nombre);?></option>
												<?php endforeach ?>
											</select>
										<?php endif ?>
									</div>

									<div class="opciones_venta_one">
										<div class="contiene_sugerencias_clientes_pages">
										</div>
									</div>
								</div>
								<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
									<form id="codigobarras">
										<input type="hidden" id="search_products_store" class="options_selects  board_product" name="codigo" data="" value="" autocomplete="off" style="visibility:hidden;">
									</form> 
								<?php else: ?>
									<div class="punto_ventas_controls ">
										<div class="opciones_venta_one">
											<form id="codigobarras">
												<input id="search_products_store" class="options_selects  board_product" name="codigo" placeholder="CODIGO DE BARRA, NOMBRE, DESCRIPCION" data="" value="" autocomplete="off" style="cursor:text;">
												<input type="hidden" type="submit" />
											</form> 
										</div>

										<div class="opciones_venta_one">
											<div class="contiene_sugerencias_products_pages">
											</div>
										</div>
									</div>
								<?php endif ?>
								<hr>
								<!-- items ventas controls -->
								<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
								<?php else: ?>
									<div class="punto_ventas_controls compra_view_storeds">
										<?php $items=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]); ?>
										<div class="cart_content_list_items_orders_tbn addeds_orders_items">
											<?php foreach ($items as $it): ?>
											<?php $cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$it->id)->c;?>
											<div class="items_list_views_order_list blockdisplayin" id="<?="itemsviewscartorder".$it->id;?>">
												<div class="detail_producto_order_cart">
													<h4 class="padbot"><?=html_entity_decode($it->nombre);?></h4>
													<div class="peruvianprice">Precio: $. <?=number_format($it->precio,2,".",",");?></div>
													<span class="cantidad_items_view_pages ">ITEMS: <b class="cantidad_items_view_pages_count_items<?=$it->id;?>"><?=$cantidad_items;?></b></span>
									    			<div class="barcodes_items_view_in_page">
									    				<span class="barcodes_items_view_in_page_button" data-modal-trigger="barcodes_items_view_in_page_button_action<?=$it->id;?>">VER CODIGOS</span>
									    				<div class="modal" data-modal-name="barcodes_items_view_in_page_button_action<?=$it->id;?>" data-modal-dismiss="">
									    					<div class="modal__dialog">
									    						<header class="modal__header">
									    							<h3 class="modal__title name_items_titles"><?=html_entity_decode($it->nombre);?></h3>
									    							<i class="modal__close" data-modal-dismiss="">X</i>
									    						</header>
									    						<div class="modal__content" id="<?=$it->id;?>">
									    							<label>Codigos</label>
									    							<?php $type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($it->tipo);?>
									    							<div class="panel_tabla">
										    							<table class="table table_data_info_pages" id="<?=$it->id;?>">
										    								<thead class="header_table_items_lists">
										    									<?php $header_table_items_viewers=tables_in_pages_items::Mostrar_tabla_in_page_head_table($type_items_view->id_tabla);?>
										    									<tr>
										    										<th>Accion</th>
										    										<?php $contador=1; foreach ($header_table_items_viewers as $tbs => $ssf): ?>
										    										<?php if ($tbs=="id"){
										    										}elseif($tbs=="th0"){
										    										}elseif($tbs=="th1"){
										    										}elseif($tbs=='th2'){
										    										}elseif($ssf==null){
										    										}else{
										    											echo("<th>".$ssf."</th>");
										    											$contador= $contador + 1;
										    										}?>
										    									<?php endforeach ?>
										    									</tr>
										    								</thead>
										    								<tbody class="data_items_stock_controls data_items_stock_controls<?=$it->id;?>">
										    									<?php $movstock=DatosAdmin::mostrar_productos_stock_lista_order($it->id); ?>
										    									<?php foreach ($movstock as $m): ?>
										    										<?php $proveedor=DatosAdmin::poridproveedor($m->proveedor); ?>
										    										<?php $docment=DatosAdmin::poriddocumento($m->documento); ?>
										    										<tr id="item_on_code_list_order<?=$m->id;?>">
										    											<td><span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order" config_box="<?=$m->id_producto;?>" data_config="<?=$m->id;?>" data_conf="<?=$m->barcode;?>">X</span></td>
										    											<?php if($it->tipo==3): ?>
										    												<td><?=$m->barcode;?></td>
										    												<td><?=$m->make;?></td>
										    												<td><?=$m->model;?></td>
										    												<td><?=$m->series;?></td>
										    												<td><?=$m->coa;?></td>
										    												<td><?=$m->cpu;?></td>
										    												<td><?=$m->cpu_speed;?></td>
										    												<td><?=$m->ram;?></td>
										    												<td><?=$m->hard_drive;?></td>
										    												<td><?=$m->drivetype;?></td>
										    												<td><?=$m->aditional_information;?></td>
										    												<td><?=$m->other_information;?></td>
										    												<td><?=$m->screen_size;?></td>
										    												<td><?=$m->web_cam;?></td>
										    												<td><?=$m->ac_adapter;?></td>
										    											<?php endif ?>
										    										</tr>
										    									<?php endforeach ?>
										    								</tbody>
										    							</table>
									    							</div>
									    						</div>
									    					</div>
									    				</div>
									    			</div>
												</div>

												<div class="close_cart_orders_list close_cart_orders_list_order">
									    			<a class="boton_eliminar_producto_de_carrito" data_cart="<?=$it->id;?>">x</a>
									    		</div>
											</div>
											<?php $total += $cantidad_items*$it->precio; endforeach ?>
										</div>

										<div class="page_order_datails_resume">
									    	<div class="content_code_list_view_order_head">
									    		<div class="number_document_page_lists_view ">
										    		<label>Numero de documento</label>
										    		<input class="input_orders_page document_type_change" type="number" name="numbernota" placeholder="NUMERO DE <?=$name_documents;?>" value="<?=$venta_pendiente->numero_doc;?>">
										    	</div>
									    		<label>Metodo de pago</label>
									    		<select class="input_orders_page metodo_de_pago_order_in_pages_client">
									    			<option value="0">Selecciona metodo de pago.</option>
									    			<?php foreach ($metodopago as $mp): ?>
									    				<?php if($venta_pendiente->metodo_pago==$mp->id): ?>
									    					<?=$selex_metod_pago_page="selected"; ?>
									    				<?php else: ?>
									    					<?=$selex_metod_pago_page=false; ?>
									    				<?php endif ?>
									    				<?php if($venta_pendiente->entregar==1): ?>
									    					<?php if($mp->id==4): ?>
									    					<?php else: ?>
									    						<option value="<?=$mp->id;?>" <?=$selex_metod_pago_page;?>><?=html_entity_decode($mp->nombre);?></option>
									    					<?php endif ?>
									    				<?php else: ?>
									    					<option value="<?=$mp->id;?>" <?=$selex_metod_pago_page;?>><?=html_entity_decode($mp->nombre);?></option>
									    				<?php endif ?>
									    				
									    			<?php endforeach ?>
									    		</select>
									    	</div>
									    	<div class="content_code_list_view_order">
									    		<span class="totalprecio pricetotalboxcarts order_total_count_items">
									    			<span class="label_price_mount">Total:</span>
									    			S/. <span class="mount_order_client_litingff"><?php echo number_format($total,2,".",","); ?></span>
									    		</span>
									    		<?php if ($venta_pendiente->metodo_pago==0): ?>
									    			<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="hidden" name="monto_pagado_de_venta" placeholder="">
									    		<?php else: ?>
									    			<?php $metodo_pago_view = DatosAdmin::metodo_de_pago_por_id($venta_pendiente->metodo_pago);?>
									    			<?php if($metodo_pago_view->visible==1): ?>
									    				<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="number" name="monto_pagado_de_venta" placeholder="<?=$metodo_pago_view->label;?>">
									    			<?php else: ?>
									    				<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="hidden" name="monto_pagado_de_venta" placeholder="">
									    			<?php endif ?>
									    		<?php endif ?>
									    		<?php if($venta_pendiente->entregar==1): ?>
									    			<span class="order_process_page process_order_user_view">Entregar productos</span>
									    		<?php else: ?>
									    			<span class="order_process_page process_order_user_view">Procesar venta</span>
									    		<?php endif ?>
									    		
									    		<span class="order_delete_page delete_order_user_view">Eliminar venta</span>
									    	</div>
									    </div>
									</div>
								<?php endif ?>
							<?php else: ?>
								<p class="descripcion_page_ventas">REALIZAR NUEVA VENTA O ENTREGAR PRODUCTO RESERVADO.</p>
								<div id="view_clients_stored"></div>
								<form id="codigobarras">
										<input type="hidden" id="search_products_store" class="options_selects  board_product" name="codigo" data="" value="" autocomplete="off" style="visibility:hidden;">
								</form> 
									<span class="document_new_order_in_page_styl document_new_order_in_pages">Crear venta</span><br>
									<div class="container_entrega_venta">
										<input type="checkbox" class="entregar_venta_reservado entregar_venta_reservado_por_cliente">

									</div>
									<label class="titulo_procesar_una_compras">Entregar productos reservados.</label>
									<!-- <br>
									<hr>
									<center><h4><?=Luis::lang("entregar_compras_en_linea");?></h4></center>
									<div class="contenido_compras_en_linea">
										<input class="input_search_venta_cliente ac_new_search_order_in_page" placeholder="<?=Luis::lang("buscar_la_venta_por_nombre_dni_o_codigo_de_venta");?>." type="search" name="">
									</div> -->
							<?php endif ?>
							<!-- fin de ventas -->
						</div>
						<?php
					}elseif($urb[1]==="entregar"){
						$selex_document_page=false;
						?>
						<?php $cant_ventas = DatosAdmin::ventas_registrados($_SESSION['admin_id']);
						$cant_ventas_entregar = DatosAdmin::ventas_registrados_entregar($_SESSION['admin_id']);
						?>
						<div class="contenido">
							<?php if($cant_ventas): ?>
									<h3 class="new_venta"><?=Luis::lang("entregar_venta");?></h3>
							<?php else: ?>
								<h3 class="new_venta"><?=Luis::lang("venta");?>.</h3>
							<?php endif ?>
							<?php if ($cant_ventas): ?>
								<?php $cantidad_total_ventas=DatosAdmin::TotaldeVentas()->c; ?>
								<div class="numero_de_venta"><?=$venta_pendiente->numero_venta;?></div>

								<?php if (isset($venta_pendiente->documento)): ?>
									<?php $name_documentss=DatosAdmin::documento_por_id($venta_pendiente->documento);
									$name_documents=$name_documentss->nombre;?>
								<?php else: ?>
									<?php $name_documents="DOCUMENTO";?>
								<?php endif ?>

								<div class="punto_ventas_controls">
									<div class="opciones_venta_one">
										
										<?php $cliente_view_pages=false;
										if($venta_pendiente->cliente):
											$cliente_view_page=DatosAdmin::por_el_id_cliente($venta_pendiente->cliente);
											$cliente_view_pages=$cliente_view_page->nombre." ".$cliente_view_page->apellido_paterno;
										endif ?>
										<input id="view_clients_stored" class="options_selects view_clients_stored board " name="cliente" placeholder="DNI, NOMBRE, APELLIDOS" data="" value="<?=$cliente_view_pages;?>">

										<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
										<?php else: ?>
											<select id="select_document_store_shop_client" class="options_selects select_document_store_shop_client">
												<option value="null">Documento</option>
												<?php foreach($documentos as $doc): ?>
													<?php if($venta_pendiente->documento==$doc->id): ?>
														<?=$selex_document_page="selected"; ?>
													<?php else: ?>
														<?=$selex_document_page=false; ?>
													<?php endif ?>
													<option value="<?=$doc->id;?>" data="<?=html_entity_decode($doc->nombre);?>" <?=$selex_document_page;?>><?=html_entity_decode($doc->nombre);?></option>
												<?php endforeach ?>
											</select>
										<?php endif ?>
									</div>

									<div class="opciones_venta_one">
										<div class="contiene_sugerencias_clientes_pages">
										</div>
									</div>
								</div>
								<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
									<form id="codigobarras">
										<input type="hidden" id="search_products_store" class="options_selects  board_product" name="codigo" data="" value="" autocomplete="off" style="visibility:hidden;">
									</form> 
								<?php else: ?>
									<div class="punto_ventas_controls ">
										<div class="opciones_venta_one">
											<form id="codigobarras">
												<input id="search_products_store" class="options_selects  board_product" name="codigo" placeholder="CODIGO DE BARRA, NOMBRE, DESCRIPCION" data="" value="" autocomplete="off" style="cursor:text;">
												<input type="hidden" type="submit" />
											</form> 
										</div>

										<div class="opciones_venta_one">
											<div class="contiene_sugerencias_products_pages">
											</div>
										</div>
									</div>
								<?php endif ?>
								<hr>
								<!-- items ventas controls -->
								<?php if($venta_pendiente->entregar==1 && $venta_pendiente->cliente==null): ?>
								<?php else: ?>
									<div class="punto_ventas_controls compra_view_storeds">
										<?php $items=DatosAdmin::items_stock_in_order_items($_SESSION["admin_id"]); ?>
										<div class="cart_content_list_items_orders_tbn addeds_orders_items">
											<?php foreach ($items as $it): ?>
											<?php $cantidad_items=DatosAdmin::contar_items_stock_por_items($_SESSION['admin_id'],$it->id)->c;?>
											<div class="items_list_views_order_list blockdisplayin" id="<?="itemsviewscartorder".$it->id;?>">
												<div class="detail_producto_order_cart">
													<h4 class="padbot"><?=html_entity_decode($it->nombre);?></h4>
													<div class="peruvianprice">Precio: $. <?=number_format($it->precio,2,".",",");?></div>
													<span class="cantidad_items_view_pages ">ITEMS: <b class="cantidad_items_view_pages_count_items<?=$it->id;?>"><?=$cantidad_items;?></b></span>
									    			<div class="barcodes_items_view_in_page">
									    				<span class="barcodes_items_view_in_page_button" data-modal-trigger="barcodes_items_view_in_page_button_action<?=$it->id;?>">VER CODIGOS</span>
									    				<div class="modal" data-modal-name="barcodes_items_view_in_page_button_action<?=$it->id;?>" data-modal-dismiss="">
									    					<div class="modal__dialog">
									    						<header class="modal__header">
									    							<h3 class="modal__title name_items_titles"><?=html_entity_decode($it->nombre);?></h3>
									    							<i class="modal__close" data-modal-dismiss="">X</i>
									    						</header>
									    						<div class="modal__content" id="<?=$it->id;?>">
									    							<label>Codigos</label>
									    							<?php $type_items_view = DatosAdmin::Ver_tipo_deproducto_por_item($it->tipo);?>
									    							<div class="panel_tabla">
										    							<table class="table table_data_info_pages" id="<?=$it->id;?>">
										    								<thead class="header_table_items_lists">
										    									<?php $header_table_items_viewers=tables_in_pages_items::Mostrar_tabla_in_page_head_table($type_items_view->id_tabla);?>
										    									<tr>
										    										<th>Accion</th>
										    										<?php $contador=1; foreach ($header_table_items_viewers as $tbs => $ssf): ?>
										    										<?php if ($tbs=="id"){
										    										}elseif($tbs=="th0"){
										    										}elseif($tbs=="th1"){
										    										}elseif($tbs=='th2'){
										    										}elseif($ssf==null){
										    										}else{
										    											echo("<th>".$ssf."</th>");
										    											$contador= $contador + 1;
										    										}?>
										    									<?php endforeach ?>
										    									</tr>
										    								</thead>
										    								<tbody class="data_items_stock_controls data_items_stock_controls<?=$it->id;?>">
										    									<?php $movstock=DatosAdmin::mostrar_productos_stock_lista_order($it->id); ?>
										    									<?php foreach ($movstock as $m): ?>
										    										<?php $proveedor=DatosAdmin::poridproveedor($m->proveedor); ?>
										    										<?php $docment=DatosAdmin::poriddocumento($m->documento); ?>
										    										<tr id="item_on_code_list_order<?=$m->id;?>">
										    											<td><span class="delete_item_on_code_list_order_styl delete_item_on_code_list_order" config_box="<?=$m->id_producto;?>" data_config="<?=$m->id;?>" data_conf="<?=$m->barcode;?>">X</span></td>
										    											<?php if($it->tipo==3): ?>
										    												<td><?=$m->barcode;?></td>
										    												<td><?=$m->make;?></td>
										    												<td><?=$m->model;?></td>
										    												<td><?=$m->series;?></td>
										    												<td><?=$m->coa;?></td>
										    												<td><?=$m->cpu;?></td>
										    												<td><?=$m->cpu_speed;?></td>
										    												<td><?=$m->ram;?></td>
										    												<td><?=$m->hard_drive;?></td>
										    												<td><?=$m->drivetype;?></td>
										    												<td><?=$m->aditional_information;?></td>
										    												<td><?=$m->other_information;?></td>
										    												<td><?=$m->screen_size;?></td>
										    												<td><?=$m->web_cam;?></td>
										    												<td><?=$m->ac_adapter;?></td>
										    											<?php endif ?>
										    										</tr>
										    									<?php endforeach ?>
										    								</tbody>
										    							</table>
									    							</div>
									    						</div>
									    					</div>
									    				</div>
									    			</div>
												</div>

												<div class="close_cart_orders_list close_cart_orders_list_order">
									    			<a class="boton_eliminar_producto_de_carrito" data_cart="<?=$it->id;?>">x</a>
									    		</div>
											</div>
											<?php $total += $cantidad_items*$it->precio; endforeach ?>
										</div>

										<div class="page_order_datails_resume">
									    	<div class="content_code_list_view_order_head">
									    		<div class="number_document_page_lists_view ">
										    		<label>Numero de documento</label>
										    		<input class="input_orders_page document_type_change" type="number" name="numbernota" placeholder="NUMERO DE <?=$name_documents;?>" value="<?=$venta_pendiente->numero_doc;?>">
										    	</div>
									    		<label>Metodo de pago</label>
									    		<select class="input_orders_page metodo_de_pago_order_in_pages_client">
									    			<option value="0">Selecciona metodo de pago.</option>
									    			<?php foreach ($metodopago as $mp): ?>
									    				<?php if($venta_pendiente->metodo_pago==$mp->id): ?>
									    					<?=$selex_metod_pago_page="selected"; ?>
									    				<?php else: ?>
									    					<?=$selex_metod_pago_page=false; ?>
									    				<?php endif ?>
									    				<?php if($venta_pendiente->entregar==1): ?>
									    					<?php if($mp->id==4): ?>
									    					<?php else: ?>
									    						<option value="<?=$mp->id;?>" <?=$selex_metod_pago_page;?>><?=html_entity_decode($mp->nombre);?></option>
									    					<?php endif ?>
									    				<?php else: ?>
									    					<option value="<?=$mp->id;?>" <?=$selex_metod_pago_page;?>><?=html_entity_decode($mp->nombre);?></option>
									    				<?php endif ?>
									    				
									    			<?php endforeach ?>
									    		</select>
									    	</div>
									    	<div class="content_code_list_view_order">
									    		<span class="totalprecio pricetotalboxcarts order_total_count_items">
									    			<span class="label_price_mount">Total:</span>
									    			S/. <span class="mount_order_client_litingff"><?php echo number_format($total,2,".",","); ?></span>
									    		</span>
									    		<?php if ($venta_pendiente->metodo_pago==0): ?>
									    			<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="hidden" name="monto_pagado_de_venta" placeholder="">
									    		<?php else: ?>
									    			<?php $metodo_pago_view = DatosAdmin::metodo_de_pago_por_id($venta_pendiente->metodo_pago);?>
									    			<?php if($metodo_pago_view->visible==1): ?>
									    				<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="number" name="monto_pagado_de_venta" placeholder="<?=$metodo_pago_view->label;?>">
									    			<?php else: ?>
									    				<input class="input_orders_page input_order_order_pag_item input_order_order_pag_item_monto_pago" type="hidden" name="monto_pagado_de_venta" placeholder="">
									    			<?php endif ?>
									    		<?php endif ?>
									    		<?php if($venta_pendiente->entregar==1): ?>
									    			<span class="order_process_page process_order_user_view">Entregar productos</span>
									    		<?php else: ?>
									    			<span class="order_process_page process_order_user_view">Procesar venta</span>
									    		<?php endif ?>
									    		
									    		<span class="order_delete_page delete_order_user_view">Eliminar venta</span>
									    	</div>
									    </div>
									</div>
								<?php endif ?>
							<?php endif ?>
							<!-- fin de ventas -->
						</div>
						<?php
					}else{
						header('location:'.$base.'ventas');
					}
				}else{
					header('location:'.$base.'ventas');
				}
			}else{ 
				$ventas_finalizadas = DatosAdmin::Mostrar_ventas_finalizados_hoy($_SESSION['admin_id']);
				$cantidad_ventas_pendientes_web = DatosAdmin::cantidad_de_ventas_pendientes_web()->c;
				$cantidad_ventas_entregados_al_cliente_web = DatosAdmin::cantidad_de_ventas_entregados_al_cliente_web()->c;
				$cantidad_ventas_recibidos_web = DatosAdmin::cantidad_de_ventas_recibidos_web()->c;
				$cantidad_ventas_listo_web = DatosAdmin::cantidad_de_ventas_listos_web()->c;
				$cantidad_ventas_cancelados_web = DatosAdmin::cantidad_de_ventas_cancelados_web()->c;


				$mostrar_todas_las_ventas = DatosAdmin::todas_las_ventas($usuario->sucursal);
				?>
				<div class="contenido">
					<div class="funciones_en_ventas_continuados">
						<label><?=Luis::lang("ventas");?></label>
						<div class="box_seleccionarFunciones">
							<span class="button_one vender_realizar_nueva_venta"><?=Luis::lang("vender");?></span>
							<div data_controles=""></div>
						</div>
					</div>
					<div class="panel_tabla">
						<table class="table table_data_info_pages">
							<thead class="header_table_items_lists">
								<tr>
									<th></th>
									<th><?=Luis::lang("venta");?></th>
									<th><?=Luis::lang("documento");?>.</th>
									<th>NUM_DOC</th>
									<th><?=Luis::lang("cliente");?></th>
									<th><?=Luis::lang("pago");?></th>
									<th><?=Luis::lang("estado");?></th>
								</tr>
							</thead>
							<tbody class="panel-body">
								<?php foreach ($mostrar_todas_las_ventas as $ven):
									$el_documento = DatosAdmin::Ver_documento_por_id($ven->documento);
									$ver_nombre_del_cliente = DatosAdmin::Ver_nombre_del_cliente_por_id($ven->cliente);
									$ver_estado_de_venta = DatosAdmin::Ver_estado_de_venta_por_id($ven->estado_de_venta);
									?>
									<tr>
										<td><a href="<?=$base."ventas/detalles_venta/".$ven->id;?>" class="ver_venta_en_lista_detalles_s ver_venta_en_lista_detalles"><?=Luis::lang("detalles");?></a></td>
										<td><?=$ven->numero_venta;?></td>
										<td><?=$el_documento->nombre;?></td>
										<td><?=$ven->numero_doc;?></td>
										<td><?=$ver_nombre_del_cliente->nombre." ".$ver_nombre_del_cliente->apellido_paterno;?></td>
										<?php $metodo_pago_v = DatosAdmin::metodo_de_pago_por_id($ven->metodo_pago);?>
										<?php if($ven->metodo_pago): ?>
											<td><?=$metodo_pago_v->label;?></td>
										<?php else: ?>
											<td><span class="ver_venta_en_lista_detalles_s detalles_pagos_view">Ver pagos</span></td>
										<?php endif ?>
										<td><?=$ver_estado_de_venta->nombre;?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php }
		}
	}else{
		header('location:'.$base);
	}
}else{
	header('location:'.$base.'acceder');
}
?>

<div id="teclado_venta_stored_client" class="teclado_none" style="display:none;">
    <div id="number_tec_client" class="teclado_cliente_numeros">
        <a class="number" href="#" data="1">1</a>
        <a class="number" href="#" data="2">2</a>
        <a class="number" href="#" data="3">3</a>
        <a class="number" href="#" data="4">4</a>
        <a class="number" href="#" data="5">5</a>
        <a class="number" href="#" data="6">6</a>
        <a class="number" href="#" data="7">7</a>
        <a class="number" href="#" data="8">8</a>
        <a class="number" href="#" data="9">9</a>
        <a class="number" href="#" data="0">0</a>
    </div>
    <div id="number_tec_clientdos" class="letras_teclado_clientes">
        <a href="#" data="Q">Q</a>
        <a href="#" data="W">W</a>
        <a href="#" data="E">E</a>
        <a href="#" data="R">R</a>
        <a href="#" data="T">T</a>
        <a href="#" data="Y">Y</a>
        <a href="#" data="U">U</a>
        <a href="#" data="I">I</a>
        <a href="#" data="O">O</a>
        <a href="#" data="P">P</a>
    </div>
    <div id="number_tec_clienttres" class="letras_teclado_clientes">
        <a href="#" data="A">A</a>
        <a href="#" data="S">S</a>
        <a href="#" data="D">D</a>
        <a href="#" data="F">F</a>
        <a href="#" data="G">G</a>
        <a href="#" data="H">H</a>
        <a href="#" data="J">J</a>
        <a href="#" data="K">K</a>
        <a href="#" data="L">L</a>
        <a href="#" data="Ñ">Ñ</a>
    </div>
    <div id="number_tec_clientcuatro" class="letras_teclado_clientes">
        <a href="#" data="Z">Z</a>
        <a href="#" data="X">X</a>
        <a href="#" data="C">C</a>
        <a href="#" data="V">V</a>
        <a href="#" data="B">B</a>
        <a href="#" data="N">N</a>
        <a href="#" data="M">M</a>
    </div>
    <div id="number_tec_clientcinco" class="opciones_teclado_clientes">
        <a href="#" data=" ">ESPACIO</a>
        <a href="#" data="DEL">ELIMINAR</a>
    </div>
</div>
