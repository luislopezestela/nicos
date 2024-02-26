<div class="modal fade" id="edit-post" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<form id="edit-post-form-<?php echo $wo['story']['id'];?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
					<h4 class="modal-title"><?php echo $wo['lang']['edit_post']; ?></h4>
				</div>
				<div class="modal-body edit-textarea-<?php echo $wo['story']['id'];?>" style="padding:0;">
					<div class="edit_alert"></div>
					<textarea class="form-control" style="padding: 10px; border-radius: 0" placeholder="<?php echo $wo['lang']['edit_post']?>" dir="auto" rows="5" onkeyup="Wo_Get_Mention(this)" name="text" autocomplete="off"><?php echo $wo['story']['Orginaltext']?></textarea>
					<?php 
					$show_images = false;
					if (!empty($wo['story']['postFile'])) {
						$file_extension = pathinfo($wo['story']['postFile'], PATHINFO_EXTENSION);
						if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif') {
							$show_images = true;
						}
					} 
					if (!empty($wo['story']['photo_multi'])) {
						$show_images = true;
					}
					if ($show_images) {
					?>
					<br>
					<div class="wow_prod_imgs">
						<input type="file" name="images[]" id="publisher-post-photos-<?php echo $wo['story']['id']; ?>" class="hidden" multiple="multiple" accept="image/x-png, image/gif, image/jpeg">
						<div class="upload-product-image" onclick="document.getElementById('publisher-post-photos-<?php echo $wo['story']['id']; ?>').click(); return false">
							<div class="upload-image-content">
								<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
							</div>
						</div>
						<div id="productimage-holder">
							<span id="uploaded-productimage-holder-<?php echo $wo['story']['id']; ?>"></span>
							<?php if (!empty($wo['story']['postFile']) && empty($wo['story']['photo_multi'])) { 
								$file_extension = pathinfo($wo['story']['postFile'], PATHINFO_EXTENSION);
								if ($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif') { ?>
									<span class="thumb-image thumb-image-delete" id="delete_image_by_id">
										<span onclick="DeletePostImage(<?php echo $wo['story']['id']; ?>)" class="pointer thumb-image-delete-btn"><i class="fa fa-remove"></i></span>
										<div class="background_image_product" style="background-image: url('<?php echo lui_GetMedia($wo['story']['postFile']); ?>');"></div>
									</span>
								<?php }
						    }
						    if (!empty($wo['story']['photo_multi'])) {
						    	foreach ($wo['story']['photo_multi'] as $key => $value) { ?>
						    	<span class="thumb-image thumb-image-delete thumb-image-old" id="delete_image_by_id_<?php echo $value['id']; ?>">
									<span onclick="DeletePostImage(<?php echo $wo['story']['id']; ?>,<?php echo $value['id']; ?>)" class="pointer thumb-image-delete-btn"><i class="fa fa-remove"></i></span>
									<div class="background_image_product" style="background-image: url('<?php echo $value['image']; ?>');"></div>
								</span>

						    <?php } } ?>
						</div>
					</div>
				    <?php } ?>
				    <input type="hidden" name="post_id" value="<?php echo $wo['story']['id']; ?>" autocomplete="off">
				    <input type="hidden" name="all_images" value="0" id="all_images" autocomplete="off">
				</div>
				<div class="modal-footer" style="border: none">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="submit" class="btn main btn-mat" id="edit-post-button"><?php echo $wo['lang']['update']; ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		post_id = <?php echo $wo['story']['id']; ?>;
	        var post = $('#post-' + post_id);
		  var edit_box = $('#post-' + post_id).find('#edit-post');
		  var edit_textarea = post.find('.edit-textarea-' + post_id + ' textarea');
		  var text = edit_textarea.val();
		  var post_text = post.find('.post-description p');
		  var type = post.attr('data-post-type');
		$('#edit-post-form-<?php echo $wo['story']['id'];?>').ajaxForm({
	      url: Wo_Ajax_Requests_File() + '?f=posts&s=edit_post',
	      beforeSubmit: function(arr, $form, options) { 
	      	if ($('#edit-post-form-'+<?php echo $wo['story']['id'];?>).find('.thumb-image').length < 1 && $('#edit-post-form-'+<?php echo $wo['story']['id'];?>).find('textarea').val() == '') {
		      $('#edit-post-form-'+<?php echo $wo['story']['id'];?>).find('.edit_alert').html("<div class='alert alert-danger'><?php echo $wo['lang']['you_must_add_text_or_image_first']; ?></div>");
		      return false;
		    }
	      },
	      beforeSend: function() {
	      	
		  if (type == 'share') {
		    var post_text = post.find('.post-description .edited_text');
		  }
		  else{
		    var post_text = post.find('.post-description p');
		  }
		  Wo_progressIconLoader(post.find('#edit-post-button'));
		  $('#post-' + post_id).find('#edit-post .ball-pulse').fadeIn(100);

	      },
	      success: function(data) {
	        if(data.status == 200) {
	        	if (data.html != '') {
	        		post_text.html(data.html);
	        	}
	        	if (data.reload == 'reload') {
	        		location.reload();
	        	}
		      
		      edit_box.modal('hide');
		    }
		    $('#post-' + post_id).find('#edit-post .ball-pulse').fadeOut(100);
		    if (data.can_send == 1) {
		        Wo_SendMessages();
		    }
		    edit_box.modal('hide');
	      }});
        <?php if ($show_images) { ?>
		$("#publisher-post-photos-<?php echo $wo['story']['id']; ?>").on('change', function() {
			var product_countFiles = $(this)[0].files.length;
			var product_imgPath = $(this)[0].value;
			var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
			var product_image_holder = $("#uploaded-productimage-holder-<?php echo $wo['story']['id']; ?>");
			product_image_holder.empty();
			if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
				if (typeof(FileReader) != "undefined") {
					for (var i = 0; i < product_countFiles; i++) 
					{
						var product_reader = new FileReader();
						var ii = 0;
						product_reader.onload = function(e) {
						name = "'"+$("#publisher-post-photos-<?php echo $wo['story']['id']; ?>")[0].files[ii].name+"'";
						src = "'"+e.target.result+"'";
						$(product_image_holder).prepend('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageById('+name+','+ii+',<?php echo $wo['story']['id']; ?>)"><i class="fa fa-remove"></i></span><div class="background_image_product" style="background-image: url('+src+');"></div></span>');
						ii = ii +1;
		                };
		                product_image_holder.show();
		                product_reader.readAsDataURL($(this)[0].files[i]);
					
		             }
	            } else {
	              product_image_holder.html("<p>This browser does not support FileReader.</p>");
	            }
		    }
		});
	<?php } ?>
	});
</script>