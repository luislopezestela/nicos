<?php
$fields = lui_GetWelcomeFileds();
?>
<div class="wrapper">
	<div class="login">
		<div class="login_left_combo_parent">
			<div class="login_left_combo">
				<form id="register" method="post">
				<p class="title main"><?=str_replace(array('{site_name}', '{Site_Name}', '{sito_name}'), array($wo['config']['siteName'], $wo['config']['siteName'], $wo['config']['siteName']), $wo['lang']['register_create_account'])?></p>
				<div class="alert alert-danger errors"></div>
				<?php if ($wo['config']['auto_username'] == 1) { ?>
					<div class="wow_form_fields">
						<label for="first_name"><?php echo $wo['lang']['first_name']?></label>
						<input id="first_name" name="first_name" type="text" autocomplete="off" autofocus>
					</div>
					<div class="wow_form_fields">
						<label for="last_name"><?php echo $wo['lang']['last_name']?></label>
						<input id="last_name" name="last_name" type="text" autocomplete="off">
					</div>
				<?php }else{ ?>
					<div class="wow_form_fields">
						<label for="username"><?php echo $wo['lang']['username']?></label>
						<input id="username" name="username" type="text" autocomplete="off" autofocus>
					</div>
				<?php } ?>
				<div class="wow_form_fields">
					<label for="email"><?php echo $wo['lang']['email_address']?></label>
					<input id="email" name="email" type="email" autocomplete="off" />
				</div>
				<?php if($wo['config']['sms_or_email'] == 'sms') {?>
					<div class="wow_form_fields">
						<label for="phone_num_ex"><?php echo $wo['lang']['phone_num_ex']?></label>
						<input id="phone_num_ex" name="phone_num" type="text" autocomplete="off" />
					</div>
				<?php } ?>
				<div class="wow_form_fields">
					<label for="password"><?php echo $wo['lang']['password']?></label>
					<input id="password" name="password" type="password" autocomplete="off" />
					<?php if ($wo['config']['password_complexity_system'] == 1) { ?>
						<ul class="list-unstyled helper-text">
							<li class="length"><?php echo $wo['lang']['least_characters']; ?></li>
							<li class="lowercase"><?php echo $wo['lang']['contain_lowercase']; ?></li>
							<li class="uppercase"><?php echo $wo['lang']['contain_uppercase']; ?></li>
							<li class="special"><?php echo $wo['lang']['number_special']; ?></li>
						</ul>
					<?php } ?>
				</div>
				<div class="wow_form_fields">
					<label for="confirm_password"><?php echo $wo['lang']['confirm_password']?></label>
					<input id="confirm_password" name="confirm_password" type="password" autocomplete="off" />
				</div>
				<?php
					if (!empty($fields) && count($fields) > 0) {
						foreach ($fields as $key => $wo['field']) {
							echo lui_LoadPage('welcome/fields');
						}
					}
				?>
				<div class="wow_form_fields">
					<label for="gender"><?php echo $wo['lang']['gender']?></label>
					<select name="gender" id="gender">
						<option value="0"><?php echo $wo['lang']['gender']?></option>
						<?php foreach ($wo['genders'] as $key => $gender) { ?>
							<option value="<?php echo($key) ?>"><?php echo $gender; ?></option>
						<?php } ?>
					</select>
				</div>
				<?php if($wo['config']['reCaptcha'] == 1) {?>
					<div class="form-group" style="margin-top:10px;">
						<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
					</div>
				<?php } ?>
				<?php if(!empty( $_GET['last_url'])){?>
					<div class="form-group">
						<input type="hidden" name="last_url" value="<?php echo urldecode(lui_Secure($_GET['last_url']));?>">
					</div>
				<?php } ?>
				<div class="terms">
					<input type="checkbox" name="accept_terms" id="accept_terms" onchange="activateButton(this)">
					<label for="accept_terms">
						<?php echo $wo['lang']['terms_agreement'] ?> <a href="<?php echo lui_SeoLink('index.php?link1=terms&type=terms');?>" class="main"><?php echo $wo['lang']['terms_of_use'] ?></a> & <a href="<?php echo lui_SeoLink('index.php?link1=terms&type=privacy-policy');?>" class="main"><?php echo $wo['lang']['privacy_policy'] ?></a>
					</label>
					<div class="clear"></div>
				</div>
				<div class="login_signup_combo">
					<div class="login__">
						<button type="submit" class="btn btn-main btn-mat add_wow_loader" id="sign_submit" disabled><?php echo $wo['lang']['lets_go']?></button>
					</div>
					<div class="signup__">
						<p><?php echo $wo['lang']['already_have_account']?> <a class="dec main" href="<?=lui_SeoLink('index.php?link1=acceder');?>"><?php echo $wo['lang']['login']?></a></p>
					</div>
				</div>
				<?php
				 if (isset($_GET['invite']) && (lui_IsAdminInvitationExists($_GET['invite']) || lui_IsUserInvitationExists($_GET['invite']))): ?>
					<input type="text" class="hidden" value="<?php echo $_GET['invite']; ?>" name="invited">
				<?php endif; ?>
			</form>

			<div class="footer">
				<?php echo lui_LoadPage('footer/welcome');?>
			</div>
			</div>
		</div>


			

	</div>
</div>

<script>
var working = false;
var $this = $('#register');
var $state = $this.find('.errors');
$(function() {
  $this.ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=register',
    beforeSend: function() {
    	<?php if ($wo['config']['password_complexity_system'] == 1) { ?>
    	if ($('.helper-text .length').hasClass('valid') && $('.helper-text .lowercase').hasClass('valid') && $('.helper-text .uppercase').hasClass('valid') && $('.helper-text .special').hasClass('valid')) {
    		working = true;
			$this.find('button').attr("disabled", true);
			$this.find('.add_wow_loader').addClass('btn-loading');
    	}
    	else{
    		$state.html("<?php echo($wo['lang']['complexity_requirements']) ?>");
    		return false;
    	}
        <?php } else{ ?>
        	working = true;
			$this.find('button').attr("disabled", true);
			$this.find('.add_wow_loader').addClass('btn-loading');
        <?php } ?>


    },
    success: function(data) {
      if (data.status == 200) {
				$state.removeClass('alert-danger');
				$state.addClass('alert-success');
        $state.html('<?php echo $wo['lang']['welcome_'] ?>');
		$this.find('.add_wow_loader').removeClass('btn-loading');
        setTimeout(function () {
         window.location.href = data.location;
        }, 1000);
      } else if (data.status == 300) {
        window.location.href = data.location;
      } else {
        $this.find('button').attr("disabled", false);
		$this.find('.add_wow_loader').removeClass('btn-loading');
        $state.html(data.errors);
      }
      working = false;
    }
  });
});

function activateButton(element) {
	if(element.checked) {
		document.getElementById("sign_submit").disabled = false;
	}
	else  {
		document.getElementById("sign_submit").disabled = true;
	}
};

<?php if ($wo['config']['password_complexity_system'] == 1) { ?>

(function(){
	var helperText = {
		charLength: document.querySelector('.helper-text .length'),
		lowercase: document.querySelector('.helper-text .lowercase'),
		uppercase: document.querySelector('.helper-text .uppercase'),
		special: document.querySelector('.helper-text .special')
	};
	var password = document.querySelector('#password');



	var pattern = {
		charLength: function() {
			if( password.value.length >= 6 ) {
				return true;
			}
		},
		lowercase: function() {
			var regex = /^(?=.*[a-z]).+$/; // Lowercase character pattern

			if( regex.test(password.value) ) {
				return true;
			}
		},
		uppercase: function() {
			var regex = /^(?=.*[A-Z]).+$/; // Uppercase character pattern

			if( regex.test(password.value) ) {
				return true;
			}
		},
		special: function() {
			var regex = /^(?=.*[0-9_\W]).+$/; // Special character or number pattern

			if( regex.test(password.value) ) {
				return true;
			}
		}
	};

	// Listen for keyup action on password field
	function CheckCPassword() {
		$('.helper-text').slideDown('slow', function() {
  	    	
  	    });
		// Check that password is a minimum of 8 characters
		patternTest( pattern.charLength(), helperText.charLength );
		
		// Check that password contains a lowercase letter		
		patternTest( pattern.lowercase(), helperText.lowercase );
		
		// Check that password contains an uppercase letter
		patternTest( pattern.uppercase(), helperText.uppercase );
		
		// Check that password contains a number or special character
		patternTest( pattern.special(), helperText.special );
    
	    // Check that all requirements are fulfilled
	    if( hasClass(helperText.charLength, 'valid') &&
				  hasClass(helperText.lowercase, 'valid') && 
				 	hasClass(helperText.uppercase, 'valid') && 
				  hasClass(helperText.special, 'valid')
			) {
				addClass(password.parentElement, 'valid');
	    }
	    else {
	      removeClass(password.parentElement, 'valid');
	    }
	}
  password.addEventListener('keyup', CheckCPassword);
  password.addEventListener('input', CheckCPassword);

	function patternTest(pattern, response) {
		if(pattern) {
      addClass(response, 'valid');
    }
    else {
      removeClass(response, 'valid');
    }
	}

	function addClass(el, className) {
		if (el.classList) {
			el.classList.add(className);
		}
		else {
			el.className += ' ' + className;
		}
	}

	function removeClass(el, className) {
		if (el.classList)
				el.classList.remove(className);
			else
				el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	}

	function hasClass(el, className) {
		if (el.classList) {
			console.log(el.classList);
			return el.classList.contains(className);
		}
		else {
			new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
		}
	}

})();
<?php } ?>
</script>
