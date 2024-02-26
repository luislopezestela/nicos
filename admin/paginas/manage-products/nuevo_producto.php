<?php lui_MostrarTodo_los_colores_producto(); ?>
<div class="modal fade" id="create-product-modal" role="dialog">
	<div class="modal-dialog publicar_producto_dialog">
		<div class="modal-content publicar_producto">
			<div class="wow_pops_head publicar_producto_head">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><?php echo $wo['lang']['new_product'] ?></h4>
			</div>
			<form class="create-album-form form-horizontal" method="post">
				<div class="modal-body">
					<div class="app-general-alert setting-update-alert"></div>
					<div class="row">
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="category">Tipo de producto</label>
								<select name="category" id="category" onchange="GetProductSubCategory(this)">
									<option value="null">Selecciona tipo de producto.</option>
									<?php foreach ($wo['products_categories'] as $category){
										if($category['id'] >= 1){ ?>
											<option value="<?php echo $category['id']?>"><?php echo $wo['lang'][$category['lang_key']];?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php if (!empty($wo['products_sub_categories'])) { ?>
						<div class="col-md-6 product_sub_category_class" style="<?php echo((empty($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]])) ? 'display: none;' : '') ?>">
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
						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="name"><?php echo $wo['lang']['name'] ?></label>
								<input id="name" name="name" type="text" value="" autocomplete="off">
							</div>
						</div>

						<div class="col-md-4">
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
						<textarea name="detalles" rows="3" id="detalles" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"></textarea>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="wow_form_fields">
								<label for="currency"><?php echo $wo['lang']['currency']; ?></label>
								<select name="currency" id="currency">
									<?php foreach ($wo['currencies'] as $key => $currency) { ?>
										<option value="<?php echo $key; ?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="price"><?php echo $wo['lang']['price']; ?></label>
								<input id="price" name="price" type="text" placeholder="0.00" value="">
							</div>
						</div>

						

						<?php if ($wo['config']['store_system'] == 'on') { ?>
							<div class="col-md-4" hidden>
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
					<div class="row">
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="producto_selec_color" style="display:inline-block;cursor:pointer;user-select:none;">Color</label>
								<input type="checkbox" id="producto_selec_color" name="color_producto" style="width:13px;box-shadow:initial;" onchange="GetProductColoresData(this)">
								<div class="product_colores_producto_class" style="display: none;">
									<select name="color" id="color_producto_select" >
										<?php foreach ($wo['colores_productos_mostrar_todo'] as $colors) { ?>
			        				<option value="<?php echo $colors['id']; ?>"><?php echo $wo['lang'][$colors['lang_key']];?> (<?php echo $colors['color'] ?>)</option>
			            		<?php } ?>
									</select>
								</div>
								
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
						<div id="productimage-holder"></div>
					</div>

					<div class="publisher-hidden-option"><br>
						<div id="progress" class="create-product-progress">
							<span id="percent" class="create-product-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
							<div class="progress">
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
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-info btn_add_product add_wow_loader"><?php echo $wo['lang']['publish']; ?></button>
				</div>
			</form>
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
		var image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
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
		$("#product-photos")[0].files = new FileListItems(imgArray);
	}



$(document).ready(function(){
	$("#product-photos").on('change', function(){
		let self = this;
		//Get count of selected files
		var product_countFiles = $(this)[0].files.length;
		var product_imgPath = $(this)[0].value;
		var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
		var product_image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
		//product_image_holder.empty();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				//loop for each file selected for uploaded.
				for (var i = 0; i < product_countFiles; i++){
					var reader = new FileReader();
							
					imgArray.push($(self)[0].files[i]);
					
					
					reader.onload = function (e) {
						if ($(self).parents('#create-product-modal').find("#productimage-holder .thumb-image-delete").length == 0) {
							var ii = 0;
						}else{
							var ii = $(self).parents('#create-product-modal').find("#productimage-holder .thumb-image-delete").length;
						}
					  $(product_image_holder).append('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageByIdP('+ii+',this)"><i class="fa fa-remove"></i></span><div class="background_image_product" style="background-image: url('+e.target.result+');"></div></span>');
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
     $('form.create-album-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=products&s=create',
       beforeSend: function() {
         var percentVal = '0%';
         create_bar.width(percentVal);
         create_percent.html(percentVal);
         
         
         $('.create-album-form').find('.add_wow_loader').addClass('btn-loading');
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
             var errors = data.errors.join("<br>");
             $('.app-general-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('.create-album-form').find('.add_wow_loader').removeClass('btn-loading');
       }
     });
   });


</script>