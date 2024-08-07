<div class="tier_list tier_<?php echo $wo['tier']->id ?>">
	<button title="<?php echo $wo['lang']['delete'] ?>" class="btn btn-mat" onclick="DeleteTier('<?php echo $wo['tier']->id ?>','hide')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
	<button title="<?php echo $wo['lang']['edit'] ?>" class="btn btn-mat" onclick="EditTier('<?php echo $wo['tier']->id ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z"></path></svg></button>
	<div class="tier_info">
		<h4><?php echo $wo['tier']->title ?></h4>
		<p><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo $wo['tier']->price; ?></p>
		<p><?php if (!empty($wo['tier']->live_stream)) {
			echo $wo['lang']['live_stream'];
		} ?></p>
		<p>
		<?php if (!empty($wo['tier']->chat)) {
			if ($wo['tier']->chat == 'chat_without_audio_video') {
				echo $wo['lang']['chat_without_audio_video'];
			}
			if ($wo['tier']->chat == 'chat_with_audio_without_video') {
				echo $wo['lang']['chat_with_audio_without_video'];
			}
			if ($wo['tier']->chat == 'chat_without_audio_with_video') {
				echo $wo['lang']['chat_without_audio_with_video'];
			}
			if ($wo['tier']->chat == 'chat_with_audio_video') {
				echo $wo['lang']['chat_with_audio_video'];
			}
		} ?></p>
		<p><?php if (!empty($wo['tier']->image)) { ?>
			<img src="<?php echo lui_GetMedia($wo['tier']->image); ?>" style="width: 100%;height: 300px;">
		<?php } ?></p>
		<p><?php echo $wo['tier']->description; ?></p>
	</div>
</div>


<div class="modal fade" id="edit_tier_modal_<?php echo $wo['tier']->id ?>" role="dialog" data-keyboard="false" style="overflow-y: auto;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
        <h4 class="modal-title"><?php echo $wo['lang']['edit_tier'] ?></h4>
      </div>
      <form class="form form-horizontal edit_tier_form_<?php echo $wo['tier']->id ?>" method="post" action="#">
        <div class="modal-body twocheckout_modal">
          <div class="modal_edit_tier_modal_alert_<?php echo $wo['tier']->id ?>"></div>
          <div class="clear"></div>
          <div class="sun_input col-md-6">
            <input name="title" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['tier_title']; ?>" value="<?php echo $wo['tier']->title; ?>">
            <label class="plr15"><?php echo $wo['lang']['tier_title']; ?></label>  
          </div>
          <div class="sun_input col-md-6">
            <input name="price" type="number" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['tier_price']; ?>" value="<?php echo $wo['tier']->price; ?>">
            <label class="plr15"><?php echo $wo['lang']['tier_price']; ?></label>  
          </div>
          <div class=" col-lg-12">
            <label class="plr15"><?php echo $wo['lang']['benefits']; ?></label>
            <br>
            <input type="checkbox" name="benefits[]" value="chat" onclick="ShowBenefitsChat(this)" <?php echo(!empty($wo['tier']->chat) ? 'checked' : '') ?>>
            <label><?php echo $wo['lang']['chat']; ?></label><br>
            <div class="add_benefits_chat" <?php echo(!empty($wo['tier']->chat) ? '' : 'style="display: none;"') ?>>
              <input type="radio" id="benefits_chat_1" name="chat" value="chat_without_audio_video" <?php echo(!empty($wo['tier']->chat) && $wo['tier']->chat == 'chat_without_audio_video' ? 'checked' : '') ?>>
              <label for="benefits_chat_1"><?php echo $wo['lang']['chat_without_audio_video']; ?></label><br>
              <input type="radio" id="benefits_chat_2" name="chat" value="chat_with_audio_without_video" <?php echo(!empty($wo['tier']->chat) && $wo['tier']->chat == 'chat_with_audio_without_video' ? 'checked' : '') ?>>
              <label for="benefits_chat_2"><?php echo $wo['lang']['chat_with_audio_without_video']; ?></label><br>  
              <input type="radio" id="benefits_chat_3" name="chat" value="chat_without_audio_with_video" <?php echo(!empty($wo['tier']->chat) && $wo['tier']->chat == 'chat_without_audio_with_video' ? 'checked' : '') ?>>
              <label for="benefits_chat_3"><?php echo $wo['lang']['chat_without_audio_with_video']; ?></label><br>  
              <input type="radio" id="benefits_chat_4" name="chat" value="chat_with_audio_video" <?php echo(!empty($wo['tier']->chat) && $wo['tier']->chat == 'chat_with_audio_video' ? 'checked' : '') ?>>
              <label for="benefits_chat_4"><?php echo $wo['lang']['chat_with_audio_video']; ?></label><br>
            </div>
            <input type="checkbox" name="benefits[]" value="live_stream" <?php echo(!empty($wo['tier']->live_stream) ? 'checked' : '') ?>>
            <label><?php echo $wo['lang']['live_stream']; ?></label><br>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-md-12" for="image"><?php echo $wo['lang']['image'] ?>:</label>  
            <div class="col-md-12">
              <div class="select_ev_covr" id="select_tier_image_<?php echo $wo['tier']->id ?>">
              	<?php if (!empty($wo['tier']->image)) { ?>
              		<img src="<?php echo lui_GetMedia($wo['tier']->image); ?>" alt='Picture'>
              	<?php }else{ ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5,3A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H14.09C14.03,20.67 14,20.34 14,20C14,19.32 14.12,18.64 14.35,18H5L8.5,13.5L11,16.5L14.5,12L16.73,14.97C17.7,14.34 18.84,14 20,14C20.34,14 20.67,14.03 21,14.09V5C21,3.89 20.1,3 19,3H5M19,16V19H16V21H19V24H21V21H24V19H21V16H19Z" /></svg>
                <?php echo $wo['lang']['select_image'] ?>   
                <?php } ?> 
              </div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="sun_input col-md-12">
            <textarea class="form-control input-md" placeholder="<?php echo $wo['lang']['tier_description']; ?>" name="description"><?php echo($wo['tier']->description) ?></textarea>
            <label class="plr15"><?php echo $wo['lang']['tier_description']; ?></label>  
          </div>
          <div class="clear"></div>
          <input type="file" name="image" class="hidden" id="tier_image_<?php echo $wo['tier']->id ?>">
          <input type="hidden" name="id" class="hidden" id="tier_id" value="<?php echo $wo['tier']->id ?>">
        </div>
        <div class="clear"></div>
        <div class="modal-footer">
          <div class="ball-pulse"><div></div><div></div><div></div></div>
          <button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['edit']; ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function() { 
	    var options = { 
	    	url: Wo_Ajax_Requests_File() + '?f=tier&s=edit&hash=' + $('.main_session').val(),
	        beforeSubmit:  function () {
	        	$('.modal_edit_tier_modal_alert_<?php echo $wo['tier']->id ?>').empty();
	        	$("#edit_tier_modal_<?php echo $wo['tier']->id ?>").find('.btn-mat').attr('disabled', 'true');
	        	$("#edit_tier_modal_<?php echo $wo['tier']->id ?>").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        }, 
	        success: function (data) {
	        	$("#edit_tier_modal_<?php echo $wo['tier']->id ?>").find('.btn-mat').removeAttr('disabled')
	        	$("#edit_tier_modal_<?php echo $wo['tier']->id ?>").find('.btn-mat').text("<?php echo($wo['lang']['edit']) ?>");
	        	if (data.status == 200) {
	        		$('.modal_edit_tier_modal_alert_<?php echo $wo['tier']->id ?>').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
		            data.message
		            +'</div>');
	            	setTimeout(function () {
		            	location.reload();
		            },2000);
	        	} else {
	        		$('.modal_edit_tier_modal_alert_<?php echo $wo['tier']->id ?>').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	        	} 
	        }
	    }; 
	    $('.edit_tier_form_<?php echo $wo['tier']->id ?>').ajaxForm(options); 
	});
</script>
<style type="text/css">
	.modal-backdrop{display: none;}
</style>