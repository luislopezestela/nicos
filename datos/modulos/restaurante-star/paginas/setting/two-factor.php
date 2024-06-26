<div class="wo_settings_page wow_content">
	<div class="avatar-holder two_factor">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['two_factor']; ?></p>
		</div>
	</div>
	<hr>

	<form class="form-horizontal setting-change-password-form" method="post">
		<div class="setting-password-alert setting-update-alert"></div>
        
		<?php if ($wo['config']['two_factor_type'] == 'both' || $wo['config']['two_factor_type'] == 'phone') { ?>
			<div class="wow_form_fields">
				<label for="phone_number"><?php echo $wo['lang']['phone_number']; ?></label>  
				<input name="phone_number" id="phone_number" type="text" class="form-control input-md" autocomplete="off" placeholder="+15417543010" value="<?php echo $wo['setting']['phone_number']?>">
			</div>
		<?php } ?>
		<div class="wow_form_fields">
			<label for="two_factor_select"><?php echo $wo['lang']['two_factor']; ?></label>  
			<select id="two_factor_select" name="two_factor" class="form-control">
				<option value="enable" <?php echo ($wo['setting']['two_factor'] == '1')   ? 'selected' : '';?> ><?php echo $wo['lang']['enable']; ?></option>
				<option value="disable" <?php echo ($wo['setting']['two_factor'] == '0')   ? 'selected' : '';?> ><?php echo $wo['lang']['disable']; ?></option>
			</select>
			<span class="help-block"><?php echo $wo['lang']['two_factor_description'] ?></small>
		</div>
		<input type="hidden" name="" id="two_factor_value">
		
		<div class="text-center">
			<button type="button" class="btn btn-main btn-mat btn-mat-raised add_wow_loader" id="submit_two_factor_btn"><?php echo $wo['lang']['save']; ?></button>
		</div>
         <input type="hidden" name="user_id" value="<?php echo $wo['setting']['user_id'];?>">
         <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>
<script type="text/javascript">
  
  $(document).on('click', '#submit_two_factor_btn', function(event) {
    $.ajax({
    url: Wo_Ajax_Requests_File() + '?f=update_two_factor&s='+$('#two_factor_select').val(),
    type: 'POST',
    data:$('form.setting-change-password-form').serialize(),
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
        $('.setting-password-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
          $(this).delay(2000).slideUp(500, function() {
              $(this).remove();
              if ($('#two_factor_select').val() == 'enable') {
                $('#verify_code').modal('show');
              }
          });
        });
      } else if (data.status == 400) {
        $('.setting-password-alert').html('<div class="alert alert-danger">' + data.message + '</div>');
        $('.alert-danger').fadeIn(300);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
    
  });
$(function() {

  $('form.confirmation_code_form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_two_factor&s=verify',
    beforeSend: function() {
      $('#confirmation_code_form_btn').text('<?php echo($wo['lang']['please_wait']) ?>');
    },
    success: function(data) {
      if (data.status == 200) {
        $('#confirmation_code_form_alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('#confirmation_code_form_alert').fadeIn('fast', function() {
          $(this).delay(2500).slideUp(500, function() {
              $(this).remove();
              $('#verify_code').modal('hide');
              location.reload();
          });
        });
      } else if (data.status == 400) {
        $('#confirmation_code_form_alert').html('<div class="alert alert-danger">' + data.message + '</div>');
        $('.alert-danger').fadeIn(300);
      }
      $('#confirmation_code_form_btn').text('<?php echo($wo['lang']['send']) ?>');
    }
  });



});
// $(function() {
//   $('form.setting-change-password-form').ajaxForm({
//     url: Wo_Ajax_Requests_File() + '?f=update_two_factor',
//     beforeSend: function() {
//       $('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeIn(100);
//     },
//     success: function(data) {
//       if (data.status == 200) {
//         $('.setting-password-alert').html('<div class="alert alert-success">' + data.message + '</div>');
//         $('.alert-success').fadeIn('fast', function() {
//           $(this).delay(2500).slideUp(500, function() {
//               $(this).remove();
//           });
//         });
//       } else if (data.errors) {
//         var errors = data.errors.join("<br>");
//         $('.setting-password-alert').html('<div class="alert alert-danger">' + errors + '</div>');
//         $('.alert-danger').fadeIn(300);
//       }
//       $('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeOut(100);
//     }
//   });
// });
</script>