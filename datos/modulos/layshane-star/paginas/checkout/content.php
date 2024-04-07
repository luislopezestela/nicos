<?php if($wo['loggedin'] == true): ?>
<style type="text/css">
.container_cart_layshane{padding:30px;padding-top:0;}
.div_container_lui_cart{
	display:grid;
	margin:0 auto;
	grid-template-rows: repeat(var(--bs-rows, 1), 1fr);
	grid-template-columns: repeat(var(--bs-columns, 12), 1fr);
    gap: var(--bs-gap, 1.5rem);
    margin: var(--bs-margin, auto);
}
:root {
    --bs-columns: 12;
    --bs-gap: 24px;
}
.sidebar_layshane_store{
	margin:unset;
	width:unset;
	padding-right:0;
	display:block;
	order:0;
	grid-column:auto / span 3;
	box-sizing:border-box;
	padding:10px;
}
@media all and (min-width: 1920px),print{
	:root {
		--gallery-nav-width: 440px;
		--bs-gap: 28px;
		--bs-padding: 0 116px;
	}
}
@media all and (min-width: 768px),print{
	.sidebar_layshane_store{
		float:left;
	}
}
.container_cart_lists {
	padding-top: 10px;
	position: relative;
	margin-right: unset;
	width: unset;
	float: right;
	grid-column: 4 / span 9;
	margin-top: 0;
	margin-left: 0;
}
.content_data_boleta,
.content_data_factura{
	padding:10px;
}
.sun_input{
  display: flex;
  flex-wrap:wrap;
  line-height: 28px;
  align-items: center;
  position: relative;
  width:100%;
}
.input-md{
  width: 100%;
  height: 40px;
  line-height: 28px;
  padding: 0 1rem;
  border: 2px solid transparent;
  border-radius: 8px;
  outline: none;
  background-color: #f3f3f4;
  color: #0d0c22;
  transition: 0.3s ease;
}
.input-md::placeholder {
  color: #9e9ea7;
}
.input-md:focus,
.input-md:hover {
  outline: none;
  border-color: rgba(0, 48, 73, 0.4);
  background-color: #fff;
  box-shadow: 0 0 0 4px rgb(0 48 73 / 10%);
}
.sun_input_a{
  position: relative;
  padding: 20px 0 0;
  width: 100%;
}
.sun_input_a .input-md_a{
  font-family: inherit;
  width: 100%;
  border: none;
  border-bottom: 2px solid #9b9b9b;
  outline: 0;
  font-size: 17px;
  color: #444;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}
.sun_input_a .input-md_a::placeholder {
  color: transparent;
}

.sun_input_a .input-md_a:placeholder-shown ~ label {
  font-size: 17px;
  cursor: text;
  top: 20px;
}
.sun_input_a label{
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 17px;
  color: #9b9b9b;
  pointer-events: none;
}
.sun_input_a .input-md_a:focus {
  padding-bottom: 6px;
  font-weight: 700;
  border-width: 3px;
  border-image: linear-gradient(to right, #116399, #38caef);
  border-image-slice: 1;
}
.sun_input_a .input-md_a:focus ~ label{
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 17px;
  color: #38caef;
  font-weight: 700;
}
/* reset input */
.sun_input_a .input-md_a:required, .sun_input_a .input-md_a:invalid {
  box-shadow: none;
}
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
	padding:0;
}
.button_layshane_green {
  padding: 1.3em 3em;
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  margin:25px auto;
}
.button_layshane_green:hover {
  background-color: #23c483;
  box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
  color: #fff;
  transform: translateY(-7px);
}
.button_layshane_green:active {
  transform:translateY(-1px);
}
.ch_title{display:flex;justify-content:space-between;align-items:center;}
.container_cart_lists{padding:10px;padding-top:0;}
.ch_checkout_title{padding:10px;}
@media all and (max-width: 1050px),print{
	.container_cart_layshane{
		padding:0;
	}
	.container_cart_lists,
	.sidebar_layshane_store{
		grid-column:auto / span 12;
	}
	.modos_de_pago_container_buttons{
		flex-wrap:wrap;
	}
}
</style>
<style type="text/css">
.cart_chos_addrs{
  display: flex;
  flex-wrap:wrap;
  width:100%;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.cart_chos_addrs > * {
  margin: 6px;
  width:100%;
}
.payment_address:checked + .radio-tile,
.payment_sucursal:checked + .radio-tile{
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
  color: #2260ff;
}
.payment_address:checked + .radio-tile:before,
.payment_sucursal:checked + .radio-tile:before{
  transform: scale(1);
  opacity: 1;
  background-color: #2260ff;
  border-color: #2260ff;
}
.payment_address:checked + .radio-tile p,
.payment_sucursal:checked + .radio-tile p {
  color: #2260ff;
}
.payment_address:focus + .radio-tile,
.payment_sucursal:focus + .radio-tile {
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
}
.payment_address:focus + .radio-tile:before,
.payment_sucursal:focus + .radio-tile:before{
  transform: scale(1);
  opacity: 1;
}
.radio-tile{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  min-height: 80px;
  border-radius: 0.5rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  transition: 0.15s ease;
  cursor: pointer;
  position: relative;
  padding:7px;
}
.radio-tile:before {
  content: "";
  position: absolute;
  display: block;
  width: 0.75rem;
  height: 0.75rem;
  border: 2px solid #b5bfd9;
  background-color: #fff;
  border-radius: 50%;
  top: 0.25rem;
  left: 0.25rem;
  opacity: 0;
  transform: scale(0);
  transition: 0.25s ease;
}

.radio-tile:hover {
  border-color: #2260ff;
}

.radio-tile:hover:before {
  transform: scale(1);
  opacity: 1;
}

.radio-tile p {
  color: #707070;
  transition: 0.375s ease;
  text-align: center;
  font-size: 13px;
}

.payment_address,.payment_sucursal {
  clip: rect(0 0 0 0);
  -webkit-clip-path: inset(100%);
  clip-path: inset(100%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
</style>
<style type="text/css">
.ch_total_price{
	display:flex;
	flex-wrap:wrap;
	flex-direction:column;
	width:100%;
	position:relative;
	background-color:#fff;
	padding:30px;
	align-content:flex-end;
}
.div_subs_contn{display:flex;align-items:center;justify-content:flex-end;gap:2em;padding:10px;user-select:none;}
.modos_de_pago_container_buttons{display:flex;margin-top:10px;width:100%;flex-direction:row;gap:1em;}
.lista_modo_pago{width:100%;display:flex;position:relative;background:#FFF;margin:5px 0;align-items:center;}
.lista_modo_pago label{display:flex;width:100%;padding:10px;font-size:18px;justify-content:flex-start;align-items:center;cursor:pointer;gap:1rem;border:1px solid #2c8ce9;border-radius:4px;}
.lista_modo_pago label h6{margin:0;padding:0;}
.lista_modo_pago input:checked + label{
  border-color: #2260ff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
  color: #2260ff;
}
.lista_modo_pago input{display:none;}
</style>
<div class="page-margin container_cart_layshane">
	<h2 class="ch_checkout_title"><?php echo $wo['lang']['shopping_cart'] ?></h2>
	<div class="div_container_lui_cart">
		<div class="contendata_deliveredstore  sidebar_layshane_store leftcol">
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
					<div class="list-unstyled mb-0 cart_chos_addrs">
						<?php
							if (!empty($wo['sucursales'])) {
								foreach ($wo['sucursales'] as $key => $sucursal) {
									?>
								<label for="choose_adrs_<?php echo($sucursal->id) ?>">
									<input type="radio" name="choose-sucursal" id="choose_adrs_<?php echo($sucursal->id) ?>" value="<?php echo($sucursal->id) ?>" class="payment_sucursal" <?php if($wo['user']['sucursal_entrega']==$sucursal->id){echo('checked');}?>>
									<span class="radio-tile">
										<p><b><?php echo($sucursal->nombre) ?></b>&nbsp;<?php echo($sucursal->phone) ?></p>
										<p><?php echo($sucursal->pais) ?>, <?php echo($sucursal->ciudad) ?> - <?php echo($sucursal->direccion) ?></p>
										<p><?php echo($sucursal->referencia) ?></p>
									</span>
								</label>
						<?php  } } ?>
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
								<input type="radio" name="choose-address" id="choose_adrs_<?php echo($address->id) ?>" value="<?php echo($address->id) ?>" class="payment_address" <?php if($wo['user']['direccion_envio']==$address->id){echo('checked');}?>>
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
				<h4><?php echo $wo['lang']['add_new_address'] ?></h4>
				<form class="form form-horizontal address_form" method="post" action="#">
					<div class="panel panel-white ch_card ch_address">
						<div class="modal_add_address_modal_alert"></div>
						<div class="clear"></div>
						<div class="">
							<div class="col-md-12">
								<div class="sun_input">
									<label for="name"><?php echo $wo['lang']['name']; ?></label>
									<input id="name" name="name" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>" >
								</div>
							</div>
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
						<button type="submit" class="btn btn-default button_layshane_green"><?php echo $wo['lang']['add']; ?></button>
					</div>
				</form>
			</div>

		</div>


		<div class="container_cart_lists">
			<div class="panel panel-white ch_card ch_cart">
                <div class="ch_title">
                	<a href="<?php echo $wo['config']['site_url'].'/tienda';?>" data-ajax="?link1=tienda" class="back-to-shop">
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
							echo '<div class="center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=""><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>' . $wo['lang']['no_items_found'] . '</div>';
						}
					?>
				</div>
				<div class="ch_total_price">
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['subtotal'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['subtotal']; ?></span>
					</div>
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['igv'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['igv']; ?></span>
					</div>
					<div class="div_subs_contn">
						<span><?php echo $wo['lang']['total'] ?></span>
						<span><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total']; ?></span>
					</div>
				</div>
				<br>
				<hr>
				<br>
				<span>Pagar con:</span>
				<div class="modos_de_pago_container_buttons">
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_1" name="modo_pago" value="1" <?=$wo['user']['mode_pay']==1 ? 'checked' : false ?>>
							<label for="modo_pago_1">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" /></svg>
							<h6>Efectivo</h6>
							</label>
						</div>
						<div class="lista_modo_pago">
							<input type="radio" id="modo_pago_2" name="modo_pago" value="2" <?=$wo['user']['mode_pay']==2 ? 'checked' : false ?>>
							<label for="modo_pago_2">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-transfer-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 21v-6" /><path d="M20 6l-3 -3l-3 3" /><path d="M17 3v18" /><path d="M10 18l-3 3l-3 -3" /><path d="M7 3v2" /><path d="M7 9v2" /></svg>
								<h6>Transferencia / Deposito</h6>
							</label>
						</div>
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
					</div>
					<br>
					<hr>
					<br>
					<div class="pay_order_layshane"></div>
					<br>
					<br>
			</div>
		</div>
	</div>
</div>
<script>
function loadpay(numsdd){
	$(".pay_order_layshane").load(Wo_Ajax_Requests_File() + '?f=order_opcion&s=pays_vie&tols='+<?=$wo['total'];?>);
}

$(document).ready(function() {
loadpay()
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
				loadpay()
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
				loadpay()
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
				loadpay()
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
				loadpay()
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