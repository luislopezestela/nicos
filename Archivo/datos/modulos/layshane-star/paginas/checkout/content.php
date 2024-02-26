<div class="page-margin">
	<h2 class="ch_checkout_title"><?php echo $wo['lang']['shopping_cart'] ?></h2>
	<div>
		<style type="text/css">
			.option_order_users_data{
				display:flex;
				flex-wrap:wrap;
			}
			.option_order_data{
				display:flex;
				width:calc(50% - 14px);
				margin:7px;
				position:relative;
			}
			.option_order_data label{
				background:#FFF;
				display:flex;
				width:100%;
				height:100%;
				padding:18px;
				align-self:center;
				align-items:center;
				justify-content:center;
				position:relative;
				margin:0;
				border-radius:6px;
				border:2px solid var(--boton-color);
				cursor:pointer;
				transition:all .5s;
			}
			.option_order_data input{display:none;}
			.option_order_data input:checked ~ .label_selected_mod{
				border:2px solid var(--boton-fondo)!important;
			}
			.content_delivery_data,
			.content_store_data{
				transition:all .5s;
			}
			.nodisplay_mode_order{
				height:0;
				overflow:hidden;
				width:0;
				transition:all .5s;
				min-height:0;
			}

		</style>
		
			

		<div class="col-md-5 contendata_deliveredstore">
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
					<div class="sun_input">
						<label><?php echo $wo['lang']['boleta']; ?></label>
						<input name="document_dni" type="text" class="form-control input-md" autocomplete="off" placeholder="DNI" value="<?=$wo['user']['comprobante_dni']?>">
					</div>
				</div>
			</div>
			<div class="content_data_factura <?php if($wo['user']['doc_order']!="factura"){echo('nodisplay_mode_order');}?>">
				<div class="panel-white ch_summary">
					<div class="sun_input">
						<label><?php echo $wo['lang']['invoice']; ?></label>
						<input name="document_ruc" type="text" class="form-control input-md" autocomplete="off" placeholder="RUC" value="<?php echo($wo['user']['comprobante_ruc']) ?>">
					</div>
				</div>
			</div>



			<div class="option_order_users_data">
				<div class="option_order_data">
					<input type="radio" id="retiro_tienda" name="order_options_data" value="tienda" <?php if($wo['user']['opcion_de_compra']=="tienda"){echo('checked');}?>>
					<label class="label_selected_mod" for="retiro_tienda">Retiro en tienda</label>
				</div>

				<div class="option_order_data">
					<input type="radio" id="envio_order" name="order_options_data" value="delivery" <?php if($wo['user']['opcion_de_compra']=="delivery"){echo('checked');}?>>
					<label class="label_selected_mod" for="envio_order">Envio</label>
				</div>
			</div>

			<div class="content_store_data <?php if($wo['user']['opcion_de_compra']!="tienda"){echo('nodisplay_mode_order');}?>">
				<h4><?php echo $wo['lang']['sucursal_entrega'] ?></h4>
				<div class="panel panel-white ch_card ch_summary">
					<div class="checkout_alert"></div>

					<ul class="list-unstyled mb-0 cart_chos_addrs">
						<?php
							if (!empty($wo['sucursales'])) {
								foreach ($wo['sucursales'] as $key => $sucursal) {
									?>
							<li>
								<input type="radio" name="choose-sucursal" id="choose_adrs_<?php echo($sucursal->id) ?>" value="<?php echo($sucursal->id) ?>" class="payment_sucursal" <?php if($wo['user']['sucursal_entrega']==$sucursal->id){echo('checked');}?>>
								<label for="choose_adrs_<?php echo($sucursal->id) ?>">
									<p><b><?php echo($sucursal->nombre) ?></b>&nbsp;<?php echo($sucursal->phone) ?></p>
									<p><?php echo($sucursal->pais) ?>, <?php echo($sucursal->ciudad) ?> - <?php echo($sucursal->direccion) ?></p>
									<p><?php echo($sucursal->referencia) ?></p>
								</label>
							</li>
						<?php  } } ?>
					</ul>
				</div>

			</div>
			<div class="content_delivery_data <?php if($wo['user']['opcion_de_compra']!="delivery"){echo('nodisplay_mode_order');}?>">
				<h4><?php echo $wo['lang']['delivery_address'] ?></h4>
				<div class="panel panel-white ch_card ch_summary">
					<div class="checkout_alert"></div>

					<ul class="list-unstyled mb-0 cart_chos_addrs">
						<?php
							if (!empty($wo['addresses'])) {
								foreach ($wo['addresses'] as $key => $address) {
									?>
							<li>
								<input type="radio" name="choose-address" id="choose_adrs_<?php echo($address->id) ?>" value="<?php echo($address->id) ?>" class="payment_address" <?php if($wo['user']['direccion_envio']==$address->id){echo('checked');}?>>
								<label for="choose_adrs_<?php echo($address->id) ?>">
									<p><b><?php echo($address->name) ?></b>&nbsp;<?php echo($address->phone) ?></p>
									<p><?php echo($address->country) ?>, <?php echo($address->city) ?> - <?php echo($address->referencia) ?></p>
								</label>
							</li>
						<?php  } } ?>
					</ul>
				</div>
				<h4><?php echo $wo['lang']['add_new_address'] ?></h4>
				<form class="form form-horizontal address_form" method="post" action="#">
					<div class="panel panel-white ch_card ch_address">
						<div class="modal_add_address_modal_alert"></div>
						<div class="clear"></div>
						<div class="">
							<div class="col-md-12">
								<div class="sun_input">
									<label><?php echo $wo['lang']['name']; ?></label>
									<input name="name" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="sun_input">
									<label><?php echo $wo['lang']['phone_number']; ?></label>
									<input name="phone" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
								</div>
							</div>
							<div hidden>
								<div hidden>
									<input hidden id="country" name="country" type="text" class="form-control input-md" autocomplete="off" value="PERU">
								</div>
							</div>
							<div class="col-md-6">
								<div class="sun_input">
									<label><?php echo $wo['lang']['city']; ?></label>
									<input id="city" name="city" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['city']; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="sun_input">
									<label><?php echo $wo['lang']['address']; ?></label>
									<textarea class="form-control input-md" placeholder="<?php echo $wo['lang']['address']; ?>" name="address"></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="sun_input">
									<label><?php echo $wo['lang']['referrals']; ?></label>
									<textarea class="form-control input-md" placeholder="<?php echo $wo['lang']['referrals']; ?>" name="referencia"></textarea>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<button type="submit" class="btn btn-default btn-block btn-mat"><?php echo $wo['lang']['add']; ?></button>
					</div>
				</form>
			</div>

		</div>


		<div class="col-md-7">
			<div class="panel panel-white ch_card ch_cart">
                <div class="ch_title">
                	<a href="<?php echo $wo['config']['site_url'].'/products';?>" data-ajax="?link1=products" class="back-to-shop">
										<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> <?php echo $wo['lang']['back_to_shop'] ?>
									</a>
									<div>
										<p><?php echo(!empty($wo['items']) ? count($wo['items']) : 0) ?> <?php echo $wo['lang']['items'] ?></p>
									</div>
                </div>
				<div class="ch_prod_items_row">
					<?php
						if (!empty($wo['html'])) {
							echo $wo['html'];
						} else {
							echo '<div class="center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>' . $wo['lang']['no_items_found'] . '</div>';
						}
					?>
				</div>
				<div class="ch_total_price">
					<div class="divider border-bottom"></div>
					<h4><?php echo $wo['lang']['subtotal'] ?></h4>
					<h3><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['subtotal']; ?></h3>

					<h4><?php echo $wo['lang']['igv'] ?></h4>
					<h3><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['igv']; ?></h3>

					<div class="divider border-bottom"></div>
					<h4><?php echo $wo['lang']['total'] ?></h4>
					<p><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total']; ?></p>
					<div class="divider border-bottom"></div>

					<div class="modos_de_pago_container_buttons">
						<span>Pagar con:</span>

						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_1" name="modo_pago">
							<label for="modo_pago_1">
								<svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><g><path class="st0" d="M369.5,263.1H194.6c-4.1,0-7.5-3.4-7.5-7.5v-83.3c0-4.1,3.4-7.5,7.5-7.5h174.8c4.1,0,7.5,3.4,7.5,7.5v83.4     C377,259.7,373.6,263.1,369.5,263.1z"/><path class="st1" d="M347.7,178.2c0-0.2,0-0.4,0-0.6H216.2c0,0.2,0.1,0.4,0.1,0.6c0,7.3-6,13.3-13.3,13.3v45.4     c7.3,0,13.3,6,13.3,13.3h131.5c0-7.3,6-13.3,13.3-13.3v-45.4C353.7,191.5,347.7,185.6,347.7,178.2z M233.3,221.2     c-4,0-7.3-3.3-7.3-7.3c0-4,3.3-7.3,7.3-7.3s7.3,3.3,7.3,7.3C240.5,217.9,237.3,221.2,233.3,221.2z M281.9,241.5     c-14.1,0-25.5-11.7-25.5-26s11.4-26,25.5-26c14.1,0,25.5,11.7,25.5,26S296,241.5,281.9,241.5z M330.6,221.2c-4,0-7.3-3.3-7.3-7.3     c0-4,3.3-7.3,7.3-7.3s7.3,3.3,7.3,7.3C337.8,217.9,334.6,221.2,330.6,221.2z"/><path class="st1" d="M292.6,217.5c-0.7-1-1.6-1.9-2.9-2.7c-1.3-0.8-2.9-1.4-5-1.9c-1.7-0.4-3.1-0.8-4-1.1c-1-0.3-1.8-0.7-2.3-1.2     s-0.9-1.1-0.9-1.9c0-0.8,0.4-1.5,1.2-2.1c0.8-0.6,1.8-0.8,2.9-0.8c1.1,0,2.1,0.2,2.8,0.6c0.7,0.4,1.3,1,1.8,1.7     c0.6,0.8,1.1,1.5,1.6,1.9c0.5,0.4,1.1,0.6,1.7,0.6c0.9,0,1.6-0.3,2.1-0.8c0.5-0.6,0.8-1.2,0.8-2c0-0.8-0.3-1.5-0.7-2.3     c-0.5-0.8-1.2-1.5-2.1-2.1c-0.9-0.6-2-1.2-3.4-1.6c-0.1,0-0.2-0.1-0.3-0.1v-2.4c0-1.9-1.6-3.6-3.5-3.6s-3.5,1.6-3.5,3.6v2.2     c-1,0.2-1.9,0.5-2.8,0.9c-1.5,0.8-2.7,1.8-3.5,3.1c-0.8,1.3-1.2,2.6-1.2,4.1c0,1.6,0.4,2.9,1.3,4.1c0.8,1.1,1.9,2,3.4,2.7     c1.4,0.7,3.3,1.3,5.5,1.9c2,0.5,3.5,1.1,4.3,1.6c0.9,0.6,1.3,1.5,1.3,2.8c0,0.8-0.4,1.6-1.3,2.2c-0.8,0.6-1.9,0.9-3.2,0.9     c-1.6,0-2.9-0.3-3.8-0.9c-0.9-0.6-1.8-1.6-2.4-2.9c-0.3-0.7-0.7-1.2-1.1-1.6c-0.4-0.4-0.9-0.6-1.6-0.6c-0.8,0-1.4,0.3-1.9,0.8     c-0.5,0.6-0.8,1.3-0.8,2c0,1.2,0.4,2.4,1.2,3.6c0.8,1.2,2.1,2.2,3.7,2.9c0.8,0.4,1.8,0.7,2.8,0.9v2.3c0,1.9,1.6,3.6,3.5,3.6     c1.9,0,3.5-1.6,3.5-3.6V230c0.9-0.2,1.8-0.4,2.4-0.8c1.7-0.8,3-1.8,3.9-3.2c0.9-1.4,1.3-3.1,1.3-5.1     C293.6,219.7,293.2,218.6,292.6,217.5z"/></g><path class="st2" d="M118.1,118.8h32.7c2.8,0,5.2,2.3,5.2,5.2v77.3c0,2.8-2.3,5.2-5.2,5.2h-32.7c-2.8,0-5.2-2.3-5.2-5.2V124    C112.9,121.1,115.2,118.8,118.1,118.8z"/><path class="st3" d="M71.3,212.3h41c3.5,0,6.4-2.9,6.4-6.4v-86.6c0-3.5-2.9-6.4-6.4-6.4h-41V212.3z"/><path class="st4" d="M225.5,177.1l0,0.5l0.1,2.5c0.2,6,5.3,10.7,11.3,10.5l40.4-0.6l2,0c6.3-0.2,11.5,3.9,11.3,10l-0.1,3.9    c0,0.1,0,0.2,0,0.3c-0.1,2.3-1,4.5-2.4,6.2c-0.9,1.1-2,2-3.3,2.7c-1.6,0.9-3.3,1.3-5.3,1.3h-37.3c-0.6,0-1.2,0.1-1.7,0.1    c-2,0.3-3.9,1.2-5.4,2.5l-6.1,3l-0.7,0.4c-8.1,4-16.7,6-25.4,6c-5.4,0-10.7-0.7-15.9-2.2c-9.4-2.7-18.2-7.7-25.3-14.9l-9.5-9.5    c-2.1-2.1-3.3-5-3.3-8v-60.2c0-4.9,3.9-8.8,8.8-8.8h119.8c2.3,0,4.6,0.8,6.4,2.1l55.1,40.1h-48.4c-1.2-0.4-2.5-0.6-3.7-0.6    l-16,0.6L236,166C230.1,166.2,225.4,171.1,225.5,177.1z"/><circle class="st3" cx="133.4" cy="190" r="8.4"/></g><g><path class="st4" d="M365.7,380.7c0,4.9-3.9,8.8-8.8,8.8H237.1c-2.3,0-4.6-0.8-6.4-2.1l-79.6-58c-5.4-4-5.9-11.7-1.1-16.4l0.8-0.8    c3.6-3.4,9.1-4,13.3-1.4l57.4,35.3c1.8,1.1,4,1.7,6.2,1.7l50.9-1.8c5.9-0.2,10.6-5.1,10.6-11.1l-0.1-3c-0.2-6-5.3-10.7-11.3-10.5    l-42.4,0.7c-6.3,0.2-11.5-3.9-11.3-10l0.1-3.9c0.2-5.9,5-10.5,10.9-10.5h37.3c2.6,0,5.2-0.9,7.1-2.6l6.9-3.3    c22.2-11.1,49.2-6.4,66.6,11.1l9.5,9.5c2.1,2.1,3.3,5,3.3,8V380.7z"/><path class="st2" d="M396.5,393.2h-32.7c-2.8,0-5.2-2.3-5.2-5.2v-77.3c0-2.8,2.3-5.2,5.2-5.2h32.7c2.8,0,5.2,2.3,5.2,5.2V388    C401.7,390.9,399.5,393.2,396.5,393.2z"/><path class="st5" d="M440.7,299.7h-41c-3.5,0-6.4,2.9-6.4,6.4v86.6c0,3.5,2.9,6.4,6.4,6.4h41V299.7z"/><circle class="st5" cx="376.4" cy="323.8" r="8.4"/></g></g></svg>
							<h6>Efectivo</h6>
							</label>
						</div>
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_2" name="modo_pago">
							<label for="modo_pago_2">
								<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 15" id="Layer_15"><rect class="cls-1" height="18" width="32" x="2" y="40"/><path class="cls-2" d="M2,40V52.91c.662.053,1.327.09,2,.09,9.209,0,17.445-5.053,22.948-13Z"/><path class="cls-3" d="M56,58h6a0,0,0,0,1,0,0v4a0,0,0,0,1,0,0H54a0,0,0,0,1,0,0V60A2,2,0,0,1,56,58Z"/><path class="cls-4" d="M56,58H52a2,2,0,0,0-2,2v2h4V60A2,2,0,0,1,56,58Z"/><path class="cls-5" d="M56,20h6a0,0,0,0,1,0,0V37a0,0,0,0,1,0,0H52a0,0,0,0,1,0,0V24A4,4,0,0,1,56,20Z"/><path class="cls-6" d="M52,24V34.822c4.532-.986,8-6.343,8-12.822a17.719,17.719,0,0,0-.124-2H56A4,4,0,0,0,52,24Z"/><rect class="cls-7" height="21" width="10" x="52" y="37"/><rect class="cls-8" height="4" rx="2" width="16" x="43" y="24"/><path class="cls-5" d="M57,24H54v4h3a2,2,0,0,0,0-4Z"/><path class="cls-8" d="M62,4H50a3.982,3.982,0,0,0,2,3.445V13a5,5,0,0,0,9.9.989c.034,0,.066.011.1.011l-.092-.092A4.939,4.939,0,0,0,62,13Z"/><path class="cls-7" d="M62,13V4H50a4,4,0,0,0,4,4h2l3,4.646A3.991,3.991,0,0,0,62,14h0"/><path class="cls-9" d="M24,10h0a4,4,0,0,1,4,4V25a4,4,0,0,1-4,4h0Z"/><polygon class="cls-1" points="2 6 24 6 24 29 34 36 2 36 2 6"/><path class="cls-2" d="M30.52,33.564,24,29V6H2V36H29.355Q29.973,34.811,30.52,33.564Z"/><rect class="cls-10" height="4" width="32" x="2" y="36"/><path class="cls-11" d="M29.355,36H2v4H26.948A37.312,37.312,0,0,0,29.355,36Z"/><rect class="cls-10" height="4" width="28" x="2" y="2"/><rect class="cls-10" height="4" width="32" x="2" y="58"/><rect class="cls-12" height="2" transform="translate(0.559 28.349) rotate(-45)" width="4.243" x="32.379" y="12.5"/><rect class="cls-12" height="4.243" transform="translate(-7.219 31.571) rotate(-45)" width="2" x="33.5" y="22.379"/><rect class="cls-12" height="2" width="4" x="34" y="18"/><rect class="cls-12" height="18" width="2" x="55" y="40"/></g></svg>
								<h6>Transferencia / Deposito</h6>
							</label>
						</div>
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_3" name="modo_pago">
							<label for="modo_pago_3">
								<img src="<?=$wo['config']['theme_url'].'/icons/logo-yape.png';?>">
								<h6>Yape pago</h6>
							</label>
						</div>
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_4" name="modo_pago">
							<label for="modo_pago_4">
								<img style="height: auto;" src="<?=$wo['config']['theme_url'].'/icons/cuotealo.png';?>">
							</label>
						</div>
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_5" name="modo_pago">
							<label for="modo_pago_5">
								<svg id="Icon" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient" x1="32" x2="32" y1="13.297" y2="53.105"><stop offset="0" stop-color="#57a0d7"/><stop offset="1" stop-color="#3374ba"/></linearGradient><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient-2" x1="32" x2="32" y1="21.257" y2="33.496"><stop offset="0" stop-color="#434343"/><stop offset="1" stop-color="#212121"/></linearGradient><linearGradient gradientUnits="userSpaceOnUse" id="linear-gradient-3" x1="18" x2="18" y1="36.584" y2="45.864"><stop offset="0" stop-color="#edeff0"/><stop offset="1" stop-color="#b0bec5"/></linearGradient></defs><rect class="clstarjeta-1" height="34.317" rx="2" width="54" x="5" y="14.842"/><rect class="clstarjeta-2" height="8.099" width="54" x="5" y="23.901"/><rect class="clstarjeta-3" height="5.525" width="13.743" x="11.129" y="38.099"/></svg>
								<h6>Tarjeta debito / credito</h6>
							</label>
							
						</div>

						<!--Comprar con tarjeta
						<button type="button" class="btn btn-success btn-mat buy_button" onclick="BuyProducts_tarjeta('hide','<?php echo $wo['total']; ?>')" <?php if (empty($wo['addresses'])) { ?>disabled="true"<?php } ?>><?php echo $wo['lang']['tarjeta'] ?></button>

						Comprar con efectivo
						<button type="button" class="btn btn-success btn-mat buy_button" onclick="BuyProducts_efectivo('hide','<?php echo $wo['total']; ?>')" <?php if (empty($wo['addresses'])) { ?>disabled="true"<?php } ?>><?php echo $wo['lang']['efectivo'] ?></button>-->

					</div>
					
					
					<hr>
					
					

				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {

	$(document).on('click','#boleta_view', function(){
		$('.content_data_factura').addClass('nodisplay_mode_order');
		$('.content_data_boleta').removeClass('nodisplay_mode_order');
	})

	$(document).on('click','#factura_view', function(){
		$('.content_data_boleta').addClass('nodisplay_mode_order');
		$('.content_data_factura').removeClass('nodisplay_mode_order');
	})
	///

	$(document).on('click','#retiro_tienda', function(){
		$('.content_delivery_data').addClass('nodisplay_mode_order');
		$('.content_store_data').removeClass('nodisplay_mode_order');
	})

	$(document).on('click','#envio_order', function(){
		$('.content_store_data').addClass('nodisplay_mode_order');
		$('.content_delivery_data').removeClass('nodisplay_mode_order');
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
			}
		})
	});

	$('input[name="order_options_data"]').change(function(){
		var docs = $(this).val();
		if (docs=='tienda') {
			$('input[name="choose-address"]:checked').removeAttr('checked');
			$('input[name="choose-address"]').prop('checked', false);
		}else if(docs=='delivery'){
			$('input[name="choose-sucursal"]').prop('checked', false);
			$('input[name="choose-sucursal"]:checked').removeAttr('checked');
		}
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=order_opcion&s=opcion_compra&hash=' + $('.main_session').val(),
			data: {modo_compra:docs},
			type: 'POST',
			success: function (data) {
				
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



    var options = {
      url: Wo_Ajax_Requests_File() + '?f=address&s=add&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
          $('.modal_add_address_modal_alert').empty();
          $("#add_address_modal").find('.btn-mat').attr('disabled', 'true');
          $("#add_address_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
        },
        success: function (data) {
          $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
          $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
          if (data.status == 200) {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
              data.message
              +'</div>');
              if (data.url && data.url != '') {
                if ($('#setting_address_page').length > 0) {
                  setTimeout(function () {
                    location.href = data.url;
                  },2000);
                }
                else{
                  setTimeout(function () {
                    $('.modal_add_address_modal_alert').empty();
              $("#add_address_modal").find('.btn-mat').removeAttr('disabled')
              $("#add_address_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
              $('#add_address_modal').modal('hide');
              $('#load_checkout').click();
                  },2000);
                }
              }
          } else {
            $('.modal_add_address_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
            data.message
            +'</div>');
          }
        }
    };
    $('.address_form').ajaxForm(options);
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
