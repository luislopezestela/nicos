<tr class="table-row table-row--chris" id="table_products_inv_list_<?=$wo['all_products_atr']['id'];?>" data-prod="<?=$wo['all_products_atr']['producto_id'];?>">
	<td class="table-row__td">
		<div class="table-row--overdue_green"></div>
		<div class="table-row__img" style="background-image: url('<?php echo $wo['all_products_atr']['imagen'];?>');"></div>
		<div class="table-row__info">
			<p class="table-row__name"><?php echo $wo['all_products_atr']['nombre'];?></p>
		</div>
	</td>
	<td data-column="MODELO" class="table-row__td">
		<div class="">
			<p class="table-row__policy"><?=$wo['all_products_atr']['modelo']; ?></p>
		</div>                
	</td>
	<td data-column="BARCODE" class="table-row__td">
		<div class="">
			<p class="table-row__policy"><?=$wo['all_products_atr']['barcode']; ?></p>
		</div>                
	</td>
	<td class="table-row__td">
		<span class="dell-button" onclick="RemoveProduct_compra_imv(<?=$wo['all_products_atr']['id'];?>,'hide')" title="Eliminar" >
			<svg class="dell-top" viewBox="0 0 39 7" fill="none" xmlns="http://www.w3.org/2000/svg">
				<line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
				<line x1="12" y1="1.5" x2="26.0357" y2="1.5" stroke="white" stroke-width="3"></line>
			</svg>
			<svg class="dell-bottom" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
				<mask id="path-1-inside-1_8_19" fill="white">
					<path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
				</mask>
				<path d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z" fill="white" mask="url(#path-1-inside-1_8_19)"></path>
				<path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
				<path d="M21 6V29" stroke="white" stroke-width="4"></path>
			</svg>
		</span>
	</td>
</tr>