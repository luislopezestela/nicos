<?php
$fields = lui_GetWelcomeFileds();
?>
<style type="text/css">
.alert-danger{background-color:rgba(244, 67, 54, 0.1);color:#F44336;}
.alert{border:0;font-weight:bold;font-family:Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;padding:15px;border-radius:4px;}
.container_acceder{width:100vw;height:calc(100vh - 160px);display:grid;grid-template-columns:1fr;grid-gap:7rem;padding:0 2rem;}
.login-content{display:flex;justify-content:center;align-items:center;text-align:center;}
form{width:360px;}
.login-content .perfil_imagesvg{height:100px;color:var(--boton-fondo);max-width:100%;}
.terms{display:flex;padding:17px 0;}
.terms input{width:25px;height:25px;padding-right:7px;}
.terms label{padding:3px 10px;}
.errors,.success{padding:12px;border-radius:12px;border:0;font-size:15px;user-select:none;}
.errors:empty,.success:empty{padding:0;}
.errors svg{display:inline-block;font: normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
.login-content h2{margin:15px 0;color:#333;text-transform:uppercase;font-size:2.3rem;font-family:fantasy;}
.login-content .input-div{position:relative;display:grid;grid-template-columns:7% 93%;margin:25px 0;padding:5px 0;border-bottom:2px solid #d9d9d9;}
.login-content .input-div.one{margin-top:0;}
.i{color:#d9d9d9;display:flex;justify-content:center;align-items:center;}
.i i{transition:.3s;}
.input-div > div{position:relative;height:45px;}
.input-div > div > h5{position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#999;font-size:18px;transition:.3s;}
.input-div:before, .input-div:after{content:'';position:absolute;bottom:-2px;width:0%;height:2px;background-color:#38d39f;transition:.4s;}
.input-div:before{right:50%;}
.input-div:after{left:50%;}
.input-div.focus:before, .input-div.focus:after{width:50%;}
.input-div.focus > div > h5{top:-5px;font-size:15px;}
.input-div.focus > .i > i{color:#38d39f;}
.input-div > div > input,.input-div > div > select{position:absolute;left:0;top:0;width:100%;height:100%;border:none;outline:none;background:none;padding:0.5rem 0.7rem;font-size:1.2rem;color:#555;font-family:'poppins', sans-serif;}
.input-div.pass{margin-bottom:4px;}
.input-div.two{margin-bottom:4px;}
a{text-decoration:none;color:#999;font-size:0.9rem;transition:.3s;}
a:hover{color:#38d39f;}
.random_users{margin-top:80px}
.users-profiles{padding:0;width:100%;margin:30px auto 0;text-align:center;display:block}
.user-image, .user-image img {width:44px;height:44px;border-radius:50%}
.user-image {display: inline-block;margin: -7px -4px;box-shadow: 0 0 0 2px #ffffff;}
.terms{padding-left:22px}
.terms input[type=checkbox]{opacity:0;margin:0 0 6px 4px;display:none}
.terms label::after,.terms label::before{display:inline-block;left:0;margin-left:-20px}
.terms label{padding-left: 20px;cursor: pointer;user-select: none;font-size: 16px;opacity: 0.9;}
.terms label::before{content:"";position:absolute;width: 24px;height: 24px;top: -1px;border: 2px solid #b4b4b4;border-radius: 5px;transition:all 90ms cubic-bezier(0,0,.2,.1)}
.terms input[type=checkbox]:checked+label::before{background-color:#1e2322;border-color:#1e2322}
.terms label::after{position:absolute;width:16px;height:16px;top:0;padding-left:3px;padding-top:1px;font-size:11px;color:#555}
.terms input[type=checkbox]:checked+label::after{border:2px solid #fff;border-top:none;border-right:none;content:"";height:5px;left:7px;position:absolute;top:7px;transform:rotate(-45deg);width:10px;transition:.2s;color:#fff}
.typed-cursor{opacity:1;-webkit-animation:blink .7s infinite;-moz-animation:blink .7s infinite;animation:blink .7s infinite;color:#e9e9e9;font-size:28px}@keyframes blink{0%,100%{opacity:1}50%{opacity:0}}@-webkit-keyframes blink{0%,100%{opacity:1}50%{opacity:0}}
.btn{display:block;width:100%;height:50px;border-radius:25px;outline:none;border:none;background-image:linear-gradient(to right, #32be8f, #38d39f, #32be8f);background-size:200%;font-size:1.2rem;color:#fff;font-family:'Poppins', sans-serif;text-transform:uppercase;margin:1rem 0;cursor:pointer;transition:777ms;}
.btn:hover{background-position:right;display:block;background-image:linear-gradient(to left, aqua, #38d39f, lightcyan);transform:scale(104%);}
@media screen and (max-width: 1050px){
	.container_acceder{grid-gap: 5rem;}
}
@media screen and (max-width: 1000px){
	form{width: 290px;}
	.login-content h2{font-size:2.4rem;margin:8px 0;}
	.img img{width:400px;}
}

@media screen and (max-width: 900px){
	.container_acceder{grid-template-columns:1fr;}
	.img{display:none;}
	.login-content{justify-content:center;}
}
</style>
<div class="container_acceder">
	<div class="login-content">
		<div class="login_left_combo_parent">
			<div class="login_left_combo">
				<form id="register" method="post">
				<h2 class="title main"><?=str_replace(array('{site_name}', '{Site_Name}', '{sito_name}'), array($wo['config']['siteName'], $wo['config']['siteName'], $wo['config']['siteName']), $wo['lang']['register_create_account'])?></h2>
				<div class="alert alert-danger errors"></div>
				<?php if ($wo['config']['auto_username'] == 1) { ?>
					<div class="input-div one">
						<div class="i">
           		<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
           	</div>
           	<div class="div">	
							<h5 for="first_name"><?php echo $wo['lang']['first_name']?></h5>
							<input class="input" id="first_name" name="first_name" type="text" autocomplete="off" autofocus>
						</div>
					</div>
					<div class="input-div two">
						<div class="i">
           		<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
           	</div>
           	<div class="div">
							<label for="last_name"><?php echo $wo['lang']['last_name']?></label>
							<input class="input" id="last_name" name="last_name" type="text" autocomplete="off">
						</div>
					</div>
				<?php }else{ ?>
					<div class="input-div one">
						<div class="i">
           		<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg></i>
           	</div>
           	<div class="div">
							<h5 for="username"><?php echo $wo['lang']['username']?></h5>
							<input class="input" id="username" name="username" type="text" autocomplete="off" autofocus>
						</div>
					</div>
				<?php } ?>
				<div class="input-div two">
					<div class="i">
           	<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="16" viewBox="0 0 512 512"><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg></i>
          </div>
          <div class="div">
						<h5 for="email"><?php echo $wo['lang']['email_address']?></h5>
						<input class="input" id="email" name="email" type="email" autocomplete="off" />
					</div>
				</div>
				<?php if($wo['config']['sms_or_email'] == 'sms') {?>
					<div class="input-div two">
						<div class="i">
	           	<i><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="16" viewBox="0 0 512 512"><path d="M256 448c141.4 0 256-93.1 256-208S397.4 32 256 32S0 125.1 0 240c0 45.1 17.7 86.8 47.7 120.9c-1.9 24.5-11.4 46.3-21.4 62.9c-5.5 9.2-11.1 16.6-15.2 21.6c-2.1 2.5-3.7 4.4-4.9 5.7c-.6 .6-1 1.1-1.3 1.4l-.3 .3 0 0 0 0 0 0 0 0c-4.6 4.6-5.9 11.4-3.4 17.4c2.5 6 8.3 9.9 14.8 9.9c28.7 0 57.6-8.9 81.6-19.3c22.9-10 42.4-21.9 54.3-30.6c31.8 11.5 67 17.9 104.1 17.9zM96 212.8c0-20.3 16.5-36.8 36.8-36.8H152c8.8 0 16 7.2 16 16s-7.2 16-16 16H132.8c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.3 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8H112c-8.8 0-16-7.2-16-16s7.2-16 16-16h27.2c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6C102.2 236.7 96 225.2 96 212.8zM372.8 176H392c8.8 0 16 7.2 16 16s-7.2 16-16 16H372.8c-2.7 0-4.8 2.2-4.8 4.8c0 1.6 .8 3.1 2.2 4l29.4 19.6c10.2 6.8 16.4 18.3 16.4 30.7c0 20.3-16.5 36.8-36.8 36.8H352c-8.8 0-16-7.2-16-16s7.2-16 16-16h27.2c2.7 0 4.8-2.2 4.8-4.8c0-1.6-.8-3.1-2.2-4l-29.4-19.6c-10.2-6.8-16.4-18.3-16.4-30.7c0-20.3 16.5-36.8 36.8-36.8zm-152 6.4L256 229.3l35.2-46.9c4.1-5.5 11.3-7.8 17.9-5.6s10.9 8.3 10.9 15.2v96c0 8.8-7.2 16-16 16s-16-7.2-16-16V240l-19.2 25.6c-3 4-7.8 6.4-12.8 6.4s-9.8-2.4-12.8-6.4L224 240v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-6.9 4.4-13 10.9-15.2s13.7 .1 17.9 5.6z"/></svg></i>
	          </div>
	          <div class="div">
							<h5 for="phone_num_ex"><?php echo $wo['lang']['phone_num_ex']?></h5>
							<input class="input" id="phone_num_ex" name="phone_num" type="text" autocomplete="off" />
						</div>
					</div>
				<?php } ?>
				<div class="input-div pass">
					<div class="i">
           	<i><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg></i>
          </div>
          <div class="div">
						<h5 for="password"><?php echo $wo['lang']['password']?></h5>
						<input class="input" id="password" name="password" type="password" autocomplete="off" />
					</div>
				</div>
				<div>
					<?php if ($wo['config']['password_complexity_system'] == 1) { ?>
						<ul class="list-unstyled helper-text">
							<li class="length"><?php echo $wo['lang']['least_characters']; ?></li>
							<li class="lowercase"><?php echo $wo['lang']['contain_lowercase']; ?></li>
							<li class="uppercase"><?php echo $wo['lang']['contain_uppercase']; ?></li>
							<li class="special"><?php echo $wo['lang']['number_special']; ?></li>
						</ul>
					<?php } ?>
				</div>
				<div class="input-div pass">
					<div class="i">
           	<i><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg></i>
          </div>
          <div class="div">
						<h5 for="confirm_password"><?php echo $wo['lang']['confirm_password']?></h5>
						<input class="input" id="confirm_password" name="confirm_password" type="password" autocomplete="off" />
					</div>
				</div>
				<?php
					if (!empty($fields) && count($fields) > 0) {
						foreach ($fields as $key => $wo['field']) {
							echo lui_LoadPage('welcome/fields');
						}
					}
				?>
				<div class="input-div two">
					<div class="i">
           	<i><svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg></i>
          </div>
          <div class="div">
						<h5 for="gender"><?php echo $wo['lang']['gender']?></h5>
						<select class="input" name="gender" id="gender">
							<option value="0"></option>
							<?php foreach ($wo['genders'] as $key => $gender) { ?>
								<option value="<?php echo($key) ?>"><?php echo $gender; ?></option>
							<?php } ?>
						</select>
					</div>
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
			</div>
		</div>


			

	</div>
</div>

<script>
var working = false;
var $this = $('#register');
var $state = $this.find('.errors');
const inputs = document.querySelectorAll(".input");
function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}
function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}
inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});
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
