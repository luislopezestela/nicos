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
            position:absolute;
            top:-10px;
            right:0;
            z-index:1;
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
    margin: 0 -7px;
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
    
</style>
<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<?php lui_MostrarTodo_los_colores_producto(); ?>
<div class="columna-8" id="create-product-item">
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
						<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['new_product'] ?>
					</div>
				</div>
				<a class="btn btn-mat" data-ajax="?link1=my-products" href="<?php echo lui_SeoLink('index.php?link1=my-products');?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?>
				</a>
			</div>
			<br>
			<div class="page-margin wow_sett_content">
				<form class="create-producto-form form-horizontal" method="post">
					<div class="row" style="margin: 0 -15px">
						<div class="columna-8">
							<div class="app-general-alert setting-update-alert"></div>
							<div class="row">
								<div class="columna-6">
									<div class="wow_form_fields">
										<label for="category">Tipo de producto</label>
										<select name="category" id="category" onchange="GetProductSubCategory(this)">
											<option value="">Selecciona tipo de producto.</option>
											<?php foreach ($wo['products_categories'] as $category){
												if($category['id'] >= 1){ ?>
													<option value="<?php echo $category['id']?>"><?php echo $wo['lang'][$category['lang_key']];?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
								<?php if (!empty($wo['products_sub_categories'])) { ?>
									<div class="columna-6 product_sub_category_class" style="<?php echo((empty($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]])) ? 'display: none;' : '') ?>">
										<div class="wow_form_fields">
											<label for="product_sub_category">Sub tipo de producto</label>
											<select name="product_sub_category" id="product_sub_category">
												<?php
													unset($wo['products_categories'][1]);
													if (!empty($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]])) {
														foreach ($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]] as $id => $sub_category) { ?>
															<option value="<?php echo $sub_category['id']?>"><?php echo $sub_category['lang']; ?></option>
													<?php } } ?>
											</select>
										</div>
									</div>
							  <?php } ?>
							</div>

							<div class="row">
								<div class="columna-12">
									<div class="wow_form_fields">
										<label for="name"><?php echo $wo['lang']['name'] ?></label>
										<input id="name" name="name" type="text" value="" autocomplete="off">
									</div>
								</div>

								<div class="columna-4" hidden>
									<div class="wow_form_fields">
										<label for="type">Estado</label>
										<select name="type" id="type">
											<option value="0"><?php echo $wo['lang']['new'] ?></option>
											<option value="1"><?php echo $wo['lang']['used'] ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="wow_form_fields">
								<label for="description">Caracteristicas</label>
								<textarea name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"></textarea>
							</div>

							<div class="wow_form_fields">
								<label for="detalles"><?php echo $wo['lang']['description'] ?></label>
								<textarea name="detalles" rows="3" id="detalles" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>">-</textarea>
							</div>

							<div class="row">
								<div class="columna-4">
									<div class="wow_form_fields">
										<label for="currency"><?php echo $wo['lang']['currency']; ?></label>
										<select name="currency" id="currency">
											<?php foreach ($wo['currencies'] as $key => $currency) { ?>
												<option value="<?php echo $key; ?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="columna-8">
									<div class="wow_form_fields">
										<label for="price"><?php echo $wo['lang']['price']; ?></label>
										<input id="price" name="price" type="text" placeholder="0.00" value="">
									</div>
								</div>

								<?php if ($wo['config']['store_system'] == 'on') { ?>
									<div class="columna-4" hidden>
										<div class="wow_form_fields" hidden>
											<label hidden for="units"><?php echo $wo['lang']['total_item'] ?></label>
											<input id="units" name="units" type="number" value="0" hidden>
										</div>
									</div>
								<?php } ?>
							</div>
						
							<?php $fields = lui_GetCustomFields('product'); 
								if (!empty($fields)) {
									foreach ($fields as $key => $wo['field']) {
										echo lui_LoadPage('products/fields');
									}
								}
							?>
							<br>
							<div class="row">
								<div class="columna-12">
									<label for="producto_selec_color" class="selector_checkuno left_check">
										<input type="checkbox" id="producto_selec_color" name="color_producto" onchange="GetProductColoresData(this)">
										<div class="checkmark"></div>
										<p>Color</p>
									</label>
									<br>
									<div class="product_colores_producto_class" style="display:none;">
										<span data-toggle="modal" data-target="#create-nuevo-color" data-keyboard="false" class="btn-info btn-mat btn-default btn" style="background-color:#444;color:#fff;">Agregar color</span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="columna-6">
									<div class="wow_form_fields product_colores_producto_class" style="display:none;">
										<label for="color_producto_select">Colores</label>
										<select name="color" id="color_producto_select">
											<option value="0">Selecciona el color.</option>
											<?php foreach ($wo['colores_productos_mostrar_todo'] as $colors) { ?>
					        			<option value="<?php echo $colors['id']; ?>"><?php echo $wo['lang'][$colors['lang_key']];?> (<?php echo $colors['color'] ?>)</option>
					            <?php } ?>
										</select>
									</div>
								</div>

								<div class="columna-6">
									<div class="wow_form_fields product_colores_producto_class" style="display:none">
									  <label for="precio_adicional_por_color">Precio adicional</label>
									    <input class="" type="text" name="color_precio_adicional" id="precio_adicional_por_color" placeholder="Precio adicional por el color" value="0">
									</div>
								</div>

							</div>
							<div class="wow_form_fields mb-0">
								<span><?php echo $wo['lang']['photos']; ?></span>
							</div>
							<div class="wow_prod_imgs">
								<div class="upload-product-image" onclick="document.getElementById('product-photos').click(); return false">
									<div class="upload-image-content">
										<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
									</div>
								</div>
								<div class="productimage_holder_image" id="productimage-holder"></div>
							</div>
						</div>

						<!-- .col-md-8 -->
						<div class="columna-4">
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
							<div class="publisher-hidden-option"><br>
								<div id="progress" class="create-product-progress">
									<div class="progress">
										<span id="percent" class="create-product-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
										<div id="bar" class="progress-bar active create-product-bar"></div> 
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="hidden">
								<input type="file" id="product-photos" accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]" multiple="multiple">
							</div>
							<input type="hidden" name="id" class="form-control input-md" value="">
							<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
							<input type="hidden" name="lat-product" id="lat-product" class="form-control input-md" value="">
							<input type="hidden" name="lng-product" id="lng-product" class="form-control input-md" value="">
							<input type="hidden" name="page_id" id="page_id_product" class="form-control input-md" value="<?php echo(!empty($wo['page_profile']) && !empty($wo['page_profile']['page_id']) ? $wo['page_profile']['page_id'] : 0) ?>">
							<button type="submit" class="btn btn-info btn_add_product add_wow_loader"><?php echo $wo['lang']['publish']; ?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
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
												<label for="<?php echo($wo['key_']) ?>_lanfs" class="form-label"><?php echo ucfirst($wo['key_']); ?></label>
												<input id="<?php echo($wo['key_']) ?>_lanfs" type="text" class="form-control" name="<?php echo($wo['key_']) ?>">
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
<script type="text/javascript">
	var imgArray = [];
	<?php 
	$js_array = json_encode($wo['products_sub_categories']);
	echo "var sub_categories_array = ". $js_array . ";\n";
	?>
	function GetProductSubCategory(self) {
		id = $(self).val();
		$('.product_sub_category_class').slideUp();
		var text = "";
		if (typeof(sub_categories_array[id]) == 'undefined') {
		    $('#product_sub_category').html('');
		}
		else{
			$('.product_sub_category_class').slideDown();
		   	sub_categories_array[id].forEach(function(entry) {
				text = text + "<option value='"+entry.id+"'>"+entry.lang+"</option>";
			});
		    $('#product_sub_category').html(text);
		}
	}

	function GetProductColoresData(self) {
		var id = self.value = self.checked ? 1 : 0;
		if (id==0){
			$('.product_colores_producto_class').slideUp();
		}else{
			$('.product_colores_producto_class').slideDown();
		}
	}

	function DeleteUploadedImageByIdP(id,self) {
		$('#delete_uploaded_image_by_id_'+id).remove();
		imgArray.splice(id, 1);
		var image_holder = $(self).parents('#create-product-item').find("#productimage-holder");
		image_holder.empty();

		for (var i = 0; i < imgArray.length; i++){

			var reader = new FileReader();
			var ii = 0;
			reader.onload = function (e) {
			  image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteUploadedImageByIdP('+ii+',this)" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
			  ii = ii +1;

			}
			image_holder.show();
	    reader.readAsDataURL(imgArray[i]);
		}
		$("#product-photos")[0].files = new FileListItemsP(imgArray);
	}



$(document).ready(function(){
	$("#product-photos").on('change', function(){
		let self = this;
		//Get count of selected files
		var product_countFiles = $(this)[0].files.length;
		var product_imgPath = $(this)[0].value;
		var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
		var product_image_holder = $(self).parents('#create-product-item').find("#productimage-holder");
		//product_image_holder.empty();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				//loop for each file selected for uploaded.
				for (var i = 0; i < product_countFiles; i++){
					var reader = new FileReader();
							
					imgArray.push($(self)[0].files[i]);
					
					
					reader.onload = function (e) {
						if ($(self).parents('#create-product-item').find("#productimage-holder .thumb-image-delete").length == 0) {
							var ii = 0;
						}else{
							var ii = $(self).parents('#create-product-item').find("#productimage-holder .thumb-image-delete").length;
						}
					  $(product_image_holder).append('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageByIdP('+ii+',this)"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" fill="currentColor" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></span><div class="background_image_product" style="background-image: url('+e.target.result+');"></div></span>');
					  ii = ii +1;

					}
					product_image_holder.show();
		      reader.readAsDataURL($(this)[0].files[i]);
		    }
		    $(this)[0].files = new FileListItemsP(imgArray);

	    }else{
	    	product_image_holder.html("<p>Este navegador no es compatible con FileReader.</p>");
	    }
	  }
	});
});
function FileListItemsP (files) {
  var b = new ClipboardEvent("").clipboardData || new DataTransfer()
  for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
  return b.files
}

$(function() {
	

    var create_bar = $('.create-product-bar');
    var create_percent = $('.create-product-percent');
    var status = $('#status');
     $('form.create-producto-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=products&s=create',
       beforeSend: function() {
         var percentVal = '0%';
         create_bar.width(percentVal);
         create_percent.html(percentVal);
         $('.create-producto-form').find('.add_wow_loader').addClass('btn-loading');
       },
       uploadProgress: function (event, position, total, percentComplete) {
           var percentVal = percentComplete + '%';
           create_bar.width(percentVal);
           $('.create-product-progress').slideDown(200);
           create_percent.html(percentVal);
      },
       success: function(data) {
         if (data.status == 200) {
         	$("#productimage-holder").empty();
      		imgArray = [];
         	if (data.message) {
         		$('.app-general-alert').html('<div class="alert alert-success">' + data.message + '</div>');
         		setTimeout(function (){
         			$('.app-general-alert').html('');
         			window.location.reload();
         		}, 3000);
         	}
         	else{
         		window.location.href = data.href;
         	}
         } else {
         	create_bar.width('0%');
         	create_percent.html('0%');
             var errors = data.errors.join("<br>");
             $('.app-general-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('.create-producto-form').find('.add_wow_loader').removeClass('btn-loading');
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

document.addEventListener('DOMContentLoaded', function() {
	tinymce.init({
	selector: '#detalles',
	height: 270,
	images_upload_credentials: true,
	paste_data_images: true,
	image_advtab: true,
	entity_encoding : 'raw',
	images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	plugins: ['advlist','anchor','emoticons', 'autolink','autoresize','lists','link','image','charmap','preview','searchreplace','wordcount','visualblocks','visualchars','code','fullscreen','insertdatetime','media','nonbreaking','save','table','directionality','codesample','importcss','pagebreak'],
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
});
recpoll()

</script>