<div class="wo_settings_page wow_content">
	<div class="avatar-holder">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['tiers']; ?></p>
			<a href="javascript:void(0)" class="btn btn-main btn-mat btn-mat-raised" onclick="AddTier()"><?php echo $wo['lang']['add_tier']; ?></a>
		</div>
	</div>
	<hr>

	<div class="tier_page">
		<div>
			<p><?php echo $wo['lang']['choose_offer_patrons']; ?></p>
			<?php echo $wo['tiers_html']?? ''; ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	function EditTier(id) {
		$('.modal_edit_tier_modal_alert_'+id).empty();
		$("#edit_tier_modal_"+id).find('.btn-mat').removeAttr('disabled')
		$("#edit_tier_modal_"+id).find('.btn-mat').text("<?php echo $wo['lang']['edit']; ?>");
		$('#edit_tier_modal_'+id).modal('show');
		$("#select_tier_image_"+id).click(function(event) {
      $("#tier_image_"+id).click()
    });
    $("#tier_image_"+id).change(function(event) {
      $("#select_tier_image_"+id).html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
    });
	}
	function DeleteTier(id,type = 'show') {
		if (type == 'hide') {
	      $('#delete-tier').find('.btn-mat').attr('onclick', "DeleteTier('"+id+"')");
	      $('#delete-tier').modal('show');
	      return false;
	    }
	    $('.tier_'+id).slideUp();
		$('.tier_'+id).remove();
		$('#edit_tier_modal_'+id).remove();
		$.post(Wo_Ajax_Requests_File() + '?f=tier&s=delete&hash=' + $('.main_session').val(), {id: id}, function(data, textStatus, xhr) {});
	}
	function AddTier(){
		$('.modal_add_tier_modal_alert').empty();
	  $("#add_tier_modal").find('.btn-mat').removeAttr('disabled')
	  $("#add_tier_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
	  $('#add_tier_modal').modal('show');
	  $("#select_tier_image").click(function(event) {
      $("#tier_image").click()
    });
    $("#tier_image").change(function(event) {
      $("#select_tier_image").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
    });
	}
	function ShowBenefitsChat(self){
		if ($(self).prop("checked")) {
			$('.add_benefits_chat').slideDown();
		}
		else{
			$('.add_benefits_chat').slideUp();
		}
	}
	$(document).ready(function() { 
    var options = { 
      url: Wo_Ajax_Requests_File() + '?f=tier&s=add&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
          $('.modal_add_tier_modal_alert').empty();
          $("#add_tier_modal").find('.btn-mat').attr('disabled', 'true');
          $("#add_tier_modal").find('.btn-mat').text("<?php echo($wo['lang']['please_wait']) ?>");
        }, 
        success: function (data) {
          $("#add_tier_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
          $("#add_tier_modal").find('.btn-mat').removeAttr('disabled')
          if (data.status == 200) {
            $('.modal_add_tier_modal_alert').html('<div class="alert alert-success bg-success"><i class="fa fa-check"></i> '+
              data.message
              +'</div>');
              setTimeout(function () {
                $('.modal_add_tier_modal_alert').empty();
	              $("#add_tier_modal").find('.btn-mat').removeAttr('disabled')
	              $("#add_tier_modal").find('.btn-mat').text("<?php echo $wo['lang']['add'] ?>");
	              $('#add_tier_modal').modal('hide');
	              location.reload();
              },2000);
          } else {
            $('.modal_add_tier_modal_alert').html('<div class="alert alert-danger bg-danger"> '+
            data.message
            +'</div>');
          } 
        }
    }; 
    $('.tier_form').ajaxForm(options); 
  });
</script>