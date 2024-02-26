<div class="wo_settings_page wow_content">
	<div class="avatar-holder profile">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['licenses_certifications']; ?></p>
		</div>
	</div>
	<hr>
	
	<div class="text-center">
		<a href="javascript:void();" class="btn btn-main btn-mat btn-mat-raised" onclick="NewCertifications();"><?php echo $wo['lang']['add_new'];?> <?php echo $wo['lang']['licenses_certifications']; ?></a>
	</div>

	<div class="active_sessions">
		<div class="table-responsive">
			<?php 
      if (!empty($wo['certification_html'])) {
        echo $wo['certification_html'];
      }
      else{
        echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></path></svg>' . $wo['lang']['no_available_data'] . '</div>';
      }

       ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	function NewCertifications() {
	  $('.modal_add_certification_modal_alert').empty();
	  $("#add_certification_modal").find('.btn-mat').removeAttr('disabled')
	  $("#add_certification_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
	  $('#add_certification_modal').modal('show');
    $( ".certification_start" ).datepicker({ dateFormat: 'yy-mm-dd',prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'});
    $( ".certification_end" ).datepicker({ dateFormat: 'yy-mm-dd',prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'});
    var options = { 
    url: Wo_Ajax_Requests_File() + '?f=certification&s=add&hash=' + $('.main_session').val() + "&mode_type=linkedin",
      beforeSubmit:  function () {
        $('.modal_add_certification_modal_alert').empty();
        $("#add_certification_modal").find('.btn-mat').attr('disabled', 'true');
        $("#add_certification_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
      }, 
      success: function (data) {
        $("#add_certification_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
        $("#add_certification_modal").find('.btn-mat').removeAttr('disabled')
        if (data.status == 200) {
          $('.modal_add_certification_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
            data.message
            +'</div>');
            setTimeout(function (){
            	location.reload();
            }, 3000)
        } else {
          $('.modal_add_certification_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
          data.message
          +'</div>');
        } 
      }
  }; 
  $('.add_certification_form').ajaxForm(options); 
	}
  function EditCertification(id) {
		$('.modal_edit_certification_modal_alert_'+id).empty();
		$("#edit_certification_modal_"+id).find('.btn-mat').removeAttr('disabled')
		$("#edit_certification_modal_"+id).find('.btn-mat').text("<?php echo $wo['lang']['edit']; ?>");
		$( ".edit_certification_start_"+id ).datepicker({ dateFormat: 'yy-mm-dd',prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'});
    $( ".edit_certification_end_"+id ).datepicker({ dateFormat: 'yy-mm-dd',prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'});
		$('#edit_certification_modal_'+id).modal('show');
	}
	function DeleteCertification(id,type = 'show') {
		if (type == 'hide') {
	      $('#delete-certification').find('.btn-mat').attr('onclick', "DeleteCertification('"+id+"')");
	      $('#delete-certification').modal('show');
	      return false;
	    }
	    $('.certification_'+id).slideUp();
		$('.certification_'+id).remove();
		$('#edit_certification_modal_'+id).remove();
		$.post(Wo_Ajax_Requests_File() + '?f=certification&s=delete&hash=' + $('.main_session').val() + "&mode_type=linkedin", {id: id}, function(data, textStatus, xhr) {});
	}
</script>
<!-- certification -->
<div class="modal fade" id="delete-certification" tabindex="-1" role="dialog" aria-labelledby="delete-certification" aria-hidden="true" data-id="0">
  <div class="modal-dialog modal-md wow_mat_mdl" role="document">
    <div class="modal-content">
      <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
        <h5 class="modal-title"> <?php echo $wo['lang']['delete_your_certification']; ?></h5>
      </div>
      <div class="modal-body">
        <?php echo $wo['lang']['are_you_delete_your_certification']; ?>
      </div>  
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-mat" data-dismiss="modal"><?php echo $wo['lang']['delete']; ?></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add_certification_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
  <div class="modal-dialog wow_mat_mdl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
        <h4 class="modal-title"><?php echo $wo['lang']['add_new_certification'] ?></h4>
      </div>
      <form class="form form-horizontal add_certification_form" method="post" action="#">
        <div class="modal-body twocheckout_modal">
          <div class="modal_add_certification_modal_alert"></div>
          <div class="clear"></div>
          <div class="col-lg-6">
          	<div class="wow_form_fields">
	          	<label><?php echo $wo['lang']['name']; ?></label>  
	            <input name="name" type="text" autocomplete="off">
	          </div>
          </div>
          <div class="col-lg-6">
          	<div class="wow_form_fields">
	          	<label><?php echo $wo['lang']['issuing_organization']; ?></label>  
	            <input name="issuing_organization" type="text" autocomplete="off">
	          </div> 
          </div>
          <div class="col-lg-6">
          	<div class="wow_form_fields">
	          	<label><?php echo $wo['lang']['credential_id']; ?></label>  
	            <input name="credential_id" type="text" autocomplete="off">
	          </div>
          </div>
          <div class="col-lg-6">
          	<div class="wow_form_fields">
	          	<label><?php echo $wo['lang']['credential_url']; ?></label>  
	            <input name="credential_url" type="text" autocomplete="off">
	          </div>
          </div>
          <div class="col-lg-6">
          	<div class="wow_form_fields">
	            <label><?php echo $wo['lang']['issue_date']; ?></label>
	            <input type="text" class="certification_start" name="certification_start" autocomplete="off">
	          </div>
          </div>

          <div class="col-lg-6">
          	<div class="wow_form_fields">
	            <label><?php echo $wo['lang']['expiration_date']; ?>:</label>  
	            <input type="text" class="certification_end" name="certification_end" autocomplete="off">
	          </div>
          </div>

          <div class="col-lg-6">
            <div class="wow_form_fields">
              <label><?php echo $wo['lang']['pdf_file']; ?>:</label>  
              <input type="file" class="certification_pdf" name="pdf" autocomplete="off" accept="application/pdf">
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="modal-footer">
          <div class="ball-pulse"><div></div><div></div><div></div></div>
          <button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['add']; ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- certification -->