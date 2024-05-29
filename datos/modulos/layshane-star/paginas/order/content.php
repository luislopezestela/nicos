<?php
$estadodeventa = estadodeventaVendedor($wo['ventas']->estado_venta);
?>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>

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
						</span> Pedido: #<?php echo $wo['ventas']->hash_id;?>
		        	</div>
		        </div>
		    </div>
		    <br><br>
		    <section>
		    	<a id="pedido_abiertos_bs" hidden="hidden" href="<?php echo lui_SeoLink('index.php?link1=order&id='.$wo['ventas']->hash_id); ?>" data-ajax="<?php echo ('?link1=order&id='.$wo['ventas']->hash_id); ?>">Pedido actual</a>
				
<style type="text/css">
	.comprobante {
    display: flex;
    flex-wrap: wrap;
    background: #FFF;
    transition: all .5s;
    width: 100%;
    height: initial;
    min-height: initial;
    border: ;
}
.comprobante_number {
    width: 30%;
    position: relative;
    background: #fff;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    padding: 5px;
    align-self: center;
}
.comprobante_number .numdoc_line {
    margin-bottom: 0;
}
	.typenumber_nop_viewp{text-align: center;
    outline: none;
    border: 2px solid #ddd;
    padding: 10px;
    width: 100%;user-select:none;
    font-size: 16px;}
    .datos_proveedor_box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 5px;
    border-radius: 8px;
    border: 2px solid #ccc;
    margin: 5px;
    width: calc(70% - 20px);
    user-select: none;
    cursor: pointer;
}
.datos_proveedor_box h5, .datos_proveedor_box p {
    display: block;
    width: 100%;
    text-align: center;
    margin: 0;
}
.address_data_proveedor {
    display: block;
    width: 100%;
    margin: 5px;
    border: 1px dashed #ccc;
    cursor: pointer;
    padding: 10px;
}
.date_comprovante_compra {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    margin: 5px;
    border: 1px dashed #ccc;
    cursor: pointer;
    position: relative;
    padding: 10px;
}
.contenido_guia_remicion_con {
    width: 100%;
    position: relative;
    padding: 7px;
    padding-top: 0;
}
.disabled_provedores_list {
    height: 0;
    overflow: hidden;
    padding: 0;
    margin: 0;
}
.contenido_guia_remicion_con input {
    width: 100%;
    max-width: 300px;
    padding: 10px;
    border: 1px dashed #888;
    outline: none;
    margin-bottom: 20px;
}
</style>
<style type="text/css">
	
.con_layshane_tbles{
	margin-top:30px;
  display:block;
  height:100%;
  width:100%;
  color: #252a3b;
  background-color: #f8f8f8;
  overflow-x:auto;
}
.con_layshane_tbles .container{
	white-space:nowrap;
}
.table{
  width:100%;
  max-width:100%;
  margin-bottom:20px;
}
table{
  background-color: transparent;
}
table{
  border-spacing:0;
  border-collapse:collapse;
}
.row--top-20{
  margin-top:20px;
}
.table__th{
  color:#9eabb4;
  font-weight:500;
  font-size:12px;
  text-transform:uppercase;
  cursor:pointer;
  border:0 !important;
  padding:15px 8px !important;
  text-align:start;
}
.table-row{
  border-bottom:1px solid #e4e9ea;
  background-color:#fff;
}
.table__th:hover{
  color:#01b9d1;
}
.table--select-all{
  width:18px;
  height:18px;
  padding:0 !important;
  border-radius:50%;
  border:2px solid #becad2;
}
.table-row__td{
  padding:12px 8px !important;
  vertical-align:middle !important;
  color:#53646f;
  font-size:13px;
  font-weight: 400;
  position:relative;
  line-height: 18px !important;
  border:0 !important;
}
.table-row__img{
  width:36px;
  height:36px;
  display:inline-block;
  border-radius:50%;
  background-position:center;
  background-size:cover;
  background-repeat:no-repeat;
  vertical-align:middle;
}
.table-row__info{
  display:inline-block;
  padding-left:12px;
  vertical-align:middle;
}
.table-row__name{
  color:#53646f;
  font-size:14px;
  font-weight:400;
  line-height:18px;
  margin-bottom:0px;
}
.table-row__small{
  color:#9eabb4;
  font-weight:300;
  font-size:12px;
}
.table-row__policy{
  color:#53646f;
  font-size:13px;
  font-weight: 400;
  line-height: 18px;
  margin-bottom: 0px;
}
.table-row__p-status{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.table-row__status{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.table-row__progress{
  margin-bottom:0;
  font-size:13px;
  vertical-align:middle;
  display:inline-block;
  color:#9eabb4;
}
.status:before{
  content:'';
  margin-bottom:0;
  width:9px;
  height:9px;
  display:inline-block;
  margin-right:7px;
  border-radius:50%; 
}
.status--red:before{background-color:#e36767;}
.status--red{color:#e36767;}
.status--blue:before{background-color:#3fd2ea;}
.status--blue{color:#3fd2ea;}
.status--yellow:before{background-color:#ecce4e;}
.status--yellow{color:#ecce4e;}
.status--green{color:#6cdb56;}
.status--green:before{background-color:#6cdb56;}
.status--grey{color:#9eabb4;}
.status--grey:before{background-color:#9eabb4;}
.table-row--overdue{width:3px;background-color:#e36767;display:inline-block;
  position:absolute;height:calc(100% - 24px);top:50%;
  left:0;
  transform: translateY(-50%);
}
.table-row--overdue_yellow{width:3px;background-color:#e36767;display:inline-block;
  position:absolute;height:calc(100% - 24px);top:50%;
  left:0;
  transform: translateY(-50%);
}
.table-row--overdue_green{width:3px;background-color:#2ecc71;display:inline-block;
  position:absolute;height:calc(100% - 24px);top:50%;
  left:0;
  transform: translateY(-50%);
}
.table-row--overdue_gris {
    width: 3px;
    background-color: #a9bbb1;
    display: inline-block;
    position: absolute;
    height: calc(100% - 24px);
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}
.table-row__edit{
  width:46px;
  padding:3px 10px;
  display:inline-block;
  background-color:#daf3f8;
  border-radius:18px;
  vertical-align:middle;
  margin-right:10px;
  cursor:pointer;
}
.table-row__bin{
  width:16px;
  display:inline-block;
  vertical-align:middle;
  cursor:pointer;
}
.table-row--yellow{background-color:#ffa0004a;}
.table-row--red{background-color:#fff2f2;}
@media screen and (max-width: 991px){
  .con_layshane_tbles{overflow:initial;}
  .con_layshane_tbles .container{white-space:initial;}
  .table__thead{display:none;}
  .table-row{
    display:inline-block;
    border:0;
    background-color:#fff;
    width:calc(33.3% - 13px);
    margin-right:10px;
    margin-bottom:10px;
  }
  .table-row__img{
    width:42px;
    height:42px;
    margin-bottom:10px;
  }
  .table-row__td:before{
    content:attr(data-column);
    color:#9eabb4;
    font-weight:500;
    font-size:12px;
    text-transform:uppercase;
    display:block;
  }
  .table-row__info{
    display:block;
    padding-left:0;
  }
  .table-row__td{
    display:block;
    text-align:center;
    padding:8px !important;
  }
  .table-row--red{background-color:#fff2f2;}
  .table-row--overdue{
  	width:100%;
    top:0;
    left:0;
    transform:translateY(0%);
    height:4px;
  }
}
@media screen and (max-width: 680px){
  .table-row{width: calc(50% - 13px);}
}
@media screen and (max-width: 480px){
  .table-row{width: 100%;}
}
.table__select-row{
    appearence: none;
    -moz-appearance: none;
    -o-appearance: none;
    -webkit-appearance: none;
    width:17px;
    height:17px;
    margin:0 0 0 5px !important;
    vertical-align:middle;border:2px solid #beccd7;border-radius: 50%;cursor:pointer;
}
.table__select-row:hover{border-color:#01b9d1;}
.table__select-row:checked{
    background-image: url(data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDI2IDI2IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyNiAyNiIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCI+CiAgPHBhdGggZD0ibS4zLDE0Yy0wLjItMC4yLTAuMy0wLjUtMC4zLTAuN3MwLjEtMC41IDAuMy0wLjdsMS40LTEuNGMwLjQtMC40IDEtMC40IDEuNCwwbC4xLC4xIDUuNSw1LjljMC4yLDAuMiAwLjUsMC4yIDAuNywwbDEzLjQtMTMuOWgwLjF2LTguODgxNzhlLTE2YzAuNC0wLjQgMS0wLjQgMS40LDBsMS40LDEuNGMwLjQsMC40IDAuNCwxIDAsMS40bDAsMC0xNiwxNi42Yy0wLjIsMC4yLTAuNCwwLjMtMC43LDAuMy0wLjMsMC0wLjUtMC4xLTAuNy0wLjNsLTcuOC04LjQtLjItLjN6IiBmaWxsPSIjMDFiOWQxIi8+Cjwvc3ZnPgo=);
    background-position: center;
    background-size: 7px;
    background-repeat: no-repeat;
    border-color: #01b9d1;
}
.conten_footer_tabla_layshane{display:grid;flex-wrap:wrap;width:100%;gap:1.3rem;grid-template-columns:repeat(auto-fit, minmax(min(16rem, 100%), 1fr));padding:10px;}
.min_info_layshane_left{display:flex;justify-content:flex-start;}
.controls_tabla_layshane{display:flex;justify-content:flex-end;flex-wrap:wrap;gap:1rem;}
.dyninput_garants{width:100%;max-width:50px;border:0;padding:5px;border-bottom:1px solid #F1F1F1;outline:none;}
.dyninput_garantsn{border:0;padding:5px;outline:none;cursor:pointer;}
.text_justificacion_anular_compra{display: block;
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 2px #ccc dashed;outline:none;transition:all .5s;}
.text_justificacion_anular_compra:focus{border-color:#5989c8;}

</style>
<div class="comprobante">
	<div class="comprobante_number">
		<h2 class="numdoc_line"><?=$wo['documento']->documento.'-'.$wo['documento']->num_doc;?></h2>
		<span class="typenumber_nop_viewp"><?=$wo['numero_documento_a'];?></span>
	</div>

	<div class="datos_proveedor_box" style="user-select:none;">
		<h5>LAYSHANE PERU E.I.R.L</h5>
		<p>R.U.C. 20611292954</p>
	</div>

	<div class="address_data_proveedor" style="user-select:none;">
		<?php $tienda_sucursal_entrega = $db->where('id',$wo['documento']->sucursal_entrega)->getOne("lui_sucursales"); ?>
		<?php if($tienda_sucursal_entrega): ?>
			<span><strong>Sucursal de entrega:</strong> <?=$tienda_sucursal_entrega->nombre;?> </span><p><?=$tienda_sucursal_entrega->direccion;?>,<?=$tienda_sucursal_entrega->ciudad;?>,<?=$tienda_sucursal_entrega->pais;?>,<?=$tienda_sucursal_entrega->referencia;?></p>
		<?php endif ?>
	</div>

	<div class="address_data_proveedor" style="user-select:none;">
		<?php if($wo['documento']->donde_paga==1): ?>
			<span><strong>Forma de pago:</strong> El pago se realizara en tienda. </span>
		<?php endif ?>
	</div>
	<div class="address_data_proveedor" style="user-select:none;">
		<?php if($wo['documento']->pago==0): ?>
			<span><strong>Pago:</strong> Pendiente. </span>
		<?php endif ?>
	</div>

	<div class="date_comprovante_compra" style="user-select:none;">
		<span style="width:20%;">Fecha de compra </span>
		<span><?=date('Y-m-d', strtotime($wo['documento']->fecha)) ?></span>
	</div>
	<style type="text/css">
		.contenido_currensy_order{display:flex;padding:10px;position:relative;width:100%;flex-wrap:wrap;gap:0.5em;margin-bottom:2rem;}
		.contenido_currensy_order span{display:block;width:100%;user-select:none;}
		.selected_curremcy_order{display:block;position:relative;width:100%;max-width:200px;padding:10px;border:1px solid #ccc;border-radius:3px;outline:none;cursor:pointer;}
	</style>
	<div class="contenido_currensy_order">
		<span style="color:<?=$estadodeventa['background']; ?>"><?php echo $wo['lang']['status']; ?></span>
		<span class="selected_curremcy_order" style="background-color:<?=$estadodeventa['background']; ?>;color:#fff"><?=$estadodeventa['texto_venta']; ?></span>
	</div>
	<style type="text/css">
		.opcione_contenidos_bt{display:flex;gap:1rem;flex-wrap:wrap;padding:10px;}
		.boton_de_venta{
		  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		  width: 320px;
		  padding: 12px;
		  display: flex;
		  flex-direction: row;
		  align-items: center;
		  justify-content: start;
		  border-radius: 8px;
		  box-shadow: 0px 0px 5px -3px #111;
		  cursor:pointer;
		  user-select:none;
		}

		.boton_de_venta_icon {
		  width: 20px;
		  height: 20px;
		  transform: translateY(-2px);
		  margin-right: 8px;
		  color:#fff;
		}

		.boton_de_venta_title {
		  font-weight: 500;
		  font-size: 14px;
		  color: #fff;
		  text-transform:uppercase;
		}

		.boton_de_venta_close {
		  width: 20px;
		  height: 20px;
		  cursor: pointer;
		  margin-left: auto;
		  color: #fff;
		}
	</style>

	<div class="opcione_contenidos_bt">
		<?php if ($wo['ventas']->estado_venta==2): ?>
			<a class="boton_de_venta" style="background-color:<?=$estadodeventa['boton_fondo']; ?>" onClick="changue_order_pages_b('<?=$wo['ventas']->hash_id;?>','<?=$estadodeventa['boton_action']; ?>')" href="<?=lui_SeoLink('index.php?link1=pos');?>" data-ajax="<?=('?link1=pos'); ?>">
			    <div class="boton_de_venta_icon"><?=$estadodeventa['icono_uno']; ?></div>
			    <div class="boton_de_venta_title"><?=$estadodeventa['boton_texto']; ?></div>
			    <div class="boton_de_venta_close"><?=$estadodeventa['icono_dos']; ?></div>
			</a>
		<?php elseif ($wo['ventas']->estado_venta==3): ?>
			<a href="<?=lui_SeoLink('index.php?link1=pos');?>" data-ajax="<?=('?link1=pos'); ?>" class="boton_de_venta" style="background-color:<?=$estadodeventa['boton_fondo']; ?>">
			    <div class="boton_de_venta_icon"><?=$estadodeventa['icono_uno']; ?></div>
			    <div class="boton_de_venta_title"><?=$estadodeventa['boton_texto']; ?></div>
			    <div class="boton_de_venta_close"><?=$estadodeventa['icono_dos']; ?></div>
			</a>
		<?php else: ?>
			<div class="boton_de_venta" style="background-color:<?=$estadodeventa['boton_fondo']; ?>" onClick="changue_order_pages('<?=$wo['ventas']->hash_id;?>','<?=$estadodeventa['boton_action']; ?>')">
			    <div class="boton_de_venta_icon"><?=$estadodeventa['icono_uno']; ?></div>
			    <div class="boton_de_venta_title"><?=$estadodeventa['boton_texto']; ?></div>
			    <div class="boton_de_venta_close"><?=$estadodeventa['icono_dos']; ?></div>
			</div>
		<?php endif ?>
		<?php if ($wo['ventas']->estado_venta==1): ?>
			<div class="boton_de_venta" style="background-color:#ac1c1ced;" onClick="changue_order_pages('<?=$wo['ventas']->hash_id;?>','rechazar_orden')">
			    <div class="boton_de_venta_icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="m6.72 5.66 11.62 11.62A8.25 8.25 0 0 0 6.72 5.66Zm10.56 12.68L5.66 6.72a8.25 8.25 0 0 0 11.62 11.62ZM5.105 5.106c3.807-3.808 9.98-3.808 13.788 0 3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788Z" clip-rule="evenodd" /></svg>
			    </div>
			    <div class="boton_de_venta_title">Rechazar la compra</div>
			    <div class="boton_de_venta_close"><?=$estadodeventa['icono_dos']; ?></div>
			</div>
		<?php endif ?>
	</div>

	<style type="text/css">
		.listar_productos_a_comprar{display:flex;flex-wrap:wrap;width:100%;border-radius:5px;position:relative;}
		.cont_atributes_listas_compras{display:flex;flex-wrap:wrap;gap:1rem;position:fixed;bottom:0;background-color:#FFF;width:100%;max-width:1200px;z-index:1;left:0;right:0;justify-content:center;margin:auto;border:none;border-radius:15px 15px 0 0;padding:20px;max-height: calc(100% - 120px);overflow: auto;}
		.cont_atributes_listas_compras_title{display:block;width:100%;}
		.atributes_listas_compras{display:flex;flex-direction:column;background-color:#fff;overflow:hidden;width:100%;margin:10px auto;}
		.atributes_listas_compras input[type="radio"]{display:none;}
		.atributes_listas_compras .lista_de_opciones_de_atributes label{display:flex;align-items:center;padding:20px;cursor:pointer;transition:background-color 0.3s ease-in-out;}
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
									echo $wo['html'];
									?>
								</tbody>
							</table>
						</div>
						<br>
						<style type="text/css">
							.contenido_ct_footer_document_order{display:flex;justify-content:flex-end;align-items:center;flex-wrap:wrap;width:100%;gap:1rem;}
							.cuentas_a_pagar{width:100%;max-width:400px;display:flex;flex-wrap:wrap;gap:1rem;border-radius:5px;background:#e9e9e9;}
							.cuentas_a_pagar .div_subs_contn{display:flex;flex-wrap:wrap;width:100%;justify-content:space-between;padding:10px;gap:1em;}
						</style>
						<div class="contenido_ct_footer_document_order">
							<?php echo $wo['htmlprices']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




			</section>
			<div class="clear"></div>
		</div>
	</div>
</div>
