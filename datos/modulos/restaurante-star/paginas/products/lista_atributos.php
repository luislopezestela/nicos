<div class="atributo_de_producto" id="atributo_de_product_<?=$wo['atributos']['id'];?>">
	<div class="header_atributos_listas">
		<div class="name_content_atribute" id="name_content_atribute_<?=$wo['atributos']['id'];?>">
			<b class="title_atribute" id="name_atributes_<?=$wo['atributos']['id'];?>"><?=$wo['atributos']['nombre'];?></b>
			<input type="text" name="nombre" class="name_atribute_list_inputs_all" data-titulo="<?=$wo['atributos']['nombre'];?>" id="name_atribute_list_<?=$wo['atributos']['id'];?>" data-id="<?=$wo['atributos']['id'];?>" value="<?=$wo['atributos']['nombre'];?>">
		</div>
		
		<div class="controls_atribute">
			<span class="editar_atributo update_atribute" id="update_atribute<?=$wo['atributos']['id'];?>" data-titulo="<?=$wo['atributos']['nombre'];?>" data-input-id="name_atribute_list_<?=$wo['atributos']['id'];?>" data-id="<?=$wo['atributos']['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></span>
			<span class="eliminar_atributo trash_atribute" onclick="RemoveAtributeProduct(<?=$wo['atributos']['id'];?>,'hide')" data="<?=$wo['atributos']['id'];?>">  
				<svg class="bin-top" viewBox="0 0 39 7" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line y1="5" x2="39" y2="5" stroke="white" stroke-width="4"></line>
				    <line x1="12" y1="1.5" x2="26.0357" y2="1.5" stroke="white" stroke-width="3"></line>
				</svg>
				<svg class="bin-bottom" viewBox="0 0 33 39" fill="none" xmlns="http://www.w3.org/2000/svg">
					<mask id="path-1-inside-1_8_19" fill="white">
						<path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"></path>
				    </mask>
				    <path d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z" fill="white" mask="url(#path-1-inside-1_8_19)"></path>
				    <path d="M12 6L12 29" stroke="white" stroke-width="4"></path>
				 	<path d="M21 6V29" stroke="white" stroke-width="4"></path>
				</svg>
			</span>
		</div>
	</div>

	<div class="opciones_de_atributos">
		<div class="opt_atributes">
			<div class="header_opt_atributos">
				<input type="text" name="nombre" id="atributo_product_<?=$wo['atributos']['id'];?>" placeholder="Nombre opcion" autocomplete="off">
				<input type="text" name="price_opt" id="atributo_product_price_<?=$wo['atributos']['id'];?>" autocomplete="off" placeholder="Precio adicional">
				<span class="add_opt_atributes style_opt_atributes" data="<?=$wo['atributos']['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></span>
			</div>
			<?php $atributos_opciones = Mostrar_Opciones_Atributos_producto($wo['atributos']['id']); ?>
			<div class="lista_de_opciones_atr">	
				<?php if ($atributos_opciones): $symbol_moneda =  (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?>			
					<div class="opt_atr_list_content" id="conten_opt_atributes_<?=$wo['atributos']['id'];?>">
						<?php foreach ($atributos_opciones as $wo['opt_atributos']): $wo['opt_atributos']['moneda'] = $symbol_moneda;?>
							<?=lui_LoadPage("products/list_atribute_opciones");?>
						<?php endforeach ?>
					</div>
				<?php else: ?>
					<div class="opt_atr_list_content" id="conten_opt_atributes_<?=$wo['atributos']['id'];?>">
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>