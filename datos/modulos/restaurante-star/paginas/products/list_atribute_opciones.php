<div class="opt_atr_list" id="opcion_de_atributo_product_<?=$wo['opt_atributos']['id'];?>">
	<div class="content_list_options_atri name_content_atribute_opt" id="name_content_atribute_opt_<?=$wo['opt_atributos']['id'];?>">
		<p class="title_opt_atribute name_atributes_opt" id="name_atributes_opt_<?=$wo['opt_atributos']['id'];?>"><?=$wo['opt_atributos']['nombre'];?>
		<i class=""> <?=$wo['opt_atributos']['moneda'].' '.$wo['opt_atributos']['precio_adicional'];?></i></p>
		<input type="text" name="nombre" class="name_atribute_opt_list_inputs_all" data-titulo="<?=$wo['opt_atributos']['nombre'];?>" id="name_atribute_list_opt_<?=$wo['opt_atributos']['id'];?>" data-id="<?=$wo['opt_atributos']['id'];?>" value="<?=$wo['opt_atributos']['nombre'];?>">
		<input type="text" name="price_opt" id="atributo_product_price_<?=$wo['opt_atributos']['id'];?>" value="<?=$wo['opt_atributos']['precio_adicional'];?>">
	</div>
	<div class="controls_options_atr">
		<span class="editar_atributo update_atribute_opt" id="update_atribute_opt<?=$wo['opt_atributos']['id'];?>" data-id="<?=$wo['opt_atributos']['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg></span>

		<span class="eliminar_atributo trash_atribute" onclick="RemoveAtributeProduct_options(<?=$wo['opt_atributos']['id'];?>,'hide')" data="<?=$wo['opt_atributos']['id'];?>">  
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