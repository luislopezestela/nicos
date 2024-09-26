<?php 
$comproban = '';
$anulados = '';
$anulado = "table-row--overdue_gris";
$total_productos_price = 0.00;
$total_productos_lista = $db->where('id_comprobante',$wo['comprass']['id'])->where('estado','1')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(*)');
$total_productos_grupo = $db->where('id_comprobante',$wo['comprass']['id'])->where('estado','1')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','COUNT(DISTINCT orden)');
if ($total_productos_lista>0) {
	$total_productos_price = $db->where('id_comprobante',$wo['comprass']['id'])->where('estado','1')->where('id_sucursal',$wo['user']['sucursal'])->getValue('imventario','SUM(precio)');
}
if($wo['comprass']['documento']=='B'){
	$comproban = 'BOLETA';
}elseif($wo['comprass']['documento']=='F'){
    $comproban = 'FACTURA';
}elseif($wo['comprass']['documento']=='BS'){
    $comproban = 'NOTA SIMPLE';
}
if($wo['comprass']['anulado']==1) {
	$anulado = "table-row--overdue";
	$anulados = "table-row--red";
}
if($wo['comprass']['anulado']==1) {
    $cantidad_de_carantia_text = '<p style="color:#dc2121;font-weight:bold;text-transform:uppercase;letter-spacing:3px;" class="table-row__policy">Anulado</p>';
    $cantidad_de_carantia = '<p class="table-row__policy">'.date('Y-m-d',strtotime($wo['comprass']['fecha_anulado'])).'</p>';
}else{
    if($wo['comprass']['garantia_m']==0){
        $cantidad_de_carantia_text = '<p class="table-row__policy">Sin garantia</p>';
        $cantidad_de_carantia = false;
    }else{
        $cantidad_de_carantia_text = '<span class="table-row__small">La garantia finalizara en: </span>';
        $cantidad_de_carantia = '<p class="table-row__policy">'.fecha_restante($wo['comprass']['garantia']).'</p>';
    }
}

$proveedor = $db->where('id', $wo['comprass']['proveedor'])->getOne("lui_proveedores");
$fecha = false;
if(!empty($wo['comprass']['fecha'])){
	$fecha = date("Y-m-d", strtotime($wo['comprass']['fecha']));
}
$indexdefault_currency = array_search($wo['comprass']['currency'], array_column($wo['currencies'], 'text'));
$monedaf_s = $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['text'] : '';
$monedaf = $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
?>

<tr class="table-row table-row--chris <?=$anulados;?>" id="list_<?php echo $wo['comprass']['id'] ?>" data_selected="<?php echo $wo['comprass']['id'] ?>">
	<td class="table-row__td">
		<div class="<?=$anulado;?>"></div>
		<div class="table-row__info">
	        <p class="table-row__name"><?=$wo['comprass']['num_doc'];?></p>
	    </div>
	</td>
	<td data-column="Comprobante" class="table-row__td">
		<p class="table-row__name"><?php echo $comproban;?></p>
		<span><?=$wo['comprass']['numero_documento'];?></span>
    </td>

    <td data-column="Items" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$total_productos_grupo;?></p>
        </div>                
    </td>
    <td data-column="Productos" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$total_productos_lista;?></p>
        </div>                
    </td>
    <td data-column="Total" class="table-row__td">
        <div class="">
          <span class="table-row__small"><?=$monedaf_s;?></span>
          <p class="table-row__policy"><?=$monedaf;?> <?=number_format($total_productos_price, 2, ',', '.');?></p>
        </div>              
    </td>
    <td data-column="Garantia" class="table-row__td">
        <div class="">
        	<?=$cantidad_de_carantia_text;?>
        	<?=$cantidad_de_carantia;?>
        </div>                
    </td>
    <td data-column="Proveedor" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$proveedor['razon_social'];?></p>
          <?php if($proveedor['ruc']): ?>
          	<span class="table-row__small"><?=$proveedor['ruc'];?></span>
          <?php endif ?>
        </div>                
    </td>

    <td data-column="Pago" class="table-row__td">
        <div class="">
            <?php if($wo['comprass']['credito']==1): ?>
                <p class="table-row__policy">Credito</p>
            <?php else: ?>
                <p class="table-row__policy">Billetera</p>
            <?php endif ?>
          
          <span class="table-row__small"><?=$monedaf;?><?=number_format($total_productos_price, 2, ',', '.');?></span>
        </div>                
    </td>
    <td data-column="Fecha" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$fecha;?></p>
        </div>                
    </td>
    <td  data-column="Accion" class="table-row__td">
        <span class="visualizar_compra_orp" data-id="<?=$wo['comprass']['id'] ?>">
  		    <svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
        </span>
  	</td>
</tr>