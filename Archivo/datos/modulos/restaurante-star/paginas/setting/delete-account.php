<div class="wo_settings_page wow_content">
	<div class="avatar-holder delete">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['delete_account']; ?></p>
		</div>
	</div>
	<hr>

	<form action="#" method="post" class="form-horizontal setting-delete-account-form">
		<div class="setting-delete-account-alert setting-update-alert"></div>
		
		<div class="wow_form_fields">
			<label for="password"><?php echo $wo['lang']['current_password']; ?></label>  
			<input id="password" name="password" type="password" class="form-control input-md">
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['delete']; ?></button>
		</div>
	</form>
</div>
<script type="text/javascript">
$(function() {
  $('form.setting-delete-account-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=delete_user_account',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
        $('.setting-delete-account-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
          window.setTimeout(function() {
            window.location.href = data.location;
          }, 3000);
        });
      } else {
        var errors = data.errors.join("<br>");
        $('.setting-delete-account-alert').html('<div class="alert alert-danger">' + errors + '</div>');
        $('.alert-danger').fadeIn(300);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>