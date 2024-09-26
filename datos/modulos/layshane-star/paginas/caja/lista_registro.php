<?php 
$comproban = '';
$total_productos_price = 0.00;
$referencia_registro = '<p style="color:rgba(39, 174, 96,1.0);font-weight:bold;text-transform:uppercase;letter-spacing:3px;" class="table-row__policy">'.htmlspecialchars($wo['registro']['referencia']).'</p>';
if ($wo['venta']['documento']=='B') {
    $documentol = 'BOLETA';
}elseif ($wo['venta']['documento']=='F') {
    $documentol = 'FACTURA';
}elseif ($wo['venta']['documento']=='BS') {
    $documentol = 'BOLETA SIMPLE';
}
?>

<tr class="table-row table-row--chris" id="list_<?php echo $wo['registro']['id'] ?>" data_selected="<?php echo $wo['registro']['id'] ?>">

	<td data-column="REGISTRO" class="table-row__td">
        <div class="table-row--overdue_gris"></div>
		<p class="table-row__name"><?php echo $wo['registro']['moneda'];?></p>
        <span class="table-row__small">Cajero: <?= $wo['cajero'] ?></span>
    </td>

    <td data-column="DCUMENTO" class="table-row__td">
        <div class="">
          <span class="table-row__small"><?=$documentol;?></span>
          <p class="table-row__policy"><?=$wo['venta']['num_doc'];?></p>
        </div>           
    </td>
    <td data-column="REFERENCIA" class="table-row__td">
        <div class="">
        	<?=$referencia_registro;?>
        </div>                
    </td>

    <td data-column="TOTAL" class="table-row__td">
        <div class="">
          <span class="table-row__name"><?=$wo['totalmonto'];?></span>
        </div>                
    </td>

    <td data-column="METODOS" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$wo['metodos'];?></p>
        </div>                
    </td>

    <td data-column="FECHA" class="table-row__td">
        <div class="">
          <p class="table-row__policy"><?=$wo['fechas'];?></p>
          <span class="table-row__small"><?=lui_Time_Elapsed_String_word($wo['registro']['fecha']);?></span>
        </div>                
    </td>
</tr>