<style type="text/css">
	.contenido_update_data{
		position: relative;
    background-color: #fff;
	}
	.options_contents{
		top:110px;
		position:fixed;
		right:0;
	}
	.options_contents .options_uno{
		background-color:#FFFF;
		padding:10px;
	}
	.options_contents .options_uno button{
		width:100%;
		margin-bottom:10px;
	}
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
	.col-md-4 {
    padding-left:15px;
  }
  label{font-weight: 500 !important;margin-bottom: 0.2rem;margin-top:initial;}
	@media (max-width: 500px){
		.options_contents {
	    top: initial;
	    position: fixed;
	    right: 0;
	    bottom: 40px;
	    width: 100%;
	    z-index: 1;
	  }
	}
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
    .row {
		    display: -ms-flexbox;
		    display: flex;
		    -ms-flex-wrap: wrap;
		    flex-wrap: wrap;
		    margin-right: -15px;
		    margin-left: -15px;
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
    background-color: rgba(0, 0, 0, 0.3);
    border-radius: 50%;
    text-align: center;
    line-height: 1;
    padding: 3px;
    }
    .background_image_product {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
    width: 100%;
    border-radius:6px;
    height: 100%;
    }
    .btn_add_product{display:block;text-align:center;width:100%;background-color:#3498db;color:#FAFAFA;}
</style>
<div class="page-margin">
	<form class="editar_productos_li_s" method="POST" id="modal-body-langs">
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 middlecol contenido_update_data">
			<?php lui_MostrarTodo_los_colores_producto(); ?>
			<div class="row">
				<div class="col-md-6">
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

				<div class="col-md-6 product_sub_category_class_ub" style="<?php echo((empty($wo['products_sub_categories'][$wo['product']['category']]) ? 'display: none;' : '')) ?>">
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
				<div class="col-md-8">
				  <div class="wow_form_fields">
				    <label for="name"><?php echo $wo['lang']['name'] ?></label>
				    <input id="name" name="name" type="text" value="<?php echo $wo['product']['name'];?>" autocomplete="off">
				  </div>
				</div>

				<div class="col-md-4">
				  <div class="wow_form_fields">
				    <label for="type">Estado</label>
				    <select name="type" id="type">
				      <option value="0" <?php echo ($wo['product']['type'] == 0) ? 'selected' : '';?>><?php echo $wo['lang']['new'] ?></option>
				      <option value="1" <?php echo ($wo['product']['type'] == 1) ? 'selected' : '';?>><?php echo $wo['lang']['used'] ?></option>
				    </select>
				  </div>
				</div>
			</div>

			<div class="wow_form_fields">
				<label for="description">Caracteristicas</label>
				<textarea name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"><?php echo $wo['product']['description']?></textarea>
			</div>

			<div class="wow_form_fields">
				<label for="detallesupdate"><?php echo $wo['lang']['description'] ?></label>
				<textarea name="detalles" rows="4" id="detallesupdate" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"><?=$wo['product']['edit_detalles']?></textarea>
			</div>

			<div class="row">
				<div class="col-md-4">
				  <div class="wow_form_fields">
				    <label for="currency"><?php echo $wo['lang']['currency']; ?></label>
				    <select name="currency" id="currency">
				      <?php foreach($wo['currencies'] as $key => $currency) { ?>
				        <option value="<?php echo $key; ?>" <?php echo ($wo['product']['currency'] == $key) ? 'selected' : ''; ?>><?=$currency['text'] ?> (<?=$currency['symbol'] ?>)</option>
				      <?php } ?>
				    </select>
				  </div>
				</div>

				<div class="col-md-8">
				  <div class="wow_form_fields">
				    <label for="price"><?=$wo['lang']['price'];?></label>
				    <input id="price" name="price" type="text" placeholder="0.00" value="<?=$wo['product']['price'];?>">
				  </div>
				</div>

				<?php if ($wo['config']['store_system'] == 'on') { ?>
				  <div class="col-md-4" hidden>
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
					    <div class="col-md-6">
					    	<div class="wow_form_fields">
					    		<label for="producto_selec_color" style="display:inline-block;cursor:pointer;user-select:none;">Color</label>
					    		<input type="checkbox" id="producto_selec_color" name="color_producto" style="width:13px;height:13px;box-shadow:initial;" <?php echo($wo['product']['color'] == 1) ? 'checked' : '';?>>
						        <div class="product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
						        	<select name="color" id="color_producto_select_update">
						        		<option value="0">Selecciona el color.</option>
						        			<?php foreach ($wo['colores_productos_mostrar_todo'] as $colors) { ?>
						        				<option value="<?php echo $colors['id']; ?>"><?php echo $wo['lang'][$colors['lang_key']];?> (<?php echo $colors['color'] ?>)</option>
						            		<?php } ?>
						          	</select>
						        </div>
						    </div>
					    </div>

					    <div class="col-md-6">
					    	<div class="wow_form_fields product_colores_producto_class" style="<?php echo($wo['product']['color'] == 0) ? 'display:none' : '';?>">
					    		<label for="precio_adicional_por_color">Precio adicional</label>
					    		<input class="" type="text" name="color_precio_adicional" id="precio_adicional_por_color" placeholder="Precio adicional por el color" value="0">
					    	</div>
					    </div>

					    <div class="col-lg-12">
					    	<div class="wow_prod_imgs add_images_media_product <?php if($wo['product']['color'] == 1){if(!$ucolor_null){echo("disable_added_media");}} ?>">
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
											<i style="background-color:<?=$nombre_color['color'];?>;color:<?=color_inverse_lui($nombre_color['color']);?>;">
												<?=$wo['lang'][$nombre_color['lang_key']];?>
											</i>
										</div>
										<?php foreach ($wo['product']['images'] as $key => $value) { ?>
											<?php if ($values["id"] == $value["id_color"]): ?>
												<span class="thumb-image thumb-image-delete" id="delete_image_by_id_<?php echo $value['id']; ?>" style="border-color:<?=$nombre_color['color'];?>;">
													<span onclick="DeleteProductImageById(<?php echo $value['id']; ?>)" class="pointer thumb-image-delete-btn">
														<i class="fa fa-remove"></i>
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
											<i class="fa fa-remove"></i>
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

			<input type="hidden" name="id" class="form-control input-md" value="<?php echo($wo['product']['id']) ?>">
			<input type="hidden" name="lat-product" id="lat-product" class="form-control input-md" value="">
			<input type="hidden" name="lng-product" id="lng-product" class="form-control input-md" value="">
			<input type="hidden" name="page_id" id="page_id_product" class="form-control input-md" value="<?php echo(!empty($wo['page_profile']) && !empty($wo['page_profile']['page_id']) ? $wo['page_profile']['page_id'] : 0) ?>">

			
		</div>
		<!-- .col-md-8 -->
		<div class="col-md-3 options_contents">
			<div class="options_uno">
				<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
        <input type="hidden" name="placement" id="placement" value="product">
        <h4 class="title_acce_ite">Guardar cambios</h4>
        <div class="publisher-hidden-option">
					<div id="progress">
						<span id="percent">0%</span>
						<div class="progress">
							<div id="bar" class="progress-bar progress-bar-striped active"></div> 
						</div>
						<div class="clear"></div>
					</div>
					<div id="status"></div>
				</div>
      	<button type="submit" class="btn btn-success" id="edit_custom_field_button">Guardar</button>
			</div>
		</div>
	</form>
	<!-- .row -->
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

	$("#color_producto_select_update").on('change', function(){
		var id = this.value;
		$.post(Wo_Ajax_Requests_File() + '?f=admin_setting&s=seleccionar_el_color_producto', {colorid:id,producto:<?php echo $wo['product']['id'];?>}, function(data, textStatus, xhr){
			if(data.status==200){
				$("#precio_adicional_por_color").val(data.precio);
			}
			if(data.status==400){
				$("#precio_adicional_por_color").val(0);
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
            product_image_holder.empty();
            if(extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            	if(typeof(FileReader) != "undefined"){
            		for(var i = 0; i < product_countFiles; i++){
            			var product_reader = new FileReader();
            			var ii = 0;
            			product_reader.onload = function(e){
            				name = "'"+$("#publisher-photos")[0].files[ii].name+"'";
            				src = "'"+e.target.result+"'";
            				$(product_image_holder).prepend('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageById('+name+','+ii+')"><i class="fa fa-remove"></i></span><div class="background_image_product" style="background-image: url('+src+');"></div></span>');
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
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                plugins: ['advlist anchor autolink autoresize lists link image charmap preview searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template codesample importcss pagebreak'],
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
        });
</script>