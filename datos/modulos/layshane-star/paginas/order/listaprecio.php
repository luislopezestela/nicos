<div class="cuentas_a_pagar">
	<div class="div_subs_contn">
		<strong class="head_doc_li">Cantidad:</strong>
		<span><?=$wo['total_productos_lista'];?></span>
	</div>
	<div class="div_subs_contn">
		<strong><?php echo $wo['lang']['subtotal'] ?></strong>
		<span><?=(!empty($wo['currencies'][$wo['indexdefault_currencys']]['symbol'])) ? $wo['currencies'][$wo['indexdefault_currencys']]['symbol'] : $wo['moneds'];?> <?php echo $wo['subtotal_dos']; ?></span>
	</div>
	<div class="div_subs_contn">
		<strong><?php echo $wo['lang']['igv'] ?></strong>
		<span><?=(!empty($wo['currencies'][$wo['indexdefault_currencys']]['symbol'])) ? $wo['currencies'][$wo['indexdefault_currencys']]['symbol'] : $wo['moneds'];?> <?php echo $wo['igv_dos']; ?></span>
	</div>
	<div class="div_subs_contn">
		<strong><?php echo $wo['lang']['total'] ?></strong>
		<span><?=(!empty($wo['currencies'][$wo['indexdefault_currencys']]['symbol'])) ? $wo['currencies'][$wo['indexdefault_currencys']]['symbol'] : $wo['moneds'];?> <?=$wo['total_dos'];?></span>
	</div>
</div>