<?php if($wo['documento']->documento=='BS'): ?>
	<?php $numero_documento_a = $wo['documento']->num_doc;?>
<?php elseif($wo['documento']->documento=='B'): ?>
	<?php $numero_documento_a = $wo['documento']->numero_documento;?>
<?php elseif($wo['documento']->documento=='F'): ?>
	<?php $numero_documento_a = $wo['documento']->numero_documento;?>
<?php endif ?>
<style type="text/css">
	.typenumber_nop_viewp{text-align: center;
    outline: none;
    border: 2px solid #ddd;
    padding: 10px;
    width: 100%;user-select:none;
    font-size: 16px;}
</style>
<div class="comprobante">
	<div class="comprobante_number">
		<h2 class="numdoc_line"><?=$wo['documento']->documento.'-'.$wo['documento']->num_doc;?></h2>
		<span class="typenumber_nop_viewp"><?=$numero_documento_a;?></span>
	</div>

	<div class="datos_proveedor_box datos_proveedor_box_ad" style="user-select:none;">
		<?php $proveedor_ver = $db->where('id',$wo['documento']->proveedor)->getOne("lui_proveedores"); ?>
		<?php if($proveedor_ver): ?>
			<h5><?=$proveedor_ver->razon_social; ?></h5>
			<p>R.U.C. <?=$proveedor_ver->ruc; ?></p>
		<?php endif ?>
	</div>

	<div class="address_data_proveedor datos_proveedor_box_direccion" style="user-select:none;">
		<?php $proveedor_sucursal_view = $db->where('id',$wo['documento']->proveedor_sucursal)->getOne("sucursal_proveedor"); ?>
		<?php if($proveedor_sucursal_view): ?>
			<span><?=$proveedor_sucursal_view->direccion;?>,<?=$proveedor_sucursal_view->distrito;?>,<?=$proveedor_sucursal_view->departamento;?></span>
		<?php endif ?>
	</div>

	<div class="date_comprovante_compra" style="user-select:none;">
		<span style="width: 20%;">Fecha de compra </span>
		<span><?= date('Y-m-d', strtotime($wo['documento']->fecha)) ?></span>
	</div>
	<div class="contenido_guia_remicion_con ">
		<div class="contenido_guia_remicion <?php if($wo['documento']->guia!=1){echo "disabled_provedores_list";} ?>">
			<input type="number" name="numero_de_guia" placeholder="Numero guia" value="<?=$wo['documento']->numero_guia;?>">
		</div>
	</div>
	<style type="text/css">
		.contenido_currensy_order{display:flex;padding:10px;position:relative;width:100%;flex-wrap:wrap;gap:0.5em;margin-bottom:2rem;}
		.contenido_currensy_order span{display:block;width:100%;user-select:none;}
		.selected_curremcy_order{display:block;position:relative;width:100%;max-width:200px;padding:10px;border:1px solid #ccc;border-radius:3px;outline:none;cursor:pointer;}
	</style>
	<div class="contenido_currensy_order">
		<span><?php echo $wo['lang']['currency']; ?></span>
		<span name="currency" class="selected_curremcy_order">
			<?php foreach ($wo['currencies'] as $key => $currency) { ?>
				<?php if($wo['documento']->currency==$currency['text']): ?>
					<span style="user-select:none;"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</span>
				<?php else: ?>
				<?php endif ?>
			<?php } ?>
		</span>
	</div>
	<style type="text/css">
		.buscar_productos_a_comprar{position:relative;display:none;}
		.listar_productos_a_comprar{display:flex;flex-wrap:wrap;width:100%;border-radius:5px;position:relative;}
		.active_seach_item{display:flex;flex-wrap:wrap;width:100%;}
		.cont_atributes_listas_compras{display:flex;flex-wrap:wrap;gap:1rem;position:fixed;bottom:0;background-color:#FFF;width:100%;max-width:1200px;z-index:1;left:0;right:0;justify-content:center;margin:auto;border:none;border-radius:15px 15px 0 0;padding:20px;max-height: calc(100% - 120px);overflow: auto;}
		.cont_atributes_listas_compras_title{display:block;width:100%;}
		.atributes_listas_compras{display:flex;flex-direction:column;background-color:#fff;overflow:hidden;width:100%;margin:10px auto;}
		.atributes_listas_compras input[type="radio"]{display:none;}
		.atributes_listas_compras .lista_de_opciones_de_atributes label{display:flex;align-items:center;padding:20px;cursor:pointer;transition:background-color 0.3s ease-in-out;}
		.radio-circle{width:20px;height:20px;border:2px solid #3498db;border-radius:50%;margin-right:10px;transition:border-color 0.3s ease-in-out, background-color 0.3s ease-in-out;}
		.radio-text{font-size:1rem;color:#333;transition:color 0.3s ease-in-out;}
		.atributes_listas_compras .lista_de_opciones_de_atributes input[type="radio"]:checked + label{background-color:#3498db;}
		.atributes_listas_compras input[type="radio"]:checked + label .radio-circle{border-color:#fff;background-color:#3498db;}
		.atributes_listas_compras input[type="radio"]:checked + label .radio-text{color:#FFF;}
		.cont_ats_title{padding:10px;width:100%;font-size:17px;border-bottom:2px solid #ccca;}
		.placeholder_atri{width:100%;position:fixed;background:rgba(0, 0, 0, 0.73);top:0;bottom:0;left:0;right:0;z-index:1040;}
		.header_title_viewas_more_items{display:flex;flex-wrap:wrap;width:100%;gap:1rem;justify-content:space-between;align-items:center;padding:20px;position:sticky;top:0;background-color:#FFF;z-index:1;}
		.submenu_add_irtd_docmt,
		.submenu_add_irtd{z-index:1040;overflow:hidden;max-height:calc(100% - 120px);height:100vh;display:block;overflow-y:auto;padding:0;}
		.submenu_add_irtd_docmt table,
		.submenu_add_irtd table{padding:20px;padding-top:0;}
		.submenu_add_irtd_docmt table .table__thead,
		.submenu_add_irtd table .table__thead{top:80px;position:sticky;z-index:1;background:#F8F8F8;}
		.main_closed_view_more_items_orrder{position:fixed;top:20px;width:100%;max-width:1200px;margin:auto;display: flex;left:10px;right:0;z-index:10000;}
		.closed_view_more_items_orrder{aspect-ratio:1/1;border-radius:100%;display:flex;align-items:center;padding:20px;background-color:#F9F9F9}
		.closed_view_more_items_orrder svg{margin:0!important;width:30px;height:30px;}
		.precio_compra_invo_s{display:flex;width:100%;justify-content:flex-start;align-items:center;gap:1rem;}
		.precio_compra_invo_s span{font-size:15px;}
		.input_number_laysh,
		.precio_compra_invo_s .precio_compra_inputs{border:0;padding:10px;outline:none;transition:all .5s;}
		.input_number_laysh:focus,
		.precio_compra_invo_s .precio_compra_inputs:focus{border-color:#555;border-radius:4px;}
		.input_number_laysh[type="number"]::-webkit-inner-spin-button,
		.input_number_laysh[type="number"]::-webkit-outer-spin-button,
		.precio_compra_invo_s .precio_compra_inputs[type="number"]::-webkit-inner-spin-button,
		.precio_compra_invo_s .precio_compra_inputs[type="number"]::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}
		.input_number_laysh[type="number"],
		.precio_compra_invo_s .precio_compra_inputs[type="number"]{-moz-appearance: textfield; /* Firefox */}
		.dell-button{display:flex;flex-direction:column;align-items:center;justify-content:center;width:55px;height:55px;border-radius:15px;background-color:rgb(255, 95, 95);cursor:pointer;border:3px solid rgb(255, 201, 201);transition-duration:0.3s;}
		.dell-bottom{width:15px;}
		.dell-top{width:17px;transform-origin:right;transition-duration:0.3s;}
		.dell-button:hover .dell-top{transform:rotate(45deg);}
		.dell-button:hover{background-color:rgb(255, 0, 0);}
		.dell-button:active{transform: scale(0.9);}
		.menu_atrr{overflow:hidden!important;}
		.layshane-btn_cr{width:130px;height:40px;color:#fff;border-radius:5px;padding:10px 25px;font-family:'Lato', sans-serif;font-weight:500;background:transparent;cursor:pointer;transition:all 0.3s ease;position:relative;display:inline-flex;box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),7px 7px 20px 0px rgba(0,0,0,.1),4px 4px 5px 0px rgba(0,0,0,.1);outline: none;justify-content:center;align-items:center;}
		.btn_layshane-1{background:rgb(255, 95, 95);background:linear-gradient(0deg, #f94141 0%, rgb(255, 95, 95) 100%);border: none;}
		.btn_layshane-1:before{height:0%;width:2px;}
		.btn_layshane-1:hover{box-shadow: 4px 4px 6px 0 rgba(255,255,255,.5),-4px -4px 6px 0 rgba(116, 125, 136, .5), inset -4px -4px 6px 0 rgba(255,255,255,.2),inset 4px 4px 6px 0 rgba(0, 0, 0, .4);}
	</style>
	<br>

	<div class="listar_productos_a_comprar">
		<div class="con_layshane_tbles" style="background-color:transparent;">
			<div class="container">
				<div class="row row--top-20">
					<div class="columna-12">
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
									<?php 
									$items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante',$wo['documento']->id)->get('imventario');
									$indexdefault_currency = array_search($wo['documento']->currency, array_column($wo['currencies'], 'text'));
									$htmldocumento = "";
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
										$identificador_unico = $wo['documento']->id . '_' . $producto_id;
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
										$wo['product']['comprap'] = $wo['documento']->id;
										$wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $producto['currency'];
										$wo['product']['inventario'] = $variantes_color[0]->id;
										$wo['product']['color'] = $variantes_color[0]->color;
										$wo['product']['precio'] = $variantes_color[0]->precio;
										$cantidad_productos = 0;
										if (!empty($variantes_atributos)) {
											$sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante = {$wo['documento']->id}";
											foreach ($variantes_atributos as $atributo => $opciones) {
												foreach ($opciones as $opcion) {
													$sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
												}
											}
											$cantidad_productos = $db->rawQueryOne($sql)->cantidad;
										} else{
											$cantidad_productos = $db->where('id_comprobante', $wo['documento']->id)->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->getValue('imventario', 'COUNT(*)');
										}
										$wo['product']['cantidad'] = $cantidad_productos;
										$htmldocumento .= lui_LoadPage('compras/lista_documento');
										$productos_vistos[] = $identificador_unico;
									}
									echo $htmldocumento;
									?>
								</tbody>
							</table>
						</div>
						<br>
						<style type="text/css">
							.contenido_ct_footer_document_order{display:flex;justify-content:flex-end;align-items:center;flex-wrap:wrap;width:100%;}
							.footer_document_order{width:100%;max-width:400px;display:flex;flex-wrap:wrap;gap:1rem;}
							.footer_document_order_li{display:flex;flex-wrap:wrap;width:100%;justify-content:space-between;padding:10px;gap:1em;}
							.head_doc_li{font-weight:bold;font-family:arial;text-align:right;}
							.bt_conain_sty{display:flex;width:100%;justify-content:flex-end;}
							.alert_400{padding:10px;border:2px solid #ff00005c;width:100%;text-align:center;border-radius:5px;background:#ffc4c357;color:#f23232;font-weight:900;transition:all 0.5s;user-select:none;text-wrap:wrap;}
						</style>
						<?php
						$total_productos_grupo = 0;
						$total_productos_lista = 0;
						$total_productos_price = 0.00;
						$total_productos_grupo = $db->where('estado','1')->where('id_comprobante',$wo['documento']->id)->getValue('imventario','COUNT(DISTINCT orden)');
						$total_productos_lista = $db->where('estado','1')->where('id_comprobante',$wo['documento']->id)->getValue('imventario','COUNT(*)');
						if ($total_productos_lista>0) {
							$total_productos_price = $db->where('estado','1')->where('id_comprobante',$wo['documento']->id)->getValue('imventario','SUM(precio)');
						}
						if($wo['documento']->garantia_m == 0) {
							$cantidad_de_garantia = 0;
							$end_date_de_garantia = false;
						}else{
							$cantidad_de_garantia = $wo['documento']->garantia_m;
							$end_date_de_garantia = 'La garantia finalizara en: '.fecha_restante($wo['documento']->garantia);
						}
						?>
						<div class="contenido_ct_footer_document_order">
							<?php if ($wo['documento']->anulado == 1): ?>
								<div class="footer_document_order" style="gap:0.2em;">
									<p style="width:100%;color:#dc2121;font-weight:bold;text-transform:uppercase;letter-spacing:3px;font-size:25px;" class="result_m_text_gar">ANULADO</p><br>
									<p style="width:100%;">Nota: <?=$wo['documento']->justificacion_anulado;?></p><br>
									<p style="width:100%;">Anulado: <?=$wo['documento']->fecha_anulado;?></p>
								</div>
							<?php else: ?>
								<div class="footer_document_order" style="gap:0.2em;">
									<p style="width:100%;" class="result_m_text_gar"><?=$end_date_de_garantia?></p>
								</div>
							<?php endif ?>
							
							<div class="footer_document_order">
								<div class="footer_document_order_li">
									<span class="head_doc_li">Items:</span>
									<span class="head_doc_co" id="items_st_total"><?=$total_productos_grupo;?></span>
								</div>
								<div class="footer_document_order_li">
									<span class="head_doc_li">Cantidad:</span>
									<span class="head_doc_co" id="cantidad_st_total"><?=$total_productos_lista;?></span>
								</div>
								<div class="footer_document_order_li">
									<span class="head_doc_li">Total: </span>
									<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';?>
									<span class="head_doc_co" id="price_st_total">
										 <?=number_format($total_productos_price, 2, ',', '.');?>
									</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>