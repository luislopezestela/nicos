<?php
$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;

$link = '';
if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(`numero_documento` and `num_doc` LIKE '%$filter_keyword%')";
  $db->where($sql);
}
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'));
if(!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".lui_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$posts = $db->where('completado','1')->where('sucursal',$wo['user']['sucursal'])->objectbuilder()->paginate('compras', $page);
if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_SeoLink('compras'));
  exit();
}
$comprapendiente_sear = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('sucursal',$wo['user']['sucursal'])->getOne("compras");
$wo['proveedores'] = lui_GetProveedoresTypes('');
$palabra_lang_search = $wo['lang']['search'];
$buscar_letras = str_split($palabra_lang_search);
?>

<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<style type="text/css">
body{background-color:#F0F2FD;}
</style>
<style type="text/css">
.chechedcaja22{appearance:none;width:20px;height:20px;border:2px solid var(--boton-fondo);border-radius:5px;background-color:transparent;display:inline-block;position:relative;margin-right:10px;cursor:pointer;}
.chechedcaja22:before {content:"";background-color:var(--boton-fondo);display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%) scale(0);width:10px;height:10px;border-radius:3px;transition:all 0.3s ease-in-out;}
.chechedcaja22:checked:before{transform: translate(-50%, -50%) scale(1);}
.chechedcaja22_label{font-size: 18px;cursor:pointer;user-select:none;display:flex;align-items:center;}
.order_for_credid{padding:10px;}
</style>
<style type="text/css">
.agregar_compras_en_imventario{width:100%;position:relative;padding:20px;}
.opciones_para_agregar_compra{display:flex;flex-wrap:wrap;width:100%;}
.agregar_compra_comprobante{display:flex;margin:5px;width:calc(100% / 3 - 10px);}
.agregar_compra_comprobante label{display:flex;width:100%;height:100%;cursor:pointer;user-select:none;padding:10px;border-radius:4px;border:3px solid #ccc;background:#fff;}
.agregar_compra_comprobante input[type="radio"]{display:none;}
.agregar_compra_comprobante input[type="radio"]:checked ~ label{border:3px solid #2ecc71;}
@media screen and (max-width: 450px){
	.agregar_compra_comprobante{width:calc(100% / 1 - 10px);}
}
.contenido_datos_new_compra{display:flex;flex-wrap:wrap;position:relative;padding:20px;width:100%;}
.contenido_datos_new_compra .document_title{display:block;width:100%;padding:6px;background:#FAFAFA;}
.comprobante{display:flex;flex-wrap:wrap;background:#FFF;transition:all .5s;width:100%;height:initial;min-height:initial;border:}
.comprobante_number{width:30%;position:relative;background:#fff;display:flex;flex-wrap:wrap; align-items:center;justify-content:center;padding:5px;align-self:center;}
.comprobante_number input{text-align:center;outline:none;border:2px solid #ddd;padding:10px;width:100%;font-size:16px}
.comprobante_number input[type=number]::-webkit-inner-spin-button, 
.comprobante_number input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}
.comprobante_number input[type=number]{-moz-appearance:textfield;}
.comprobante_number .numdoc_line{margin-bottom:0;}
.datos_proveedor_box{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;padding:5px;border-radius:8px;border:2px solid #ccc;margin:5px;width:calc(70% - 20px);user-select:none;cursor:pointer;}
.datos_proveedor_box h5,.datos_proveedor_box p{display:block;width:100%;text-align:center;margin:0;}
.proveedores_lista_caja{display:block;border-top:2px solid #dee2e6;width:100%;padding:7px;transition:all .5s;}
.listar_direcciones_del_proveedor{display:block;width:100%;padding:7px;transition:all .5s;}
.lista_proveedor{gap:0.4rem;display:flex;flex-wrap:wrap;flex-direction:column;}
.lista_proveedor label{display:block;width:100%;background:rgba(0, 0, 0, 0.05);padding:10px;position:relative;border-radius:6px;cursor:pointer;transition:all .5s;}
.lista_proveedor label p{margin-bottom:0;}
.lista_proveedor input[type="radio"]{display:none;}
.lista_proveedor input[type="radio"]:checked ~ label{background:rgba(0, 0, 0, 0.12);user-select:none;}
.disabled_provedores_list{height:0;overflow:hidden;padding:0;margin:0;}
.address_data_proveedor{display:block;width:100%;margin:5px;border:1px dashed #ccc;cursor:pointer;padding:10px;}
.date_comprovante_compra{display:flex;flex-wrap:wrap;width:100%;margin:5px;border:1px dashed #ccc;cursor:pointer;position:relative;padding:10px;}
.date_comprovante_compra input{position:relative;border:0;outline:none;width:80%}
.date_comprovante_compra label{width:20%;}
.date_comprovante_compra input[type="date"]::-webkit-calendar-picker-indicator{background:transparent;bottom:0;color:transparent;cursor:pointer;height:auto;left:0;position:absolute;right:0;top:0;width:auto;}
.incluir_guia_remicion_data{display:flex;width:100%;justify-content:flex-start;align-items:center;padding:7px;padding-bottom:0;}
.incluir_guia_remicion_data label{padding:5px;margin:0;user-select:none;position:relative;max-width:100%;cursor:pointer;}
.contenido_guia_remicion_con{width:100%;position:relative;padding:7px;padding-top:0;}
.contenido_guia_remicion_con input{width:100%;max-width:300px;padding:10px;border:1px dashed #888;outline:none;margin-bottom:20px;}
.contenido_guia_remicion_con input[type=number]::-webkit-inner-spin-button, 
.contenido_guia_remicion_con input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}
</style>
<style type="text/css">
.buscador_layshane_s1{position:relative;}
.buscador_layshane_s1 .input{
  font-size: 16px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 200px;
  border: none;
  border-bottom: 1px solid #515151;
  background: transparent;
}
.buscador_layshane_s1 .input:focus{
  outline: none;
}
.buscador_layshane_s1 .label{
  color: #999;
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  display: flex;
}
.buscador_layshane_s1 .label-char {
  transition: 0.2s ease all;
  transition-delay: calc(var(--index) * .05s);
}
.buscador_layshane_s1 .input:focus ~ label .label-char,
.buscador_layshane_s1 .input:valid ~ label .label-char {
  transform: translateY(-20px);
  font-size: 14px;
  color: #5264AE;
}
.buscador_layshane_s1 .barload_lay {
  position: relative;
  display: block;
  width: 200px;
}
.buscador_layshane_s1 .barload_lay:before,.buscador_layshane_s1 .barload_lay:after {
  content: '';
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  background: #5264AE;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}
.buscador_layshane_s1 .barload_lay:before{left:50%;}
.buscador_layshane_s1 .barload_lay:after{right:50%;}
.buscador_layshane_s1 .input:focus ~ .barload_lay:before,
.buscador_layshane_s1 .input:focus ~ .barload_lay:after{width: 50%;}
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
						<span><svg width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg></span> Compras
					</div>
				</div>
				<?php if (!empty($comprapendiente_sear)): ?>
					<?php $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne("compras"); ?>
					<?php $comprapendiente2 = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('sucursal',$wo['user']['sucursal'])->getOne("compras"); ?>
					<?php if(isset($comprapendiente->completado)): ?>
						<button class="btn_prin_compra boton_add_nluis first cancelar_order_in_pages"><?php echo $wo['lang']['eliminar_compra'] ?></button>
					<?php else: ?>
						<?php if(isset($comprapendiente2->completado)): ?>
							<button class="btn_prin_compra boton_add_nluis first" onclick="Anular_compra_note('hide')"><?php echo $wo['lang']['anular_compra'] ?></button>
							<div class="modal fade" id="Anular_compra_inlined" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
							    <div class="modal-dialog" role="document">
							        <div class="modal-content">
							            <div class="modal-header">
							                <h5 class="modal-title" id="exampleModal1Label">Anular compra?</h5>
							                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							                    <span aria-hidden="true">&times;</span>
							                </button>
							            </div>
							            <div class="modal-body">
							                <p>Estas seguro que deseas anular esta compra?</p>
							                <hr>
							                <input class="text_justificacion_anular_compra" type="text" name="justificacion" autocomplete="off" placeholder="Escribe motivo, sobre la anulacion de la compra.">
							                <span class="alert_justific hidden" style="color:#ed1212;padding:10px 0;display:block;user-select:none;">Escribe motivo, sobre la anulacion de la compra.</span>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							                <button type="button" class="btn btn-primary">Anular</button>
							            </div>
							        </div>
							    </div>
							</div>
							<script type="text/javascript">
								function Anular_compra_note(type = 'show') {
									if(type == 'hide') {
								      $('#Anular_compra_inlined').find('.btn-primary').attr('onclick', "Anular_compra_note()");
								      $('#Anular_compra_inlined').modal('show');
								      return false;
								    }
								    var text_an = $('.text_justificacion_anular_compra').val();
								    var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
								    if (text_an == '') {
								    	$('.alert_justific').removeClass('hidden');
								    }else{
									    $.ajax({
									    	url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=anular_compra&hash=' + $('.main_session').val(),
											data: {text: text_an},
											type: 'POST',
											success: function (data) {
										    	if (data.status==200) {
										    		$('#Anular_compra_inlined').find('.btn-primary').attr('data-dismiss', "modal");
													$('.alert_justific').addClass('hidden');
													$('#Anular_compra_inlined').find('.btn-secondary').click();
										    		setTimeout(() => {
											            if (comprascontent) {
															comprascontent.click();
														}
											        }, 1000);
										    	}
										    	if (data.status==400){
										    		return false;
										    		$('.alert_justific').removeClass('hidden');
										    	}
											}
										})
									}
								  
								}
							</script>
						<?php else: ?>
							<?php if ($wo['config']['can_use_market']) { ?>
								<button class="btn_prin_compra boton_add_nluis first create_order_in_pages"><?php echo $wo['lang']['buy'] ?></button>
							<?php } ?>
						<?php endif ?>
					<?php endif ?>
				<?php else: ?>
					<?php if ($wo['config']['can_use_market']) { ?>
						<button class="btn_prin_compra boton_add_nluis first create_order_in_pages"><?php echo $wo['lang']['buy'] ?></button>
					<?php } ?>
				<?php endif ?>
			</div>
			<br><br>
			<div class="add_reaction_form_alert"></div>
	    <?php if (!empty($comprapendiente_sear)): ?>
	    	<?php $comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->where('sucursal',$wo['user']['sucursal'])->getOne("compras"); ?>
				<?php $comprapendiente2 = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','2')->where('sucursal',$wo['user']['sucursal'])->getOne("compras"); ?>
	    	<?php if(isset($comprapendiente->completado)): ?>
		    	<?php if ($comprapendiente->num_doc == 0): ?>
	    			<div class="agregar_compras_en_imventario">
	    				<span style="padding:8px;color:#666;font-size:15px;">Nueva compra con:</span>
	    				<br><br>
			    		<div class="opciones_para_agregar_compra">
			    			<div class="agregar_compra_comprobante">
			    				<input type="radio" name="tipo_compra_doc" id="compra_con_nota" value="boleta_simple" <?php if($comprapendiente->documento=='BS'){echo("checked");}?>>
			    				<label for="compra_con_nota">Boleta simple</label>
			    			</div>
			    			<div class="agregar_compra_comprobante">
			    				<input type="radio" name="tipo_compra_doc" id="compra_con_boleta" value="boleta" <?php if($comprapendiente->documento=='B'){echo("checked");}?>>
			    				<label for="compra_con_boleta">Boleta</label>
			    			</div>
			    			<div class="agregar_compra_comprobante">
			    				<input type="radio" name="tipo_compra_doc" id="compra_con_factura" value="factura" <?php if($comprapendiente->documento=='F'){echo("checked");}?>>
			    				<label for="compra_con_factura">Factura</label>
			    			</div>
			    		</div>
			    	</div>
			    	<br>
			    	<hr>
			    	<br>
				  <?php else: ?>
			    	<div class="contenido_datos_new_compra" id="<?='compra_pendiente'.$comprapendiente->id;?>">
			    		<?php if($comprapendiente->documento=='BS'): ?>
			    			<?php $numero_documento_a = $comprapendiente->num_doc;?>
				    		<div class="document_title"><span>Boleta simple</span></div>
				    	<?php elseif($comprapendiente->documento=='B'): ?>
				    		<?php $numero_documento_a = $comprapendiente->numero_documento;?>
				    		<div class="document_title"><span>Boleta</span></div>
				    	<?php elseif($comprapendiente->documento=='F'): ?>
				    		<?php $numero_documento_a = $comprapendiente->numero_documento;?>
				    		<div class="document_title"><span>Factura</span></div>
				    	<?php endif ?>
			    		<div class="comprobante">
			    			<div class="comprobante_number">
			    				<h2 class="numdoc_line"><?=$comprapendiente->documento.'-'.$comprapendiente->num_doc;?></h2>
			    				<input class="typenumber_nop" type="number" name="numero_documento" placeholder="Numero documento" value="<?=$numero_documento_a;?>" autocomplete="off">
			    			</div>
			    			<div class="datos_proveedor_box datos_proveedor_box_ad">
			    				<?php $proveedor_ver = $db->where('id',$comprapendiente->proveedor)->getOne("lui_proveedores"); ?>
			    				<?php if($proveedor_ver): ?>
			    					<h5><?=$proveedor_ver->razon_social; ?></h5>
			    					<p>R.U.C. <?=$proveedor_ver->ruc; ?></p>
			    				<?php else: ?>
			    					Seleccione un proveedor
			    				<?php endif ?>
				    		</div>
			    			<div class="proveedores_lista_caja disabled_provedores_list">
			    				<div class="lista_proveedor">
	                                <?php foreach ($wo['proveedores'] as $proveedor): ?>
	                                	<div id="<?=$proveedor['id'];?>">
		                                	<input id="proveedor_selecteds_<?=$proveedor['id'];?>" type="radio" name="proveedor_compra" value="<?=$proveedor['id'];?>" <?php if($proveedor['id']==$comprapendiente->proveedor){echo "checked";} ?>>
					    					<label for="proveedor_selecteds_<?=$proveedor['id'];?>">
					    						<h5><?=$proveedor['razon_social']; ?></h5>
						    					<p>R.U.C. <?=$proveedor['ruc']; ?></p>
					    					</label>
				    					</div>
	                                <?php endforeach ?>
			    				</div>
			    			</div>
			    			<div class="address_data_proveedor datos_proveedor_box_direccion">
			    				<?php $proveedor_sucursal_view = $db->where('id',$comprapendiente->proveedor_sucursal)->getOne("sucursal_proveedor"); ?>
			    				<?php if($proveedor_sucursal_view): ?>
			    					<span><?=$proveedor_sucursal_view->direccion;?>,<?=$proveedor_sucursal_view->distrito;?>,<?=$proveedor_sucursal_view->departamento;?></span>
			    				<?php else: ?>
			    					<span>Seleccione direccion del proveedor</span>
			    				<?php endif ?>
			    			</div>
			    			<div class="listar_direcciones_del_proveedor disabled_provedores_list">
			    				<?php $wo['proveedores_address'] = lui_GetProveedoresSucursal($comprapendiente->proveedor); ?>
			    				<div class="lista_proveedor">
				    				<?php foreach ($wo['proveedores_address'] as $proveedor_address): ?>
		                                <div id="<?=$proveedor_address['id'];?>">
			                                <input id="proveedor_selecteds_address_<?=$proveedor_address['id'];?>" type="radio" name="proveedor_compra_address" value="<?=$proveedor_address['id'];?>" <?php if($proveedor_address['id'] == $comprapendiente->proveedor_sucursal){echo "checked";} ?>>
						    				<label for="proveedor_selecteds_address_<?=$proveedor_address['id'];?>"><?=$proveedor_address['direccion']; ?></label>
					    				</div>
		                            <?php endforeach ?>
	                            </div>
			    			</div>

			    			<div class="date_comprovante_compra">
			    				<label for="date_order">Fecha de compra </label>
			    				<input id="date_order" type="date" name="fecha" value="<?=date('Y-m-d') ?>">
			    			</div>
			    			<div class="incluir_guia_remicion_data">
			    				<input id="incluir_guia_remicion" type="checkbox" name="guia_remicion" <?php if($comprapendiente->guia==1){echo "checked";} ?>>
			    				<label for="incluir_guia_remicion">Incluir guia de remicion - remitente</label>
			    			</div>
			    			<div class="contenido_guia_remicion_con ">
			    				<div class="contenido_guia_remicion <?php if($comprapendiente->guia!=1){echo "disabled_provedores_list";} ?>">
				    				<input type="number" name="numero_de_guia" placeholder="Numero guia" value="<?=$comprapendiente->numero_guia;?>">
				    			</div>
				    		</div>
				    		<style type="text/css">
				    			.contenido_currensy_order{display:flex;padding:10px;position:relative;width:100%;flex-wrap:wrap;gap:0.5em;margin-bottom:2rem;}
				    			.contenido_currensy_order label{display:block;width:100%;}
				    			.selected_curremcy_order{display:block;position:relative;width:100%;max-width:200px;padding:10px;border:1px solid #ccc;border-radius:3px;outline:none;cursor:pointer;}
				    		</style>
				    		<div class="contenido_currensy_order">
								<label for="currency_order"><?php echo $wo['lang']['currency']; ?></label>
								<select name="currency" id="currency_order" class="selected_curremcy_order">
									<?php $chec_currecny_default='';?>
									<?php foreach ($wo['currencies'] as $key => $currency) { ?>
										<?php if($comprapendiente->currency==$currency['text']): ?>
											<?php $chec_currecny_default='selected';?>
											<option value="<?php echo $currency['text'];?>" <?=$chec_currecny_default;?>><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
										<?php else: ?>
											<option value="<?php echo $currency['text'];?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
										<?php endif ?>
									<?php } ?>
								</select>
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
								.precio_compra_invo_s .precio_compra_inputs{border:2px dashed #ccc;padding:10px;outline:none;transition:all .5s;}
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
				    		<div class="buscador_layshane_s1">
                    <input required="" type="text" class="input" name="buscar_items" id="search_item" value="" autocomplete="off">
                    <span class="barload_lay"></span>
                    <label class="label" for="search_item" style="user-select:none;">
                     	<?php foreach ($buscar_letras as $indice => $letr_lang_s): ?>
                    		<?php echo "<span class=\"label-char\" style=\"--index: $indice;text-transform:uppercase;\"> $letr_lang_s </span>"; ?>
                      <?php endforeach ?>
                  </label>
                </div>

		            <div class="noti_sech" style="width:100%;user-select:none;"></div>
		            <div class="buscar_productos_a_comprar">
			    				<div class="con_layshane_tbles" style="background-color:transparent;margin-top:0;">
			    					<div class="container">
			    						<div class="row--top-20">
			    								<div class="table-container">
			    									<table class="table" style="background-color:#F8F8F8;">
			    										<thead class="table__thead">
			    											<tr>
			    												<th class="table__th">Producto</th>
			    												<th class="table__th">MODELO</th>
			    												<th class="table__th">SKU</th>
			    											</tr>
			    										</thead>
			    										<tbody class="table__tbody content_resuls_sseach">
				                			</tbody>
			    									</table>
			    								</div>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<script>
							$(document).ready(function(){
							    $('.content_resuls_sseach').on('click', '.menu-link_us_add', function(e){
							        var $submenu_add_irtd = $(this).find('.submenu_add_irtd');
							        $('.submenu_add_irtd').not($submenu_add_irtd).slideUp();
							        $submenu_add_irtd.slideToggle();
							        var $subme_add_holder = $(this).find('.placeholder_atri');
							        $('.placeholder_atri').not($subme_add_holder).slideUp();
							        $subme_add_holder.slideToggle();
							    });
							    $('.content_resuls_sseach').on('click', '.submenu_add_irtd', function(event){
							        event.stopPropagation();
							    });
							});
							</script>

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
															$items_compra = $db->orderBy('orden', 'asc')->objectbuilder()->where('id_comprobante',$comprapendiente->id)->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->get('imventario');
															$indexdefault_currency = array_search($comprapendiente->currency, array_column($wo['currencies'], 'text'));
															$html = "";
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
															    $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $producto['currency'];

															    $wo['product']['inventario'] = $variantes_color[0]->id;
															    $wo['product']['color'] = $variantes_color[0]->color;
															    $wo['product']['precio'] = $variantes_color[0]->precio;
																$cantidad_productos = 0;
																if (!empty($variantes_atributos)) {
																    $sql = "SELECT COUNT(*) AS cantidad FROM imventario WHERE producto = {$producto['id']} AND id_comprobante = {$comprapendiente->id}";
																    foreach ($variantes_atributos as $atributo => $opciones) {
																        foreach ($opciones as $opcion) {
																            $sql .= " AND id IN (SELECT id_imventario FROM imventario_atributos WHERE id_atributo = {$atributo} AND id_atributo_opciones = {$opcion})";
																        }
																    }
																    $cantidad_productos = $db->rawQueryOne($sql)->cantidad;
																} else{
																    $cantidad_productos = $db->where('id_comprobante', $comprapendiente->id)->where('producto', $wo['product']['id'])->where('color', $wo['product']['color'])->getValue('imventario', 'COUNT(*)');
																}


															    $wo['product']['cantidad'] = $cantidad_productos;
															    $html .= lui_LoadPage('compras/lista_compra');
															    $productos_vistos[] = $identificador_unico;
															}
															echo $html;
															?>
				                						</tbody>
			    									</table>
			    									<?php
			    										//require_once('./luisincludes/librerias/vendor/picqer/php-barcode-generator/vendor/autoload.php'); 
			    										//$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
			    										//echo $generator->getBarcode($barcodes['code'], $generator::TYPE_CODE_128); 
			    									?>
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

			    								$total_productos_grupo = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','COUNT(DISTINCT orden)');
			    								$total_productos_lista = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','COUNT(*)');
			    								if ($total_productos_lista>0) {
			    									$total_productos_price = $db->where('estado','0')->where('id_sucursal',$wo['user']['sucursal'])->where('id_comprobante',$comprapendiente->id)->getValue('imventario','SUM(precio)');
			    								}
			    								
			    								if($comprapendiente->garantia_m == 0) {
			    									$cantidad_de_garantia = 0;
			    									$end_date_de_garantia = false;
			    								}else{
			    									$cantidad_de_garantia = $comprapendiente->garantia_m;
			    									$end_date_de_garantia = 'La garantia finalizara en: '.fecha_restante($comprapendiente->garantia);
			    								}
			    								
			    								?>

			    								<div class="contenido_ct_footer_document_order">
			    									<div class="footer_document_order" style="gap:0.2em;">
			    										<span style="width:100%;">Garantia de compra</span>
			    										<input class="input_number_laysh update_garant_dt" type="number" name="garantia_compra" value="<?=$cantidad_de_garantia;?>" autocomplete="off"><br>
			    										<p style="width:100%;" class="result_m_text_gar"><?=$end_date_de_garantia?></p>
			    									</div>
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
			    											<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $producto['currency'];?>
			    											<span class="head_doc_co" id="price_st_total">
			    												 <?=number_format($total_productos_price, 2, ',', '.');?>
			    											</span>
			    											</span>
			    										</div>
			    										<div class="order_for_credid">
			    											<label class="chechedcaja22_label" for="credit_order">
			    												<input class="chechedcaja22" id="credit_order" type="checkbox" value="1">
			    												Comprar a credito
			    											</label>
			    										</div>
			    										<div class="alert_400 hidden">
			    											No se pudo mostrar el producto.
			    										</div>
			    										<div class="bt_conain_sty">
				    										<button class="btncompletecompra endcompra" data="<?=$comprapendiente->id;?>">
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
				    									</div>

			    									</div>
			    									
			    									
			    								</div>
			    							</div>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<script type="text/javascript">
			    				var isProcessing = false;
			    				$(document).ready(function() {
				    				$('.endcompra').click(function(e) {
				    					if (isProcessing) return;
										isProcessing = true;
				    					var unt = $('#price_st_total').html();
				    					var untformat = unt.replace(/\s/g, '');
										var dat = $('#date_order').val();
									    let button = $(this);
									    let id_compr = $(this).attr('data');
									    let currency = $('#currency_order').val();
									    var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
									    if ($('#credit_order').prop('checked')) {
									    	var crediboxon = $('#credit_order').val();
									    }else{
									    	var crediboxon = 0;
									    }

									    var credi = crediboxon;
									    if(!button.hasClass('animatebtncompra')) {
									        button.addClass('animatebtncompra');
									        $.ajax({
												url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=finalizar_compra&hash=' + $('.main_session').val(),
												data: {price_dat:untformat,fecha:dat,credito:credi,currency:currency},
												type: 'POST',
												success: function (data){
													console.log(data)
													if(data.status==200){
														$('.alert_400').html('');
														$('.alert_400').addClass('hidden');
														if(data.estadop==1){
															setTimeout(() => {
													            button.removeClass('animatebtncompra');
													            $('#compra_pendiente'+id_compr).remove();
													            $('.btn_prin_compra').removeClass('cancelar_order_in_pages');
													            $('.btn_prin_compra').addClass('create_order_in_pages');
													            $('.btn_prin_compra').html('<?php echo $wo['lang']['buy'] ?>');
													            if (comprascontent) {
    																		comprascontent.click();
    																	}
													        }, 6500);
												        }
												        if (data.estadop==2){
												        	if (comprascontent) {
																comprascontent.click();
															}
															button.removeClass('animatebtncompra');
												        }
													}
													if(data.status==400){
														$('.alert_400').html(data.message);
														$('.alert_400').removeClass('hidden');
														button.removeClass('animatebtncompra');
													}
													isProcessing = false;
												}
											})
									        
									    }

									});
									$(document).on('change','#currency_order',function(){
										if (isProcessing) return;
										isProcessing = true;
										var unt = $(this).val();
										var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
										$.ajax({
											url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=change_currency&hash=' + $('.main_session').val(),
											data: {currency:unt},
											type: 'POST',
											success: function (data){
												if (data.status==200){
													if (comprascontent) {
														comprascontent.click();
													}
												}
												isProcessing = false;
											}
										})
									});

									$('.listar_productos_a_comprar').on('keyup','.update_garant_dt',function(){
										var unt = $(this).val();
										var dat = $('#date_order').val();
										$.ajax({
											url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=garantia_compra&hash=' + $('.main_session').val(),
											data: {garantia:unt,fecha:dat},
											type: 'POST',
											success: function (data){
												$('.result_m_text_gar').html(data.garantia);
											}
										})
									});
								}); 

								$(document).ready(function() {
									$('.content_resuls_sseach').on('click', '.add_product_compra_list', function(){
									    let product = $(this).attr('data-id');
									    let prod_co = $(this).attr('data-col');
									    if (product){
									        $.post(Wo_Ajax_Requests_File() + '?f=product_compra_list_add', {value: product,color:prod_co}, function (data) {
									            if (data.status == 200){
									            	var elementoExistente = $('.item_dats_invoice[data-producto="' + data.producto + '"]'); 
									                if(elementoExistente.length === 0){
									                    $('.contet_items_de_doc_compr').append(data.html);
									                } else {
									                	elementoExistente.replaceWith(data.html);
									                }
									                $('#items_st_total').html(data.total_items);
													$('#cantidad_st_total').html(data.total_lista);
													$('#price_st_total').html(data.total_precio);
									            }
									        });
									    }
									});
								});

								$(document).ready(function() {
								    $('.content_resuls_sseach').on('submit', '.form_producto', function(e) {
								        e.preventDefault();
								        var form = $(this);
								        $.ajax({
								            type: 'POST',
								            url: Wo_Ajax_Requests_File() + '?f=product_compra_list_addc',
								            data: form.serialize(),
								            success: function(data) {
								                if (data.status == 200){
									            	var elementoExistente = $('.item_dats_invoice[data-producto="' + data.producto + '"]'); 
									                if(elementoExistente.length === 0){
									                    $('.contet_items_de_doc_compr').append(data.html);
									                } else {
									                	elementoExistente.replaceWith(data.html);
									                }
									                $('#items_st_total').html(data.total_items);
													$('#cantidad_st_total').html(data.total_lista);
													$('#price_st_total').html(data.total_precio);
									            }
								            },
								            error: function(xhr, status, error) {
								                console.error(xhr.responseText);
								            }
								        });
								    });

								    $('.content_resuls_sseach').on('submit', '.form_productos', function(e) {
								        e.preventDefault();
								        var form = $(this);
								        $.ajax({
								            type: 'POST',
								            url: Wo_Ajax_Requests_File() + '?f=product_compra_list_addc_lop',
								            data: form.serialize(),
								            success: function(data) {
								                if (data.status == 200){
									            	var elementoExistente = $('.item_dats_invoice[data-producto="' + data.producto + '"]'); 
									                if(elementoExistente.length === 0){
									                    $('.contet_items_de_doc_compr').append(data.html);
									                } else {
									                	elementoExistente.replaceWith(data.html);
									                }
									                $('#items_st_total').html(data.total_items);
													$('#cantidad_st_total').html(data.total_lista);
													$('#price_st_total').html(data.total_precio);
									            }
								            },
								            error: function(xhr, status, error) {
								                console.error(xhr.responseText);
								            }
								        });
								    });
								});

								$(document).ready(function() {
								    $('.content_resuls_sseach').on('click', '.menu-link_us_add_b', function(e) {
								    	let product = $(this).attr('data-id');
									    let prod_co = $(this).attr('data-col');
									    let prod_coc = $(this).attr('data-colc');

									    let atribut = 'atributo_'+prod_coc+'[]';
								
									    var data = {};
									    data[atribut] = prod_co;
									    data['producto'] = product;
									    data['color'] = prod_co;

								        $.ajax({
								            type: 'POST',
								            url: Wo_Ajax_Requests_File() + '?f=product_compra_list_addc',
								            data: data,
								            success: function(data) {
								                if (data.status == 200){
									            	var elementoExistente = $('.item_dats_invoice[data-producto="' + data.producto + '"]'); 
									                if(elementoExistente.length === 0){
									                    $('.contet_items_de_doc_compr').append(data.html);
									                } else {
									                	elementoExistente.replaceWith(data.html);
									                }
									                $('#items_st_total').html(data.total_items);
													$('#cantidad_st_total').html(data.total_lista);
													$('#price_st_total').html(data.total_precio);
									            }
								            },
								            error: function(xhr, status, error) {
								                console.error(xhr.responseText);
								            }
								        });
								    });
								});

								$('.contet_items_de_doc_compr').on('keyup','.precio_compra_inputs_a',function(){
									var numbers_ac_pl = $(this).attr('data-id');
									var prices_av     = $(this).val();
									var cant_stks     = $(this).attr('data-ct');
									var indentfi      = $(this).attr('data-ident');
									$.ajax({
										url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=precio_compra_inputs&hash=' + $('.main_session').val(),
										data: {docnum:numbers_ac_pl,price_dat:prices_av},
										type: 'POST',
										success: function (data){
											let tsubs         = prices_av*cant_stks;
											$('.precio_compra_inputs_totalsub_'+indentfi).html(tsubs);
											$('#items_st_total').html(data.total_items);
											$('#cantidad_st_total').html(data.total_lista);
											$('#price_st_total').html(data.total_precio);
										}
									})
								});

								$('.contet_items_de_doc_compr').on('keyup', '.precio_compra_inputs_b', function () {
								    var productId = $(this).attr('data-id');
								    var newPrice = $(this).val();
								    var quantity = $(this).attr('data-ct');
								    var attributes = $(this).attr('data-atributos');
								    var uniqueIdentifier = productId;
								    if (attributes) {
								        uniqueIdentifier += '_' + attributes;
								    }
								    var formData = {
								        docnum: uniqueIdentifier,
								        price_dat: newPrice,
								        attributes: attributes,
								        quantity: quantity
								    };

								    $.ajax({
								        url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=precio_compra_inputs_atri&hash=' + $('.main_session').val(),
								        data: formData,
								        type: 'POST',
								        success: function (data) {
								            var subtotal = newPrice * quantity;
								            $('.precio_compra_inputs_totalsub_' + data.identifier).html(subtotal);
								            $('#items_st_total').html(data.total_items);
											$('#cantidad_st_total').html(data.total_lista);
											$('#price_st_total').html(data.total_precio);
								     
								        },
								        error: function (xhr, status, error) {
								        }
								    });
								});

								$('.contet_items_de_doc_compr').on('click', '.menu_item_compras_la', function(e){
							        var $submenu_add_irtd_docmt = $(this).find('.submenu_add_irtd_docmt');
							        $('.submenu_add_irtd_docmt').not($submenu_add_irtd_docmt).slideUp();
							        $submenu_add_irtd_docmt.slideToggle();
							        var $subme_add_holder = $(this).find('.placeholder_atri');
							        $('.placeholder_atri').not($subme_add_holder).slideUp();
							        $subme_add_holder.slideToggle();
							        $('body').toggleClass("menu_atrr");
							    });
							    $('.contet_items_de_doc_compr').on('click', '.submenu_add_irtd_docmt', function(event){
							        event.stopPropagation();
							    });
							    $('.contet_items_de_doc_compr').on('click', '.precio_compra_inputs', function(event){
							        event.stopPropagation();
							    });
							</script>
				    	</div>
			    	</div>
			    	<br>
			    	<hr>
			    	<br>

		    		<?php endif ?>
		    		<script type="text/javascript">
						function hideElements() {
							$('.submenu_add_irtd').slideUp();
						    $('.submenu_add_irtd_docmt').slideUp();
						    $('.placeholder_atri').slideUp();
						    $('body').removeClass("menu_atrr");
						}

						$(document).ready(function() {
							$('.table__tbody').on('click', '.closed_view_more_items_orrder', function(){
								hideElements()
							});
						});
						$(document).on('keyup', '#search_item', function(){
							let seachc = $("#search_item").val();
							if (seachc == ""){
								$('.buscar_productos_a_comprar').removeClass('active_seach_item');
								$('.noti_sech').html("");
							}else{
								$.post(Wo_Ajax_Requests_File() + '?f=search_items', {value: seachc}, function (data) {
										if (data.status==200){
											$('.buscar_productos_a_comprar').addClass('active_seach_item');
											$('.content_resuls_sseach').html(data.html);
										}else{
											$('.noti_sech').html('<span style="padding:10px;background:#ddd;display:inline-block;"><?=$wo['lang']['no_available_products'];?> </span>');
										}
								})
							}
						})
						$(document).on('click', function(event) {
						    var productosDiv = $('.buscar_productos_a_comprar');
						    var inputBusqueda = $('#search_item');
						    if (!productosDiv.is(event.target) && productosDiv.has(event.target).length === 0 &&
						        !inputBusqueda.is(event.target) && inputBusqueda.has(event.target).length === 0) {
						        $('.buscar_productos_a_comprar').removeClass('active_seach_item');
						        inputBusqueda.val('');
						    }
						});

						$(document).ready(function() {
						    $('#search_item').on('keydown', function(event) {
						        if (event.keyCode === 27) {
						            $(this).val('');
						        }
						    });
						    $('.precio_compra_inputs').on('focus', function() {
						        $('#search_item').val('');
						        $('#search_item').keyup();
						    });
						});


						$(document).on('click', '.cancelar_order_in_pages', function(){
							var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=trash_compra&hash=' + $('.main_session').val(),
								type: 'POST',
								success: function (data) {
									if (data.status==200){
										if (comprascontent) {
											comprascontent.click();
										}
									}
								}
							})
						});

						$('.datos_proveedor_box_ad').click(function(){
							$('.proveedores_lista_caja').toggleClass('disabled_provedores_list');
						});

						$('.datos_proveedor_box_direccion').click(function(){
							$('.listar_direcciones_del_proveedor').toggleClass('disabled_provedores_list');
						});

						$('#incluir_guia_remicion').change(function(){
							$('.contenido_guia_remicion').toggleClass('disabled_provedores_list');
							var guias = this.value = this.checked ? 1 : 0;
							$('input[name="numero_de_guia"]').val('');
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=agregar_guia&hash=' + $('.main_session').val(),
								data: {guia:guias},
								type: 'POST',
								success: function (data) {
								}
							})
						});


						$('input[name="proveedor_compra"]').change(function(){
							var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
							var proveedors = $(this).val();
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=select_proveedor&hash=' + $('.main_session').val(),
								data: {prov:proveedors},
								type: 'POST',
								success: function (data) {
									if (data.status==200){
										if (comprascontent) {
											comprascontent.click();
										}
									}
								}
							})
						});

						$('input[name="proveedor_compra_address"]').change(function(){
							var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
							var proveedors_address = $(this).val();
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=select_proveedor_direccion&hash=' + $('.main_session').val(),
								data: {prov:proveedors_address},
								type: 'POST',
								success: function (data) {
									if (data.status==200){
										if (comprascontent) {
											comprascontent.click();
										}
									}
								}
							})
						});

						$('input[name="numero_de_guia"]').keyup(function(){
							var numbers_documents_guia = $(this).val();
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=add_number_guia_remicion&hash=' + $('.main_session').val(),
								data: {docnum:numbers_documents_guia},
								type: 'POST',
								success: function (data) {
								}
							})
						});

						$('input[name="numero_documento"]').keyup(function(){
							var numbers_documents = $(this).val();
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=add_number_document&hash=' + $('.main_session').val(),
								data: {docnum:numbers_documents},
								type: 'POST',
								success: function (data) {
								}
							})
						});


						$('input[name="tipo_compra_doc"]').change(function(){
							var selected_doc = $(this).val();
							var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
							$.ajax({
								url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=document&hash=' + $('.main_session').val(),
								data: {comprobante:selected_doc},
								type: 'POST',
								success: function (data) {
									if (data.status==200){
										if (comprascontent) {
											comprascontent.click();
										}
									}
								}
							})
						});
						
						$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
						$('input[type=number]').on('keydown',function(e) {
						    var key = e.charCode || e.keyCode;
						    if(key == 38 || key == 40 ) {
							e.preventDefault();
						    } else {
							return;
						    }
						});
					</script>
		    	<?php else: ?>
		    		<?php if(isset($comprapendiente2->completado)): ?>
		    			<style type="text/css">
		    				.title_complet_order{
		    					display:block;
		    					width:100%;
		    					padding:10px;
		    					user-select:none;
		    				}
		    				.conten_end_order{display:block;width:100%;margin-top:20px;}
		    				.cuentas_bancarias_contenido{display:flex;width:100%;flex-wrap:wrap;overflow:auto;padding:20px 0;}
		    			</style>
		    			<div class="contenido_datos_new_compra">
		    				<span class="title_complet_order"> Completar compra</span>
		    				<hr style="width:100%;">
		    				<div class="conten_end_order">
		    					<?php
								$indexdefault_currency = array_search($comprapendiente2->currency, array_column($wo['currencies'], 'text'));
								$total_productos_grupo = 0;
								$total_productos_lista = 0;
								$total_productos_price = 0.00;

								$total_productos_grupo = $db->where('estado','2')->where('id_comprobante',$comprapendiente2->id)->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
								$total_productos_lista = $db->where('estado','2')->where('id_comprobante',$comprapendiente2->id)->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
								if ($total_productos_lista>0) {
									$total_productos_price = $db->where('estado','2')->where('id_comprobante',$comprapendiente2->id)->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
								}
								
								if($comprapendiente2->garantia_m == 0) {
									$end_date_de_garantia = false;
								}else{
									$end_date_de_garantia = 'La garantia finalizara en: '.fecha_restante($comprapendiente2->garantia);
								}
								$moneda_seleccionado_de_compra = (!empty($wo['currencies'][$indexdefault_currency]['text'])) ? $wo['currencies'][$indexdefault_currency]['text'] : '';
								?>
		    					<?php $transacciones_bancarias = $db->where('moneda',$moneda_seleccionado_de_compra)->where('estado', 1)->where('activo', 1)->get("cuentas_corrientes");?>
		    					<?php if(!empty($transacciones_bancarias)): ?>
		    						
		    						<style type="text/css">
		    							.radio-inputs {
										  display: flex;
										  justify-content:flex-start;
										  align-items: center;
										  max-width: 100%;
										  -webkit-user-select: none;
										  -moz-user-select: none;
										  -ms-user-select: none;
										  user-select: none;
										  gap:1.5rem;
										}

										.radio-input:checked + .radio-tile {
										  border-color: #2260ff;
										  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
										  color: #2260ff;
										  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
										}

										.radio-input:checked + .radio-tile:before {
										  transform: scale(1);
										  opacity: 1;
										  background-color: #2260ff;
										  border-color: #2260ff;
										}

										.radio-input:checked + .radio-tile .radio-icon svg {
										  fill: #2260ff;
										}

										.radio-input:checked + .radio-tile .radio-label {
										  color: #2260ff;
										}

										.radio-input:focus + .radio-tile {
										  border-color: #2260ff;
										  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1), 0 0 0 4px #b5c9fc;
										}

										.radio-input:focus + .radio-tile:before {
										  transform: scale(1);
										  opacity: 1;
										}

										.radio-tile {
										  display: flex;
										  flex-direction: column;
										  align-items: center;
										  justify-content: center;
										  padding:10px;
										  border-radius: 0.5rem;
										  border: 2px solid #b5bfd9;
										  background-color: #fff;
										  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
										  transition: 0.15s ease;
										  cursor: pointer;
										  position: relative;
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

										.radio-icon img {
										  width: 6rem;
										  height: 6rem;
										  border-radius:5px;
										}

										.radio-label {
										  color: #707070;
										  transition: 0.375s ease;
										  text-align: center;
										  font-size: 13px;
										}

										.radio-input {
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
		    						<div class="cuentas_bancarias_contenido">
		    							<div class="radio-inputs">
		    								<?php foreach($transacciones_bancarias as $banck): ?>
		    									<?php $indexdefault_currency_bank = array_search($banck->moneda, array_column($wo['currencies'], 'text')); ?>
		    									<?php $cantida_dinero = $db->where('estado', '1')
										                             ->where('id_cuenta_corriente', $banck->id)
										                             ->getValue('cuentas_corrientes_transactions', 'SUM(CASE WHEN tipo = 1 THEN monto WHEN tipo = 0 THEN -monto ELSE 0 END)');
										        ?>
			    								<label>
													<input class="radio-input selected_banks_line" type="radio" name="banck_line_list_box" value="<?=$banck->id;?>">
													<span class="radio-tile">
														<span class="radio-icon">
															<img src="<?=$banck->banco_logo;?>">
														</span>
														<span class="radio-label"><?=$banck->banco_nombre_corto;?></span>
														<span><b><?=(!empty($wo['currencies'][$indexdefault_currency_bank]['symbol'])) ? $wo['currencies'][$indexdefault_currency_bank]['symbol'] : '';?> <?= sprintf('%.2f',!empty($cantida_dinero) ? $cantida_dinero : 0); ?></b></span>
														<span class="radio-label"><?=$banck->tipo_de_cuenta;?> <?=$banck->nombre_cuenta;?></span>
													</span>
												</label>
											<?php endforeach ?>
		    							</div>
		    						</div>
		    					<?php else: ?>
		    						<style type="text/css">
		    							.not_null_bancks{display:flex;width:100%;justify-content:center;align-items:center;flex-wrap:wrap;gap:1rem;}
		    							.not_null_bancks span{width:100%;display:flex;justify-content:center;align-items:center;}
		    						</style>
		    						
		    						<div class="not_null_bancks">
		    							<span>
		    								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="54" height="54" color="#bdcbd4" fill="none">
										    <path d="M6.78937 6.833C5.17978 6.55311 3.88205 6.26039 3 6V15.0614C3 17.0558 3 18.0531 3.61958 18.8663C4.23916 19.6796 5.08923 19.9093 6.78937 20.3687C9.53623 21.1109 12.4235 21.553 15.0106 21.8058C17.6919 22.0677 19.0325 22.1987 20.0163 21.2998C20.2149 21.1182 20.3735 20.9144 20.5 20.681" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										    <path d="M11 7.5C12.2539 7.64451 13.5967 7.70543 15.0038 7.80293C17.9252 8.00537 19.3859 8.10658 20.1929 8.977C21 9.84742 21 11.2499 21 14.0547V16.0684C21 16.3972 21 16.7073 20.9985 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										    <path d="M3 6C3 5.16216 3.38491 4.39699 4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										    <path d="M17.6264 8C18.0035 6.57668 18.3447 3.98809 17.3281 2.70275C16.685 1.8895 15.7281 1.96617 14.7873 2.04906C11.5661 2.33285 8.96217 2.80766 7 3.2701" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
										    <path d="M2 2L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
											</svg>
										</span>
		    							<span>No hay cuentas bancarias</span>
		    						</div>
		    					<?php endif ?>

		    					<div>
		    						
		    					</div>
		    					<hr>
		    					<br>
								<style type="text/css">
									.contenido_ct_footer_document_order{display:flex;justify-content:flex-end;align-items:center;flex-wrap:wrap;width:100%;}
									.footer_document_order{width:100%;max-width:400px;display:flex;flex-wrap:wrap;gap:1rem;}
									.footer_document_order_li{display:flex;flex-wrap:wrap;width:100%;justify-content:space-between;padding:10px;gap:1em;align-items:center;}
									.head_doc_li{font-weight:bold;font-family:arial;text-align:right;}
									.bt_conain_sty{display:flex;width:100%;justify-content:flex-end;}
									.footer_document_order_li #number_operation[type="number"]::-webkit-inner-spin-button,
									.footer_document_order_li #number_operation[type="number"]::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}
									.footer_document_order_li #number_operation[type="number"]{-moz-appearance: textfield;}
									#number_operation{padding:10px;border:2px dashed #ccc;border-radius:5px;outline:none;}
								</style>
								

								<div class="contenido_ct_footer_document_order">
									<div class="footer_document_order" style="gap:0.2em;">
										<p style="width:100%;" class="result_m_text_gar"><?=$end_date_de_garantia?></p>
									</div>
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
											<span><?=(!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : $producto['currency'];?>
											<span class="head_doc_co" id="price_st_total"><?=number_format($total_productos_price, 2, ',', '.');?></span>
											</span>
										</div>
										<div class="footer_document_order_li">
											<span class="head_doc_li">Numero de operacion:</span>
											<input class="head_doc_co" type="number" id="number_operation" name="number_operation">
										</div>
										<div class="alert_400 hidden">
											No se pudo mostrar el producto.
										</div>
										<div class="bt_conain_sty">
    										<button class="btncompletecompra endcomprafin" data="<?=$comprapendiente2->id;?>">
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
    									</div>

									</div>
								</div>
					    	</div>
		    			</div>
		    			<script type="text/javascript">
		    				
		    				var isProcessing = false;
		    				$(document).ready(function() {
			    				$('.endcomprafin').click(function(e) {
			    					$('.loader_page_content').addClass('loader_page');
			    					if (isProcessing) return;
									isProcessing = true;
			    					var unt = $('#price_st_total').html();
			    					var untformat = unt.replace(/\s/g, '');
								    let button = $(this);
								    var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
								    var number_operat  = $('#number_operation').val();
								    var opcionSeleccionada = $('input[name=banck_line_list_box]:checked').val();
								    if (opcionSeleccionada) {
								    	var option_lines = opcionSeleccionada;
								    }else{
								    	var option_lines = 0;
								    }
								    if(!button.hasClass('animatebtncompra')) {
								        button.addClass('animatebtncompra');
								        $.ajax({
											url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=finalizar_compra_pay&hash=' + $('.main_session').val(),
											data: {price_dat:untformat,selected_line:option_lines,number_operation:number_operat},
											type: 'POST',
											success: function (data){
												if(data.status==200){
													$('.alert_400').html('');
													$('.alert_400').addClass('hidden');
													setTimeout(() => {
											            button.removeClass('animatebtncompra');
											            if (comprascontent) {
															comprascontent.click();
														}
											        }, 6500);
												}
												if(data.status==400){
													setTimeout(() => {
											            $('.loader_page_content').removeClass('loader_page');
											        }, 1000);
													$('.alert_400').html(data.message);
													$('.alert_400').removeClass('hidden');
													button.removeClass('animatebtncompra');
												}
												isProcessing = false;
											}
										})
								        
								    }

								});
							});
		    			</script>
		    		<?php else: ?>
						<div class="col-lg-12 col-md-12">
				            <div class="card">
				                <div class="card-body">
				                  <div class="row">
				                  	<div class="col-md-9" style="margin-bottom:0;">
				                  		<form method="get" action="<?php echo lui_SeoLink('compras'); ?>" style="display:flex;">
				                        	<div class="buscador_layshane_s1">
					                        	<input required="" type="text" class="input" name="query" id="query" value="<?php echo($filter_keyword); ?>" autocomplete="off">
					                        	<span class="barload_lay"></span>
					                        	<label class="label" for="query">
						                        	<?php foreach ($buscar_letras as $indice => $letr_lang_s): ?>
						                        		<?php echo "<span class=\"label-char\" style=\"--index: $indice\"> $letr_lang_s </span>"; ?>
						                        	<?php endforeach ?>
						                        </label>
					                        </div>
					                        <?php if (empty($_GET['query'])): ?>
				                            	<button class="btn btn-info btn-mat" style="line-height:initial;min-width:0;"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg></button>
				                            <?php else: ?>
				                            	<a href="<?php echo lui_SeoLink('compras'); ?>" role="button" class="btn btn-info btn-mat" style="line-height:initial;min-width:0;appearance:auto;text-rendering:auto;color:buttontext;letter-spacing:normal;word-spacing:normal;background-color:buttonface;padding-block:1px;padding-inline:6px;text-indent:0px;display:flex;justify-content:center;align-items:center;"><svg xmlns="http://www.w3.org/2000/svg" style="margin:0;padding:0;" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></a>
					                        <?php endif ?>
				                        </form>
				                    </div>
				                </div>
				                <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
				                <div class="clearfix"></div>
				                <style type="text/css">
				                	.but_ac_ct{
				                		display:flex;
				                		justify-content:flex-end;
				                		width:100%;
				                		margin-top:2rem;
				                		gap:1rem;
				                	}
				                	.btms_a_ct{padding:10px;min-width:100px;text-align:center;}
				                </style>
				                <section>
				                	<div class="but_ac_ct">
				                		<span class="btms_a_ct button_blanco2">Exel</span>
				                		<span class="btms_a_ct button_blanco2">PDF</span>
				                	</div>
				                </section>
				                <div class="con_layshane_tbles">
				                	<div class="container">
				                		<div class="row row--top-20">
				                			<div class="columna-12">
				                				<div class="table-container">
				                					<table class="table" style='user-select:none;'>
				                						<thead class="table__thead">
				                							<tr>
				                								<th class="table__th">ID
				                									<?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
				                										<svg onclick="location.href = '<?php echo(lui_SeoLink('compras?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
				                									<?php }else{ ?>
				                										<svg onclick="location.href = '<?php echo(lui_SeoLink('compras?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
				                									<?php } ?>
				                								</th>
				                								<th class="table__th">COMPROBANTE</th>
				                								<th class="table__th">Items</th>
				                								<th class="table__th">Productos</th>
				                								<th class="table__th">Total</th>
				                								<th class="table__th">Garantia</th>
				                								<th class="table__th">Proveedor</th>
				                								<th class="table__th">Pago</th>
				                								<th class="table__th">Fecha</th>
				                								<?php if(lui_IsAdmin()): ?>
				                									<th class="table__th">Accion</th>
				                								<?php endif; ?>
				                							</tr>
				                						</thead>
				                						<tbody class="table__tbody">
				                							<?php 
				                							foreach ($posts as $value) {
				                								$wo['comprass'] = lui_GetCompra($value->id);
				                								echo lui_LoadPage('compras/list');
				                							} ?>
				                						</tbody>
				                					</table>
				                				</div>
				                			</div>
				                		</div>
				                	</div>
				                </div>
				                <div class="conten_footer_tabla_layshane">
				                	<div class="min_info_layshane_left">
				                		<span><?php echo "Mostrar $page de " . $db->totalPages; ?></span>
				                	</div>
				                	<?php if ($db->totalPages > 1): ?>
					                	<div class="controls_tabla_layshane">
					                		<div>
					                			<a href="<?php echo lui_SeoLink('compras&page-id=1').$link; ?>" data-ajax="?link1=compras&page-id=1<?php echo($link); ?>" class="waves-effect" title='Siguiente pagina'>
					                				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-chevron-left-filled" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 2a3 3 0 0 1 3 3v14a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-14a3 3 0 0 1 3 -3zm-5.293 6.293a1 1 0 0 0 -1.414 0l-3 3l-.083 .094a1 1 0 0 0 .083 1.32l3 3l.094 .083a1 1 0 0 0 1.32 -.083l.083 -.094a1 1 0 0 0 -.083 -1.32l-2.292 -2.293l2.292 -2.293l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor" /></svg>
					                			</a>
					                		</div>
					                		<?php if ($page > 1) {  ?>
					                			<div>
					                				<a href="<?php echo lui_SeoLink('compras&page-id=' . ($page - 1)).$link; ?>" data-ajax="?link1=compras&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Pagina anterior'>
					                					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-chevron-left-filled" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 2a3 3 0 0 1 3 3v14a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-14a3 3 0 0 1 3 -3zm-5.293 6.293a1 1 0 0 0 -1.414 0l-3 3l-.083 .094a1 1 0 0 0 .083 1.32l3 3l.094 .083a1 1 0 0 0 1.32 -.083l.083 -.094a1 1 0 0 0 -.083 -1.32l-2.292 -2.293l2.292 -2.293l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor" /></svg>
					                				</a>
					                			</div>
					                		<?php  } 
					                		$nums       = 0;
					                		$nums_pages = ($page > 4) ? ($page - 4) : $page;
					                		for ($i=$nums_pages; $i <= $db->totalPages; $i++) { 
					                			if ($nums < 20) { ?>
					                				<div class="<?php echo ($page == $i) ? 'active' : ''; ?>">
					                					<a href="<?php echo lui_SeoLink('compras&page-id=' . ($i)).$link; ?>" data-ajax="?link1=compras&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
					                						<?php echo $i ?>  
					                					</a>
					                				</div>
					                			<?php } $nums++; }?>
					                			<?php if ($db->totalPages > $page) { ?>
					                				<div>
					                					<a href="<?php echo lui_SeoLink('compras?page-id=' . ($page + 1)).$link; ?>" data-ajax="?link1=compras&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
					                						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-chevron-right-filled" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 2a3 3 0 0 1 3 3v14a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-14a3 3 0 0 1 3 -3zm-7.387 6.21a1 1 0 0 0 -1.32 .083l-.083 .094a1 1 0 0 0 .083 1.32l2.292 2.293l-2.292 2.293l-.083 .094a1 1 0 0 0 1.497 1.32l3 -3l.083 -.094a1 1 0 0 0 -.083 -1.32l-3 -3z" stroke-width="0" fill="currentColor" /></svg>
					                					</a>
					                				</div>
					                			<?php } ?>
					                			<div>
					                				<a href="<?php echo lui_SeoLink('compras?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?link1=compras&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
					                					<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-chevron-right-filled" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19 2a3 3 0 0 1 3 3v14a3 3 0 0 1 -3 3h-14a3 3 0 0 1 -3 -3v-14a3 3 0 0 1 3 -3zm-7.387 6.21a1 1 0 0 0 -1.32 .083l-.083 .094a1 1 0 0 0 .083 1.32l2.292 2.293l-2.292 2.293l-.083 .094a1 1 0 0 0 1.497 1.32l3 -3l.083 -.094a1 1 0 0 0 -.083 -1.32l-3 -3z" stroke-width="0" fill="currentColor" /></svg>
					                				</a>
					                			</div>
					                		</div>
				                		<?php endif ?>
				                	</div> 
				                	<div class="clearfix"></div>
				                </div>
				            </div>
				        </div>
				        <div class="modal fade" id="modal_documento_views" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
						  <div class="modal-dialog" style="width:100%;max-width:1080px;" role="document">
						    <div class="modal-content modal_content_back">
						      <div class="modal-header">
						        <h5 class="modal-title" id="documentModalLabel"></h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <div class="edit_category_form_alert"></div>
						        <form class="edit_category_lang" method="POST" id="modal-body-langs">
						          <div class="datos_documento_views"></div>
						        </form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary modal_close_btn button3" data-dismiss="modal">Cerrar</button>
						      </div>
						    </div>
						  </div>
						</div>
				        <script type="text/javascript">
				        	$(document).on('click', '.visualizar_compra_orp', function(){
				        		$('#documentModalLabel').html('');
								$('.datos_documento_views').html('');
				        		let compraline = $(this).attr('data-id');
								$.ajax({
									url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=view_orders_stored&hash=' + $('.main_session').val(),
									data: {compralines:compraline},
									type: 'POST',
									success: function (data) {
										console.log(data)
										if (data.status==200){
											$('#documentModalLabel').html(data.title);
											$('.datos_documento_views').html(data.html);
        									$('#modal_documento_views').modal();
										}
									}
								})
							});
			    			$(document).on('click', '.create_order_in_pages', function(){
			    				var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
								$.ajax({
									url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=new_compras&hash=' + $('.main_session').val(),
									type: 'POST',
									success: function (data) {
										if (data.status==200){
											if (comprascontent) {
												comprascontent.click();
											}
										}
									}
								})
							});
			    		</script>
		    		<?php endif ?>
			    <?php endif ?>
			<?php else: ?>
				<style type="text/css">
					.no_hay_compras_registradas{display:flex;padding:20px;width:100%;position:relative;gap:3rem;flex-wrap:wrap;flex-direction:column;align-items:center;justify-content:center;margin-bottom:30px;}
					.no_hay_compras_registradas .svg_order_null{display:block; width:100%;max-width:300px;padding:10px;height:auto;}
					.cta{border:none;background:none;cursor:pointer;position:relative;display:flex;user-select:none;}
					.cta span{padding-bottom:7px;letter-spacing:4px;font-size:14px;padding-right:15px;text-transform:uppercase;}
					.cta svg{transform: translateX(-8px);transition: all 0.3s ease;}
					.cta:hover svg{transform:translateX(0);}
					.cta:active svg{transform:scale(0.9);}
					.hover-underline-animation{position:relative;color:black;padding-bottom:20px;}
					.hover-underline-animation:after{content:"";position:absolute;width:100%;transform:scaleX(0);height:2px;bottom:0;left:0;background-color:#000000;transform-origin:bottom right;transition:transform 0.25s ease-out;}
					.cta:hover .hover-underline-animation:after{transform:scaleX(1);transform-origin:bottom left;}

				</style>
				<div class="no_hay_compras_registradas">
					<svg class="svg_order_null" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="647.63626" height="632.17383" viewBox="0 0 647.63626 632.17383" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M687.3279,276.08691H512.81813a15.01828,15.01828,0,0,0-15,15v387.85l-2,.61005-42.81006,13.11a8.00676,8.00676,0,0,1-9.98974-5.31L315.678,271.39691a8.00313,8.00313,0,0,1,5.31006-9.99l65.97022-20.2,191.25-58.54,65.96972-20.2a7.98927,7.98927,0,0,1,9.99024,5.3l32.5498,106.32Z" transform="translate(-276.18187 -133.91309)" fill="#f2f2f2"/><path d="M725.408,274.08691l-39.23-128.14a16.99368,16.99368,0,0,0-21.23-11.28l-92.75,28.39L380.95827,221.60693l-92.75,28.4a17.0152,17.0152,0,0,0-11.28028,21.23l134.08008,437.93a17.02661,17.02661,0,0,0,16.26026,12.03,16.78926,16.78926,0,0,0,4.96972-.75l63.58008-19.46,2-.62v-2.09l-2,.61-64.16992,19.65a15.01489,15.01489,0,0,1-18.73-9.95l-134.06983-437.94a14.97935,14.97935,0,0,1,9.94971-18.73l92.75-28.4,191.24024-58.54,92.75-28.4a15.15551,15.15551,0,0,1,4.40966-.66,15.01461,15.01461,0,0,1,14.32032,10.61l39.0498,127.56.62012,2h2.08008Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M398.86279,261.73389a9.0157,9.0157,0,0,1-8.61133-6.3667l-12.88037-42.07178a8.99884,8.99884,0,0,1,5.9712-11.24023l175.939-53.86377a9.00867,9.00867,0,0,1,11.24072,5.9707l12.88037,42.07227a9.01029,9.01029,0,0,1-5.9707,11.24072L401.49219,261.33887A8.976,8.976,0,0,1,398.86279,261.73389Z" transform="translate(-276.18187 -133.91309)" fill="var(--boton-fondo)"/><circle cx="190.15351" cy="24.95465" r="20" fill="var(--boton-fondo)"/><circle cx="190.15351" cy="24.95465" r="12.66462" fill="#fff"/><path d="M878.81836,716.08691h-338a8.50981,8.50981,0,0,1-8.5-8.5v-405a8.50951,8.50951,0,0,1,8.5-8.5h338a8.50982,8.50982,0,0,1,8.5,8.5v405A8.51013,8.51013,0,0,1,878.81836,716.08691Z" transform="translate(-276.18187 -133.91309)" fill="#e6e6e6"/><path d="M723.31813,274.08691h-210.5a17.02411,17.02411,0,0,0-17,17v407.8l2-.61v-407.19a15.01828,15.01828,0,0,1,15-15H723.93825Zm183.5,0h-394a17.02411,17.02411,0,0,0-17,17v458a17.0241,17.0241,0,0,0,17,17h394a17.0241,17.0241,0,0,0,17-17v-458A17.02411,17.02411,0,0,0,906.81813,274.08691Zm15,475a15.01828,15.01828,0,0,1-15,15h-394a15.01828,15.01828,0,0,1-15-15v-458a15.01828,15.01828,0,0,1,15-15h394a15.01828,15.01828,0,0,1,15,15Z" transform="translate(-276.18187 -133.91309)" fill="#3f3d56"/><path d="M801.81836,318.08691h-184a9.01015,9.01015,0,0,1-9-9v-44a9.01016,9.01016,0,0,1,9-9h184a9.01016,9.01016,0,0,1,9,9v44A9.01015,9.01015,0,0,1,801.81836,318.08691Z" transform="translate(-276.18187 -133.91309)" fill="var(--boton-fondo)"/><circle cx="433.63626" cy="105.17383" r="20" fill="var(--boton-fondo)"/><circle cx="433.63626" cy="105.17383" r="12.18187" fill="#fff"/></svg>
					<?php if ($wo['config']['can_use_market']) { ?>
						<button class="cta create_order_in_pages">
							<span class="hover-underline-animation"> <?php echo $wo['lang']['buy'] ?> </span>
							<svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
								<path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
							</svg>
						</button>
					<?php } ?>
				</div>
				<script type="text/javascript">
	    			$(document).on('click', '.create_order_in_pages', function(){
	    				var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
						$.ajax({
							url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=new_compras&hash=' + $('.main_session').val(),
							type: 'POST',
							success: function (data) {
								if (data.status==200){
									if (comprascontent) {
										comprascontent.click();
									}
								}
							}
						})
					});
		    	</script>
	    <?php endif ?>
	    <div class="clearfix"></div>
	  </div>
	</div>
</div>

<!-- #END# Vertical Layout -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DeleteModal_compra_inv" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar el producto de la compra?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ActivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Activar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas activar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Activar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SelectedDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Eliminar producto?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Estas seguro que deseas eliminar los productos seleccionados?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="DeleteSelected()" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
    </div>
</div>
<script>

function RemoveProduct_compra_imv_all(id,type = 'show') {
	if(!id){
		return false;
	}
	if(type == 'hide') {
      $('#DeleteModal_compra_inv').find('.btn-primary').attr('onclick', "RemoveProduct_compra_imv_all('"+id+"')");
      $('#DeleteModal_compra_inv').modal('show');
      return false;
    }
    
    hash_id = $('#hash_id').val();
    $.ajax({
    	url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=delete_product_inv_all&hash=' + $('.main_session').val(),
		data: {post_id: id, hash_id:hash_id},
		type: 'POST',
		success: function (data) {
	    	if (data.status==200) {
	    		$('#item_dats_invoice-' + id).fadeOut(300, function() {
			        $(this).remove();
			    });
			    $("#DeleteModal_compra_inv").modal('hide');
	    		$('body').removeClass("menu_atrr");
	    	}
	    	$('#items_st_total').html(data.total_items);
	    	$('#cantidad_st_total').html(data.total_lista);
	    	$('#price_st_total').html(data.total_precio);
		}
	})
  
}
function RemoveProduct_compra_imv_all_atr(id,type = 'show') {
	if(!id){
		return false;
	}
	if(type == 'hide') {
      $('#DeleteModal_compra_inv').find('.btn-primary').attr('onclick', "RemoveProduct_compra_imv_all_atr('"+id+"')");
      $('#DeleteModal_compra_inv').modal('show');
      return false;
    }
    hash_id = $('#hash_id').val();
    $.ajax({
    	url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=delete_product_inv_all_atr&hash=' + $('.main_session').val(),
		data: {post_id: id, hash_id:hash_id},
		type: 'POST',
		success: function (data) {
	    	if (data.status==200) {
	    		$('#item_dats_invoice-' + id).fadeOut(300, function() {
			        $(this).remove();
			    });
			    $("#DeleteModal_compra_inv").modal('hide');
	    		$('body').removeClass("menu_atrr");
	    	}
	    	$('#items_st_total').html(data.total_items);
	    	$('#cantidad_st_total').html(data.total_lista);
	    	$('#price_st_total').html(data.total_precio);
		}
	})
  
}
function RemoveProduct_compra_imv(id,type = 'show') {
	if(!id){
		return false;
	}
	if(type == 'hide') {
      $('#DeleteModal_compra_inv').find('.btn-primary').attr('onclick', "RemoveProduct_compra_imv('"+id+"')");
      $('#DeleteModal_compra_inv').modal('show');
      return false;
    }
    $('#table_products_inv_list_' + id).fadeOut(300, function() {
        $(this).remove();
    });
    productos = $('#table_products_inv_list_' + id).attr('data-prod');
    $("#DeleteModal_compra_inv").modal('hide');
    hash_id = $('#hash_id').val();
    $.ajax({
    	url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=delete_product_inv&hash=' + $('.main_session').val(),
		data: {post_id: id, hash_id:hash_id},
		type: 'POST',
		success: function (data) {
	    	if (data.status==200) {
	    		if(data.cantidad == 0){
	    			var $submenu_add_irtd_docmt = $(this).find('.submenu_add_irtd_docmt');
	    			$('.submenu_add_irtd_docmt').not($submenu_add_irtd_docmt).slideUp();
				    $submenu_add_irtd_docmt.slideToggle();
				    var $subme_add_holder = $(this).find('.placeholder_atri');
				    $('.placeholder_atri').not($subme_add_holder).slideUp();
				    $subme_add_holder.slideToggle();
				    $('#item_dats_invoice-'+productos).slideUp();
	    		}else{
				    var prices_avs = $('.precio_compra_inputs'+productos).val();
					var cant_stkss =  data.cantidad;
					var tsubss         = prices_avs*cant_stkss;
					$('.precio_compra_inputs_totalsub_'+productos).html(tsubss);
	    			$('#cantidad_de_pr_add_'+productos).html(data.cantidad);
	    		}
	    		$('#items_st_total').html(data.total_items);
	    		$('#cantidad_st_total').html(data.total_lista);
	    		$('#price_st_total').html(data.total_precio);
	    		$('body').removeClass("menu_atrr");
	    	}
		}
	})
  
}

$('.check-all').on('click', function(event) {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$('.delete-checkbox, .check-all').change(function(event) {
    $('.delete-selected').attr('disabled', false);
    $('.delete-selected').find('span').text(' (' + $('.delete-checkbox:checked').length + ')');
});

$('.delete-selected').on('click', function(event) {
    event.preventDefault();
    $('#SelectedDeleteModal').modal('show');
});
function DeleteSelected() {
    data = new Array();
    $('td input:checked').parents('tr').each(function () {
        data.push($(this).attr('data_selected'));
    });
    $('.delete-selected').attr('disabled', true);
    $('.delete-selected').text('Espere..');
    $.post(Wo_Ajax_Requests_File()+'?f=admin_setting&s=delete_multi_post', {ids: data,type: 'delete'}, function () {
        $.each( data, function( index, value ){
            $("#list_"+value).remove();
        });
        $('.delete-selected').text('Eliminar lo seleccionado');
    });
}


function DeleteProduct(id,type = 'show') {
  if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#DeleteModal').find('.btn-primary').attr('onclick', "DeleteProduct('"+id+"')");
      $('#DeleteModal').modal('show');
      return false;
    }
       $('#list_' + id).fadeOut(300, function() {
           $(this).remove();
         });
       $("#DeleteModal").modal('hide');
       hash_id = $('#hash_id').val();
      $.post(Wo_Ajax_Requests_File() + "?f=admin_setting&s=delete_post",{post_id: id, hash_id:hash_id});
  
}
function ActivateProduct(id,type = 'show') {
    if (!id) {
   return false;
  }
  if (type == 'hide') {
      $('#ActivateModal').find('.btn-primary').attr('onclick', "ActivateProduct('"+id+"')");
      $('#ActivateModal').modal('show');
      return false;
    }
    $("#ActivateModal").modal('hide');
    $.post(Wo_Ajax_Requests_File() + "?f=admin_setting&s=activate-product",{id: id}, function(data, textStatus, xhr) {
        location.reload()
    });
}
recpoll()
</script>