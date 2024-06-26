<div class="border-bottom wo_job_experience experience experience_<?php echo $wo['experience']->id ?>">
	<?php if (!empty($wo['experience']->image)) { ?>
		<div class="avatar"><img src="<?php echo lui_GetMedia($wo['experience']->image); ?>"></div>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php } else { ?>
		<div class="avatar bg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18,15H16V17H18M18,11H16V13H18M20,19H12V17H14V15H12V13H14V11H12V9H20M10,7H8V5H10M10,11H8V9H10M10,15H8V13H10M10,19H8V17H10M6,7H4V5H6M6,11H4V9H6M6,15H4V13H6M6,19H4V17H6M12,7V3H2V21H22V7H12Z" /></svg></div>&nbsp;&nbsp;&nbsp;&nbsp;
	<?php } ?>
	<div class="wo_job_experience_info">
		<h4 class="title"><?php echo $wo['experience']->title ?></h4>
		<p class="sub-title">
			<?php echo $wo['experience']->company_name; ?>
			<?php if (!empty($wo['experience']->employment_type) && in_array($wo['experience']->employment_type, array_keys($wo['employment_type']))) { ?>
				&nbsp;• &nbsp;<?php echo $wo['lang'][$wo['employment_type'][$wo['experience']->employment_type]]; ?>
			<?php } ?>
			&nbsp;• &nbsp;<?php echo $wo['experience']->location; ?>
		</p>
		<p class="sub-title">
			<?php echo $wo['experience']->experience_start; ?>
			<?php if (!empty($wo['experience']->experience_end) && strpos($wo['experience']->experience_end, 00) != 0) { ?>
				&nbsp;– &nbsp;<?php echo $wo['experience']->experience_end; ?>
			<?php } ?>
		</p>
		<?php if (!empty($wo['experience']->link)) { ?>
			<p><a href="<?php echo $wo['experience']->link; ?>"><?php echo $wo['experience']->link; ?></a></p>
		<?php } ?>
		<hr>
		<p class="sub-title">
			<span class="bold"><?php echo $wo['lang']['industry']; ?></span>: <?php echo $wo['experience']->industry; ?>
			<?php if (!empty($wo['experience']->headline)) { ?>
				&nbsp;• &nbsp;<span class="bold"><?php echo $wo['lang']['headline']; ?></span>: <?php echo $wo['experience']->headline; ?>
			<?php } ?>
		</p>
		<p><?php echo $wo['experience']->description; ?></p>
		<p>
			<button class="btn btn-mat btn-danger" onclick="DeleteExperience('<?php echo $wo['experience']->id ?>','hide')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg> <?php echo $wo['lang']['delete'] ?></button>
			<button class="btn btn-mat btn-success" onclick="EditExperience('<?php echo $wo['experience']->id ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8,12H16V14H8V12M10,20H6V4H13V9H18V12.1L20,10.1V8L14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H10V20M8,18H12.1L13,17.1V16H8V18M20.2,13C20.3,13 20.5,13.1 20.6,13.2L21.9,14.5C22.1,14.7 22.1,15.1 21.9,15.3L20.9,16.3L18.8,14.2L19.8,13.2C19.9,13.1 20,13 20.2,13M20.2,16.9L14.1,23H12V20.9L18.1,14.8L20.2,16.9Z"></path></svg> <?php echo $wo['lang']['edit'] ?></button>
		</p>
	</div>
</div>


<div class="modal fade" id="edit_experience_modal_<?php echo $wo['experience']->id ?>" role="dialog" data-keyboard="false" style="overflow-y: auto;">
  <div class="modal-dialog wow_mat_mdl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
        <h4 class="modal-title"><?php echo $wo['lang']['edit_experience'] ?></h4>
      </div>
      <form class="form form-horizontal edit_experience_form_<?php echo $wo['experience']->id ?>" method="post" action="#">
        <div class="modal-body twocheckout_modal">
          <div class="modal_edit_experience_modal_alert_<?php echo $wo['experience']->id ?>"></div>
          <div class="clear"></div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['title'] ?></label>
              <input name="title" type="text" value="<?php echo $wo['experience']->title ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['company_name']; ?></label> 
              <input name="company_name" type="text" autocomplete="off" value="<?php echo $wo['experience']->company_name ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['employment_type']; ?></label>
              <select name="employment_type">
                <?php foreach ($wo['employment_type'] as $key => $value) { ?>
                  <option value="<?php echo $key;?>" <?php echo($wo['experience']->employment_type == $key ? 'selected' : '') ?>><?php echo $wo['lang'][$value];?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['location']; ?></label>
              <input name="location" type="text" autocomplete="off" value="<?php echo $wo['experience']->location ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['start_date']; ?></label>
              <input type="text" class="edit_experience_start_<?php echo $wo['experience']->id ?>" name="experience_start" value="<?php echo $wo['experience']->experience_start ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['end_date']; ?>:</label>  
              <input type="text" class="edit_experience_end_<?php echo $wo['experience']->id ?>" name="experience_end" value="<?php echo $wo['experience']->experience_end ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['headline']; ?></label>
              <input name="headline" type="text" autocomplete="off" value="<?php echo $wo['experience']->headline ?>">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['industry']; ?></label>  
              <input name="industry" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['industry']; ?>" value="<?php echo $wo['experience']->industry ?>">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['link']; ?></label>  
              <input name="link" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['link']; ?>" value="<?php echo $wo['experience']->link ?>">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['description']; ?></label> 
              <textarea name="description" rows="5"><?php echo $wo['experience']->description ?></textarea>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="wow_form_fields">
              <label for="select_experience_image_<?php echo $wo['experience']->id ?>"><?php echo $wo['lang']['image'];?></label>
              <div class="wow_fcov_image" data-block="thumdrop-zone">
                <div id="select_experience_image_<?php echo $wo['experience']->id ?>">
                  <?php if (!empty($wo['experience']->image)) { ?>
                  <img src="<?php echo lui_GetMedia($wo['experience']->image); ?>" alt='Picture'>
                  <?php }else{ ?>
                  <img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
                  <?php } ?>
                </div>
                <div class="upload_ad_image" onclick="document.getElementById('select_experience_image_<?php echo $wo['experience']->id ?>').click(); return false">
                  <div class="upload_ad_image_content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['select_image'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <input type="file" name="image" class="hidden" id="experience_image_<?php echo $wo['experience']->id ?>">
        <input type="hidden" name="id" class="hidden" id="experience_id" value="<?php echo $wo['experience']->id ?>">
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
	    	url: Wo_Ajax_Requests_File() + '?f=experience&s=edit&hash=' + $('.main_session').val() + "&mode_type=linkedin",
	        beforeSubmit:  function () {
	        	$('.modal_edit_experience_modal_alert_<?php echo $wo['experience']->id ?>').empty();
	        	$("#edit_experience_modal_<?php echo $wo['experience']->id ?>").find('.btn-mat').attr('disabled', 'true');
	        	$("#edit_experience_modal_<?php echo $wo['experience']->id ?>").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
	        }, 
	        success: function (data) {
	        	$("#edit_experience_modal_<?php echo $wo['experience']->id ?>").find('.btn-mat').removeAttr('disabled')
	        	$("#edit_experience_modal_<?php echo $wo['experience']->id ?>").find('.btn-mat').text("<?php echo($wo['lang']['edit']) ?>");
	        	if (data.status == 200) {
	        		$('.modal_edit_experience_modal_alert_<?php echo $wo['experience']->id ?>').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
		            data.message
		            +'</div>');
		            setTimeout(function (){
		            	location.reload();
		            }, 3000)
	        	} else {
	        		$('.modal_edit_experience_modal_alert_<?php echo $wo['experience']->id ?>').html('<div class="alert alert-danger bg-danger"> '+
	            data.message
	            +'</div>');
	        	} 
	        }
	    }; 
	    $('.edit_experience_form_<?php echo $wo['experience']->id ?>').ajaxForm(options); 
	});
</script>