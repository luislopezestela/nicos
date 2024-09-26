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
$posts = $db->where('step','1')->where('sucursal',$wo['user']['sucursal'])->objectbuilder()->paginate(T_CASH, $page);
if (($page > $db->totalPages) && !empty($_GET['page-id'])) {
  header("Location: " . lui_SeoLink('caja'));
  exit();
}
$comprapendiente_sear = $db->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH);
$wo['proveedores'] = lui_GetProveedoresTypes('');
$palabra_lang_search = $wo['lang']['search'];
$buscar_letras = str_split($palabra_lang_search);
echo lui_LoadPage("sidebar/left-sidebar"); ?>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_menu">
	<br>
	<div class="wo_settings_page loader_page_content">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span style="color:rgba(46, 204, 113,1.0);">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none">
                  <path d="M2.5 17.5C2.5 19.3856 2.5 20.3284 3.08579 20.9142C3.67157 21.5 4.61438 21.5 6.5 21.5H17.5C19.3856 21.5 20.3284 21.5 20.9142 20.9142C21.5 20.3284 21.5 19.3856 21.5 17.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                  <path d="M10 19.5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M16.5 5.5V8.5M15 5.5H18C18.4659 5.5 18.6989 5.5 18.8827 5.42388C19.1277 5.32239 19.3224 5.12771 19.4239 4.88268C19.5 4.69891 19.5 4.46594 19.5 4C19.5 3.53406 19.5 3.30109 19.4239 3.11732C19.3224 2.87229 19.1277 2.67761 18.8827 2.57612C18.6989 2.5 18.4659 2.5 18 2.5H15C14.5341 2.5 14.3011 2.5 14.1173 2.57612C13.8723 2.67761 13.6776 2.87229 13.5761 3.11732C13.5 3.30109 13.5 3.53406 13.5 4C13.5 4.46594 13.5 4.69891 13.5761 4.88268C13.6776 5.12771 13.8723 5.32239 14.1173 5.42388C14.3011 5.5 14.5341 5.5 15 5.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M21.5 17.5H2.5L3.80394 11.6323C4.13763 10.1306 4.30448 9.37983 4.85289 8.93992C5.4013 8.5 6.17043 8.5 7.70869 8.5H16.2913C17.8296 8.5 18.5987 8.5 19.1471 8.93992C19.6955 9.37983 19.8624 10.1306 20.1961 11.6323L21.5 17.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                  <path d="M7.5 11.5H8M11.75 11.5H12.25M16 11.5H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M7.5 14.5H8M11.75 14.5H12.25M16 14.5H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span> Registros de dinero
					</div>
				</div>
				<?php if (!empty($comprapendiente_sear)): ?>
					<?php $comprapendiente = $db->where('step','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH); ?>
					<?php if(isset($comprapendiente['step'])): ?>
						<button class="btn_prin_compra boton_add_nluis first saved_cash">Guardar</button>
					<?php else: ?>
            <?php $ver_cash = $db->where('open_cash',1)->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH); ?>
            <?php if (!$ver_cash): ?>
							<?php if ($wo['config']['can_use_market']) { ?>
								<button class="btn_prin_compra boton_add_nluis first create_order_in_pages">Crear Caja</button>
							<?php } ?>
            <?php endif ?>
					<?php endif ?>
				<?php else: ?>
          <?php $ver_cash = $db->where('open_cash',1)->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH); ?>
          <?php if (!$ver_cash): ?>
            <?php if ($wo['config']['can_use_market']) { ?>
              <button class="btn_prin_compra boton_add_nluis first create_order_in_pages">Crear Caja</button>
            <?php } ?>
          <?php endif ?>
				<?php endif ?>
			</div>
			<br><br>
	    <?php if (!empty($comprapendiente_sear)): ?>
	    	<?php $comprapendiente = $db->where('step','0')->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH); ?>
        <?php $losturnos = $db->where('estado','1')->where('sucursal',$wo['user']['sucursal'])->get(T_TURNOS); ?>
	    	<?php if(isset($comprapendiente['step'])): ?>
	    			<div class="agregar_compras_en_imventario">
              <input type="text" class="input_name_cash" name="nombre_cash" placeholder="Nombre de la caja">
              <br><br>
			    	</div>
			    	<br>
            <script type="text/javascript">
              $(document).on('click', '.saved_cash', function(){
                var nombresf = $('.input_name_cash').val();
                $.ajax({
                  url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=update_cash',
                  data: {nombre:nombresf},
                  type: 'POST',
                  success: function (data) {
                    if (data.status==200){
                      document.location.reload();
                    }
                  }
                })
              });
            </script>
		    	<?php else: ?>
            <?php $ver_cash = $db->where('open_cash',1)->where('sucursal',$wo['user']['sucursal'])->getOne(T_CASH); ?>
            <?php if ($ver_cash): ?>
              <input type="button" class="exit_cash" name="exit_cash" data-id="<?=$ver_cash['id']; ?>" value="Salir" style="padding:10px;cursor:pointer;background:var(--boton-fondo);color:var(--boton-color);border:0;">
              <br>
              <center><h3><?=$ver_cash['nombre']; ?></h3></center>
              <br>
              <hr>
              <?php $registros_caja = $db->where('cash_id', $ver_cash['id'])->where('estado', 1)->get(T_CASH_REGISTRO); ?>
              <?php 
              $totalesviews = [];
              foreach ($registros_caja as $registromoneda) {
                $metodos_pago_views = json_decode($registromoneda['metodo'], true);
                $monedastotal = $registromoneda['moneda'];
                
                if (!isset($totalesviews[$monedastotal])) {
                    $totalesviews[$monedastotal] = 0;
                }
                $totalesviews[$monedastotal] += isset($metodos_pago_views['totalMonto']) ? (float)$metodos_pago_views['totalMonto'] : 0;
              }
              ?>
              <?php if (!empty($registros_caja)): ?>
                <div class="view_total_monto_caja">
                  <?php foreach ($totalesviews as $monedasview => $montosviw): ?>
                    <?php $simboymoneda = array_search($monedasview, array_column($wo['currencies'], 'text')); ?>
                    <div class="monto_total_caja">
                      <span class="titles_mount"><b><?= $monedasview ?></b></span>
                      <hr>
                      <span class="monto_total_caja_view"><strong>Total</strong> <span class="tolsp"><?=(!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $monedasview; ?> <?= number_format($montosviw, 2, '.', ',') ?></span></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif ?>
              <br>
              <div class="card">
                <div class="card-body">
                  <input type="hidden" id="hash_id" name="hash_id" value="<?php echo lui_CreateSession();?>">
                  <div class="con_layshane_tbles">
                    <div class="container">
                      <div class="row row--top-20">
                        <div class="columna-12">
                          <div class="table-container">
                            <table class="table" style='user-select:none;'>
                              <thead class="table__thead">
                                <tr>
                                  <th class="table__th">Registro</th>
                                  <th class="table__th">Documento</th>
                                  <th class="table__th">Referencia</th>
                                  <th class="table__th">Total</th>
                                  <th class="table__th">Metodo</th>
                                  <th class="table__th">Fecha</th>
                                </tr>
                              </thead>
                              <tbody class="table__tbody">
                                <?php $htmlcaja = ''; ?>
                                <?php foreach ($registros_caja as $registro): ?>
                                  <?php $simboymoneda = array_search($registro['moneda'], array_column($wo['currencies'], 'text'));
                                  $simbolo = (!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $registro['moneda'];
                                  $simbolo = $simbolo.' ';
                                  $laventaseleccionada = $db->where('id',$registro['id_venta'])->where('sucursal', $wo['user']['sucursal'])->getOne(T_VENTAS);
                                  $datacajero = $db->where('user_id',$registro['cajero'])->getOne(T_USERS);
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
                                      $metodo_texto .= $nombre_metodo . ': ' . $simbolo . number_format($value, 2, '.', ',') . '<br>';
                                    }
                                  }
                                  if ($datacajero['first_name'] != "" || $datacajero['last_name'] !="") {
                                    $elcajero = $datacajero['first_name'].' '.$datacajero['first_name'];
                                  }else{
                                    $elcajero = $datacajero['username'];
                                  }
                                  $fecha_registro = new DateTime();
                                  $fecha_registro->setTimestamp($registro['fecha']);
                                  $fecha_formateada = $fecha_registro->format('j \d\e M \d\e Y');
                                  $meses = [
                                    'Jan' => 'ene', 'Feb' => 'feb', 'Mar' => 'mar', 'Apr' => 'abr', 'May' => 'may', 'Jun' => 'jun',
                                    'Jul' => 'jul', 'Aug' => 'ago', 'Sep' => 'sep', 'Oct' => 'oct', 'Nov' => 'nov', 'Dec' => 'dic'
                                  ];
                                  $fecha_formateada = strtr($fecha_formateada, $meses);

                                  $wo['cash'] = $ver_cash;
                                  $wo['registro'] = $registro;
                                  $wo['venta'] = $laventaseleccionada;
                                  $wo['totalmonto'] = $simbolo.$totalMonto;
                                  $wo['cajero'] = $elcajero;
                                  $wo['metodos'] = $metodo_texto;
                                  $wo['fechas'] = ucfirst($fecha_formateada);
                                  $htmlcaja .= lui_LoadPage('caja/lista_registro');
                                  ?>
                                <?php endforeach; ?>
                                <?php  echo $htmlcaja;?>
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
            <?php else: ?>
						  <div class="col-lg-12 col-md-12">
                <div class="cash-register-contenido">
                  <?php
                  // Obtener todas las cajas para la sucursal actual
                  $registradoras = $db->where('sucursal', $wo['user']['sucursal'])->get(T_CASH);
                  
                  foreach ($registradoras as $cash):
                      // Obtener el total de registros y datos de caja
                      $registros_caja = $db->where('cash_id', $cash['id'])->where('estado', 1)->get(T_CASH_REGISTRO);
                      // Agrupar por moneda y sumar el totalMonto
                      $totales = [];
                      foreach ($registros_caja as $registro) {
                          $metodos_pago = json_decode($registro['metodo'], true);
                          $moneda = $registro['moneda'];
                          
                          if (!isset($totales[$moneda])) {
                              $totales[$moneda] = 0;
                          }
                          $totales[$moneda] += isset($metodos_pago['totalMonto']) ? (float)$metodos_pago['totalMonto'] : 0;
                      }
                      
                      // Mostrar tarjeta de caja
                      ?>
                      <div class="cash-register-card">
                          <div class="register-header">
                              <h3><?=$cash['nombre']?></h3>
                              <span class="statuscash <?= $cash['estado'] == 'CERRADO' ? 'closed' : 'open' ?>">
                                  <?=$cash['estado']?>
                              </span>
                          </div>
                          
                          <?php if (!empty($registros_caja)): ?>
                              <div class="current-amount">
                                  <?php foreach ($totales as $moneda => $monto): ?>
                                      <div class="currency-group">
                                          <span class="currency-symbol">
                                            <?php $simboymoneda = array_search($moneda, array_column($wo['currencies'], 'text')); ?>
                                            <?=(!empty($wo['currencies'][$simboymoneda]['symbol'])) ? $wo['currencies'][$simboymoneda]['symbol'] : $moneda; ?>
                                          </span>
                                          <span class="amount"><?= number_format($monto, 2, '.', ',') ?></span>
                                      </div>
                                  <?php endforeach; ?>
                              </div>
                              
                              <?php if ($cash['estado'] == 'ABIERTO'): ?>
                                  <div class="register-details">
                                      <p>Ultimo corte: 30-12-12</p>
                                  </div>
                                  <button class="view-details view_new_cash" data-id="<?=$cash['id']?>">Ver caja</button>
                              <?php else: ?>
                                  <div><p>Caja nueva, Sin registros</p></div>
                                  <br>
                                  <button class="view-details opn_new_cash" style="background:rgba(39, 174, 96,1.0);" data-id="<?=$cash['id']?>">Abrir caja</button>
                              <?php endif; ?>
                          <?php else: ?>
                              <div><p>Caja nueva, Sin registros</p></div>
                              <br>
                              <button class="view-details view_new_cash" data-id="<?=$cash['id']?>">Ver caja</button>
                          <?php endif; ?>
                      </div>
                  <?php endforeach; ?>
                </div>

				      </div>
            <?php endif ?>
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
  										if (data.status==200){
  											$('#documentModalLabel').html(data.title);
  											$('.datos_documento_views').html(data.html);
          							$('#modal_documento_views').modal('show');
  										}
  									}
  								})
  					    });
  			    		$(document).on('click', '.create_order_in_pages', function(){
  			    			var comprascontent = document.querySelector('a[data-ajax="?link1=compras"]');
  								$.ajax({
  									url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=new_cash&hash=' + $('.main_session').val(),
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
                $(document).on('click', '.opn_new_cash', function(){
                  let cash_bar = $(this).attr('data-id');
                  $.ajax({
                    url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=open_new_cash&hash=' + $('.main_session').val(),
                    data: {cash:cash_bar},
                    type: 'POST',
                    success: function (data) {
                      if (data.status==200){
                        window.location.reload();
                      }
                    }
                  })
                });
                $(document).on('click', '.view_new_cash', function(){
                  let cash_bar = $(this).attr('data-id');
                  $.ajax({
                    url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=view_new_cash&hash=' + $('.main_session').val(),
                    data: {cash:cash_bar},
                    type: 'POST',
                    success: function (data) {
                      if (data.status==200){
                        window.location.reload();
                      }
                    }
                  })
                });
                $(document).on('click', '.exit_cash', function(){
                  let cash_bar = $(this).attr('data-id');
                  $.ajax({
                    url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=exit_cash&hash=' + $('.main_session').val(),
                    data: {cash:cash_bar},
                    type: 'POST',
                    success: function (data) {
                      if (data.status==200){
                        window.location.reload();
                      }
                    }
                  })
                });
			    		</script>
		    		<?php endif ?>
			<?php else: ?>
				<style type="text/css">
					.no_hay_compras_registradas{display:flex;padding:20px;width:100%;position:relative;gap:3rem;flex-wrap:wrap;flex-direction:column;align-items:center;justify-content:center;margin-bottom:30px;}
					.no_hay_compras_registradas .svg_order_null{display:block; width:100%;max-width:500px;padding:10px;height:auto;}
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
					<svg class="animated svg_order_null" id="freepik_stories-cash-payment" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"><style>svg#freepik_stories-cash-payment:not(.animated) .animable {opacity: 0;}svg#freepik_stories-cash-payment.animated #freepik--background-complete--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-cash-payment.animated #freepik--Shadow--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) fadeIn;animation-delay: 0s;}svg#freepik_stories-cash-payment.animated #freepik--Plant--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) lightSpeedRight;animation-delay: 0s;}svg#freepik_stories-cash-payment.animated #freepik--character-2--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-cash-payment.animated #freepik--trash-bin--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}svg#freepik_stories-cash-payment.animated #freepik--character-1--inject-132 {animation: 1s 1 forwards cubic-bezier(.36,-0.01,.5,1.38) zoomIn;animation-delay: 0s;}            @keyframes zoomIn {                0% {                    opacity: 0;                    transform: scale(0.5);                }                100% {                    opacity: 1;                    transform: scale(1);                }            }                    @keyframes fadeIn {                0% {                    opacity: 0;                }                100% {                    opacity: 1;                }            }                    @keyframes lightSpeedRight {              from {                transform: translate3d(50%, 0, 0) skewX(-20deg);                opacity: 0;              }              60% {                transform: skewX(10deg);                opacity: 1;              }              80% {                transform: skewX(-2deg);              }              to {                opacity: 1;                transform: translate3d(0, 0, 0);              }            }        </style><g id="freepik--background-complete--inject-132" class="animable" style="transform-origin: 250px 228.23px;"><rect y="382.4" width="500" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 250px 382.525px;" id="el5spycxvhnmm" class="animable"></rect><rect x="416.78" y="398.49" width="33.12" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 433.34px 398.615px;" id="eltjzkt3hxxai" class="animable"></rect><rect x="322.53" y="401.21" width="8.69" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 326.875px 401.335px;" id="elaueit0ix0ya" class="animable"></rect><rect x="396.59" y="389.21" width="19.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 406.185px 389.335px;" id="elcw0b0abfq6b" class="animable"></rect><rect x="52.46" y="390.89" width="43.19" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 74.055px 391.015px;" id="eletu0mbcrppa" class="animable"></rect><rect x="104.56" y="390.89" width="6.33" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 107.725px 391.015px;" id="elycou25klhqm" class="animable"></rect><rect x="131.47" y="395.11" width="93.68" height="0.25" style="fill: rgb(235, 235, 235); transform-origin: 178.31px 395.235px;" id="elp6mz3extcoc" class="animable"></rect><path d="M237,337.8H43.91a5.71,5.71,0,0,1-5.7-5.71V60.66A5.71,5.71,0,0,1,43.91,55H237a5.71,5.71,0,0,1,5.71,5.71V332.09A5.71,5.71,0,0,1,237,337.8ZM43.91,55.2a5.46,5.46,0,0,0-5.45,5.46V332.09a5.46,5.46,0,0,0,5.45,5.46H237a5.47,5.47,0,0,0,5.46-5.46V60.66A5.47,5.47,0,0,0,237,55.2Z" style="fill: rgb(235, 235, 235); transform-origin: 140.46px 196.4px;" id="elmfnpjot1yv" class="animable"></path><path d="M453.31,337.8H260.21a5.72,5.72,0,0,1-5.71-5.71V60.66A5.72,5.72,0,0,1,260.21,55h193.1A5.71,5.71,0,0,1,459,60.66V332.09A5.71,5.71,0,0,1,453.31,337.8ZM260.21,55.2a5.47,5.47,0,0,0-5.46,5.46V332.09a5.47,5.47,0,0,0,5.46,5.46h193.1a5.47,5.47,0,0,0,5.46-5.46V60.66a5.47,5.47,0,0,0-5.46-5.46Z" style="fill: rgb(235, 235, 235); transform-origin: 356.75px 196.4px;" id="elyievfvcov5f" class="animable"></path><rect x="344.42" y="111.7" width="105.48" height="270.61" style="fill: rgb(235, 235, 235); transform-origin: 397.16px 247.005px;" id="elefkha0ifc7" class="animable"></rect><rect x="431.32" y="111.7" width="18.58" height="270.61" style="fill: rgb(245, 245, 245); transform-origin: 440.61px 247.005px;" id="elszouv5icifa" class="animable"></rect><rect x="353.26" y="123.09" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 136.315px;" id="el9jve14j5g0v" class="animable"></rect><rect x="371.23" y="123.09" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 136.315px;" id="elb4ioegya5aq" class="animable"></rect><rect x="389.2" y="123.09" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 136.315px;" id="elskaiu8zt5f8" class="animable"></rect><rect x="407.17" y="123.09" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 136.315px;" id="el80iuhnx7lip" class="animable"></rect><rect x="353.26" y="157.27" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 170.495px;" id="elgmf9frfqprh" class="animable"></rect><rect x="371.23" y="157.27" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 170.495px;" id="elkt8jr5tn89h" class="animable"></rect><rect x="389.2" y="157.27" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 170.495px;" id="elcp8jb0suc39" class="animable"></rect><rect x="407.17" y="157.27" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 170.495px;" id="eltf1x2fh6tg" class="animable"></rect><rect x="353.26" y="191.45" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 204.675px;" id="eln7bq97e3fi" class="animable"></rect><rect x="371.23" y="191.45" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 204.675px;" id="elfxqb8qvpwt" class="animable"></rect><rect x="389.2" y="191.45" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 204.675px;" id="elef9kkco6qi" class="animable"></rect><rect x="407.17" y="191.45" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 204.675px;" id="elq0p8c72x1ne" class="animable"></rect><rect x="353.26" y="225.64" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 238.865px;" id="el4mfxhrc6937" class="animable"></rect><rect x="371.23" y="225.64" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 238.865px;" id="el2u9veopuv3m" class="animable"></rect><rect x="389.2" y="225.64" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 238.865px;" id="elb7g88ciltc7" class="animable"></rect><rect x="407.17" y="225.64" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 238.865px;" id="elmrv7th36vcf" class="animable"></rect><rect x="353.26" y="259.82" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 273.045px;" id="el3ay7o1iiw7q" class="animable"></rect><rect x="371.23" y="259.82" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 273.045px;" id="el2wst1pvmamt" class="animable"></rect><rect x="389.2" y="259.82" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 273.045px;" id="elj7d5nxv0zf" class="animable"></rect><rect x="407.17" y="259.82" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 273.045px;" id="eljk2qsb2tcar" class="animable"></rect><rect x="353.26" y="294" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 360.495px 307.225px;" id="elpski22t53p9" class="animable"></rect><rect x="371.23" y="294" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 378.465px 307.225px;" id="elqlpvfbn4upl" class="animable"></rect><rect x="389.2" y="294" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 396.435px 307.225px;" id="elgt5i9msn8c" class="animable"></rect><rect x="407.17" y="294" width="14.47" height="26.45" style="fill: rgb(230, 230, 230); transform-origin: 414.405px 307.225px;" id="elolsya7k0gh8" class="animable"></rect><rect x="121.61" y="157.51" width="168.05" height="223.81" style="fill: rgb(240, 240, 240); transform-origin: 205.635px 269.415px;" id="el925anox0t89" class="animable"></rect><rect x="125.18" y="163.12" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 178.27px;" id="elg3y6nfc31dq" class="animable"></rect><rect x="125.18" y="199.39" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 214.54px;" id="el5l27ppbhuct" class="animable"></rect><rect x="125.18" y="235.65" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 250.8px;" id="el625jzb9wu2r" class="animable"></rect><rect x="125.18" y="271.92" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 287.07px;" id="elgk1lckur04k" class="animable"></rect><rect x="125.18" y="308.19" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 323.34px;" id="elvp1ng5wlpl9" class="animable"></rect><rect x="125.18" y="344.46" width="133.98" height="30.3" style="fill: rgb(230, 230, 230); transform-origin: 192.17px 359.61px;" id="eluihvk9t2c1" class="animable"></rect><rect x="266.04" y="157.51" width="23.62" height="223.81" style="fill: rgb(245, 245, 245); transform-origin: 277.85px 269.415px;" id="el2agudmb1ars" class="animable"></rect><rect x="136.97" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 144.2px 183.34px;" id="elottufg93vg" class="animable"></rect><rect x="156.2" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 163.43px 183.34px;" id="el0p75yndcmuzh" class="animable"></rect><rect x="175.44" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 182.67px 183.34px;" id="elu7kp7sd87wh" class="animable"></rect><rect x="194.67" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 201.9px 183.34px;" id="el6gka5751mc" class="animable"></rect><rect x="213.91" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 221.14px 183.34px;" id="el1owqfc015mr" class="animable"></rect><rect x="233.15" y="173.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 240.38px 183.34px;" id="elcf5miktd80h" class="animable"></rect><rect x="136.38" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 143.61px 219.54px;" id="elqlro6ha72ts" class="animable"></rect><rect x="155.61" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 162.84px 219.54px;" id="el7c9w27leyzg" class="animable"></rect><rect x="174.85" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 182.08px 219.54px;" id="el1epdti0v5ks" class="animable"></rect><rect x="194.09" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 201.32px 219.54px;" id="elh9qth512km6" class="animable"></rect><rect x="213.32" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 220.55px 219.54px;" id="elwwuc8m5yrjf" class="animable"></rect><rect x="232.56" y="209.46" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 239.79px 219.54px;" id="elrp5p1g3oia" class="animable"></rect><rect x="135.79" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 143.02px 255.74px;" id="el0cph7k40qp17" class="animable"></rect><rect x="155.03" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 162.26px 255.74px;" id="elsz5z8crrr8" class="animable"></rect><rect x="174.26" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 181.49px 255.74px;" id="elaz4t2vj5wp8" class="animable"></rect><rect x="193.5" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 200.73px 255.74px;" id="elp47uylo24zj" class="animable"></rect><rect x="212.74" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 219.97px 255.74px;" id="el36652hs3exl" class="animable"></rect><rect x="231.97" y="245.66" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 239.2px 255.74px;" id="elzjj573lx0p" class="animable"></rect><rect x="135.2" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 142.43px 291.94px;" id="eliuomjb2hw3" class="animable"></rect><rect x="154.44" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 161.67px 291.94px;" id="el613k02tx63y" class="animable"></rect><rect x="173.68" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 180.91px 291.94px;" id="el0581rrmzvjw5" class="animable"></rect><rect x="192.91" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 200.14px 291.94px;" id="elsohdzgbe7dr" class="animable"></rect><rect x="212.15" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 219.38px 291.94px;" id="el3a4ouigslpv" class="animable"></rect><rect x="231.38" y="281.86" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 238.61px 291.94px;" id="el6l5wnpz87t8" class="animable"></rect><rect x="134.62" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 141.85px 328.14px;" id="elsbqm64hfe3q" class="animable"></rect><rect x="153.85" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 161.08px 328.14px;" id="elynyv05i02co" class="animable"></rect><rect x="173.09" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 180.32px 328.14px;" id="el7cia8xcmci2" class="animable"></rect><rect x="192.33" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 199.56px 328.14px;" id="eljwfui3qa99" class="animable"></rect><rect x="211.56" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 218.79px 328.14px;" id="elm1i140pohs" class="animable"></rect><rect x="230.8" y="318.06" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 238.03px 328.14px;" id="elzszjc3vmx3" class="animable"></rect><rect x="134.03" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 141.26px 364.34px;" id="elbue5pomxaen" class="animable"></rect><rect x="153.27" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 160.5px 364.34px;" id="elwdvu9leeii" class="animable"></rect><rect x="172.5" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 179.73px 364.34px;" id="elk2pl1y6ywzc" class="animable"></rect><rect x="191.74" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 198.97px 364.34px;" id="el0nne95g5zsq" class="animable"></rect><rect x="210.97" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 218.2px 364.34px;" id="elr27sp4j6ww" class="animable"></rect><rect x="230.21" y="354.26" width="14.46" height="20.16" style="fill: rgb(235, 235, 235); transform-origin: 237.44px 364.34px;" id="el8q4cjzmc203" class="animable"></rect><rect x="52.46" y="149.58" width="168.05" height="231.74" style="fill: rgb(240, 240, 240); transform-origin: 136.485px 265.45px;" id="elh05xbnaoole" class="animable"></rect><rect x="56.03" y="155.39" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 171.075px;" id="elffgpddcs5km" class="animable"></rect><rect x="56.03" y="192.94" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 208.625px;" id="elvly8yu43e4b" class="animable"></rect><rect x="56.03" y="230.49" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 246.175px;" id="ela5d0taoc6z" class="animable"></rect><rect x="56.03" y="268.05" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 283.735px;" id="elh6dxa0k42yt" class="animable"></rect><rect x="56.03" y="305.6" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 321.285px;" id="elm6rdiaj8ghn" class="animable"></rect><rect x="56.03" y="343.15" width="133.98" height="31.37" style="fill: rgb(230, 230, 230); transform-origin: 123.02px 358.835px;" id="el3wq6whlg3wj" class="animable"></rect><rect x="196.89" y="149.58" width="23.62" height="231.74" style="fill: rgb(245, 245, 245); transform-origin: 208.7px 265.45px;" id="el5ocjmz39mfw" class="animable"></rect><rect x="67.82" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 75.05px 176.325px;" id="elsupiibqbndo" class="animable"></rect><rect x="87.05" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 94.28px 176.325px;" id="elj5m9x58nvg" class="animable"></rect><rect x="106.29" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 113.52px 176.325px;" id="elgx38668y6rh" class="animable"></rect><rect x="125.52" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 132.75px 176.325px;" id="elckiusrdm598" class="animable"></rect><rect x="144.76" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 151.99px 176.325px;" id="eluynjioq6t6g" class="animable"></rect><rect x="164" y="165.89" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 171.23px 176.325px;" id="elzgk36qlqbv" class="animable"></rect><rect x="67.23" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 74.46px 213.805px;" id="ela6rgc0z5sv4" class="animable"></rect><rect x="86.47" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 93.7px 213.805px;" id="el8uuwlcako3f" class="animable"></rect><rect x="105.7" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 112.93px 213.805px;" id="elf7fyfmodxd9" class="animable"></rect><rect x="124.94" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 132.17px 213.805px;" id="eloalx1ena3uf" class="animable"></rect><rect x="144.17" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 151.4px 213.805px;" id="ellsds0w8tw6b" class="animable"></rect><rect x="163.41" y="203.37" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 170.64px 213.805px;" id="elt7zbwmpeyx" class="animable"></rect><rect x="66.64" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 73.87px 251.285px;" id="elembekl64wss" class="animable"></rect><rect x="85.88" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 93.11px 251.285px;" id="elz17f057bath" class="animable"></rect><rect x="105.11" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 112.34px 251.285px;" id="elyy2uuly2z9n" class="animable"></rect><rect x="124.35" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 131.58px 251.285px;" id="elmxqv56hb01q" class="animable"></rect><rect x="143.59" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 150.82px 251.285px;" id="elyujqxza3sum" class="animable"></rect><rect x="162.82" y="240.85" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 170.05px 251.285px;" id="el07pqqs8z6lr" class="animable"></rect><rect x="66.06" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 73.29px 288.775px;" id="eljnrxvhew63e" class="animable"></rect><rect x="85.29" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 92.52px 288.775px;" id="elnv2ryrcfff" class="animable"></rect><rect x="104.53" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 111.76px 288.775px;" id="elwpk7u0j1def" class="animable"></rect><rect x="123.76" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 130.99px 288.775px;" id="els45nlqvdgi" class="animable"></rect><rect x="143" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 150.23px 288.775px;" id="eldq1utwrg5pv" class="animable"></rect><rect x="162.24" y="278.34" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 169.47px 288.775px;" id="ely1ty3khub5m" class="animable"></rect><rect x="65.47" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 72.7px 326.255px;" id="el64v66tx0vht" class="animable"></rect><rect x="84.7" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 91.93px 326.255px;" id="elvljkmhh1no" class="animable"></rect><rect x="103.94" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 111.17px 326.255px;" id="el5f7d4dpw756" class="animable"></rect><rect x="123.18" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 130.41px 326.255px;" id="el3v6e7nqb4fs" class="animable"></rect><rect x="142.41" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 149.64px 326.255px;" id="el8nvwhr7alp9" class="animable"></rect><rect x="161.65" y="315.82" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 168.88px 326.255px;" id="elni5urenmv1" class="animable"></rect><rect x="64.88" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 72.11px 363.745px;" id="el38cos9prrlr" class="animable"></rect><rect x="84.12" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 91.35px 363.745px;" id="elk1vx92d1u1r" class="animable"></rect><rect x="103.35" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 110.58px 363.745px;" id="ellw0e9eae3bm" class="animable"></rect><rect x="122.59" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 129.82px 363.745px;" id="elg994k87yeun" class="animable"></rect><rect x="141.83" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 149.06px 363.745px;" id="elferif31k6e6" class="animable"></rect><rect x="161.06" y="353.31" width="14.46" height="20.87" style="fill: rgb(235, 235, 235); transform-origin: 168.29px 363.745px;" id="elxmp3hyfvwc9" class="animable"></rect><rect x="103.94" y="55.2" width="3.78" height="27.89" style="fill: rgb(245, 245, 245); transform-origin: 105.83px 69.145px;" id="elsl22gkiyszs" class="animable"></rect><rect x="198.94" y="55.2" width="3.78" height="27.89" style="fill: rgb(245, 245, 245); transform-origin: 200.83px 69.145px;" id="elq64v2hyqzbn" class="animable"></rect><rect x="88.35" y="77.72" width="127.28" height="40.53" style="fill: rgb(235, 235, 235); transform-origin: 151.99px 97.985px;" id="el0xi29i605la" class="animable"></rect><rect x="210.32" y="77.72" width="5.3" height="40.53" style="fill: rgb(230, 230, 230); transform-origin: 212.97px 97.985px;" id="eldgbmixsaes" class="animable"></rect></g><g id="freepik--Shadow--inject-132" class="animable" style="transform-origin: 250px 416.24px;"><ellipse id="freepik--path--inject-132" cx="250" cy="416.24" rx="193.89" ry="11.32" style="fill: rgb(245, 245, 245); transform-origin: 250px 416.24px;" class="animable"></ellipse></g><g id="freepik--Plant--inject-132" class="animable" style="transform-origin: 79.2466px 359.647px;"><path d="M81.48,388.48s-5.65-12.33.81-24.48,8.32-15,4.21-17.5-6,9.72-6,9.72-3.46-8.4-.6-17.19,4.66-23.11.75-24.65-.75,17.86-4.14,24.48a57,57,0,0,1-3.32-14.43c-.47-7.06.26-18.33-2.83-21.22s-5.06-.89-2,14.69a162.92,162.92,0,0,1,3,28.25s-6.71-20.44-11.21-21-4.49,6-.64,11.76,11.28,16,12.5,21.32c0,0-7.36-15.38-14-10.66s5.76,14,11.28,17.36,9.35,24.4,9.35,24.4Z" style="fill: rgb(64, 123, 255); transform-origin: 72.3924px 345.712px;" id="elsg2qfp7sa5" class="animable"></path><g id="elgyxythaissu"><path d="M81.48,388.48s-5.65-12.33.81-24.48,8.32-15,4.21-17.5-6,9.72-6,9.72-3.46-8.4-.6-17.19,4.66-23.11.75-24.65-.75,17.86-4.14,24.48a57,57,0,0,1-3.32-14.43c-.47-7.06.26-18.33-2.83-21.22s-5.06-.89-2,14.69a162.92,162.92,0,0,1,3,28.25s-6.71-20.44-11.21-21-4.49,6-.64,11.76,11.28,16,12.5,21.32c0,0-7.36-15.38-14-10.66s5.76,14,11.28,17.36,9.35,24.4,9.35,24.4Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 72.3924px 345.712px;" class="animable"></path></g><path d="M77,393.53s5.5-12.41-1.1-24.46-8.5-14.89-4.42-17.44,6.12,9.63,6.12,9.63,3.37-8.45.4-17.2-4.94-23-1-24.63,1,17.85,4.44,24.41a56.94,56.94,0,0,0,3.14-14.47c.39-7.07-.48-18.33,2.57-21.27s5.06-1,2.21,14.66a162.68,162.68,0,0,0-2.67,28.29s6.46-20.53,11-21.2,4.56,6,.78,11.76-11.08,16.19-12.24,21.5c0,0,7.17-15.49,13.85-10.88s-5.59,14.09-11.07,17.53-9.06,24.54-9.06,24.54Z" style="fill: rgb(64, 123, 255); transform-origin: 85.6796px 350.624px;" id="elvoh8c2muzp" class="animable"></path><g id="elrdvgcmuzl9m"><path d="M77,393.53s5.5-12.41-1.1-24.46-8.5-14.89-4.42-17.44,6.12,9.63,6.12,9.63,3.37-8.45.4-17.2-4.94-23-1-24.63,1,17.85,4.44,24.41a56.94,56.94,0,0,0,3.14-14.47c.39-7.07-.48-18.33,2.57-21.27s5.06-1,2.21,14.66a162.68,162.68,0,0,0-2.67,28.29s6.46-20.53,11-21.2,4.56,6,.78,11.76-11.08,16.19-12.24,21.5c0,0,7.17-15.49,13.85-10.88s-5.59,14.09-11.07,17.53-9.06,24.54-9.06,24.54Z" style="fill: rgb(255, 255, 255); opacity: 0.7; isolation: isolate; transform-origin: 85.6796px 350.624px;" class="animable"></path></g><polygon points="102.39 384.68 56.95 384.68 60.63 417.2 98.72 417.2 102.39 384.68" style="fill: rgb(64, 123, 255); transform-origin: 79.67px 400.94px;" id="elc8ttgnhhglk" class="animable"></polygon></g><g id="freepik--character-2--inject-132" class="animable" style="transform-origin: 296.27px 260.393px;"><polygon points="259.51 239.62 194.85 239.62 194.85 191.54 235.51 191.54 239.2 211.49 259.51 219.73 259.51 239.62" style="fill: rgb(38, 50, 56); transform-origin: 227.18px 215.58px;" id="elcr63cbx6sv" class="animable"></polygon><g id="elfudl18mzdgg"><polygon points="259.51 239.62 194.85 239.62 194.85 191.54 235.51 191.54 239.2 211.49 259.51 219.73 259.51 239.62" style="fill: rgb(255, 255, 255); opacity: 0.1; isolation: isolate; transform-origin: 227.18px 215.58px;" class="animable"></polygon></g><g id="el58oc7dxgqqw"><polygon points="229.51 239.62 192.85 239.62 192.85 191.54 205.51 191.54 209.2 211.49 229.51 219.73 229.51 239.62" style="fill: rgb(255, 255, 255); opacity: 0.1; isolation: isolate; transform-origin: 211.18px 215.58px;" class="animable"></polygon></g><g id="elu9qblcn52aa"><polygon points="234.27 200.71 233.18 194.8 209.82 194.8 210.91 200.71 234.27 200.71" style="opacity: 0.2; isolation: isolate; transform-origin: 222.045px 197.755px;" class="animable"></polygon></g><g id="elgmd7ybzhgkq"><polygon points="211.4 203.35 212.18 207.57 235.54 207.57 234.76 203.35 211.4 203.35" style="opacity: 0.2; isolation: isolate; transform-origin: 223.47px 205.46px;" class="animable"></polygon></g><g id="el490h7ofz2mv"><polygon points="209.2 211.49 239.2 211.49 259.51 219.73 229.51 219.73 209.2 211.49" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 234.355px 215.61px;" class="animable"></polygon></g><g id="freepik--group--inject-132" class="animable" style="transform-origin: 308.037px 260.393px;"><path d="M307.89,155.72c6.32,3.22,4.51,18.72-11.65,47.66l-11.07-9a163.7,163.7,0,0,1,10.16-26.16C301.88,155.16,307.89,155.72,307.89,155.72Z" style="fill: rgb(64, 123, 255); transform-origin: 298.221px 179.548px;" id="elanmplbcg77a" class="animable"></path><g id="elcsiu66j05z"><path d="M307.89,155.72c6.32,3.22,4.51,18.72-11.65,47.66l-11.07-9a163.7,163.7,0,0,1,10.16-26.16C301.88,155.16,307.89,155.72,307.89,155.72Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 298.221px 179.548px;" class="animable"></path></g><path d="M362.17,225.38h-43c-4.09,22.35-16.9,101.42-7.71,171.87L326,395.44s-1.35-93.53,11.52-128.1c1.48,18.5,3.23,38.19,4.76,48.67C346,341.79,354,398.15,354,398.15h14.83s-3-53.94-4.44-79.29C362.89,291.35,362.23,231,362.17,225.38Z" style="fill: rgb(38, 50, 56); transform-origin: 338.521px 311.765px;" id="elaqienb6w63o" class="animable"></path><path d="M304.81,155.94c4.45-1,27.92-6.26,46.86-5.52,0,0,6.09,62.41,11.8,87.78l-49.53,8.68s-11.12-62.1-9.91-90A1,1,0,0,1,304.81,155.94Z" style="fill: rgb(64, 123, 255); transform-origin: 333.704px 198.614px;" id="el6kj8sjva42p" class="animable"></path><g id="eljm3micw4f97"><path d="M304.81,155.94c4.45-1,27.92-6.26,46.86-5.52,0,0,6.09,62.41,11.8,87.78l-49.53,8.68s-11.12-62.1-9.91-90A1,1,0,0,1,304.81,155.94Z" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 333.704px 198.614px;" class="animable"></path></g><path d="M347.25,149.58s-5.67,23.84,9.83,44.09l3.83,25.43,4.45,21.06-24.64,6.5-8.83-19.77L331,248.72l-19.61,2.86-2.13-25S305.87,206.84,305,196c0,0-2.94-25.12,1.64-41.14l6.45-1.39s.36,15.31,10.16,27.59c0,0,9.3-24.51,17.74-31.45Z" style="fill: rgb(64, 123, 255); transform-origin: 334.715px 200.58px;" id="elm17maz3luu" class="animable"></path><g id="elu55xyucckrb"><path d="M347.25,149.58s-5.67,23.84,9.83,44.09l3.83,25.43,4.45,21.06-24.64,6.5-8.83-19.77L331,248.72l-19.61,2.86-2.13-25S305.87,206.84,305,196c0,0-2.94-25.12,1.64-41.14l6.45-1.39s.36,15.31,10.16,27.59c0,0,9.3-24.51,17.74-31.45Z" style="opacity: 0.2; isolation: isolate; transform-origin: 334.715px 200.58px;" class="animable"></path></g><path d="M287.28,189.72s-2.94,8.05-5.19,8.31-16.88-24.28-16.88-24.28-1.68-4.87-4.45-6.19-11-6-13.12-4.94-1,9.16-1,11c0,1.62,7,4,9.1,4.4a7.08,7.08,0,0,0,4.06-.36s11.73,28.88,19.34,33.94,19.07-12.15,19.07-12.15Z" style="fill: rgb(235, 179, 118); transform-origin: 272.277px 187.498px;" id="elw07hy4jahvs" class="animable"></path><polygon points="283.27 193.82 285.35 192.15 298 202.85 295.97 206.48 283.27 193.82" style="fill: rgb(64, 123, 255); transform-origin: 290.635px 199.315px;" id="el575hza0n1ys" class="animable"></polygon><g id="el9kzfdis8ahr"><polygon points="283.27 193.82 285.35 192.15 298 202.85 295.97 206.48 283.27 193.82" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 290.635px 199.315px;" class="animable"></polygon></g><polygon points="324.42 409.52 316.06 410.4 314.49 392.36 322.85 391.47 324.42 409.52" style="fill: rgb(235, 179, 118); transform-origin: 319.455px 400.935px;" id="eld57zdbande" class="animable"></polygon><polygon points="366.18 408.91 358.07 408.91 357.4 390.13 365.51 390.13 366.18 408.91" style="fill: rgb(235, 179, 118); transform-origin: 361.79px 399.52px;" id="elbx8u3mqhvnm" class="animable"></polygon><path d="M356.94,408h9.85a.73.73,0,0,1,.7.56l1.59,7.22a1.19,1.19,0,0,1-.92,1.42,1.14,1.14,0,0,1-.26,0c-3.19-.05-5.51-.24-9.51-.24-2.47,0-9.9.25-13.31.25s-3.84-3.36-2.45-3.67c6.25-1.36,10.95-3.25,12.95-5A2,2,0,0,1,356.94,408Z" style="fill: rgb(38, 50, 56); transform-origin: 355.498px 412.605px;" id="el4ca3uwdpmni" class="animable"></path><path d="M354.26,409.4a2.43,2.43,0,0,1-1.55-.42,1.13,1.13,0,0,1-.41-1,.58.58,0,0,1,.33-.53c.9-.47,3.52,1.14,3.81,1.33a.17.17,0,0,1,.09.18.21.21,0,0,1-.14.17A10.93,10.93,0,0,1,354.26,409.4Zm-1.2-1.69a.51.51,0,0,0-.25.06c-.05,0-.12.07-.13.22a.81.81,0,0,0,.26.69,3.91,3.91,0,0,0,2.89.15A8,8,0,0,0,353.06,407.71Z" style="fill: rgb(64, 123, 255); transform-origin: 354.413px 408.385px;" id="ellzwgpnw2tag" class="animable"></path><path d="M356.34,409.11h-.1c-.83-.46-2.45-2.24-2.29-3.1a.63.63,0,0,1,.62-.5,1.06,1.06,0,0,1,.82.24c.94.77,1.13,3.1,1.14,3.21a.21.21,0,0,1-.09.18A.17.17,0,0,1,356.34,409.11Zm-1.63-3.29h-.1c-.24,0-.26.14-.28.19-.1.53.93,1.88,1.77,2.51a4.62,4.62,0,0,0-1-2.54A.67.67,0,0,0,354.71,405.82Z" style="fill: rgb(64, 123, 255); transform-origin: 355.235px 407.321px;" id="elk5gznjg2fl9" class="animable"></path><path d="M315.17,407.71H325a.73.73,0,0,1,.69.56l1.6,7.22a1.2,1.2,0,0,1-.92,1.42l-.26,0c-3.19-.06-5.51-.25-9.51-.25-2.47,0-9.91.26-13.31.26s-3.85-3.37-2.45-3.68c6.25-1.36,10.95-3.25,12.95-5A2,2,0,0,1,315.17,407.71Z" style="fill: rgb(38, 50, 56); transform-origin: 313.706px 412.315px;" id="eleiq9za71nk" class="animable"></path><path d="M312.49,409.14a2.47,2.47,0,0,1-1.56-.41,1.18,1.18,0,0,1-.4-1,.57.57,0,0,1,.33-.53c.9-.47,3.52,1.14,3.81,1.33a.18.18,0,0,1,.09.18.2.2,0,0,1-.15.17A9.43,9.43,0,0,1,312.49,409.14Zm-1.21-1.68a.4.4,0,0,0-.24.05c-.06,0-.12.07-.13.23a.83.83,0,0,0,.26.69,4,4,0,0,0,2.89.14A8,8,0,0,0,311.28,407.46Z" style="fill: rgb(64, 123, 255); transform-origin: 312.643px 408.131px;" id="eln1rjy8fl1z" class="animable"></path><path d="M314.56,408.85h-.09c-.84-.45-2.45-2.24-2.29-3.1a.63.63,0,0,1,.62-.5,1,1,0,0,1,.81.25c.94.76,1.14,3.09,1.15,3.2a.23.23,0,0,1-.09.18A.2.2,0,0,1,314.56,408.85Zm-1.63-3.29h-.09c-.25,0-.27.14-.28.19-.1.53.93,1.88,1.77,2.51a4.62,4.62,0,0,0-1-2.54A.7.7,0,0,0,312.93,405.56Z" style="fill: rgb(64, 123, 255); transform-origin: 313.464px 407.06px;" id="elzptn63l1wq" class="animable"></path><g id="el77kw15rhtiu"><polygon points="322.85 391.47 314.49 392.36 315.3 401.67 323.67 400.78 322.85 391.47" style="opacity: 0.2; isolation: isolate; transform-origin: 319.08px 396.57px;" class="animable"></polygon></g><g id="eljg0qtlifl8e"><polygon points="365.51 390.14 357.4 390.14 357.75 399.82 365.87 399.82 365.51 390.14" style="opacity: 0.2; isolation: isolate; transform-origin: 361.635px 394.98px;" class="animable"></polygon></g><polygon points="309.76 400.64 327.79 397.96 327.24 392.96 308.48 395.43 309.76 400.64" style="fill: rgb(64, 123, 255); transform-origin: 318.135px 396.8px;" id="eljuq9kxf1s4" class="animable"></polygon><g id="elh6qmbrp10cq"><polygon points="309.76 400.64 327.79 397.96 327.24 392.96 308.48 395.43 309.76 400.64" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 318.135px 396.8px;" class="animable"></polygon></g><polygon points="352.24 398.27 369.73 398.27 369.73 393.04 351.58 392.7 352.24 398.27" style="fill: rgb(64, 123, 255); transform-origin: 360.655px 395.485px;" id="el6f9805ydf9k" class="animable"></polygon><g id="elwyrdo4cimtp"><polygon points="352.24 398.27 369.73 398.27 369.73 393.04 351.58 392.7 352.24 398.27" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 360.655px 395.485px;" class="animable"></polygon></g><g id="elvqypbz2anfb"><path d="M337.5,267.34A115.2,115.2,0,0,0,332.7,286c-1.21-16.47,3.61-33.93,3.61-33.93Z" style="opacity: 0.2; isolation: isolate; transform-origin: 335.003px 269.035px;" class="animable"></path></g><path d="M335.87,150.94c-3.12,4.32-12.87,5-12.87,5s-6.25-.37-5.4-2.48c3.36-1.31,4.7-3.29,5-5.52a10.27,10.27,0,0,0-.49-4.05,19.83,19.83,0,0,0-.76-2.16l9.87-11.14C330.86,136.67,331.21,147.59,335.87,150.94Z" style="fill: rgb(235, 179, 118); transform-origin: 326.695px 143.265px;" id="eljyz7gdm633e" class="animable"></path><g id="elnlndwvmp4l"><path d="M329.64,136.7c1,7.12-4.34,10.28-7.08,11.27a10.27,10.27,0,0,0-.49-4.05Z" style="opacity: 0.2; isolation: isolate; transform-origin: 325.917px 142.335px;" class="animable"></path></g><path d="M309.82,114.11s-2.44,11,3.19,15.73,7-16.07,7-16.07Z" style="fill: rgb(38, 50, 56); transform-origin: 314.652px 122.155px;" id="eltmxnkcdvx8d" class="animable"></path><path d="M329.59,139.86A10.15,10.15,0,0,1,317.7,143a11.29,11.29,0,0,1-6.07-5.67,9.25,9.25,0,0,1-.47-1.11c-2.45-7-2.57-19,4.93-23a11,11,0,0,1,16.2,9.39C332.64,130.66,333.22,135.37,329.59,139.86Z" style="fill: rgb(235, 179, 118); transform-origin: 321.109px 127.842px;" id="el62fudgb0drw" class="animable"></path><path d="M320.39,126.11c.11.64-.22,1.21-.65,1.26s-.82-.46-.89-1.11.23-1.21.65-1.25S320.32,125.45,320.39,126.11Z" style="fill: rgb(38, 50, 56); transform-origin: 319.626px 126.191px;" id="elbozj3o8q45" class="animable"></path><path d="M313,126.86c.11.64-.23,1.21-.66,1.26s-.82-.46-.89-1.1.23-1.22.65-1.26S313,126.25,313,126.86Z" style="fill: rgb(38, 50, 56); transform-origin: 312.23px 126.941px;" id="elbm76izethwv" class="animable"></path><path d="M315.41,126.94a23.85,23.85,0,0,1-2.54,5.89,3.77,3.77,0,0,0,3.18.26Z" style="fill: rgb(213, 135, 69); transform-origin: 314.46px 130.133px;" id="elgkz5b3c5wdc" class="animable"></path><path d="M322.43,123.5a.43.43,0,0,1-.39-.11,3.07,3.07,0,0,0-2.57-1,.39.39,0,0,1-.13-.76h0a3.83,3.83,0,0,1,3.26,1.26.38.38,0,0,1,0,.54h0A.51.51,0,0,1,322.43,123.5Z" style="fill: rgb(38, 50, 56); transform-origin: 320.893px 122.559px;" id="ella9cln71ykb" class="animable"></path><path d="M309.62,124.65a.37.37,0,0,1-.23,0,.38.38,0,0,1-.23-.49h0a3.8,3.8,0,0,1,2.53-2.42.38.38,0,0,1,.46.28h0a.39.39,0,0,1-.29.46h0a3.08,3.08,0,0,0-2,2A.42.42,0,0,1,309.62,124.65Z" style="fill: rgb(38, 50, 56); transform-origin: 310.647px 123.199px;" id="elqup4bkw5i7" class="animable"></path><path d="M325.41,113.27l-.24,3.56a2.64,2.64,0,0,1,1.5,3.25c-1,3,1,7.55,3.34,9.27,0,0,0-1.3,1.1-1s1.17,7-.78,10.29c0,0,3.05-3.07,4.48-10.21,1.33-6.6,1.24-12-.24-14.49Z" style="fill: rgb(38, 50, 56); transform-origin: 330.459px 125.955px;" id="elq3ozw26wbk" class="animable"></path><path d="M336.45,128.83a7.61,7.61,0,0,1-4,4.29c-2.44,1.11-4.07-1-3.73-3.5.31-2.23,1.94-5.57,4.56-5.6S337.28,126.49,336.45,128.83Z" style="fill: rgb(235, 179, 118); transform-origin: 332.683px 128.722px;" id="eluetrwwti11" class="animable"></path><path d="M325.17,116.83a23.47,23.47,0,0,0-8.16.8,13.34,13.34,0,0,1-7.11.29s-3.56-7.2,1.15-11.56,12.59-2.66,15.14-1.18-2.63,1.23-2.63,1.23,8.34,1.55,11.95,4.72,2.74,8.39,2,9.27-1.4-1.06-1.4-1.06a9.57,9.57,0,0,1-5,1C328,120.3,329.3,117.55,325.17,116.83Z" style="fill: rgb(38, 50, 56); transform-origin: 323.39px 112.102px;" id="elye46i7yv8tc" class="animable"></path><path d="M316.53,135.71a21,21,0,0,1,1.44,2.77,4.58,4.58,0,0,0,.53-.14c2.42-.62,3.33-1.71,3.61-2.73a3.25,3.25,0,0,0,0-1.52,3,3,0,0,0-.29-.82,11.87,11.87,0,0,1-4.48,2.21Z" style="fill: rgb(38, 50, 56); transform-origin: 319.365px 135.875px;" id="eltysavy83bag" class="animable"></path><path d="M317.35,135.48l.45.81c2.27-.6,3.79-1.33,4.32-2.2a3,3,0,0,0-.29-.82A11.87,11.87,0,0,1,317.35,135.48Z" style="fill: rgb(255, 255, 255); transform-origin: 319.735px 134.78px;" id="elv0bvd9oimlp" class="animable"></path><path d="M318.5,138.34c2.42-.62,3.33-1.71,3.61-2.73a7.94,7.94,0,0,0-2.54,1.23A3,3,0,0,0,318.5,138.34Z" style="fill: rgb(222, 87, 83); transform-origin: 320.305px 136.975px;" id="elp6vk5ilil3e" class="animable"></path><path d="M333.39,147.77a27.17,27.17,0,0,1-9.27,7.58,12,12,0,0,1-2.28-5.14,20.92,20.92,0,0,0-5.32,3.62,14.56,14.56,0,0,0,2.36,6.54l5.07-3.63,6.15,4.49s8.08-5.22,9.89-10.58Z" style="fill: rgb(64, 123, 255); transform-origin: 328.255px 154.5px;" id="el395pqxz28iv" class="animable"></path><g id="eloyhqkhkfzsr"><path d="M333.39,147.77a27.17,27.17,0,0,1-9.27,7.58,12,12,0,0,1-2.28-5.14,20.92,20.92,0,0,0-5.32,3.62,14.56,14.56,0,0,0,2.36,6.54l5.07-3.63,6.15,4.49s8.08-5.22,9.89-10.58Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 328.255px 154.5px;" class="animable"></path></g><path d="M269.56,188.43c-6.82-.5-5.93,5.14-4.71,9.18l5.3,12,10.78-.39S276.38,188.92,269.56,188.43Zm-.49,14.06c-1.58-2.6-6.14-10.7-1.29-12.09s10.58,9.4,9.2,13.55S272.2,207.64,269.07,202.49Z" style="fill: rgb(64, 123, 255); transform-origin: 272.467px 199.004px;" id="el0op8u0g9hkgm" class="animable"></path><g id="elwlnc0otglge"><path d="M269.56,188.43c-6.82-.5-5.93,5.14-4.71,9.18l5.3,12,10.78-.39S276.38,188.92,269.56,188.43Zm-.49,14.06c-1.58-2.6-6.14-10.7-1.29-12.09s10.58,9.4,9.2,13.55S272.2,207.64,269.07,202.49Z" style="fill: rgb(255, 255, 255); opacity: 0.5; isolation: isolate; transform-origin: 272.467px 199.004px;" class="animable"></path></g><polygon points="267.58 208.9 270.94 196.45 287.26 200.58 283.09 221.16 267.58 208.9" style="fill: rgb(64, 123, 255); transform-origin: 277.42px 208.805px;" id="elmdaa7etzp8" class="animable"></polygon><polygon points="285.78 218.79 281.82 193.88 291.71 189.42 299.5 193.88 300.32 219.98 285.78 218.79" style="fill: rgb(64, 123, 255); transform-origin: 291.07px 204.7px;" id="el7adyzygaxex" class="animable"></polygon><g id="el362r3ea2965"><polygon points="285.78 218.79 281.82 193.88 291.71 189.42 299.5 193.88 300.32 219.98 285.78 218.79" style="opacity: 0.2; isolation: isolate; transform-origin: 291.07px 204.7px;" class="animable"></polygon></g><path d="M292.9,211.37s5.44-34,9.4-35.11,7.61,4.16,7.61,4.16-3.37,22.15-5.84,30S292.9,211.37,292.9,211.37Z" style="fill: rgb(64, 123, 255); transform-origin: 301.405px 195.14px;" id="elwepuz78ql48" class="animable"></path><g id="el1tinrlya04f"><path d="M292.9,211.37s5.44-34,9.4-35.11,7.61,4.16,7.61,4.16-3.37,22.15-5.84,30S292.9,211.37,292.9,211.37Z" style="fill: rgb(255, 255, 255); opacity: 0.8; isolation: isolate; transform-origin: 301.405px 195.14px;" class="animable"></path></g><path d="M306.25,212.53c0-5,6.6-19-1.61-20.38s-14.74,13.52-24,13.49-15.82-8-15.82-8l1.42,2.95s-17.85,34.93-9.34,38.4c7.92,3.22,52.37,0,52.37,0C315.77,234.53,306.25,217.54,306.25,212.53Zm-1-5.17c-1,.25-5.73-4.87-5.73-4.87-.4-9.28,4.65-9.91,7.12-7.24S306.25,207.12,305.26,207.36Z" style="fill: rgb(64, 123, 255); transform-origin: 283.071px 216.24px;" id="elkvohuo09gmq" class="animable"></path><g id="elne6goq4jsjq"><path d="M306.25,212.53c0-5,6.6-19-1.61-20.38s-14.74,13.52-24,13.49-15.82-8-15.82-8l1.42,2.95s-17.85,34.93-9.34,38.4c7.92,3.22,52.37,0,52.37,0C315.77,234.53,306.25,217.54,306.25,212.53Zm-1-5.17c-1,.25-5.73-4.87-5.73-4.87-.4-9.28,4.65-9.91,7.12-7.24S306.25,207.12,305.26,207.36Z" style="fill: rgb(255, 255, 255); opacity: 0.7; isolation: isolate; transform-origin: 283.071px 216.24px;" class="animable"></path></g><g id="elngigrjb1s6s"><rect x="330.78" y="183.38" width="10.08" height="6.9" style="fill: rgb(255, 255, 255); opacity: 0.6; isolation: isolate; transform-origin: 335.82px 186.83px; transform: rotate(-6.13deg);" class="animable"></rect></g><path d="M333.7,180.22l1,3.31a.88.88,0,0,0,1,.62h0a.9.9,0,0,0,.75-.76l.53-3.84Z" style="fill: rgb(64, 123, 255); transform-origin: 335.34px 181.857px;" id="elp74hid6a6g" class="animable"></path><g id="eln1ojb7july"><path d="M333.7,180.22l1,3.31a.88.88,0,0,0,1,.62h0a.9.9,0,0,0,.75-.76l.53-3.84Z" style="opacity: 0.4; isolation: isolate; transform-origin: 335.34px 181.857px;" class="animable"></path></g><path d="M341.07,189.66s-3.72,11.17-5.32,13.6-42.85,13.1-42.85,13.1-3.46-1.76-5.64-1.57-10.68,2.17-10.88,3.75,4.36,8.7,5.44,9.29,12-1.05,13.16-3.89c0,0,42.13-7.56,46.09-9.15s12.45-20.38,12.45-20.38Z" style="fill: rgb(235, 179, 118); transform-origin: 314.947px 208.805px;" id="el903zfan95pa" class="animable"></path><path d="M351.67,150.42c6.38.43,11.95,14.17,10.86,25.25s-11.28,30-11.28,30l-14.24-7S340.57,186,344.63,174,346.85,150.09,351.67,150.42Z" style="fill: rgb(64, 123, 255); transform-origin: 349.839px 178.042px;" id="el65cs488uqb4" class="animable"></path><g id="elcgiu24ioic"><path d="M351.67,150.42c6.38.43,11.95,14.17,10.86,25.25s-11.28,30-11.28,30l-14.24-7S340.57,186,344.63,174,346.85,150.09,351.67,150.42Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 349.839px 178.042px;" class="animable"></path></g><polygon points="335.31 199.92 336.89 197.61 353.52 203.23 352.66 207.36 335.31 199.92" style="fill: rgb(64, 123, 255); transform-origin: 344.415px 202.485px;" id="eltqcdh69peqd" class="animable"></polygon><g id="elnv1b3rmvbd"><polygon points="335.31 199.92 336.89 197.61 353.52 203.23 352.66 207.36 335.31 199.92" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 344.415px 202.485px;" class="animable"></polygon></g></g><path d="M204,222.07h29.26a1.79,1.79,0,0,1,1.79,1.79v16.46a0,0,0,0,1,0,0H202.21a0,0,0,0,1,0,0V223.85A1.79,1.79,0,0,1,204,222.07Z" style="fill: rgb(64, 123, 255); transform-origin: 218.63px 231.195px;" id="elu4s4e1pu0j" class="animable"></path><g id="elycrcprz5zya"><path d="M235,223.85v16.46H202.21V223.85a1.78,1.78,0,0,1,1.78-1.78h29.27A1.78,1.78,0,0,1,235,223.85Z" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 218.605px 231.19px;" class="animable"></path></g><g id="elq3hbl5uvoe"><path d="M227,223.85v16.46H202.21V223.85a1.78,1.78,0,0,1,1.78-1.78h21.27A1.78,1.78,0,0,1,227,223.85Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 214.605px 231.19px;" class="animable"></path></g><rect x="181.36" y="245.21" width="228.92" height="171.99" style="fill: rgb(64, 123, 255); transform-origin: 295.82px 331.205px;" id="elpmixh8s7rma" class="animable"></rect><g id="el2qjm2gidhgj"><rect x="181.36" y="245.21" width="228.92" height="171.99" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 295.82px 331.205px;" class="animable"></rect></g><g id="eluwy9xknu55"><rect x="181.36" y="245.21" width="169.52" height="171.99" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 266.12px 331.205px;" class="animable"></rect></g><rect x="178.95" y="238.88" width="234.64" height="9.95" rx="1.56" style="fill: rgb(64, 123, 255); transform-origin: 296.27px 243.855px;" id="elzqodexr96gf" class="animable"></rect><g id="el9c5387xh1ai"><rect x="178.95" y="238.88" width="174.64" height="9.95" rx="1.56" style="fill: rgb(255, 255, 255); opacity: 0.2; isolation: isolate; transform-origin: 266.27px 243.855px;" class="animable"></rect></g></g><g id="freepik--trash-bin--inject-132" class="animable" style="transform-origin: 425.54px 389.425px;"><path d="M442.83,392.41a3,3,0,0,0-2.39-4.27,6.36,6.36,0,0,0-2-7,1.47,1.47,0,0,0-.87-.39,1.76,1.76,0,0,0-.95.41l-5.57,4a3.31,3.31,0,0,0-1.11,1.09c-1.14,2.21,3,5,1.28,6.86-.48.52-1.26.63-1.87,1-1.33.83-1.49,2.65-2.1,4.09s-2.78,2.55-3.6,1.22c.61-1.38-1.24-2.56-2.73-2.74s-3.06-.26-3.89-1.66c-2.13,1.85-6.88-3.32-6.77-5.41-1.75.13-2.94,1.77-3.32,3.4a24.41,24.41,0,0,0-.18,5.2c-.05,3.39-1.14,6.7-1.08,10.08,0,2.63,1.06,5.55,3.47,6.61a9,9,0,0,0,3.73.5l27.43-.17a4.32,4.32,0,0,0,1.93-.32c1.24-.65,1.5-2.28,1.62-3.67l1.47-17.87Z" style="fill: rgb(64, 123, 255); transform-origin: 425.504px 398.088px;" id="el7rwt9h1xq0b" class="animable"></path><g id="elmssgjgy33j"><path d="M442.83,392.41a3,3,0,0,0-2.39-4.27,6.36,6.36,0,0,0-2-7,1.47,1.47,0,0,0-.87-.39,1.76,1.76,0,0,0-.95.41l-5.57,4a3.31,3.31,0,0,0-1.11,1.09c-1.14,2.21,3,5,1.28,6.86-.48.52-1.26.63-1.87,1-1.33.83-1.49,2.65-2.1,4.09s-2.78,2.55-3.6,1.22c.61-1.38-1.24-2.56-2.73-2.74s-3.06-.26-3.89-1.66c-2.13,1.85-6.88-3.32-6.77-5.41-1.75.13-2.94,1.77-3.32,3.4a24.41,24.41,0,0,0-.18,5.2c-.05,3.39-1.14,6.7-1.08,10.08,0,2.63,1.06,5.55,3.47,6.61a9,9,0,0,0,3.73.5l27.43-.17a4.32,4.32,0,0,0,1.93-.32c1.24-.65,1.5-2.28,1.62-3.67l1.47-17.87Z" style="fill: rgb(255, 255, 255); opacity: 0.3; isolation: isolate; transform-origin: 425.504px 398.088px;" class="animable"></path></g><path d="M444.43,363.42H401.87l.35,4.3.25,3.07.65,8,.37,4.59.49,6.11.21,2.62.07.78.25,3.08.34,4.22.21,2.62.22,2.66.25,3.08.19,2.33.21,2.62.09,1.14h39.06l.09-1.14.21-2.61.19-2.35.25-3.08.22-2.65.21-2.62.34-4.23.25-3.07.06-.78.21-2.62.5-6.11.37-4.58.64-8,.25-3.07.35-4.3Zm2.56,2.82h0l-.82-.82h.89Zm-.21,2.61-.08,1-3.81,3.81-4.37-4.37,3.91-3.91h.92Zm-1.1,13.62-2.79,2.79-4.37-4.37,4.37-4.36,3,3Zm-40.5-2.92h0l3-3,4.37,4.36-4.37,4.37-2.78-2.79Zm36.3-4.44-4.37,4.37-4.37-4.37,4.37-4.37Zm-6.87-9.69h5l-2.5,2.5Zm1.08,15.47-4.36,4.37L427,380.89l4.37-4.36Zm-14.51,5.78,4.37-4.36,4.36,4.36L425.55,391Zm2.95,5.78-4.37,4.37-4.36-4.36,4.37-4.37Zm7.2-4.36,4.36,4.37-4.36,4.36L427,392.45Zm-5.78-8.61-4.37-4.37,4.37-4.37,4.36,4.37Zm-1.42,1.41-4.36,4.37-4.37-4.37,4.37-4.36ZM414,379.48l-4.36-4.37,4.36-4.37,4.37,4.37Zm0,2.83,4.37,4.36L414,391l-4.36-4.37Zm4.37,15.93L414,402.6l-4.36-4.36,4.36-4.37Zm1.41,1.41,4.37,4.37-4.36,4.37L415.4,404Zm1.42-1.41,4.37-4.37,4.36,4.37-4.36,4.36Zm10.15,1.41,4.36,4.37-4.36,4.37L427,404Zm5.78,5.78,4.37,4.37-2.83,2.83h-3.08l-2.83-2.83Zm-4.37-7.19,4.37-4.37,4.37,4.37-4.37,4.36Zm0-11.57,4.37-4.36,4.37,4.36L437.11,391Zm2.95-17.34-4.36,4.37L427,369.33l3.91-3.91h.92Zm-10.14-1.41-2.5-2.5h5Zm-1.42,1.41-4.36,4.37-4.37-4.37,3.91-3.91h.92Zm-7.65-3.91-2.5,2.5-2.49-2.5Zm-7.82,0,3.91,3.91-4.37,4.37-3.8-3.81-.08-1,3.42-3.43Zm-3.74,0-.81.81h0l-.07-.81Zm-.27,7.55,2.14,2.14L405,376.93Zm1.19,14.65-.17-2.07h0l1.12,1.12-1,.95Zm.21,2.63,2.15-2.16,4.37,4.37-4.37,4.36-1.76-1.76Zm.65,8.08v-.19l.1.1-.09.09Zm.76,9.31-.55-6.7,1.29-1.29,4.37,4.37-4.37,4.36-.74-.74Zm.4,5-.08-1,.42-.42,1.42,1.42Zm1.76-2.83,4.36-4.37,4.37,4.37-2.83,2.83h-3.08Zm8.73,2.83,1.42-1.42,1.42,1.42Zm5.66,0-2.83-2.83,4.37-4.37,4.36,4.37-2.82,2.83Zm5.9,0,1.42-1.42,1.42,1.42Zm13.32,0h-1.76l1.42-1.42.42.42Zm.41-5-.75.74L438.52,404l4.37-4.37,1.29,1.29Zm.77-9.51,0,.2-.09-.09.11-.11Zm.25-3.07-1.77,1.76-4.37-4.36,4.37-4.37,2.16,2.16Zm.6-7.43-1-1,1.13-1.12ZM446.45,373l-.32,4-1.83-1.83,2.15-2.15Z" style="fill: rgb(64, 123, 255); transform-origin: 425.545px 389.03px;" id="elxploupr23ld" class="animable"></path><g id="elawrcb2ufh5h"><g style="opacity: 0.6; isolation: isolate; transform-origin: 425.545px 389.03px;" class="animable"><path d="M444.43,363.42H401.87l.35,4.3.25,3.07.65,8,.37,4.59.49,6.11.21,2.62.07.78.25,3.08.34,4.22.21,2.62.22,2.66.25,3.08.19,2.33.21,2.62.09,1.14h39.06l.09-1.14.21-2.61.19-2.35.25-3.08.22-2.65.21-2.62.34-4.23.25-3.07.06-.78.21-2.62.5-6.11.37-4.58.64-8,.25-3.07.35-4.3Zm2.56,2.82h0l-.82-.82h.89Zm-.21,2.61-.08,1-3.81,3.81-4.37-4.37,3.91-3.91h.92Zm-1.1,13.62-2.79,2.79-4.37-4.37,4.37-4.36,3,3Zm-40.5-2.92h0l3-3,4.37,4.36-4.37,4.37-2.78-2.79Zm36.3-4.44-4.37,4.37-4.37-4.37,4.37-4.37Zm-6.87-9.69h5l-2.5,2.5Zm1.08,15.47-4.36,4.37L427,380.89l4.37-4.36Zm-14.51,5.78,4.37-4.36,4.36,4.36L425.55,391Zm2.95,5.78-4.37,4.37-4.36-4.36,4.37-4.37Zm7.2-4.36,4.36,4.37-4.36,4.36L427,392.45Zm-5.78-8.61-4.37-4.37,4.37-4.37,4.36,4.37Zm-1.42,1.41-4.36,4.37-4.37-4.37,4.37-4.36ZM414,379.48l-4.36-4.37,4.36-4.37,4.37,4.37Zm0,2.83,4.37,4.36L414,391l-4.36-4.37Zm4.37,15.93L414,402.6l-4.36-4.36,4.36-4.37Zm1.41,1.41,4.37,4.37-4.36,4.37L415.4,404Zm1.42-1.41,4.37-4.37,4.36,4.37-4.36,4.36Zm10.15,1.41,4.36,4.37-4.36,4.37L427,404Zm5.78,5.78,4.37,4.37-2.83,2.83h-3.08l-2.83-2.83Zm-4.37-7.19,4.37-4.37,4.37,4.37-4.37,4.36Zm0-11.57,4.37-4.36,4.37,4.36L437.11,391Zm2.95-17.34-4.36,4.37L427,369.33l3.91-3.91h.92Zm-10.14-1.41-2.5-2.5h5Zm-1.42,1.41-4.36,4.37-4.37-4.37,3.91-3.91h.92Zm-7.65-3.91-2.5,2.5-2.49-2.5Zm-7.82,0,3.91,3.91-4.37,4.37-3.8-3.81-.08-1,3.42-3.43Zm-3.74,0-.81.81h0l-.07-.81Zm-.27,7.55,2.14,2.14L405,376.93Zm1.19,14.65-.17-2.07h0l1.12,1.12-1,.95Zm.21,2.63,2.15-2.16,4.37,4.37-4.37,4.36-1.76-1.76Zm.65,8.08v-.19l.1.1-.09.09Zm.76,9.31-.55-6.7,1.29-1.29,4.37,4.37-4.37,4.36-.74-.74Zm.4,5-.08-1,.42-.42,1.42,1.42Zm1.76-2.83,4.36-4.37,4.37,4.37-2.83,2.83h-3.08Zm8.73,2.83,1.42-1.42,1.42,1.42Zm5.66,0-2.83-2.83,4.37-4.37,4.36,4.37-2.82,2.83Zm5.9,0,1.42-1.42,1.42,1.42Zm13.32,0h-1.76l1.42-1.42.42.42Zm.41-5-.75.74L438.52,404l4.37-4.37,1.29,1.29Zm.77-9.51,0,.2-.09-.09.11-.11Zm.25-3.07-1.77,1.76-4.37-4.36,4.37-4.37,2.16,2.16Zm.6-7.43-1-1,1.13-1.12ZM446.45,373l-.32,4-1.83-1.83,2.15-2.15Z" style="fill: rgb(255, 255, 255); transform-origin: 425.545px 389.03px;" id="elmfdb03vn04d" class="animable"></path></g></g><g id="elrztqzhclrz"><rect x="399.14" y="361.64" width="52.8" height="5.57" rx="1.64" style="fill: rgb(64, 123, 255); transform-origin: 425.54px 364.425px; transform: rotate(180deg);" class="animable"></rect></g><rect x="402.95" y="411.64" width="45.19" height="5.57" rx="1.64" style="fill: rgb(64, 123, 255); transform-origin: 425.545px 414.425px;" id="el2dehai0ie4d" class="animable"></rect></g><g id="freepik--character-1--inject-132" class="animable" style="transform-origin: 161.745px 280.201px;"><path d="M177.66,210.13c3.45,1.08,4,21.13,4,21.13h-2s1-21.25-4.15-20.59Z" style="fill: rgb(38, 50, 56); transform-origin: 178.585px 220.695px;" id="elbe793wjm96" class="animable"></path><g id="ela37pxbxoiwf"><path d="M177.66,210.13c3.45,1.08,4,21.13,4,21.13h-2s1-21.25-4.15-20.59Z" style="opacity: 0.2; isolation: isolate; transform-origin: 178.585px 220.695px;" class="animable"></path></g><polygon points="182.01 399.82 175.7 400.93 173.11 392.33 170.75 384.44 178.03 381.9 180.14 391.39 182.01 399.82" style="fill: rgb(228, 137, 123); transform-origin: 176.38px 391.415px;" id="els1axw4ai79" class="animable"></polygon><g id="elz1gtf12wn4"><polygon points="180.17 391.58 173.14 392.51 170.77 384.53 178.03 381.94 180.17 391.58" style="opacity: 0.2; isolation: isolate; transform-origin: 175.47px 387.225px;" class="animable"></polygon></g><polygon points="139.9 402.73 133.49 402.73 132.44 393.7 131.49 385.47 139.09 384.21 139.52 394.01 139.9 402.73" style="fill: rgb(228, 137, 123); transform-origin: 135.695px 393.47px;" id="elhgq3vkxlw05" class="animable"></polygon><g id="eltijptm0uyc"><polygon points="139.52 394.09 132.44 393.78 131.49 385.51 139.09 384.23 139.52 394.09" style="opacity: 0.2; isolation: isolate; transform-origin: 135.505px 389.16px;" class="animable"></polygon></g><path d="M148.58,415.41a11,11,0,0,0-3.42-1.86h0s-3.72-3.69-5.51-14.8l-4.87-1.27a4.17,4.17,0,0,0-4.43,1.73,2.36,2.36,0,0,0-.31.64,27.78,27.78,0,0,0-.52,3.61c-.49,3.76-.07,12.2-.07,12.2h.88l.35-7.66c.13-2.6,2.12.45,2.69,3.25s1.78,5.78,7.48,5.92C147.5,417.3,150.26,417,148.58,415.41Z" style="fill: rgb(38, 50, 56); transform-origin: 139.172px 407.281px;" id="elfgrbdost7la" class="animable"></path><path d="M191.08,414.66a11,11,0,0,0-3.42-1.86h0s-3.72-3.69-5.51-14.8l-4.87-1.27a4.17,4.17,0,0,0-4.43,1.73,2.36,2.36,0,0,0-.31.64,27.78,27.78,0,0,0-.52,3.61c-.49,3.76-.07,12.2-.07,12.2h.88l.35-7.66c.13-2.6,2.12.45,2.69,3.25s1.78,5.78,7.48,5.92C190,416.55,192.76,416.29,191.08,414.66Z" style="fill: rgb(38, 50, 56); transform-origin: 181.672px 406.532px;" id="ell3zpxnucz8" class="animable"></path><path d="M180.77,386.58,170.4,388.4c-10.47-26.07-17.91-47.83-23.17-65.89-2.83-9.74-5.19-18.4-6.88-26.09l.31,28.38v63.93H130.44c-25.61-122-7.46-149.81-7.46-149.81l30.65-5.1A140.43,140.43,0,0,1,156.19,251l1.38,10.16,12,61.88Z" style="fill: rgb(64, 123, 255); transform-origin: 148.755px 311.275px;" id="elsecvgrrwdh" class="animable"></path><g id="eliwb0o7miaxj"><g style="opacity: 0.4; isolation: isolate; transform-origin: 148.755px 311.275px;" class="animable"><path d="M180.77,386.58,170.4,388.4c-10.47-26.07-17.91-47.83-23.17-65.89-2.83-9.74-5.19-18.4-6.88-26.09l.31,28.38v63.93H130.44c-25.61-122-7.46-149.81-7.46-149.81l30.65-5.1A140.43,140.43,0,0,1,156.19,251l1.38,10.16,12,61.88Z" style="fill: rgb(255, 255, 255); transform-origin: 148.755px 311.275px;" id="elhqnfdf3xoqi" class="animable"></path></g></g><path d="M189.91,203.7l10.34-10.22s.36-2.74,1.36-3.5,8.1-3.34,9-2.77,2.07,6.31.86,7.36-7.67,2.39-8.33,2.28l-11.19,13.28Z" style="fill: rgb(238, 193, 187); transform-origin: 200.949px 198.629px;" id="elzghr387vnpq" class="animable"></path><path d="M152.87,185.07c4.46,2.37,20.29,24.5,22.63,25.6s20.16-13.36,20.16-13.36l3,5.13S184,223.11,175.77,222.11s-24.11-18.5-24.11-18.5Z" style="fill: rgb(38, 50, 56); transform-origin: 175.16px 203.608px;" id="elgfruektvcej" class="animable"></path><g id="elrcqa2da3nwm"><path d="M152.87,185.07c4.46,2.37,20.29,24.5,22.63,25.6s20.16-13.36,20.16-13.36l3,5.13S184,223.11,175.77,222.11s-24.11-18.5-24.11-18.5Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 175.16px 203.608px;" class="animable"></path></g><polygon points="194.68 197.86 195.91 196.69 199.16 202.19 198 204.44 194.68 197.86" style="fill: rgb(64, 123, 255); transform-origin: 196.92px 200.565px;" id="elovxktcuz7ff" class="animable"></polygon><g id="el2wj6vnmkg3w"><path d="M158,210.07c-3.7-3.53-6.36-6.46-6.36-6.46l.28-4.4,1.39-4.27A17.55,17.55,0,0,1,158,210.07Z" style="opacity: 0.2; isolation: isolate; transform-origin: 154.943px 202.505px;" class="animable"></path></g><g id="el9hcjqmenrj7"><path d="M147.23,322.51c-2.83-9.74-5-18.4-6.73-26.09a240.2,240.2,0,0,1,2-27.22S147,304.3,147.23,322.51Z" style="opacity: 0.2; isolation: isolate; transform-origin: 143.865px 295.855px;" class="animable"></path></g><path d="M154.36,231.93c1.25-22,.7-34.12.13-40.17-.63-6.45-1.62-6.69-1.62-6.69s-7-.68-13.07-.63a98.46,98.46,0,0,0-14,1.48,93.62,93.62,0,0,0-13,3.13q1.06,3,1.95,5.76c.8,2.38,1.51,4.6,2.15,6.66,1.21,3.87,2.14,7.21,2.89,10.2a111.59,111.59,0,0,1,3.33,23s-7.7,20.1-9.2,34.85l25.5,2.75,3.5-14.75,3.5,15.25,14.25-5Z" style="fill: rgb(38, 50, 56); transform-origin: 136.735px 228.604px;" id="elpp2kkuscac" class="animable"></path><g id="elhk5njrhc7a"><path d="M154.36,231.93c1.25-22,.7-34.12.13-40.17-.63-6.45-1.62-6.69-1.62-6.69s-7-.68-13.07-.63a98.46,98.46,0,0,0-14,1.48,93.62,93.62,0,0,0-13,3.13q1.06,3,1.95,5.76c.8,2.38,1.51,4.6,2.15,6.66,1.21,3.87,2.14,7.21,2.89,10.2a111.59,111.59,0,0,1,3.33,23s-7.7,20.1-9.2,34.85l25.5,2.75,3.5-14.75,3.5,15.25,14.25-5Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 136.735px 228.604px;" class="animable"></path></g><path d="M128,183.28s3.67-2.93,10.23-.59l.89,3.34s-5.63,2.13-8.47,1.57S128,183.28,128,183.28Z" style="fill: rgb(64, 123, 255); transform-origin: 133.559px 184.739px;" id="elb19ztcimnd" class="animable"></path><g id="elpdvlquw27zr"><path d="M128,183.28s3.67-2.93,10.23-.59l.89,3.34s-5.63,2.13-8.47,1.57S128,183.28,128,183.28Z" style="opacity: 0.2; isolation: isolate; transform-origin: 133.559px 184.739px;" class="animable"></path></g><g id="elrt1chsj6nc"><path d="M121,217.06c-.34-1.68-.74-3.47-1.23-5.39-.31-1.22-.65-2.5-1-3.86,1-3.41,2-.75,2-.75A30.73,30.73,0,0,1,121,217.06Z" style="opacity: 0.2; isolation: isolate; transform-origin: 120.036px 211.566px;" class="animable"></path></g><path d="M139.45,185.78a7.91,7.91,0,0,0-1-.41c-.72-.57-1.59-1.94-1.55-5.27a27.19,27.19,0,0,1,.36-3.91L128,174.46s3.16,6.24.52,10.88c-.9.4-1.44,1-1.35,1.72.7,5.36,12.21,10.54,12.21,10.54S145,188.85,139.45,185.78Z" style="fill: rgb(238, 193, 187); transform-origin: 134.529px 186.03px;" id="el3vam3el1lxk" class="animable"></path><g id="els3tcf37ga5"><path d="M137.3,176.19a27.19,27.19,0,0,0-.36,3.91c-6.26,0-8.91-5.64-8.91-5.64Z" style="opacity: 0.2; isolation: isolate; transform-origin: 132.665px 177.28px;" class="animable"></path></g><path d="M133.16,145.6S144,144.23,146,153a13.47,13.47,0,0,1-4.75,13.62Z" style="fill: rgb(38, 50, 56); transform-origin: 139.757px 156.071px;" id="el03n23du2xikr" class="animable"></path><path d="M132.18,150.27c8.06-.44,10.89,3.73,11.93,12,1.31,10.34-.59,17.84-10.79,16.18C119.47,176.19,118.79,151,132.18,150.27Z" style="fill: rgb(238, 193, 187); transform-origin: 133.5px 164.46px;" id="elu74pi51dwej" class="animable"></path><path d="M138.88,162.11a17,17,0,0,0,2.53,3.21,2.21,2.21,0,0,1-2.08,1Z" style="fill: rgb(212, 130, 125); transform-origin: 140.145px 164.221px;" id="elas28rg80344" class="animable"></path><path d="M133.91,161.72c.05.66-.27,1.22-.71,1.26s-.84-.47-.89-1.14.27-1.22.71-1.26S133.86,161.06,133.91,161.72Z" style="fill: rgb(38, 50, 56); transform-origin: 133.11px 161.78px;" id="elqa83ckty4g" class="animable"></path><path d="M132.84,160.63l1.39-.68S133.61,161.22,132.84,160.63Z" style="fill: rgb(38, 50, 56); transform-origin: 133.535px 160.368px;" id="el8themqnj7n" class="animable"></path><path d="M142.12,160.94c0,.66-.27,1.22-.71,1.26s-.84-.48-.89-1.14.26-1.22.71-1.26S142.07,160.28,142.12,160.94Z" style="fill: rgb(38, 50, 56); transform-origin: 141.317px 161px;" id="el60l74p26ys6" class="animable"></path><path d="M141,159.85l1.4-.68S141.82,160.44,141,159.85Z" style="fill: rgb(38, 50, 56); transform-origin: 141.7px 159.588px;" id="elxshrk7iymba" class="animable"></path><path d="M133.52,156.16a4.21,4.21,0,0,0-3.43,1.41" style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.686238px; transform-origin: 131.805px 156.86px;" id="elon6fpfi492h" class="animable"></path><path d="M139.36,155.5a3.76,3.76,0,0,1,3.25.48" style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.686238px; transform-origin: 140.985px 155.653px;" id="el4184c00ilfy" class="animable"></path><path d="M124.11,164.33s3.41-6.82,2.56-11.9c0,0,15.61-7.4,17.29,8.76,0,0,.77-14.48-13.1-14s-12.71,20.71-5.22,26.35C125.64,173.5,122,168.6,124.11,164.33Z" style="fill: rgb(38, 50, 56); transform-origin: 132.067px 160.359px;" id="elldo834i094a" class="animable"></path><path d="M134.54,145s6.62-1.63,8.5.12-11.5,14.13-18.5,15.38c0,0-2.38,7.75-.5,11.37,0,0-7.88-2.75-8.25-14.75S128,140.6,134.54,145Z" style="fill: rgb(38, 50, 56); transform-origin: 129.501px 157.61px;" id="elfv93t2nqn9a" class="animable"></path><path d="M125.52,166a3.54,3.54,0,0,0-4-3c-2.48.41-3.39,5.6,2.89,6.5C125.33,169.56,125.78,168.67,125.52,166Z" style="fill: rgb(238, 193, 187); transform-origin: 122.615px 166.234px;" id="el66sz8fg603o" class="animable"></path><path d="M122,149.73s-2.75-7-10.13-6.5-8.5,12-4.62,20.5S108.54,175,108.54,175s4.12-.5,4.12-8.13a27.51,27.51,0,0,1,.25,4.88s2.75-3.88.13-11.25,5.75-4,5.75-4Z" style="fill: rgb(38, 50, 56); transform-origin: 113.53px 159.102px;" id="elpgd92awg9c" class="animable"></path><path d="M142.41,145.73s-3.5,11.25-12.87,14.62" style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.686238px; transform-origin: 135.975px 153.04px;" id="el85wuqx5h5mx" class="animable"></path><path d="M133,169.23a6.45,6.45,0,0,0,4.62,1.87" style="fill: none; stroke: rgb(38, 50, 56); stroke-linecap: round; stroke-linejoin: round; stroke-width: 0.686238px; transform-origin: 135.31px 170.165px;" id="el4x6cx4ce3g4" class="animable"></path><path d="M128,183.28s1.66,3.37,7.32,5.77l2.31,3.73v-4.25a13.15,13.15,0,0,0,.6-5.84l1.88,3.55a3,3,0,0,1,2.27,2.38c.6,2.18-2.62,10-2.62,10s-10.29-3.69-12.6-8.32c-1.71-3.45.34-4.28.34-4.28Z" style="fill: rgb(64, 123, 255); transform-origin: 134.467px 190.655px;" id="elcbj5saasyxg" class="animable"></path><path d="M141.43,201.48a.74.74,0,1,1-.74-.74A.74.74,0,0,1,141.43,201.48Z" style="fill: rgb(38, 50, 56); transform-origin: 140.69px 201.48px;" id="eldc86zvhxy5s" class="animable"></path><path d="M143.23,213.05a.74.74,0,1,1-.74-.74A.74.74,0,0,1,143.23,213.05Z" style="fill: rgb(38, 50, 56); transform-origin: 142.49px 213.05px;" id="elpk7kn7t6px" class="animable"></path><path d="M144,227.07a.74.74,0,1,1-.74-.74A.74.74,0,0,1,144,227.07Z" style="fill: rgb(38, 50, 56); transform-origin: 143.26px 227.07px;" id="elyc1qzp9awzo" class="animable"></path><path d="M144.61,241.76a.74.74,0,1,1-.74-.74A.74.74,0,0,1,144.61,241.76Z" style="fill: rgb(38, 50, 56); transform-origin: 143.87px 241.76px;" id="elwgm3q622ib" class="animable"></path><path d="M202.7,192a30.08,30.08,0,0,1,15.2-3.18l5.57,5.86S218.72,193.53,208,196Z" style="fill: rgb(64, 123, 255); transform-origin: 213.085px 192.387px;" id="elbs27b9zoxus" class="animable"></path><g id="elb1v2ris9se7"><path d="M202.7,192a30.08,30.08,0,0,1,15.2-3.18l5.57,5.86S218.72,193.53,208,196Z" style="opacity: 0.4; isolation: isolate; transform-origin: 213.085px 192.387px;" class="animable"></path></g><path d="M202.64,191.55a30.11,30.11,0,0,1,15-4l5.88,5.55s-4.81-.85-15.39,2.15Z" style="fill: rgb(64, 123, 255); transform-origin: 213.08px 191.4px;" id="elugnl5zx1ztp" class="animable"></path><g id="el9hy1zyns52a"><path d="M202.64,191.55a30.11,30.11,0,0,1,15-4l5.88,5.55s-4.81-.85-15.39,2.15Z" style="opacity: 0.2; isolation: isolate; transform-origin: 213.08px 191.4px;" class="animable"></path></g><path d="M203.07,190.78l5.39,4.49a27.34,27.34,0,0,1,17.15-2.7l-6.77-5.95S209,185.48,203.07,190.78Z" style="fill: rgb(64, 123, 255); transform-origin: 214.34px 190.893px;" id="elj6qjvw320a" class="animable"></path><g id="elea4hnainaov"><path d="M204.44,190.89l3.78,3.34s7.71-4.12,15.33-2.6l-5-4.55S210,186,204.44,190.89Z" style="opacity: 0.2; isolation: isolate; transform-origin: 213.995px 190.604px;" class="animable"></path></g><path d="M215.05,189.42c0,.81-.88,1.47-2,1.47s-2-.66-2-1.47.88-1.48,2-1.48S215.05,188.6,215.05,189.42Z" style="fill: rgb(64, 123, 255); transform-origin: 213.05px 189.415px;" id="elmp1ocyldido" class="animable"></path><path d="M164.89,253.27c.37-5.57,3.82-22,3.82-22a33.75,33.75,0,0,1,4.76-2.68,26,26,0,0,1,7.89-1.51s1.57,20.73,0,23S164.45,259.86,164.89,253.27Z" style="fill: rgb(38, 50, 56); transform-origin: 173.469px 241.499px;" id="elbtuezdqdsp" class="animable"></path><path d="M168.71,231.26s2.47-22.07,8.95-21.13c0,0-5.12,1.08-7,21.85Z" style="fill: rgb(38, 50, 56); transform-origin: 173.185px 221.04px;" id="elwvwl64n8lno" class="animable"></path><path d="M145.84,220.8c1.15-.25,4.13-7.76,3.75-8.68S127,214.3,127,214.3l1.46,8.1Z" style="fill: rgb(64, 123, 255); transform-origin: 138.312px 217.175px;" id="el6twecksljm8" class="animable"></path><g id="eluhek3wgy91a"><path d="M145.84,220.8c1.15-.25,4.13-7.76,3.75-8.68S127,214.3,127,214.3l1.46,8.1Z" style="opacity: 0.2; isolation: isolate; transform-origin: 138.312px 217.175px;" class="animable"></path></g><path d="M117.84,214.45s23.7-3.37,24.76-3,3.24,9.36,3.24,9.36-20.53,3.25-22.32,2.73S117,215.69,117.84,214.45Z" style="fill: rgb(64, 123, 255); transform-origin: 131.79px 217.509px;" id="eladptlkrh194" class="animable"></path><path d="M109.79,230.32l12.3-7.76s.94-2.59,2.08-3.12,8.63-1.52,9.36-.77.66,6.6-.75,7.37-8,.68-8.62.43L110.37,237Z" style="fill: rgb(238, 193, 187); transform-origin: 121.889px 227.7px;" id="el6ua1ioyo97d" class="animable"></path><path d="M112.79,189.05s8,11.68,6.87,21.68L109,228.39l7.16-3.66,3.25,6.12s-8.25,12.71-18.75,9.71S112.79,189.05,112.79,189.05Z" style="fill: rgb(38, 50, 56); transform-origin: 108.825px 215.034px;" id="elazt2ltw54r" class="animable"></path><g id="elibhnzs0sw2"><path d="M112.79,189.05s8,11.68,6.87,21.68L109,228.39l7.16-3.66,3.25,6.12s-8.25,12.71-18.75,9.71S112.79,189.05,112.79,189.05Z" style="fill: rgb(255, 255, 255); opacity: 0.4; isolation: isolate; transform-origin: 108.825px 215.034px;" class="animable"></path></g><polygon points="115.41 224.39 119.5 231.98 120.41 229.81 117.16 223.64 115.41 224.39" style="fill: rgb(64, 123, 255); transform-origin: 117.91px 227.81px;" id="el1rw2qpops0y" class="animable"></polygon></g><defs>     <filter id="active" height="200%">         <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>    </filter>    <filter id="hover" height="200%">        <feMorphology in="SourceAlpha" result="DILATED" operator="dilate" radius="2"></feMorphology>                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK"></feFlood>        <feComposite in="PINK" in2="DILATED" operator="in" result="OUTLINE"></feComposite>        <feMerge>            <feMergeNode in="OUTLINE"></feMergeNode>            <feMergeNode in="SourceGraphic"></feMergeNode>        </feMerge>            <feColorMatrix type="matrix" values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 "></feColorMatrix>    </filter></defs></svg>
					<?php if ($wo['config']['can_use_market']) { ?>
						<button class="cta create_order_in_pages">
							<span class="hover-underline-animation"> Crear caja </span>
							<svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">
								<path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>
							</svg>
						</button>
					<?php } ?>
				</div>
				<script type="text/javascript">
	    			$(document).on('click', '.create_order_in_pages', function(){
	    				var comprascontent = document.querySelector('a[data-ajax="?link1=caja"]');
						$.ajax({
							url: Wo_Ajax_Requests_File() + '?f=comprar_producto_a&s=new_cash&hash=' + $('.main_session').val(),
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