<style type="text/css">
	body{background-color:#F0F2FD;}
	.contenido_update_data{
		position: relative;
    background-color: #fff;
	}
	.columna-4{padding-left:15px;}
	.colores_activados_prod{
		display:block;
		border:3px dashed rgba(8, 8, 8, 0.32);
		transition: all .5s;
		border-radius:6px;
		padding:8px;
	}
	.title_acce_ite{
		text-align:center;
	}
  label{font-weight: 500 !important;margin-bottom: 0.2rem;margin-top:initial;}
	.disable_added_media{display:none!important;}
        .contain_data_images_group_s{
            width:100%;
            padding:5px!important;
        }
        .contenedor_media_colors{
            position:relative;
            padding-top:20px;
            background-color:#fff;
            max-width:100%;
        }
        .color_view_data{
            padding:6px;
            position:sticky;
            top:0;
            left:0;
            right:0;
            z-index:1;
        }
        .color_view_data i{
            padding:5px;
            position:relative;
            border-radius:5px;
        }
   
    .td-avatar{width:28px;}
    .publicar_producto{overflow:hidden;border-radius: 0.2rem;}
    .publicar_producto_head{background:#3498db;color:#FAFAFA;padding:10px;font-size:17px;}
    .publicar_producto_head h4{margin:0;}
    .publicar_producto_dialog,.editar_producto_dialog{max-width:820px;}

    .wow_form_fields select{height:44px;}
    .wow_form_fields input, .wow_form_fields textarea, .wow_form_fields select,.wow_form_fields > .bootstrap-select.btn-group > .dropdown-toggle{
        background-color: transparent;
    box-shadow: rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    border-radius: 0;
    transition: background-color 240ms, box-shadow 240ms;
    color: #393d4a;
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    padding: 8px;
    width: 100%;
    border: 0;
    outline: 0;
    }
    .wow_form_fields {
    position: relative;
    margin: 15px 0;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
  }
  .wow_form_fields > label {
    font-weight: bold;
    font-size: 14.5px;
    display: block;
    color: #777;
    }
    .wow_prod_imgs {
    	padding:10px;
    	width:100%;
    display: flex;
  }
  .wow_prod_imgs .upload-product-image {
    width: 100px;
    min-width: 100px;
    height: 100px;
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    cursor: pointer;
    display: table;
    margin:10px 5px 0 8px;
    background-color: #f0f2f5;
    }
    .upload-image-content {
    font-size: 15px;
    color: #555;
    display: table-cell;
    vertical-align: middle;
    }

    .upload-image-content {
        transition: all .2s ease-in-out;
        text-align: center;
    }
    .wow_prod_imgs .upload-product-image svg.feather {
    width: 24px;
    height: 24px;
    color: #848484dd;
    }

    svg.feather {
        vertical-align: middle;
        margin-top: -4px;
        width: 19px;
        height: 19px;
    }

    .wow_prod_imgs .productimage_holder_image {
    overflow-x: auto;
    }

    .productimage_holder_image {
        width: 100%;
        margin: 0;
        white-space: nowrap;
    }
    .wow_prod_imgs .productimage_holder_image .thumb-image {
    pointer-events: auto;
    }

    .productimage_holder_image .thumb-image {
        width: 100px;
        height: 100px;
        margin: 10px 5px 0 0;
        display: inline-block;
        object-fit: cover;
        user-select: none;
        pointer-events: none;
        border:2px solid;
        border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    }
    .thumb-image-delete {
    position: relative;
    display: inline-block;
    }
    .thumb-image-delete-btn {
    position: absolute;
    right: 5px;
    top: 5px;
    color: white;
    background-color:rgba(231, 76, 60,0.8);
    border-radius: 50%;
    text-align: center;
    line-height: 1;
    padding: 5px;
    }
    .background_image_product {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    border-radius:6px;
    height: 100%;
    }
    .btn_upda_product{display:block;text-align:center;width:100%;background-color:#3498db;color:#FAFAFA;}



.input_container_agrgar_datos {
  display: flex;
  border-radius: 1rem;
  background:#ccc;
  box-shadow:0px 5px 5px #d8d8d873, -5px -5px 10px #f8f8f8;
  padding: 0.3rem;
  gap: 0.3rem;
}

.input_container_agrgar_datos input {
  border-radius: 0.8rem 0 0 0.8rem;
  background: #e8e8e8;
  box-shadow:inset 5px 5px 2px #dcdcdc, inset -5px -5px 2px #f4f4f4;
  width:100%;
  flex-basis: 80%;
  padding:0.8rem;
  border: none;
  color: #5e5e5e;
  transition: all 0.2s ease-in-out;
}

.input_container_agrgar_datos input:focus {
  outline: none;
  box-shadow: inset 13px 13px 10px #ddd,inset -13px -13px 10px #f4f4f4;
}

.input_container_agrgar_datos .button_add{
	display:flex;
	justify-content:center;
	align-items:center;
  flex-basis: 20%;
  padding: 1rem;cursor:pointer;
  font-size:14px;
  background:#4998FF;
  font-weight: 900;
  letter-spacing: 0.3rem;
  text-transform: uppercase;
  color: white;
  border: none;
  width: 100%;
  border-radius: 0 1rem 1rem 0;
  transition: all .5s;
}

.input_container_agrgar_datos .button_add:hover {
  background:#4998ffc4;
}
.columna_opcions_tabla_ubdate{position:sticky;top:140px;}
.contenedor_atributos_datos{display:flex;justify-content:flex-start;align-items:flex-start;flex-wrap:nowrap;padding:15px;border-radius:10px;margin-bottom:15px;background:#F0F2FD;gap:1rem;margin-top:15px;}						
.lista_de_atributos{width:100%;}
.lista_de_atributos h4{font-weight:bold;font-size:25px;margin:0;border-bottom:3px solid #ccc;padding-bottom:6px;user-select:none;}
.atributos_de_produto_contenido{padding:10px;display:block;}
.atributo_de_producto{
	display:flex;
	flex-wrap:wrap;
	user-select:none;
}
.atributo_de_producto .header_atributos_listas{border-bottom:1px solid #ddd;display:flex;background:rgb(232 232 232);padding:6px 10px;justify-content:space-between;align-items:center;width:100%;margin-top:10px;}
.atributo_de_producto .header_atributos_listas .controls_atribute{display:flex;gap:0.5em;}
.atributo_de_producto .header_atributos_listas span{cursor:pointer;display:inline-block;padding:10px;border-radius:5px;color:#FAFAFA;transition: scale 0.2s ease;}

.atributo_de_producto .header_atributos_listas span{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 55px;
  height: 55px;
  border-radius: 15px;
  cursor: pointer;
  transition: all .5s;
  transition-duration: 0.3s;
}
.atributo_de_producto .header_atributos_listas span.editar_atributo{
  background-color:rgb(255, 190, 86);
  border: 3px solid rgb(255, 222, 186);
}
.atributo_de_producto .header_atributos_listas span.editar_atributo:hover {
  background-color: rgb(255, 170, 34);
}
.atributo_de_producto .header_atributos_listas span.editar_atributo:active{
  background-color: rgb(170, 104, 0);
}
.atributo_de_producto .header_atributos_listas span.editar_atributo.activeid{
  background-color: rgb(6, 186, 1);
  border: 3px solid rgb(186, 255, 220);
}
.atributo_de_producto .header_atributos_listas span.eliminar_atributo{
  background-color: rgb(255, 95, 95);
  border: 3px solid rgb(255, 201, 201);
}
.atributo_de_producto .header_atributos_listas span.eliminar_atributo:hover {
  background-color: rgb(232, 71, 26);
}
.bin-bottom {
  width: 15px;
}
.bin-top {
  width: 17px;
  transform-origin: right;
  transition-duration: 0.3s;
}
.name_content_atribute{display:flex;padding-right:10px;width:100%;}
.name_content_atribute input{width:0;opacity:0;transition:all .5s linear;}
.name_content_atribute .title_atribute{opacity:1;width:100%;font-size:initial;}
.update_atributs_active input{width:100%;padding:10px;border:none;border-radius:5px;opacity:1;outline:none;}
.update_atributs_active .title_atribute{opacity:0;width:0;font-size:0;}
.atributo_de_producto .header_atributos_listas span:hover .bin-top{transform:rotate(45deg);}
.atributo_de_producto .header_atributos_listas span:active{transform: scale(0.9);}
.atributo_de_producto b{display:flex;flex-wrap:wrap;align-content:space-around;}
.opciones_de_atributos{display:flex;width:100%;}
.headde_colors_atribute{display:flex;justify-content:space-between;}
.opt_atributes{display:flex;flex-wrap:wrap;gap:1rem;padding:6px;width:100%;background-color:#dcdcdc38;}
.header_opt_atributos{display:flex;position:relative;width:100%;}
.header_opt_atributos input{padding:10px;width:100%;display:block;border:none;outline:none;border:1px solid #ccc;border-radius:4px;margin-right:5px;}
.header_opt_atributos .style_opt_atributes{padding:15px;background:#2ecc71;color:#fff;cursor:pointer;user-select:none;border-radius:0 5px 5px 0;}
.header_opt_atributos span.style_opt_atributes:active{transform: scale(0.9);}
.lista_de_opciones_atr{
	display:flex;
	flex-wrap:wrap;
	width:100%;
	gap:0.7rem;
}
.opt_atr_list_content{width:100%;}
.content_list_options_atri{display:flex;padding-right:10px;width:100%;}
.content_list_options_atri input{width:0;opacity:0;transition:all .5s linear;}
.content_list_options_atri .title_opt_atribute{opacity:1;width:100%;font-size:initial;}

.update_atributs_active_atri input{width:100%;padding:10px;border:1px solid #ccc;border-radius:5px;opacity:1;outline:none;margin-right:6px;}
.update_atributs_active_atri .title_opt_atribute{opacity:0;width:0;font-size:0;}

.opt_atr_list{border-bottom:1px solid #ddd;display:flex;background:rgb(255 255 255);padding:6px 10px;justify-content:space-between;align-items:center;width:100%;margin-top:10px;}
.opt_atr_list .controls_options_atr{display:flex;gap:0.5em;}
.opt_atr_list span{cursor:pointer;display:inline-block;padding:10px;border-radius:5px;color:#FAFAFA;transition: scale 0.2s ease;}
.opt_atr_list span{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 35px;
  height: 35px;
  border-radius: 15px;
  cursor: pointer;
  transition: all .5s;
  transition-duration: 0.3s;
}
.opt_atr_list span.editar_atributo{
  background-color:rgb(255, 190, 86);
  border: 3px solid rgb(255, 222, 186);
}
.opt_atr_list span.editar_atributo:hover {
  background-color: rgb(255, 170, 34);
}
.opt_atr_list span.editar_atributo:active{
  background-color: rgb(170, 104, 0);
}
.opt_atr_list span.editar_atributo.activeid{
  background-color: rgb(6, 186, 1);
  border: 3px solid rgb(186, 255, 220);
}
.opt_atr_list span.eliminar_atributo{
  background-color: rgb(255, 95, 95);
  border: 3px solid rgb(255, 201, 201);
}
.opt_atr_list span.eliminar_atributo:hover {
  background-color: rgb(232, 71, 26);
}


@media (max-width: 992px){
	.input_container_agrgar_datos{flex-basis:40%;}
	.lista_de_atributos{width:100%;flex-basis:60%;}
}
@media (max-width: 685px){
	.contenedor_atributos_datos{flex-wrap:wrap;}
	.input_container_agrgar_datos{flex-basis:100%;}
	.lista_de_atributos{width:100%;flex-basis:100%;}
}
@media (max-width: 500px) {
  .input_container_agrgar_datos {
    flex-direction: column;
  }

  .input_container_agrgar_datos input {
    border-radius: 0.8rem;
  }

  .input_container_agrgar_datos .button_add {
    padding: 1rem;
    border-radius: 0.8rem;
  }
}

@media (min-width: 992px){
	.input_container_agrgar_datos{width:100%;}
	.contenedor_atributos_datos{flex-wrap:wrap;}
	.input_container_agrgar_datos{flex-basis:100%;}
	.lista_de_atributos{width:100%;flex-basis:100%;}
}
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<div class="columna-8">
	<div class="wow_sett_sidebar button_controle_layshane_back_settign">
	    <ul class="list-unstyled" style="padding-bottom:0;">
	      <li class="">
	        <a class="btn btn-default" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs" style="background-color:#fff;">Atras</a>
	      </li>
	    </ul>
	</div>
	<br>
	<div class="wo_settings_page">
		<div class="profile-lists singlecol">
			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['edit'];?>
					</div>
				</div>
				<a class="btn btn-mat" data-ajax="?link1=my-products" href="<?php echo lui_SeoLink('index.php?link1=my-products');?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?>
				</a>
			</div>
			<br>
			<div class="page-margin wow_sett_content">
				<form class="editar_productos_li_s" method="POST" id="modal-body-langs">
					<div class="row" style="margin: 0 -15px">
						<div class="columna-8">
							<?php lui_MostrarTodo_los_colores_producto(); ?>
							<div class="row">
								<div class="columna-6">
									<div class="wow_form_fields">
										<label for="category_ub">Tipo de producto</label>
									<select name="category" id="category_ub">
								      <option value="null">Selecciona tipo de producto.</option>
								      <?php foreach ($wo['products_categories'] as $category){
								        $selected_ub = ($category['id'] == $wo['product']['category']) ? 'selected' : '';
								        if($category['id'] > 0){ ?>
								          <option value="<?=$category['id']?>" <?=$selected_ub;?>><?php echo $wo['lang'][$category['lang_key']];?></option>
								        <?php } ?>
								      <?php } ?>
								    </select>
								  </div>
								</div>

								<div class="columna-6 product_sub_category_class_ub" style="<?php echo((empty($wo['products_sub_categories'][$wo['product']['category']]) ? 'display: none;' : '')) ?>">
								  <div class="wow_form_fields">
								    <label for="product_sub_category_ub">Sub tipo de producto</label>
								    <select name="product_sub_category" id="product_sub_category_ub">
								      <?php
								        if (!empty($wo['products_sub_categories'][$wo['product']['category']])) {
								        foreach ($wo['products_sub_categories'][$wo['product']['category']] as $id => $sub_category) { 
								          $sub_selected_ub = ($sub_category['id'] == $wo['product']['sub_category']) ? ' selected' : '' ;?>
								          <option value="<?php echo $sub_category['id']?>" <?php echo $sub_selected_ub; ?>><?php echo $sub_category['lang']; ?></option>
								        <?php } } ?>
								    </select>
								  </div>
								</div>
							</div>

							<div class="row">
								<div class="columna-8">
								  <div class="wow_form_fields">
								    <label for="name"><?php echo $wo['lang']['name'] ?></label>
								    <input id="name" name="name" type="text" value="<?php echo $wo['product']['name'];?>" autocomplete="off">
								  </div>
								</div>

								<div class="columna-4">
								  <div class="wow_form_fields">
								    <label for="type">Estado</label>
								    <select name="type" id="type">
								      <option value="0" <?php echo ($wo['product']['type'] == 0) ? 'selected' : '';?>><?php echo $wo['lang']['new'] ?></option>
								      <option value="1" <?php echo ($wo['product']['type'] == 1) ? 'selected' : '';?>><?php echo $wo['lang']['used'] ?></option>
								    </select>
								  </div>
								</div>
							</div>

              <div class="row">
                <div class="columna-4">
                  <div class="wow_form_fields">
                    <label for="modelo">MODELO</label>
                    <input id="modelo" name="modelo" type="text" value="<?php echo $wo['product']['modelo'];?>" autocomplete="off">
                  </div>
                </div>

                <div class="columna-4">
                  <div class="wow_form_fields">
                    <label for="marca">MARCA</label>
                    <input id="marca" name="marca" type="text" value="<?php echo $wo['product']['marca'];?>" autocomplete="off">
                  </div>
                </div>

                <div class="columna-4">
                  <div class="wow_form_fields">
                    <label for="sku">SKU</label>
                    <input id="sku" name="sku" type="text" value="<?php echo $wo['product']['sku'];?>" autocomplete="off">
                  </div>
                </div>
              </div>

							<div class="wow_form_fields">
								<label for="description">Caracteristicas</label>
								<textarea name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"><?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['product']['description'], true, false, false)));?></textarea>
							</div>

							<div class="wow_form_fields">
								<label for="detallesupdate"><?php echo $wo['lang']['description'] ?></label>
								<textarea name="detalles" rows="4" id="detallesupdate" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"><?=$wo['product']['edit_detalles']?></textarea>
							</div>

							<div class="row">
								<div class="columna-4">
								  <div class="wow_form_fields">
								    <label for="currency"><?php echo $wo['lang']['currency']; ?></label>
								    <select name="currency" id="currency">
								      <?php foreach($wo['currencies'] as $key => $currency) { ?>
								        <option value="<?php echo $key; ?>" <?php echo ($wo['product']['currency'] == $key) ? 'selected' : ''; ?>><?=$currency['text'] ?> (<?=$currency['symbol'] ?>)</option>
								      <?php } ?>
								    </select>
								  </div>
								</div>

								<div class="columna-8">
								  <div class="wow_form_fields">
								    <label for="price"><?=$wo['lang']['price'];?></label>
								    <input id="price" name="price" type="text" placeholder="0.00" value="<?=$wo['product']['price'];?>">
								  </div>
								</div>

								<?php if ($wo['config']['store_system'] == 'on') { ?>
								  <div class="columna-4" hidden>
								    <div class="wow_form_fields" hidden>
								      <label hidden for="units"><?=$wo['lang']['total_item'] ?></label>
								      <input id="units" name="units" type="number" value="<?=$wo['product']['units'];?>" hidden>
								    </div>
								  </div>
								<?php } ?>
							</div>
				          
							<?php $fields = lui_GetCustomFields('product'); 
								if (!empty($fields)) {
								  foreach ($fields as $key => $wo['field']) {
								    echo lui_LoadPage('products/edit_fields');
								  }
								}
							?>
							<?php $ucolor_null = lui_buscar_existencia_de_color_en_el_producto_null($wo['product']['id']); ?>
							<input type="hidden" name="product_id" value="<?=$wo['product']['id'];?>">

							<div class="contenedor_general_color_w <?php if($wo['product']['color'] == 1){if(!$ucolor_null){echo("colores_activados_prod");}} ?>">
								<div class="multimedia_y_opciones_de_producto <?php if($wo['product']['color'] == 1){if($ucolor_null){echo("colores_activados_prod");}} ?>">

									<div class="row">
										<div class="columna-12">
											<label for="producto_selec_color" class="selector_checkuno left_check">
												<input type="checkbox" id="producto_selec_color" name="color_producto" <?php echo($wo['product']['color'] == 1) ? 'checked' : '';?>>
												<div class="checkmark"></div>
												<p>Color</p>
											</label>
											<br>
											<div class="product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
												<span data-toggle="modal" data-target="#create-nuevo-color" data-keyboard="false" class="btn-info btn-mat btn-default btn" style="background-color:#444;color:#fff;">Agregar color</span>
											</div>
										</div>
									</div>

									<div class="row">
									    <div class="columna-6">
									    	<div class="wow_form_fields">
										        <div class="product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
										        	<label for="color_producto_select_update">Colores</label>
										        	<select name="color" id="color_producto_select_update">
										        		<option value="0">Selecciona el color.</option>
										        			<?php foreach ($wo['colores_productos_mostrar_todo'] as $colors) { ?>
										        				<option value="<?php echo $colors['id']; ?>"><?php echo $wo['lang'][$colors['lang_key']];?> (<?php echo $colors['color'] ?>)</option>
										            		<?php } ?>
										          	</select>
										        </div>
										    </div>
									    </div>

									    <div class="columna-3">
									    	<div class="wow_form_fields product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
									    		<label for="precio_adicional_por_color">Precio adicional</label>
									    		<input class="" type="text" name="color_precio_adicional" id="precio_adicional_por_color" placeholder="Precio adicional por el color" value="0" autocomplete="off">
									    	</div>
									    </div>
                      <div class="columna-3">
                        <div class="wow_form_fields product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
                          <label for="color_sku_i">SKU</label>
                          <input class="" type="text" name="color_sku" id="color_sku_i" placeholder="SKU" value="" autocomplete="off">
                        </div>
                      </div>

									    <div class="columna_lg-12">
									    	<div class="wow_prod_imgs add_images_media_product <?php if($wo['product']['color'] == 1){if(!$ucolor_null){echo("");}} ?>">
									    		<div class="upload-product-image" onclick="document.getElementById('publisher-photos').click(); return false">
									    			<div class="upload-image-content">
									    				<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
									    			</div>
									    		</div>
									    		<div class="productimage_holder_image">
									    			<span id="uploaded-productimage-holder"></span>
									    		</div>
									    	</div>
									    </div>
									</div>
								</div>

								<div class="wow_form_fields mb-0">
									<span><?=$wo['lang']['photos']; ?></span>
								</div>
								<hr>
								<?php if (!empty($wo['product']['images'])) { ?>
									<?php $imagen_con_color_prod = luis_colores_de_productos($wo['product']['id']); ?>
									<?php if ($imagen_con_color_prod): ?>
										<div class="wow_prod_imgs">
											<div id="productimage-holder" class="contain_data_images_group_s">
												<?php foreach ($imagen_con_color_prod as $key => $values){ ?>
													<?php $nombre_color = lui_nombre_del_color_en_lista($values['id_color']); ?>
													<div class="productimage_holder_image contenedor_media_colors">
														<div class="color_view_data" style="background-color:<?=$nombre_color['color'];?>;color:<?=color_inverse_lui($nombre_color['color']);?>;">
															<div class="headde_colors_atribute" style="background-color:<?=$nombre_color['color'];?>;color:<?=color_inverse_lui($nombre_color['color']);?>;">
																<div><?=$wo['lang'][$nombre_color['lang_key']];?> - <?=$values["sku"];?></div>
																<?php $symbol_moneda =  (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s']; ?>
																
																<div><?=$symbol_moneda;?> <?=$values["precio_adicional"];?></div>
															</div>
														</div>
														<?php foreach ($wo['product']['images'] as $key => $value) { ?>
															<?php if ($values["id"] == $value["id_color"]): ?>
																<span class="thumb-image thumb-image-delete" id="delete_image_by_id_<?php echo $value['id']; ?>" style="border-color:<?=$nombre_color['color'];?>;">
																	<span onclick="DeleteProductImageById(<?php echo $value['id']; ?>)" class="pointer thumb-image-delete-btn">
																		<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" fill="currentColor" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
																	</span>
																	<div class="background_image_product" style="background-image: url('<?php echo $value['image']; ?>');"></div>
																</span>
															<?php endif ?>
														<?php } ?>
													</div>
												<?php }  ?>
											</div>
										</div>
									<?php else: ?>
										<div class="wow_prod_imgs">
											<div id="productimage-holder" class="productimage_holder_image">
												<?php foreach ($wo['product']['images'] as $key => $value) { ?>
													<span class="thumb-image thumb-image-delete" id="delete_image_by_id_<?php echo $value['id']; ?>">
														<span onclick="DeleteProductImageById(<?php echo $value['id']; ?>)" class="pointer thumb-image-delete-btn">
															<svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" fill="currentColor" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
														</span>
														<div class="background_image_product" style="background-image: url('<?php echo $value['image']; ?>');"></div>
													</span>
												<?php } ?>
											</div>
										</div>
									<?php endif ?>
								<?php  } ?>
								<div class="hidden">
									<input type="file" id="publisher-photos" accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]" multiple="multiple">
								</div>
							</div>

							<div class="contenedor_atributos_datos">
								<div class="input_container_agrgar_datos">
									<input id="agregar_atributo_produc_nombre" type="text" name="nombre" autocomplete="off">
									<span class="button_add" id="agregar_atributo_produc" data="<?php echo($wo['product']['id']) ?>">
										<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
									</span>
								</div>
								<div class="lista_de_atributos">
									<h4><b>Atributos</b><div class="advertecia_atributes alert alert-warning" style="width:100%;font-size:15px;display:none;">Guardar cambios pendientes.</div></h4>
									<div class="atributos_de_produto_contenido">
										<?php $atributos = Mostrar_Atributos_producto($wo['product']['id']); ?>
										<?php foreach ($atributos as $wo['atributos']): ?>
											<?php if($wo['atributos']['nombre']=='Color'): ?>
											<?php else: ?>
												<?=lui_LoadPage("products/lista_atributos");?>
											<?php endif ?>
										<?php endforeach ?>
									</div>
								</div>
							</div>

							<input type="hidden" name="id" class="form-control input-md" value="<?php echo($wo['product']['id']) ?>">
							<input type="hidden" name="lat-product" id="lat-product" class="form-control input-md" value="">
							<input type="hidden" name="lng-product" id="lng-product" class="form-control input-md" value="">
							<input type="hidden" name="page_id" id="page_id_product" class="form-control input-md" value="<?php echo(!empty($wo['page_profile']) && !empty($wo['page_profile']['page_id']) ? $wo['page_profile']['page_id'] : 0) ?>">
						</div>
						<!-- .col-md-8 -->
						<div class="columna-4 columna_opcions_tabla_ubdate">
							<?php if($wo['product']['stock']==0): ?>
								<div class="row">
									<div class="columna-12">
										<label for="producto_selec_stock" class="selector_checkuno left_check">
											<input type="checkbox" id="producto_selec_stock" name="stock" value="1">
											<div class="checkmark"></div>
											<p>Control de Stock</p>
										</label>
									</div>
								</div><br>
								<hr><br>
							<?php endif ?>
							
							<div class="options_uno">
								<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
								<input type="hidden" name="placement" id="placement" value="product">
								<div class="publisher-hidden-option">
									<div id="progress">
										<div class="progress">
											<span id="percent">0%</span>
											<div id="bar" class="progress-bar progress-bar-striped active"></div> 
										</div>
										<div class="clear"></div>
									</div>
									<div id="status"></div>
								</div>
								<button type="submit" class=" btn_upda_product Btn_dorado" id="edit_custom_field_button">Guardar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- .row -->
<div class="modal fade" id="create-nuevo-color" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4 class="modal-title"><?php echo $wo['lang']['new_product'] ?></h4>
			</div>
			<div class="modal-body" style="margin:25px">
				<div class="row">
					<div class="columna-12">
						<div class="agregar_color_producto_alert"></div>
						<form method="POST" id="agregar_color_producto">
							<input class="form-control" type="color" name="colores" style="padding:0;border:0;cursor:pointer;width:100%;margin:10px auto;height:50px;">
							<div class="">
								<?php foreach (lui_LangsNamesFromDB() as $wo['key_']) { ?>
									<div class="columna-2" id="normal-query-form">
										<div class="form-group form-float">
											<div class="form-line">
												<label for="<?php echo($wo['key_']);?>_lanf" class="form-label"><?php echo ucfirst($wo['key_']); ?></label>
												<input type="text" id="<?php echo($wo['key_']);?>_lanf" class="form-control" name="<?php echo($wo['key_']) ?>">
											</div>
										</div>
									</div>
								<?php } ?>
								<div class="clearfix"></div>
								<div class="columna-2" style="display:flex;justify-content:center;flex-wrap:wrap;align-items:center;">
									<div>&nbsp;</div>
									<button class="center Btn_dorado">Agregar</button>
								</div>
								<br>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-atributes-list" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['delete_product_post']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_product_post']; ?></p>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete-my-atribute-product" type="button" class="btn main btn-mat"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-atributes-list_options" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['delete_product_post']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_product_post']; ?></p>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete-my-atribute-product_options" type="button" class="btn main btn-mat"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>
<!-- .page-margin -->

<script type='text/javascript'>
	var imgArray = [];
	<?php $js_array_update = json_encode($wo['products_sub_categories']);
	echo "var sub_categories_array = ". $js_array_update. ";\n";
	?>
	$("#category_ub").on('change', function(){
		id = $(this).val();
		$('.product_sub_category_class_ub').slideUp();
		var text = "";
		if(typeof(sub_categories_array[id]) == 'undefined') {
			$('#product_sub_category_ub').html('');
		}else{
			$('.product_sub_category_class_ub').slideDown();
			sub_categories_array[id].forEach(function(entry) {
				text = text + "<option value='"+entry.id+"'>"+entry.lang+"</option>";
			});
			$('#product_sub_category_ub').html(text);
		}
	});

	$(document).on('click', "#agregar_atributo_produc", function(){
		var id = $(this).attr('data');
		var atributo = $('#agregar_atributo_produc_nombre').val();
		$.post(Wo_Ajax_Requests_File() + '?f=products&s=agregar_atributo_item', {producto:id,nombre:atributo}, function(data, textStatus, xhr){
			if(data.status==200){
				$('#agregar_atributo_produc_nombre').val('');
				$('#agregar_atributo_produc_nombre').focus();
				$('.atributos_de_produto_contenido').append(data.html)
			}
		});
	});
	

	var cambiosPendientes = false;
    $(document).on('input','.name_atribute_list_inputs_all', function() {
      cambiosPendientes = true;
    });

    $(document).on('input','.name_atribute_opt_list_inputs_all', function() {
      cambiosPendientes = true;
    });

    $(document).on('click', ".update_atribute", function(){
      	const inputId = $(this).data('input-id');
      	const udId = $(this).data('id');
      	const originalValue = $('#' + inputId).data('titulo');
      	if (cambiosPendientes) {
      		mostrarAdvertencia();
      	}else{
      		$('.name_atribute_list_inputs_all').removeClass('editando');
      		$('#' + inputId).addClass('editando');
	      	let id_atribute_o = udId;
	    	let button_status = $('#update_atribute'+udId);
	    	let buttons_statu = $('.update_atribute');
			let atribu_conten = $('.name_content_atribute');
			let atr_f_contens = $('#name_content_atribute_'+id_atribute_o);
			$('.update_atribute').html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>');

			$('#update_atribute'+udId).html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>');
			buttons_statu.removeClass('activeid');
			$('.update_atribute').removeClass('save_changes_atribute_titles');
			$('.name_content_atribute_opt').removeClass('update_atributs_active_atri');
			atribu_conten.removeClass('update_atributs_active');
			button_status.addClass('activeid');
			button_status.addClass('save_changes_atribute_titles');
			atr_f_contens.addClass('update_atributs_active');
	        if ($('#' + inputId).val() === originalValue) {
	          cambiosPendientes = false;
	          mostrarAdvertencia();
	        }

		}
	});

    function mostrarAdvertencia() {
      $('.advertecia_atributes').toggle(cambiosPendientes);
    }


    $(document).on('click', ".save_changes_atribute_titles", function(){
    	cambiosPendientes = false;
    	mostrarAdvertencia();
		var id = $(this).attr('data-id');
		var values = $('#name_atribute_list_'+id).val();
		var inputs_a = $('#name_atribute_list_'+id);
		var inputs_b = $('#name_atributes_'+id);

    	let button_status = $('#update_atribute'+id);
		let atr_f_contens = $('#name_content_atribute_'+id);
		$.post(Wo_Ajax_Requests_File() + '?f=products&s=save_atributs', {atribute:id,nombre:values}, function(data, textStatus, xhr){
			if(data.status==200){
				inputs_a.attr('data-titulo', data.nombre);
				inputs_a.attr('value', data.nombre);
				inputs_b.html(data.nombre);
				$('.update_atribute').html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>');
				button_status.removeClass('activeid');
				button_status.removeClass('save_changes_atribute_titles');
				atr_f_contens.removeClass('update_atributs_active');
				$('.update_atribute_opt').removeClass('save_changes_atribute_titles_opt');
				$('.name_atribute_list_inputs_all').removeClass('editando');

			}
		});
	});

	$(document).on('click', ".update_atribute_opt", function(){
    const inputId = $(this).data('id');
    const originalValue = $(this).data('titulo');
    if (cambiosPendientes) {
      mostrarAdvertencia();
    }else{
      $('.name_atribute_opt_list_inputs_all').removeClass('editando');
      $('.name_atribute_list_inputs_all').removeClass('editando');
      $('#name_atribute_list_opt_' + inputId).addClass('editando');
      let id_atribute_o = inputId;
	    let button_status = $('#update_atribute_opt'+inputId);
	    let buttons_statu = $('.update_atribute_opt');
			let atribu_conten = $('.name_content_atribute_opt');
			let atr_f_contens = $('#name_content_atribute_opt_'+id_atribute_o);
			$('.update_atribute_opt').html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>');
      button_status.html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 4l0 4l-6 0l0 -4" /></svg>');
			buttons_statu.removeClass('activeid');
			$('.update_atribute_opt').removeClass('save_changes_atribute_titles_opt');
			atribu_conten.removeClass('update_atributs_active_atri');
			button_status.addClass('activeid');
			button_status.addClass('save_changes_atribute_titles_opt');
			atr_f_contens.addClass('update_atributs_active_atri');
      if ($('#name_atribute_list_opt_'+inputId).val() === originalValue) {
        cambiosPendientes = false;
        mostrarAdvertencia();
      }
		}
	});

	$(document).on('click', ".save_changes_atribute_titles_opt", function(){
    	cambiosPendientes = false;
    	mostrarAdvertencia();
		var id = $(this).attr('data-id');
		var values = $('#name_atribute_list_opt_'+id).val();
		var inputs_a = $('#name_atribute_list_opt_'+id);
		var inputs_b = $('#name_atributes_opt_'+id);
    let button_status = $('#update_atribute_opt'+id);
		let atr_f_contens = $('#name_content_atribute_opt_'+id);

    let atr_price_dat = $('#atributo_product_price_'+id).val();

		$.post(Wo_Ajax_Requests_File() + '?f=products&s=save_atributs_opt', {opcion:id,nombre:values,precio_opt:atr_price_dat}, function(data, textStatus, xhr){
			if(data.status==200){
				inputs_a.attr('data-titulo', data.nombre);
				inputs_a.attr('value', data.nombre);
				inputs_b.html(data.nombre+' <i> '+data.moneda+' '+data.precio_opt+'</i>');
				$('.update_atribute_opt').html('<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>');
				button_status.removeClass('activeid');
				button_status.removeClass('save_changes_atribute_titles_opt');
				atr_f_contens.removeClass('update_atributs_active_atri');
				$('.name_atribute_opt_list_inputs_all').removeClass('editando');

			}
		});
	});

	function RemoveAtributeProduct(id,type = 'show') {
		if (type == 'hide') {
			$('#delete-atributes-list').find('#delete-my-atribute-product').attr('onclick', "RemoveAtributeProduct('"+id+"')");
			$('#delete-atributes-list').modal({
			    show: true
			});
			return false;
		}
		$('#delete-atributes-list').modal('hide');
		$('#atributo_de_product_'+id).slideUp(300).remove();
		$.post(Wo_Ajax_Requests_File() + "?f=products&s=delete_atribute_list",{id: id},function () {});
	}

	function RemoveAtributeProduct_options(id,type = 'show') {
		if (type == 'hide') {
			$('#delete-atributes-list_options').find('#delete-my-atribute-product_options').attr('onclick', "RemoveAtributeProduct_options('"+id+"')");
			$('#delete-atributes-list_options').modal({
			    show: true
			});
			return false;
		}
		$('#delete-atributes-list_options').modal('hide');
		$('#opcion_de_atributo_product_'+id).slideUp(300).remove();
		$.post(Wo_Ajax_Requests_File() + "?f=products&s=delete_atribute_list_options",{id: id},function () {});
	}

	$(document).on('click', ".add_opt_atributes", function(){
		var id = $(this).attr('data');
		var opt_atributo = $('#atributo_product_'+id).val();
		var opt_prices = $('#atributo_product_price_'+id).val();
		$.post(Wo_Ajax_Requests_File() + '?f=products&s=add_opt_atributo_item', {atributo:id,nombre:opt_atributo,price_adc:opt_prices}, function(data, textStatus, xhr){
			if(data.status==200){
				$('#atributo_product_'+id).val('');
				$('#atributo_product_'+id).focus();
				$('#atributo_product_price_'+id).val('');
				$('#conten_opt_atributes_'+id).append(data.html)
			}
		});
	});

	$("#color_producto_select_update").on('change', function(){
		var id = this.value;
		$.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=seleccionar_el_color_producto', {colorid:id,producto:<?php echo $wo['product']['id'];?>}, function(data, textStatus, xhr){
			if(data.status==200){
				$("#precio_adicional_por_color").val(data.precio);
        $("#color_sku_i").val(data.sku);
			}
			if(data.status==400){
				$("#precio_adicional_por_color").val(0);
        $("#color_sku_i").val("");
			}
		});
	});

	$(document).on('change',"#producto_selec_color", function() {
		var id = this.value = this.checked ? 1 : 0;
		if(id==0){
			$('.product_colores_producto_class').slideUp();
			$(".contenedor_general_color_w").removeClass("colores_activados_prod")
      $(".multimedia_y_opciones_de_producto").removeClass("colores_activados_prod")
      $(".add_images_media_product").removeClass("disable_added_media")
    }else{
      $.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=buscar_colores_de_producto', {producto: <?php echo $wo['product']['id'] ?>}, function(data, textStatus, xhr){
	      if (data.status==400){
	        $(".contenedor_general_color_w").addClass("colores_activados_prod")
	        $(".multimedia_y_opciones_de_producto").removeClass("colores_activados_prod")
	        $(".add_images_media_product").addClass("disable_added_media")
	      }
	      if (data.status==200){
	        $(".contenedor_general_color_w").removeClass("colores_activados_prod")
	        $(".multimedia_y_opciones_de_producto").addClass("colores_activados_prod")
	      }
      });
      $('.product_colores_producto_class').slideDown();
    }
  });

    //////
    var deleted_images_ids = [];
    function DeleteProductImageById(image_id) {
    	deleted_images_ids.push(image_id);
    	$('#delete_image_by_id_'+image_id).remove();
    }
    var uploaded_deleted_images = [];
    function DeleteUploadedImageById(name,id) {
    	uploaded_deleted_images.push(name);
    	$('#delete_uploaded_image_by_id_'+id).remove();
    }
    $(document).ready(function(){
    	$("#publisher-photos").on('change', function() {
    		uploaded_deleted_images = [];
            var product_countFiles = $(this)[0].files.length;
            var product_imgPath = $(this)[0].value;
            var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
            var product_image_holder = $("#uploaded-productimage-holder");
            //product_image_holder.empty();
            if(extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            	if(typeof(FileReader) != "undefined"){
            		for(var i = 0; i < product_countFiles; i++){
            			var product_reader = new FileReader();
            			var ii = 0;
            			product_reader.onload = function(e){
            				name = "'"+$("#publisher-photos")[0].files[ii].name+"'";
            				src = "'"+e.target.result+"'";
            				$(product_image_holder).prepend('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageById('+name+','+ii+')"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" fill="currentColor" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></span><div class="background_image_product" style="background-image: url('+src+');"></div></span>');
            				ii = ii +1;
            			}
            			product_image_holder.show();
            			product_reader.readAsDataURL($(this)[0].files[i]);
            		}
            	}else{
            		product_image_holder.html("<p>Este navegador no es compatible con FileReader.</p>");
            	}
            }
        });
    });
    function DeleteUploadedImageByIdP(id,self){
    	$('#delete_uploaded_image_by_id_'+id).remove();
    	imgArray.splice(id, 1);
    	var image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
    	image_holder.empty();
    	for(var i = 0; i < imgArray.length; i++){
    		var reader = new FileReader();
    		var ii = 0;
    		reader.onload = function (e){
    			image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteUploadedImageByIdP('+ii+',this)" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
    			ii = ii +1;
    		}
    		image_holder.show();
    		reader.readAsDataURL(imgArray[i]);
    	}
    	$("#publisher-photos")[0].files = new FileListItems(imgArray);
    }
    function FileListItemsP (files) {
    	var b = new ClipboardEvent("").clipboardData || new DataTransfer()
    	for(var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
    		return b.files
    }
    tinymce.init({
                selector: '#detallesupdate',
                height: 270,
                images_upload_credentials: true,
                paste_data_images: true,
                image_advtab: true,
                entity_encoding : 'raw',
                images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'preview media | forecolor backcolor emoticons',
                plugins: ['advlist','anchor','emoticons', 'autolink','autoresize','lists','link','image','charmap','preview','searchreplace','wordcount','visualblocks','visualchars','code','fullscreen','insertdatetime','media','nonbreaking','save','table','directionality','Template','codesample','importcss','pagebreak'],
                file_picker_callback: function(callback, value, meta){
                    if(meta.filetype == 'image'){
                        $('#upload').trigger('click');
                        $('#upload').on('change', function() {
                            var file = this.files[0];
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                callback(e.target.result, {
                                    alt: ''
                                });
                            };
                            reader.readAsDataURL(file);
                        });
                    }
                },
            });

    $(function() {
          var bar = $('#bar');
          var percent = $('#percent');
          var status = $('#status');
          var editar_productos_li_s = $('form.editar_productos_li_s');
          editar_productos_li_s.ajaxForm({
            url: Wo_Ajax_Requests_File() + '?f=products&s=edit',
            beforeSend: function(){
              var percentVal = '0%';
              bar.width(percentVal);
              percent.html(percentVal);
              $('.editar_productos_li_s').find('.add_wow_loader').addClass('btn-loading');
            },
            uploadProgress: function (event, position, total, percentComplete) {
              var percentVal = percentComplete + '%';
              bar.width(percentVal);
              $('#progress').slideDown(200);
              if(percentComplete > 50){
                percent.addClass('white');
              }
              percent.html(percentVal);
            },
            beforeSubmit: function (a,b,c) {
              for(var i = 0 ;i < a.length ; i++) {
                if(a[i].name == 'postPhotos[]') {
                  for(var b = 0 ;b < uploaded_deleted_images.length ; b++) {
                    if(a[i].value.name == uploaded_deleted_images[b]){
                      a[i] = {name:'',value:''};
                    }
                  }
                }
              }
              a.push({'name' : 'deleted_images_ids' , 'value' : deleted_images_ids});
              deleted_images_ids = [];
              uploaded_deleted_images = [];
            },
            success: function(data){
            	console.log(data);
              if(data.status == 200) {
                $('#editar_producto_modal').find('.btn-success').text('Guardar');
                $('.edit_reaction_form_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Guardado</div>');
                setTimeout(function (){
                  $('.edit_reaction_form_alert').empty();
                }, 3000);
                window.location.reload();
              }else{
                $('.edit_reaction_form_alert').html('<div class="alert alert-danger"> '+data.message+'</div>');
                setTimeout(function(){
                  $('.edit_reaction_form_alert').empty();
                }, 2000);
              }
              $('.editar_productos_li_s').find('.add_wow_loader').removeClass('btn-loading');
            }
          });



          	var agregar_color_producto = $('form#agregar_color_producto');
			agregar_color_producto.ajaxForm({
		    url: Wo_Ajax_Requests_File() + '?f=admin_setting&s=add_new_category&type=color_producto',
		    beforeSend: function() {
		        agregar_color_producto.find('.waves-effect').text("Espere..");
		    },
		    success: function(data) {
		        if (data.status == 200) {
		            agregar_color_producto.find('.waves-effect').text('Guardar');
		            $('.agregar_color_producto_alert').html('<div class="alert alert-success"><i class="fa fa-check"></i> Categoria agregado con exito</div>');
		            setTimeout(function () {
		                $('.agregar_color_producto_alert').empty();
		            }, 2000);
		            window.location.reload();
		        }
		        else{
		          $('.agregar_color_producto_alert').html('<div class="alert alert-danger"><i class="fa fa-check"></i> '+data.message+'</div>');
		            setTimeout(function () {
		                $('.agregar_color_producto_alert').empty();
		            }, 2000);
		        }
		    }
			});
        });
    recpoll()
</script>