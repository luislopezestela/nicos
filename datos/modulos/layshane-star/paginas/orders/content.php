<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
/* Estilos previamente definidos */
.wo_settings_page{background:transparent;box-shadow:initial;}
.containers {
    display:grid;
    gap:1rem;
}

.pedido {
	break-inside: avoid; /* Evita que las cartas se dividan entre columnas */
    margin-bottom: 20px;
	border-bottom:2px solid #3498db;
	border-left:1px solid rgb(43 133 193 / 15%);
	border-right:1px solid rgb(43 133 193 / 15%);
	cursor:pointer;
    background-color:rgb(250 250 250 / 100%);
    border-radius: 10px;
    padding: 30px;
    width: 100%;
    transition:all .1s;
    user-select:none;
    display:grid;
    grid-template-columns:1fr;
	border-top:2px solid transparent;
}
.pedido:hover{
	border-left:1px solid rgb(43 133 193 / 59%);
	border-right:1px solid rgb(43 133 193 / 59%);
}
.pedido:active{
	border-top:2px solid #3498db;
	animation: none;
}

.pedido-header h1 {
    color: #333;
    font-size: 20px;
    text-transform:uppercase;
    margin-bottom: 10px;
}

.pedido-header p {
    color: #555;
    font-size: 16px;
    margin-bottom: 5px;
}

.codigo {
    background-color: #3498db;
    border-radius: 5px;
    color: #fff;
    padding: 5px 10px;
}

.pedido-items {
    border-top: 1px solid #ccc;
    margin-top: 20px;
    padding-top: 20px;
}

.producto-nombre {
    color: #333;
    font-size: 18px;
    margin-bottom: 10px;
}
.purchased_posts_load{display:block;}
.purchased_load-more button{display:block;width:100%;padding:15px 10px;margin-top:20px;}
</style>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
		<ul class="list-unstyled" style="padding-bottom:0;">
			<li class="">
				<a class="btn btn-default seleccionar_menu_laysh" style="background-color:#fff;">Menu</a>
			</li>
		</ul>
	</div>

	<br>
	<div class="wo_settings_page loader_page_content">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
		        <div class="wo_page_hdng pag_neg_padd pag_alone">
		        	<div class="wo_page_hdng_innr big_size">
		        		<span style="color:#3498db;">
							<svg xmlns="http://www.w3.org/2000/svg" style="fill:none;" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" /><path d="M9 13h-2" /><path d="M13 10h-6" /><path d="M11 7h-4" /></svg>
						</span> <?php echo $wo['lang']['orders'] ?>
		        	</div>
		        </div>
		    </div>
		    <br><br>
		    <section>
		    	<!---<div class="page-margin wow_content">
					<div class="wo_page_hdng pag_neg_padd pag_alone">
						<div class="wo_page_hdng_menu">
							<ul class="list-unstyled">
								<?php if ($wo['config']['can_use_market']) { ?>
								<li><a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products"><?php echo $wo['lang']['my_products'] ?></a></li>
								<?php } ?>
								<?php if ($wo['config']['store_system'] == 'on') { ?>
									<li><a href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased"><?php echo $wo['lang']['purchased'] ?></a></li>
									<li class="active"><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>--->

				<div class="my_purchased_content my_purchased_contenidos">
					<?php if (!empty($wo['orders']) && count($wo['orders']) > 0): ?>
						<div class="containers">
							<?php echo($wo['html']); ?>
						</div>
						<?php if (count($wo['orders']) == 3){ ?>
							<div class="purchased_posts_load">
								<div class="purchased_load-more">
									<button class="btn btn-default text-center pointer" onclick="Wo_LoadOrderss();"><?php echo $wo['lang']['load_more']; ?></button>
								</div>
							</div>
							<?php } ?>
					<?php else: ?>
						<?php echo($wo['html']); ?>
					<?php endif; ?>
				</div>
		    </section>
		</div>
	</div>
</div>

<script type="text/javascript">
	recpoll()
</script>