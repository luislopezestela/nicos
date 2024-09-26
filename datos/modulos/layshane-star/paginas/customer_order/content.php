<style type="text/css">
	.margen_pagina{
		width:100%;
		max-width:920px;
		margin:10px auto;
		margin-bottom:15px;
	}
	.head_vista_compra{
		display:flex;
		justify-content:space-between;
		padding:10px 0;
		border-bottom:2px solid #ddd;
		margin-bottom:20px;
	}
	.button_back{
		padding:10px;
		cursor:pointer;
		font-size:18px;
	}
	.estado_venta{
		padding:10px;
		font-size:18px;
	}
	.info_vendedor{
		border:2px dashed #ccc;
		border-radius:10px;
		padding:10px;
	}

	.info_vendedor.container {
		display: flex;
	  	flex-wrap: wrap;
	}

	.columna.left{flex:0 1 200px;}

	.columna.right {
	  flex: 1;
	}

	.info_vendedor .columna{
		padding:10px;
		display:flex;
		flex-wrap:wrap;
		justify-content:center;
		align-content:center;
	}
	.info_vendedor .columna span{
		display:block;
		padding:6px;
		width:100%;
	}

@media screen and ( max-width: 450px){
	.info_vendedor.container {
		display: block;
	}
	.columna.left {
	  flex: 1;
	  min-width:auto;
	}

	.columna.right {
	  flex: 1;
	}
	.columna.right span{
		width:100%;
	}
	.columna.right span strong{display:block;width:100%;}
}
.purchase-status {
  width: 100%;
  height: 200px;
  background-color: #f7f7f7;
  border-radius: 10px;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.steps {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.step {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 25%;
}

.step svg {
  width: 24px;
  height: 24px;
  margin-bottom: 10px;
}

.step p {
  font-size: 14px;
  color: #666;
}

.progress {
  width: 100%;
  height: 10px;
  background-color: #ddd;
  border-radius: 10px;
  margin-top: 20px;
}

.progress-bar {
  width: 0;
  height: 100%;
  background-color: #4CAF50;
  border-radius: 10px;
  transition: width 0.5s ease-in-out;
}

/* Estilos adicionales para hacerlo parecer como Facebook */
.purchase-status{box-shadow:0 0 10px rgba(0, 0, 0, 0.1);}
.steps {border-bottom: 1px solid #ccc;}
.step{padding:20px;}
.step p{color:#333;}
.steps{border-bottom: 1px solid #ccc;}
.step svg{color: rgba(149, 165, 166,1.0);}
.step p{color:#333;}
.step svg{transition:transform 0.5s ease-in-out;}
.step.active svg{
	color:rgba(241, 196, 15,1.0);
	transform: scale(1.3);
}
.step.completed svg{
	color:#4CAF50;
}
@media screen and ( max-width: 650px){
	.margen_pagina{padding:0 10px}
	.purchase-status{height:initial!important;}
	.steps{flex-direction:column!important;}
	.step{width:100%!important;}
}

.contain_datos_entrega{
	box-shadow:0 0 10px rgba(0, 0, 0, 0.1);
	padding:20px;
	margin-top:20px;
	border-radius:10px;
	display:flex;
	flex-wrap:wrap;
	justify-content:space-between;
}
.contain_datos_entrega .datas_entr{
	display:flex;
	justify-content:center;
	align-items:center;
	flex-wrap:wrap;
}
.contain_datos_entrega .datas_entr h4{
	width:100%;
	font-weight:bold;
	font-size:22px;
}
.sucursal_datas{width:100%;}

.order-summary {
  background-color:#fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
  margin: 0 auto;
}

.order-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.order-items {
  padding-bottom: 20px;
}

.order-item {
  display: flex;
  margin-top: 20px; /* Ajustar margen inferior */
  padding-top: 30px;
  border-top: 1px solid #eee;
  justify-content: space-between;
}

.item-image {
  width: 120px; /* Ajustar tamaño de imagen */
  height: 120px;
  margin-right: 20px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
}
.item-details {
  flex-grow: 1;
}
.quantity {
  font-size: 18px;
  font-weight: bold;
  flex-basis: 100%;
  text-align:right;
  padding:10px;
}


.price-box {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  flex-wrap: wrap;
  font-size: 18px; /* Ajustar tamaño de fuente */
}
.price-card {
  background-color: #f7f7f7;
  padding: 10px;
  border-radius: 10px;
  width: calc(50% - 10px);
  text-align: center;
  margin-bottom:10px;
}

.price-card h4 {
  font-size: 16px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

.price-card p {
  font-size: 24px;
  font-weight: bold;
  color: #00698f;
}

.payment-methods {
  margin-top: 20px;
}
.payment-methods h2{
  padding: 10px;
}
.payment-methods-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  justify-content: stretch;
  align-content: stretch;
}

.payment-methods-box {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
}

.payment-methods-box h3 {
  font-size: 18px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.payment-methods-box ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.payment-methods-box li {
  font-size: 16px;
  margin-bottom: 10px;
}

.payment-methods-box p {
  font-size: 18px;
  font-weight: bold;
  color: #00698f;
  margin-top: 20px;
}

/* Responsive design */
@media only screen and (max-width: 768px) {
  .payment-methods-grid {
    grid-template-columns: 1fr;
  }
}
/* Responsive design */

@media only screen and (max-width: 768px) {
	.order-header{font-size:15px;padding:5px;padding-bottom:0;}
  .order-summary {
    padding: 10px;
  }
  .order-item {
    flex-direction: column;
    justify-content:center;
    align-items:center;
    text-align:center;
    margin-top:10px;
    padding-top:20px;
  }
  .item-image {
    width: 150px;
    height: 150px;
    margin-bottom:15px;
  }
  .price-box {
    flex-direction: column;
  }
  .price-card {
    width: 100%;
  }
}

@media only screen and (max-width: 480px) {
  .order-summary {
    padding: 5px;
  }
 
  .price-box {
    font-size: 16px;
  }
}

.btn-download-invoice {
  background-color: #00698f;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-download-invoice:hover {
  background-color: #00537a;
}

.btn-download-invoice svg {
  margin-right: 10px;
  vertical-align: middle;
}

.btn-download-invoice:active {
  transform: scale(0.9);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.minute-hand{transform-origin:center;animation:rotate-minute 5s linear infinite;}
.hour-hand{transform-origin:center;animation:rotate-hour 30s linear infinite;}
.clock{animation:rotate-clock 10s linear infinite, bounce-clock 5s ease-in-out infinite;}
@keyframes rotate-minute {
    from{transform:rotate(0deg);}
    to{transform:rotate(360deg);}}
@keyframes rotate-hour{
    from{transform:rotate(0deg);}
    to{transform: rotate(360deg);}
}
@keyframes rotate-clock {
    from{transform:rotate(0deg);}
    to{transform:rotate(360deg);}
}
@keyframes bounce-clock {
    0%, 90%{transform:scale(1);}
    95%{transform: scale(1.1);}
    100%{transform: scale(1);}
}
</style>
<div class="margen_pagina">
	<div class="head_vista_compra">
		<div class="columna" style="text-align:left;">
			<span onclick="goBack()" class="button_back">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
				    <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg> Atras
			</span>
		</div>
	</div>
	<?php if ($wo['purchase']['estado_venta']!=0): ?>
		<div class="info_vendedor container">
			<div class="columna left">
				<svg viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" style="width: 100%;max-width:100px; height: auto;">
				  <!-- Círculo de fondo -->
				  <circle cx="75" cy="75" r="75" fill="lightgray" />
				  
				  <!-- Imagen dentro del círculo -->
				  <clipPath id="circleView">
				    <circle cx="75" cy="75" r="75" />
				  </clipPath>
				  
				  <image 
				    x="0" 
				    y="0" 
				    width="150" 
				    height="150" 
				    xlink:href="<?php echo $wo['vendedor']['avatar'] ?>" 
				    clip-path="url(#circleView)" 
				    preserveAspectRatio="xMidYMid slice" 
				  />
				</svg>

			</div>
			<div class="columna right">
				<span><strong>VENDEDOR</strong></span>
				<span><strong>Nombre: </strong> <?php echo $wo['vendedor']['name'] ?></span>
				<span><strong>Email: </strong> <?php echo $wo['vendedor']['email'] ?></span>
				<span><strong>Sucursal: </strong> <?php echo $wo['sucursal_entrega']['nombre'] ?></span>
			</div>
		</div>
		<br><br>
	<?php endif ?>
	<div class="informacion_delivery">
		<div class="purchase-status">
			<div class="steps">
			  	<?php if ($wo['purchase']['estado_venta']==0): ?>
			  		<div class="step pending active" data-estado="1" style="width:100%!important;">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="100" height="100" style="width:50px!important;height:50px!important;" color="currentColor" fill="none" class="clock">
						    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"></circle>
						    <!-- Minuto -->
						    <path class="minute-hand" d="M12 12L12 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
						    <!-- Hora -->
						    <path class="hour-hand" d="M12 12L12 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
				      	<p><?php echo $wo['estadodeventa']['estado_ventas'];?></p>
				    </div>
			  	<?php else: ?>
				    <div class="step pending" data-estado="1">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
				    		<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
				    		<path d="M9.5 9.5L12.9999 12.9996M16 8L11 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
				      <p>Recibimos tu pedido</p>
				    </div>
				    <div class="step in-transit " data-estado="2">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
						    <path d="M12 22C11.1818 22 10.4002 21.6754 8.83693 21.0262C4.94564 19.4101 3 18.6021 3 17.2429V7.74463M12 22C12.8182 22 13.5998 21.6754 15.1631 21.0262C19.0544 19.4101 21 18.6021 21 17.2429V7.74463M12 22V12.1687M3 7.74463C3 8.3485 3.80157 8.72983 5.40472 9.49248L8.32592 10.8822C10.1288 11.7399 11.0303 12.1687 12 12.1687M3 7.74463C3 7.14076 3.80157 6.75944 5.40472 5.99678L7.5 5M21 7.74463C21 8.3485 20.1984 8.72983 18.5953 9.49248L15.6741 10.8822C13.8712 11.7399 12.9697 12.1687 12 12.1687M21 7.74463C21 7.14076 20.1984 6.75944 18.5953 5.99678L16.5 5M6 13.1518L8 14.135" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M12.0037 2L12.0037 8.99995M12.0037 8.99995C12.2668 9.00351 12.5263 8.81972 12.7178 8.59534L14 7.06174M12.0037 8.99995C11.7499 8.99652 11.4929 8.81368 11.2897 8.59534L10 7.06174" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
						</svg>
				      <p>Pedido aceptado</p>
				    </div>
				    <div class="step delivered" data-estado="3">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
						    <path d="M11 22C10.1818 22 9.40019 21.6698 7.83693 21.0095C3.94564 19.3657 2 18.5438 2 17.1613C2 16.7742 2 10.0645 2 7M11 22L11 11.3548M11 22C11.3404 22 11.6463 21.9428 12 21.8285M20 7V11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M18 18.0005L18.9056 17.0949M22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22C20.2091 22 22 20.2091 22 18Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M7.32592 9.69138L4.40472 8.27785C2.80157 7.5021 2 7.11423 2 6.5C2 5.88577 2.80157 5.4979 4.40472 4.72215L7.32592 3.30862C9.12883 2.43621 10.0303 2 11 2C11.9697 2 12.8712 2.4362 14.6741 3.30862L17.5953 4.72215C19.1984 5.4979 20 5.88577 20 6.5C20 7.11423 19.1984 7.5021 17.5953 8.27785L14.6741 9.69138C12.8712 10.5638 11.9697 11 11 11C10.0303 11 9.12883 10.5638 7.32592 9.69138Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M5 12L7 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M16 4L6 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
				      <p>Preparando tu pedido</p>
				    </div>
				    <div class="step delivered" data-estado="4">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
						    <path d="M21 7V12M3 7C3 10.0645 3 16.7742 3 17.1613C3 18.5438 4.94564 19.3657 8.83693 21.0095C10.4002 21.6698 11.1818 22 12 22L12 11.3548" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M15 19C15 19 15.875 19 16.75 21C16.75 21 19.5294 16 22 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M8.32592 9.69138L5.40472 8.27785C3.80157 7.5021 3 7.11423 3 6.5C3 5.88577 3.80157 5.4979 5.40472 4.72215L8.32592 3.30862C10.1288 2.43621 11.0303 2 12 2C12.9697 2 13.8712 2.4362 15.6741 3.30862L18.5953 4.72215C20.1984 5.4979 21 5.88577 21 6.5C21 7.11423 20.1984 7.5021 18.5953 8.27785L15.6741 9.69138C13.8712 10.5638 12.9697 11 12 11C11.0303 11 10.1288 10.5638 8.32592 9.69138Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M6 12L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						    <path d="M17 4L7 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
				      <p>Pedido esta listo</p>
				    </div>
				    <div class="step completed" data-estado="5">
				      	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none">
						    <path d="M18.9905 19H19M18.9905 19C18.3678 19.6175 17.2393 19.4637 16.4479 19.4637C15.4765 19.4637 15.0087 19.6537 14.3154 20.347C13.7251 20.9374 12.9337 22 12 22C11.0663 22 10.2749 20.9374 9.68457 20.347C8.99128 19.6537 8.52349 19.4637 7.55206 19.4637C6.76068 19.4637 5.63218 19.6175 5.00949 19C4.38181 18.3776 4.53628 17.2444 4.53628 16.4479C4.53628 15.4414 4.31616 14.9786 3.59938 14.2618C2.53314 13.1956 2.00002 12.6624 2 12C2.00001 11.3375 2.53312 10.8044 3.59935 9.73817C4.2392 9.09832 4.53628 8.46428 4.53628 7.55206C4.53628 6.76065 4.38249 5.63214 5 5.00944C5.62243 4.38178 6.7556 4.53626 7.55208 4.53626C8.46427 4.53626 9.09832 4.2392 9.73815 3.59937C10.8044 2.53312 11.3375 2 12 2C12.6625 2 13.1956 2.53312 14.2618 3.59937C14.9015 4.23907 15.5355 4.53626 16.4479 4.53626C17.2393 4.53626 18.3679 4.38247 18.9906 5C19.6182 5.62243 19.4637 6.75559 19.4637 7.55206C19.4637 8.55858 19.6839 9.02137 20.4006 9.73817C21.4669 10.8044 22 11.3375 22 12C22 12.6624 21.4669 13.1956 20.4006 14.2618C19.6838 14.9786 19.4637 15.4414 19.4637 16.4479C19.4637 17.2444 19.6182 18.3776 18.9905 19Z" stroke="currentColor" stroke-width="1.5" />
						    <path d="M9 12.8929C9 12.8929 10.2 13.5447 10.8 14.5C10.8 14.5 12.6 10.75 15 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
				      	<p>Completado</p>
				    </div>
			    <?php endif ?>
			</div>
		    <?php if ($wo['purchase']['estado_venta']!=0): ?>
		    	<br>
				<p><?php echo $wo['estadodeventa']['texto_venta']; ?></p>
		  	<?php endif ?>
		</div>

		<?php if ($wo['purchase']['estado_venta']!=0): ?>
			<script type="text/javascript">
				const steps = document.querySelectorAll('.step');

				function updateProgress(currentStep) {
				  steps.forEach((step, index) => {
				    if (index + 1 < currentStep) {
				      step.classList.add('completed');
				      step.classList.remove('active');
				    } else if (index + 1 === currentStep) {
				      step.classList.add('active');
				      step.classList.remove('completed');
				    } else {
				      step.classList.remove('active');
				      step.classList.remove('completed');
				    }
				  });
				}
				let currentStep = <?=$wo['estadodeventa']['step'] ?>;
				updateProgress(currentStep);
			</script>
	  	<?php endif ?>
	</div>

	<?php if ($wo['sucursal_id']!=0): ?>
		<div class="contain_datos_entrega">
			<div class="datas_entr">
				<h4>Sucursal de entrega</h4>
				<div class="sucursal_datas">
					<p class="addrs_name"><?php echo($wo['sucursal_entrega']['nombre']) ?></p>
					<p class="addrs_phone"><?php echo($wo['sucursal_entrega']['phone']) ?></p>
					<p class="addrs_street"><?php echo($wo['sucursal_entrega']['direccion']) ?></p>
					<p class="addrs_street"><?php echo($wo['sucursal_entrega']['ciudad']) ?><br><?php echo($wo['sucursal_entrega']['pais']) ?></p>
					<p class="addrs_count"><?php echo($wo['sucursal_entrega']['referencia']) ?></p>
				</div>
			</div>
			<div class="datas_entr">
				<svg viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg" style="width: 100%; max-width: 100px; height: auto;">
					<!-- Rectángulo de fondo con bordes redondeados -->
					<rect x="0" y="0" width="150" height="150" rx="20" ry="20" fill="lightgray" />
					<!-- Imagen dentro del rectángulo redondeado -->
					<clipPath id="rectView">
						<rect x="0" y="0" width="150" height="150" rx="20" ry="20" />
					</clipPath>

					<image 
					x="0" 
					y="0" 
					width="150" 
					height="150" 
					xlink:href="<?php echo lui_GetMedia($wo['sucursal_entrega']['foto']) ?>" 
					clip-path="url(#rectView)" 
					preserveAspectRatio="xMidYMid slice" 
					/>
				</svg>

			</div>
		</div>
	<?php elseif($wo['address']!=0): ?>
		<div class="address_book panel wo_order_detail_widget">
			<h4><?php echo $wo['lang']['delivery_address'];?></h4>
			<div class="address_book_innr">
				<div class="address_box">
					<p class="addrs_name"><?php echo($wo['address']['nombre']) ?></p>
					<p class="addrs_phone"><?php echo($wo['address']['phone']) ?></p>
					<p class="addrs_street"><?php echo($wo['address']['address']) ?></p>
					<p class="addrs_street"><?php echo($wo['address']['city']) ?><br><?php echo($wo['address']['country']) ?></p>
					<p class="addrs_count"><?php echo($wo['address']['zip']) ?></p>
				</div>
			</div>
		</div>
	<?php endif ?>
	<br><br>

	<div class="order-summary">
		<div class="order-header">
			<h2>Resumen de tu compra</h2>
		</div>
		<div class="order-items">
			<?php echo $wo['html']; ?>
		</div>
	</div>

	<div class="payment-methods">
		<h2>Resumen de Pagos</h2>
		<div class="payment-methods-grid">
			<?php foreach ($wo['registros_caja'] as $registro): ?>
			    <?php 
			        $simboymoneda = array_search($registro['moneda'], array_column($wo['currencies'], 'text'));
			        $simbolo = (!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $registro['moneda'];
			        $simbolo = $simbolo.' ';
			        $metodo = json_decode($registro['metodo'], true);
			        $totalMonto = isset($metodo['totalMonto']) ? number_format($metodo['totalMonto'], 2, '.', ',') : '0.00';
			        $metodo_texto = '';
			        foreach ($metodo as $key => $value) {
			            if ($key !== 'totalMonto' && $key !== 'hasSelected') {
			              $lastUnderscorePos = strrpos($key, '_');
			              if ($lastUnderscorePos !== false) {
			                $nombre_metodo = substr($key, 0, $lastUnderscorePos);
			              } else {
			                $nombre_metodo = $key;
			              }
			              $nombre_metodo = ucfirst(str_replace('_', ' ', $nombre_metodo));
			              $metodo_texto .= '<li>'.$nombre_metodo . ': ' . $simbolo . number_format($value, 2, '.', ',') . '</li>';
			            }
			        }
			    ?>
			    <!-- Totales -->
			    <div class="payment-methods-box">
			    	<h3><?php echo $registro['moneda']; ?></h3>
			    	<ul>
			    		<?php echo $metodo_texto; ?>
			    	</ul>
			    	<p>Total: <?php echo $simbolo.$totalMonto; ?></p>
			    </div>
			<?php endforeach ?>
		</div>
	</div>
	<br>
	<button type="button" class="btn btn-download-invoice" onclick="DownloadPurchasedzz('<?php echo $wo['hash_id'] ?>','order')">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-download">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
			<path d="M7 11l5 5l5 -5" />
			<path d="M12 4l0 12" />
			<animateTransform attributeName="transform" type="scale" from="1" to="1.2" dur="1s" repeatCount="indefinite" />
		</svg>
		Descargar documento
	</button>
</div>


<a href="<?php echo lui_SeoLink('index.php?link1=customer_order&id=' . $wo['hash_id']); ?>" data-ajax="?link1=customer_order&id=<?php echo $wo['hash_id']; ?>" id="load_order"></a>

<div class="modal fade sun_modal" id="write_product_review" tabindex="-1" role="dialog" aria-labelledby="refund_order" aria-hidden="true" data-id="0">
	<div class="modal-dialog mat_box wow_mat_mdl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['write_review'] ?></h4>
			</div>
			<form id="write_review_form" method="post">
				<div class="modal-body">
					<div class="customer_order_write_review_alert"></div>
					<div class="star_rating">
						<input type="radio" id="5-stars" name="rating" value="5">
						<label for="5-stars" class="customer_order_star">★</label>
						<input type="radio" id="4-stars" name="rating" value="4">
						<label for="4-stars" class="customer_order_star">★</label>
						<input type="radio" id="3-stars" name="rating" value="3">
						<label for="3-stars" class="customer_order_star">★</label>
						<input type="radio" id="2-stars" name="rating" value="2">
						<label for="2-stars" class="customer_order_star">★</label>
						<input type="radio" id="1-star" name="rating" value="1">
						<label for="1-star" class="customer_order_star">★</label>
					</div>
					<div class="wow_form_fields mb-0">
						<span for="photos"><?php echo $wo['lang']['photos']; ?></span>
					</div>
					<div class="wow_prod_imgs" style="margin: 0;">
						<div class="upload-product-image" onclick="document.getElementById('p_photos').click(); return false">
							<div class="upload-image-content">
								<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
							</div>
						</div>
						<div id="productimage-holder"></div>
					</div>
					<div class="hidden">
						<input type="file" id="p_photos" accept="image/x-png, image/jpeg" multiple="multiple" name="images[]">
					</div>
					<div class="wow_form_fields">
						<span class="form-label"><?php echo $wo['lang']['review']; ?></span>
						<textarea class="form-control" placeholder="<?php echo $wo['lang']['describe_your_review']; ?>" rows="3" name="review"></textarea>
					</div>
				</div>
				<input name="product_id" class="form-control" type="hidden" id="write_product_review_product_id">
				<div class="modal-footer">
					<button type="submit" class="btn btn-main btn-mat write_review_btn_submit" id="write_review_button"><?php echo $wo['lang']['submit']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#p_photos").on('change', function() {
		//Get count of selected files
		var product_countFiles = $(this)[0].files.length;
		var product_imgPath = $(this)[0].value;
		var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
		var product_image_holder = $("#productimage-holder");
		product_image_holder.find('img').remove();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				//loop for each file selected for uploaded.
				for (var i = 0; i < product_countFiles; i++) 
				{
				var product_reader = new FileReader();
				product_reader.onload = function(e) {
					$("<img />", {
						"src": e.target.result,
						"class": "thumb-image"
					}).appendTo(product_image_holder);
					}
					product_image_holder.show();
					product_reader.readAsDataURL($(this)[0].files[i]);
				}
			} else {
				product_image_holder.html("<p>This browser does not support FileReader.</p>");
			}
		}
	});
$(document).ready(function() { 
	$('#write_review_form').ajaxForm({ 
    	url: Wo_Ajax_Requests_File() + '?f=products&s=review&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
        	$('#write_review_button').html("<?php echo($wo['lang']['please_wait']) ?>");
		    $('#write_review_button').attr('disabled', "true");
        }, 
        success: function (data) {
        	$('#write_review_button').removeAttr('disabled');
			$('#write_review_button').text("<?php echo($wo['lang']['submit']) ?>");
        	if (data.status == 200) {
        		<?php if ($wo['config']['node_socket_flow'] == 1) { ?>
		            socket.emit("main_notification", {user_id: _getCookie("user_id"), type: "added",to_id: data.recipient_id });
		        <?php } ?>
        		$('.customer_order_write_review_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
				setTimeout(function () {
					$('#write_product_review').modal('hide');
	            	$('.customer_order_write_review_alert').html("");
	            	setTimeout(function () {
		            	$('#load_order').click();
		            },200);
	            },2000);
        	}
        	else{
        		$('.customer_order_write_review_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-check'></i> "+data.message+"</div>");
				setTimeout(function () {
	            	$('.customer_order_write_review_alert').html("");
	            },2000);

        	}
        }
    });
});
</script>