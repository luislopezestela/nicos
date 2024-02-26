<div class="wrapper">
	<div class="login forgot_pass">
		<div class="login_left_combo_parent">
			<div class="login_left_combo">
				<?php
			$allow_switch = false;
			if ($wo['config']['sms_provider'] == 'twilio') {
        if( $wo['config']['sms_twilio_username'] !== "" AND  $wo['config']['sms_twilio_password'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			} else if ($wo['config']['sms_provider'] == 'bulksms') {
        if( $wo['config']['sms_username'] !== "" AND  $wo['config']['sms_password'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			} else if ($wo['config']['sms_provider'] == 'infobip') {
        if( $wo['config']['infobip_api_key'] !== "" AND  $wo['config']['infobip_base_url'] !== "" ){
					if( $wo['config']['emailValidation'] == 1 ) {
						if( $wo['config']['sms_or_email'] == "sms" ) {
							$allow_switch = true;
						}
					}
				}
			}
		?>

		<?php if( $allow_switch ){ ?>
			<form  class="x_chooser">
				<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
				<div class="login_signup_combo wow_forgot_choice">
					<div class="login__">
						<button type="button" class="btn btn-main btn-mat" id="recover_password_by_email"><?php echo $wo['lang']['recover_password_by_email']?></button>&nbsp;&nbsp;
						<button type="button" class="btn btn-main btn-mat" id="recover_password_by_sms"><?php echo $wo['lang']['recover_password_by_sms']?></button>
					</div>
				</div>
			</form>
		<?php } ?>

		<form id="forgot-form" class="recover_password_by_email" method="post" <?php if( $allow_switch ){ echo 'style="display: none;"'; } ?>>
			<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
			<div class="alert alert-danger errors"></div>
			<div class="wow_form_fields">
				<label for="recoveremail"><?php echo $wo['lang']['email']?></label>
				<input id="recoveremail" name="recoveremail" type="email" autofocus />
			</div>
			<?php if($wo['config']['reCaptcha'] == 1) {?>
				<div class="form-group" style="margin-top:10px;">
					<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
				</div>
			<?php } ?>
			<div class="login_signup_combo">
				<div class="login__">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['recover_password']?></button>
				</div>
				<div class="signup__">
					<p><?php echo $wo['lang']['already_have_account']?> <a class="dec" href="<?=lui_SeoLink('index.php?link1=acceder');?>"><?php echo $wo['lang']['login']?></a></p>
				</div>
			</div>
		</form>

		<form id="forgot-form-sms" class="recover_password_by_sms" method="post" style="display: none;">
			<p class="title main"><?php echo $wo['lang']['forgot_your_password']; ?></p>
			<div class="errors"></div>
			<div class="wow_form_fields">
				<label for="recoverphone"><?php echo $wo['lang']['phone_number']?></label>
				<input id="recoverphone" name="recoverphone" type="text" autofocus />
			</div>

			<div class="login_signup_combo">
				<div class="login__">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['recover_password']?></button>
				</div>
				<div class="signup__">
					<p><?php echo $wo['lang']['already_have_account']?> <a class="dec" href="<?=lui_SeoLink('index.php?link1=acceder');?>"><?php echo $wo['lang']['login']?></a></p>
				</div>
			</div>
		</form>
		<div class="footer">
				<?php echo lui_LoadPage('footer/welcome');?>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>

		

	</div>
</div>

<script>
var working = false;
var $this = $('#forgot-form');
var $this_sms = $('#forgot-form-sms');
var $state = $this.find('.errors');
var $state_sms = $this_sms.find('.errors');
$(function() {
	$('#recover_password_by_email').click(function(){
		$('.x_chooser').hide();
		$('.recover_password_by_email').show();
	});
	$('#recover_password_by_sms').click(function(){
		$('.x_chooser').hide();
		$('.recover_password_by_sms').show();
	});

  Wo_SetTimer();
  $this.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=recover',
    beforeSend: function() {
		working = true;
		$this.find('button').attr("disabled", true);
		$this.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
				$state.removeClass('alert-danger');
      	$state.addClass('alert-success');
        $state.html('<?php echo $wo['lang']['email_sent'] ?>');
		$this.find('.add_wow_loader').removeClass('btn-loading');
      } else {
		$this.find('button').attr("disabled", false);
		$this.find('.add_wow_loader').removeClass('btn-loading');
        $state.html(data.errors);
      }
      working = false;
    }
  });

	$this_sms.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=recoversms',
    beforeSend: function() {
		working = true;
		$this_sms.find('button').attr("disabled", true);
		$this_sms.find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
				$state_sms.removeClass('alert-danger');
      	$state_sms.addClass('alert-success');
        $state_sms.html('<?php echo $wo['lang']['recoversms_sent'] ?>');
				$this_sms.find('.add_wow_loader').removeClass('btn-loading');
				setTimeout(function () {
         window.location.href = data.location;
        }, 1000);
      } else {
				$this_sms.find('button').attr("disabled", false);
				$this_sms.find('.add_wow_loader').removeClass('btn-loading');
        $state_sms.html(data.errors);
      }
      working = false;
    }
  });

});
</script>
