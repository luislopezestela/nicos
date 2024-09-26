<?php 
$comproban = '';
$anulados = '';
$anulado = "table-row--overdue_gris";
$comproban = 'CERRADO';
$total_productos_price = 0.00;

$turno1 = false;
$turno2 = false;
$turno3 = false;



if($wo['comprass']['anulado']==1) {
    $comproban = 'ABIERTO';
	$anulado = "table-row--overdue_green";
	$anulados = "table-row--green";
}
if($wo['comprass']['anulado']==1) {
    $cantidad_de_carantia_text = '<p style="color:rgba(39, 174, 96,1.0);font-weight:bold;text-transform:uppercase;letter-spacing:3px;" class="table-row__policy">Tarde</p>';
}else{
    $cantidad_de_carantia_text = '<p style="color:rgba(39, 174, 96,1.0);font-weight:bold;text-transform:uppercase;letter-spacing:3px;" class="table-row__policy">Mañana</p>';
}

$fecha = false;
if(!empty($wo['comprass']['fecha'])){
	$fecha = date("Y-m-d", strtotime($wo['comprass']['fecha']));
}

$horario = false;
if(!empty($wo['comprass']['fecha'])){
    $horario = date("h:i:s A", strtotime($wo['comprass']['fecha']));
}
$indexdefault_currency = array_search($wo['comprass']['currency'], array_column($wo['currencies'], 'text'));
$monedaf_s = $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['text'] : '';
$monedaf = $wo['product']['symbol'] = (!empty($wo['currencies'][$indexdefault_currency]['symbol'])) ? $wo['currencies'][$indexdefault_currency]['symbol'] : '';
?>

<tr class="table-row table-row--chris <?=$anulados;?>" id="list_<?php echo $wo['comprass']['id'] ?>" data_selected="<?php echo $wo['comprass']['id'] ?>">

	<td data-column="Caja" class="table-row__td">
        <div class="<?=$anulado;?>"></div>
		<p class="table-row__name"><?php echo $comproban;?></p>
        <span class="table-row__small"><?=$fecha;?></span>
    </td>

    <td data-column="Total" class="table-row__td">
        <div class="">
          <span class="table-row__small"><?=$monedaf_s;?></span>
          <p class="table-row__policy"><?=$monedaf;?> <?=number_format($total_productos_price, 2, ',', '.');?></p>
        </div>
        <div class="">
          <span class="table-row__small">USD</span>
          <p class="table-row__policy"><?=$monedaf;?> <?=number_format($total_productos_price, 2, ',', '.');?></p>
        </div>             
    </td>
    <td data-column="Turno" class="table-row__td">
        <div class="">
        	<?=$cantidad_de_carantia_text;?>
            <p class="table-row__policy">Cajero: Varios</p>
        </div>                
    </td>

    <td data-column="Abierto" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$horario;?></p>
        </div>                
    </td>

    <td data-column="Cerrado" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$horario;?></p>
        </div>                
    </td>
    <td  data-column="Accion" class="table-row__td">
        <span class="visualizar_compra_orp" data-id="<?=$wo['comprass']['id'] ?>">
  		    <svg class="table-row__edit" style="color:rgb(1, 185, 209);" width="34" height="34" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
        </span>
  	</td>
</tr>