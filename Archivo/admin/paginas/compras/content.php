<?php
$page           = (!empty($_GET['page-id']) && is_numeric($_GET['page-id'])) ? $_GET['page-id'] : 1;
$filter_keyword = (!empty($_GET['query'])) ? lui_Secure($_GET['query']) : '';
$filter_type    = '';
$db->pageLimit  = 50;
$link = '';

if (!empty($filter_keyword)) {
  $link .= '&query='.$filter_keyword;
  $sql   = "(`documento` LIKE '%$filter_keyword%')";
  $db->where($sql);
}
$sort_link = $link;
$sort_array = array('DESC_i' => array('id' , 'DESC'),
                    'ASC_i'  => array('id' , 'ASC'));
if (!empty($_GET['sort']) && in_array($_GET['sort'], array_keys($sort_array))) {
  $link .= "&sort=".lui_Secure($_GET['sort']);
  $db->orderBy($sort_array[$_GET['sort']][0],$sort_array[$_GET['sort']][1]);
}
else{
    $_GET['sort'] = 'DESC_i';
    $db->orderBy('id', 'DESC');
} 
$posts = $db->where('completado','1')->objectbuilder()->paginate('compras', $page);

if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_LoadAdminLinkSettings('compras'));
  exit();
}
$comprapendiente = $db->where('user_id',lui_Secure($wo['user']['user_id']))->where('completado','0')->getOne("compras");
?>
<?php $wo['proveedores'] = lui_GetProveedoresTypes(''); ?>
<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Tienda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <!-- Vertical Layout -->
    <div class="row">
    	<div class="add_reaction_form_alert"></div>
    	<style type="text/css">
    		.agregar_compras_en_imventario{width:100%;position:relative;padding:20px;}
    		.opciones_para_agregar_compra{display:flex;flex-wrap:wrap;width:100%;}
    		.agregar_compra_comprobante{display:flex;margin:5px;width:calc(100% / 3 - 10px);}
    		.agregar_compra_comprobante label{display:flex;width:100%;height:100%;cursor:pointer;user-select:none;padding:10px;border-radius:4px;border:3px solid #ccc;background:#fff;}
    		.agregar_compra_comprobante input[type="radio"]{display:none;}
    		.agregar_compra_comprobante input[type="radio"]:checked ~ label{border:3px solid #2ecc71;}
			.content_comprobante_create{position:relative;display:flex;width:100%;margin:10px auto;padding:6px;}
			.content_comprobante_create button{margin:5px auto;}
			@media screen and (max-width: 450px){
				.agregar_compra_comprobante{width:calc(100% / 1 - 10px);}
			}
			.contenido_datos_new_compra{display:flex;flex-wrap:wrap;position:relative;padding:20px;width:100%;}
			.contenido_datos_new_compra .document_title{display:block;width:100%;padding:6px;background:#FAFAFA;}
			.comprobante{display:flex;flex-wrap:wrap;background:#FFF;transition:all .5s;width:100%;height:initial;min-height:initial;border:}
			.comprobante_number{width:30%;position:relative;background:#fff;display:flex;flex-wrap:wrap; align-items:center;justify-content:center;padding:5px;align-self:center;}
			.comprobante_number input{text-align:center;outline:none;border:2px solid #ddd;padding:3px;width:100%;}
			.comprobante_number input[type=number]::-webkit-inner-spin-button, 
			.comprobante_number input[type=number]::-webkit-outer-spin-button { 
			  -webkit-appearance: none; 
			  margin: 0; 
			}
			.comprobante_number input[type=number] { -moz-appearance:textfield; }
			.comprobante_number .numdoc_line{margin-bottom:0;}
			.datos_proveedor_box{display:flex;flex-wrap:wrap;justify-content:center;align-items:center;padding:5px;border-radius:8px;border:2px solid #ccc;margin:5px;width:calc(70% - 20px);user-select:none;cursor:pointer;}
			.datos_proveedor_box h5,.datos_proveedor_box p{display:block;width:100%;text-align:center;margin:0;}
			.proveedores_lista_caja{display:block;border-top:2px solid #dee2e6;width:100%;padding:7px;transition:all .5s;}
			.listar_direcciones_del_proveedor{display:block;width:100%;padding:7px;transition:all .5s;}

			.lista_proveedor label{display:block;width:100%;background:rgba(0, 0, 0, 0.05);padding:10px;position:relative;border-radius:6px;cursor:pointer;transition:all .5s;}
			.lista_proveedor label p{margin-bottom:0;}
			.lista_proveedor input[type="radio"]{display:none;}
			.lista_proveedor input[type="radio"]:checked ~ label{background:rgba(0, 0, 0, 0.12);user-select:none;}

			.disabled_provedores_list{height:0;overflow:hidden;padding:0;margin:0;}
			.address_data_proveedor{display:block;width:100%;margin:5px;border:1px dashed #ccc;cursor:pointer;}
			.date_comprovante_compra{display:flex;flex-wrap:wrap;width:100%;margin:5px;border:1px dashed #ccc;cursor:pointer;position:relative;}
			.date_comprovante_compra input{position:relative;border:0;outline:none;width:80%}
			.date_comprovante_compra label{width:20%}
			.date_comprovante_compra input[type="date"]::-webkit-calendar-picker-indicator{background:transparent;bottom:0;color:transparent;cursor:pointer;height:auto;left:0;position:absolute;right:0;top:0;width:auto;}
			.incluir_guia_remicion_data{display:flex;width:100%;justify-content:center;align-items:center;padding:7px;padding-bottom:0;}
			.incluir_guia_remicion_data label{padding:5px;margin:0;user-select:none;position:relative;width:100%;}
			.contenido_guia_remicion_con{width:100%;position:relative;padding:7px;padding-top:0;}
			.contenido_guia_remicion_con input{width:100%;}
			.contenido_guia_remicion_con input[type=number]::-webkit-inner-spin-button, 
			.contenido_guia_remicion_con input[type=number]::-webkit-outer-spin-button { 
			  -webkit-appearance: none; 
			  margin: 0; 
			}
    	</style>
    	<?php  ?>
    	<?php if (isset($comprapendiente->completado)): ?>
    		<?php if ($comprapendiente->num_doc == 0): ?>
    			<div class="agregar_compras_en_imventario">
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
		    <?php else: ?>
		    	
		    	<div class="contenido_datos_new_compra">
		    		<?php if($comprapendiente->documento=='BS'): ?>
		    			<?php $numero_documento_a = '0'.$comprapendiente->num_doc;?>
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
		    				<input class="typenumber_nop" type="number" name="numero_documento" placeholder="Numero documento" value="<?=$numero_documento_a;?>">
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
		    				<label>Fecha de compra</label>
		    				<input type="date" name="fecha" value="<?=date("Y-m-d"); ?>">
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
		    			
			    	</div>
		    	</div>
    		<?php endif ?>
    	<?php else: ?>
    		<div class="content_comprobante_create">
    			<button class="btn btn-info create_order_in_pages">Crear compra</button>
    		</div>
    	<?php endif ?>
<script type="text/javascript">
	$('.create_order_in_pages').click(function(){
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=new_compras&hash=' + $('.main_session').val(),
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					window.location.reload();
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
		var proveedors = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=select_proveedor&hash=' + $('.main_session').val(),
			data: {prov:proveedors},
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					window.location.reload();
				}
			}
		})
	});

	$('input[name="proveedor_compra_address"]').change(function(){
		var proveedors_address = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=select_proveedor_direccion&hash=' + $('.main_session').val(),
			data: {prov:proveedors_address},
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					window.location.reload();
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
				console.log(data)
			}
		})
	});

	$('input[name="tipo_compra_doc"]').change(function(){
		var selected_doc = $(this).val();
		$.ajax({
			url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=document&hash=' + $('.main_session').val(),
			data: {comprobante:selected_doc},
			type: 'POST',
			success: function (data) {
				if (data.status==200){
					window.location.reload();
				}
			}
		})
	});
	
	$('input[type=number]').on('mousewheel',function(e){ $(this).blur(); });
	// Disable keyboard scrolling
	$('input[type=number]').on('keydown',function(e) {
	    var key = e.charCode || e.keyCode;
	    // Disable Up and Down Arrows on Keyboard
	    if(key == 38 || key == 40 ) {
		e.preventDefault();
	    } else {
		return;
	    }
	});
</script>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Compras</h6>
                  <div class="row">
                      <div class="col-md-9" style="margin-bottom:0;">
                        <form method="get" action="<?php echo lui_LoadAdminLinkSettings('compras'); ?>">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-float">
                                  <div class="form-line">
                                      <input type="text" name="query" id="query" class="form-control" value="<?php echo($filter_keyword); ?>" placeholder="Documento">
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-1">
                               <button class="btn btn-info">Buscar</button>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                   <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                   <div class="clearfix"></div>
                   <div class="table-responsive1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                  <th><input type="checkbox" id="check-all" class="filled-in check-all" ><label for="check-all">Todo</label></th>
                                      <th>DOC 
                                  <?php if (!empty($_GET['sort']) && $_GET['sort'] == 'DESC_i') { ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('compras?page-id=1').$sort_link."&sort=ASC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up cursor-p"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
                                  <?php }else{ ?>
                                      <svg onclick="location.href = '<?php echo(lui_LoadAdminLinkSettings('compras?page-id=1').$sort_link."&sort=DESC_i") ?>'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-down cursor-p"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg>
                                  <?php } ?></th>
                                      <th>Nº</th>
                                      <th>Total</th>
                                      <th>Cantidad</th>
                                      <th>Garantia</th>
                                      <th>Proveedor</th>
                                      <th>Pago</th>
                                      <th>Fecha</th>
                                      <?php if(lui_IsAdmin()): ?>
                                      <th>Accion</th>
                                  <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
				                foreach ($posts as $value) {
                                    $wo['comprass'] = lui_GetCompra($value->id);
				                    echo lui_LoadAdminPage('compras/list');
				                }
				               ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="wo-admincp-feturepager">
                        <div class="pull-left">
                            <span>
                              <?php echo "Mostrar $page de " . $db->totalPages; ?>
                            </span>
                        </div>
                        <div class="pull-right">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('compras?page-id=1').$link; ?>" data-ajax="?path=compras&page-id=1<?php echo($link); ?>" class="waves-effect" title='Siguiente pagina'>
                                          <i class="material-icons">first_page</i>
                                      </a>
                                    </li>
                                    <?php if ($page > 1) {  ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('compras?page-id=' . ($page - 1)).$link; ?>" data-ajax="?path=compras&page-id=<?php echo($page - 1) ?><?php echo($link); ?>" class="waves-effect" title='Pagina anterior'>
                                              <i class="material-icons">chevron_left</i>
                                          </a>
                                      </li>
                                    <?php  } ?>

                                    <?php 
                                      $nums       = 0;
                                      $nums_pages = ($page > 4) ? ($page - 4) : $page;

                                      for ($i=$nums_pages; $i <= $db->totalPages; $i++) { 
                                        if ($nums < 20) {
                                    ?>
                                      <li class="<?php echo ($page == $i) ? 'active' : ''; ?>">
                                        <a href="<?php echo lui_LoadAdminLinkSettings('compras?page-id=' . ($i)).$link; ?>" data-ajax="?path=compras&page-id=<?php echo($i) ?><?php echo($link); ?>" class="waves-effect">
                                          <?php echo $i ?>   
                                        </a>
                                      </li>

                                    <?php } $nums++; }?>

                                    <?php if ($db->totalPages > $page) { ?>
                                      <li>
                                          <a href="<?php echo lui_LoadAdminLinkSettings('compras?page-id=' . ($page + 1)).$link; ?>" data-ajax="?path=compras&page-id=<?php echo($page + 1) ?><?php echo($link); ?>" class="waves-effect" title="Next Page">
                                              <i class="material-icons">chevron_right</i>
                                          </a>
                                      </li>
                                    <?php } ?>
                                    <li>
                                      <a href="<?php echo lui_LoadAdminLinkSettings('compras?page-id=' . ($db->totalPages)).$link; ?>" data-ajax="?path=compras&page-id=<?php echo($db->totalPages) ?><?php echo($link); ?>" class="waves-effect" title='Last Page'>
                                          <i class="material-icons">last_page</i>
                                      </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <span>&nbsp;</span>
                                <button type="button" class="btn btn-info waves-effect delete-selected d-block" disabled>Eliminar lo seleccionado<span></span></button>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- #END# Vertical Layout -->
<style type="text/css">
    .td-avatar {
    width: 28px;
}
</style>
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
</script>